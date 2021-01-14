<?php


namespace Source\Models\Admin;


use Source\Core\Model;

class Transfer extends Model
{
    public function __construct()
    {
        parent::__construct(
            'admin_transfers',
            ['id'],
            ['contract_id', 'proprietary_id', 'value', 'due_at', 'repeat_when']
        );
    }

    public function launch(Contract $contract, Proprietary $proprietary ,array $data): ?Transfer
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (date($data["started"]) >= date($data["closing"])) {
            $this->message->warning('A data de início deve ser menor que a data de encerramento');

            return null;
        }

        $dueAt = date("Y") . "-" . date("m") . "-" .($proprietary->transfer_day < 10 ? "0{$proprietary->transfer_day}" : $proprietary->transfer_day);
        $lastDayMonthStart = date("t", mktime(0, 0, 0, date("m", strtotime($data["started"])), '01', date("Y", strtotime($data["started"]))));

        $rent_value = str_replace(['.', ','], ['', '.'], $data["rent_value"]);
        $iptu_value = str_replace(['.', ','], ['', '.'], $data["iptu_value"]);
        $value = abs(num_percent($data["administration_fee"], ($rent_value + $iptu_value)));

        $this->contract_id = $contract->id;
        $this->proprietary_id = $data["proprietary_id"];
        $this->transfer_of = null;
        $this->value = (($value / $lastDayMonthStart) * date_diff_interval($data["started"],date('Y-m-d', strtotime($dueAt . "+1month")),'D'));
        $this->due_at = date('Y-m-d', strtotime($dueAt . "+1month"));
        $this->repeat_when = "enrollment";
        $this->enrollments = date_diff_interval($data["started"],$data["closing"],'M');
        $this->enrollment_of = 1;
        $this->status = 'unrealized';

        if (!$this->save()) {
            return null;
        }

        if ($this->repeat_when == 'enrollment') {
            $transferOf = $this->id;
            for ($enrollment = 1; $enrollment < $this->enrollments; ++$enrollment) {
                $this->id = null;
                $this->transfer_of = $transferOf;
                $this->value = $value;
                $this->due_at = date('Y-m-d', strtotime($dueAt . "+".($enrollment+1)."month"));
                $this->status = 'unrealized';
                $this->enrollment_of = $enrollment + 1;
                $this->save();
            }
        }

        return $this;
    }
}