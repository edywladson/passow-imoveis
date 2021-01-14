<?php


namespace Source\Models\Admin;


use Source\Core\Model;

/**
 * Class Invoice
 * @package Source\Models\Admin
 */
class Invoice extends Model
{

    /**
     * Invoice constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'admin_invoices',
            ['id'],
            ['contract_id', 'tenant_id', 'value', 'due_at', 'repeat_when']
        );
    }

    /**
     * @param Contract $contract
     * @param array $data
     * @return $this|null
     */
    public function launch(Contract $contract, array $data): ?Invoice
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (date($data["started"]) >= date($data["closing"])) {
            $this->message->warning('A data de início deve ser menor que a data de encerramento');

            return null;
        }

        $dueAt = date("Y") . "-" . date("m") . "-01";
        $lastDayMonthStart = date("t", mktime(0, 0, 0, date("m", strtotime($data["started"])), '01', date("Y", strtotime($data["started"]))));

        $rent_value = str_replace(['.', ','], ['', '.'], $data["rent_value"]);
        $condo_value = str_replace(['.', ','], ['', '.'], $data["condo_value"]);
        $iptu_value = str_replace(['.', ','], ['', '.'], $data["iptu_value"]);
        $value = abs($rent_value + $condo_value + $iptu_value);

        $this->contract_id = $contract->id;
        $this->tenant_id = $data["tenant_id"];
        $this->invoice_of = null;
        $this->value = (($value / $lastDayMonthStart) * date_diff_interval($data["started"],date('Y-m-d', strtotime($dueAt . "+1month")),'D'));
        $this->due_at = date('Y-m-d', strtotime($dueAt . "+1month"));
        $this->repeat_when = "enrollment";
        $this->enrollments = date_diff_interval($data["started"],$data["closing"],'M');
        $this->enrollment_of = 1;
        $this->status = 'unpaid';

        if (!$this->save()) {
            return null;
        }

        if ($this->repeat_when == 'enrollment') {
            $invoiceOf = $this->id;
            for ($enrollment = 1; $enrollment < $this->enrollments; ++$enrollment) {
                $this->id = null;
                $this->invoice_of = $invoiceOf;
                $this->value = $value;
                $this->due_at = date('Y-m-d', strtotime($dueAt . "+".($enrollment+1)."month"));
                $this->status = 'unpaid';
                $this->enrollment_of = $enrollment + 1;
                $this->save();
            }
        }

        return $this;
    }

}