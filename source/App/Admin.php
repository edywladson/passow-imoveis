<?php


namespace Source\App;


use Source\Core\Controller;
use Source\Models\Admin\Address;
use Source\Models\Admin\Contract;
use Source\Models\Admin\Invoice;
use Source\Models\Admin\Proprietary;
use Source\Models\Admin\Tenant;
use Source\Models\Admin\Transfer;
use Source\Models\Auth;
use Source\Models\Report\Access;
use Source\Models\Report\Online;
use Source\Models\User;
use Source\Support\Message;
use Source\Support\Pager;
use Source\Support\Vista;

/**
 * Class Admin
 * @package Source\App
 */
class Admin extends Controller
{

    /** @var User */
    private $user;

    /**
     * Admin constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_ADMIN . "/");

        if (!$this->user = Auth::user()) {
            $this->message->warning("Efetue login para acessar o ADMIN.")->flash();
            redirect("/entrar");
        }

        (new Access())->report();
        (new Online())->report();
    }


    /**
     *
     */
    public function home(): void
    {
        $head = $this->seo->render(
            "Olá {$this->user->first_name} - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );


        echo $this->view->render("home", [
            "app" => "home",
            "head" => $head
        ]);
    }


    /**
     * @param array|null $data
     */
    public function tenants(?array $data): void
    {
        $head = $this->seo->render(
            "Locatários" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        $tenants = (new Tenant())->find();
        $pager = new Pager(url("/admin/locatarios/"));
        $pager->pager($tenants->count(), 20, (!empty($data["page"]) ? $data["page"] : 1));


        echo $this->view->render("tenants", [
            "app" => "tenants",
            "head" => $head,
            "tenants" => $tenants->order("id ASC")->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render(),
        ]);
    }

    /**
     * @param array|null $data
     */
    public function tenant(?array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        /** create */
        if (!empty($data["action"]) && $data["action"] == "create") {
            $tenant = new Tenant();
            $tenant->name = $data["name"];
            $tenant->email = $data["email"];
            $tenant->phone = $data["phone"];

            if (!$tenant->save()) {
                $json['message'] = $tenant->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Locatário cadastrado com sucesso!")->flash();

            echo json_encode(["redirect" => url("/admin/locatario/{$tenant->id}")]);
            return;
        }

        /** update */
        if (!empty($data["action"]) && $data["action"] == "update") {

            $tenant = (new Tenant())->findById($data["id"]);
            $tenant->name = $data["name"];
            $tenant->email = $data["email"];
            $tenant->phone = $data["phone"];

            if (!$tenant->save()) {
                $json['message'] = $tenant->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Locatário atualizado com sucesso!")->flash();

            echo json_encode(['reload' => true]);
            return;
        }

        /** delete */
        if (!empty($data["action"]) && $data["action"] == "delete") {

            $tenant = (new Tenant())->findById($data["id"]);

            if (!$tenant) {
                $this->message->error("Você tentou excluir um locatário que não existe ou já foi removido")->flash();
                echo json_encode(["redirect" => url("/admin/locatarios")]);
                return;
            }

            $tenant->destroy();

            $this->message->success("Locatário excluído com sucesso!")->flash();
            $json["redirect"] = url("/admin/locatarios");

            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Locatário" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        $tenantId = filter_var($data["tenant"], FILTER_VALIDATE_INT);
        $tenant = (new Tenant())->findById($tenantId);

        if (!$tenant) {
            $this->message->error('Ooops! Você tentou acessar um locatário que não existe')->flash();
            redirect(url('/admin/locatarios'));
        }

        echo $this->view->render("tenant", [
            "app" => "tenants",
            "head" => $head,
            "tenant" => $tenant->data()
        ]);
    }


    /**
     * @param array|null $data
     */
    public function proprietaries(?array $data): void
    {
        $head = $this->seo->render(
            "Locadores" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        $proprietaries = (new Proprietary())->find();
        $pager = new Pager(url("/admin/locatarios/"));
        $pager->pager($proprietaries->count(), 20, (!empty($data["page"]) ? $data["page"] : 1));


        echo $this->view->render("proprietaries", [
            "app" => "proprietaries",
            "head" => $head,
            "proprietaries" => $proprietaries->order("id ASC")->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render(),
        ]);
    }

    /**
     * @param array|null $data
     */
    public function proprietary(?array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        /** create */
        if (!empty($data["action"]) && $data["action"] == "create") {
            $proprietary = new Proprietary();
            $proprietary->name = $data["name"];
            $proprietary->email = $data["email"];
            $proprietary->phone = $data["phone"];
            $proprietary->transfer_day = $data["transfer_day"];

            if (!$proprietary->save()) {
                $json['message'] = $proprietary->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Locador cadastrado com sucesso!")->flash();

            echo json_encode(["redirect" => url("/admin/locador/{$proprietary->id}")]);
            return;
        }

        /** update */
        if (!empty($data["action"]) && $data["action"] == "update") {

            $proprietary = (new Proprietary())->findById($data["id"]);
            $proprietary->name = $data["name"];
            $proprietary->email = $data["email"];
            $proprietary->phone = $data["phone"];
            $proprietary->transfer_day = $data["transfer_day"];

            if (!$proprietary->save()) {
                $json['message'] = $proprietary->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Locador atualizado com sucesso!")->flash();

            echo json_encode(['reload' => true]);
            return;
        }

        /** delete */
        if (!empty($data["action"]) && $data["action"] == "delete") {

            $proprietary = (new Proprietary())->findById($data["id"]);

            if (!$proprietary) {
                $this->message->error("Você tentou excluir um locador que não existe ou já foi removido")->flash();
                echo json_encode(["redirect" => url("/admin/locadores")]);
                return;
            }

            $proprietary->destroy();

            $this->message->success("Locador excluído com sucesso!")->flash();
            $json["redirect"] = url("/admin/locadores");

            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Locador" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        $proprietaryId = filter_var($data["proprietary"], FILTER_VALIDATE_INT);
        $proprietary = (new Proprietary())->findById($proprietaryId);

        if (!$proprietary) {
            $this->message->error('Ooops! Você tentou acessar um locador que não existe')->flash();
            redirect(url('/admin/locadores'));
        }

        echo $this->view->render("proprietary", [
            "app" => "proprietaries",
            "head" => $head,
            "proprietary" => $proprietary->data()
        ]);
    }


    /**
     * @param array|null $data
     */
    public function contracts(?array $data): void
    {
        $contracts = (new Contract())->find();

        $pager = new Pager(url("/admin/contratos/"));
        $pager->pager($contracts->count(), 9, (!empty($data["page"]) ? $data["page"] : 1));

        $proprietaries = (new Proprietary())->find();
        $tenants = (new Tenant())->find();

        $head = $this->seo->render(
            "Contratos" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("contracts", [
            "app" => "contracts",
            "head" => $head,
            "contracts" => $contracts->order("id ASC")->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "proprietaries" => $proprietaries->fetch(true),
            "tenants" => $tenants->fetch(true),
            "paginator" => $pager->render()
        ]);
    }

    /**
     * @param array|null $data
     */
    public function contract(?array $data): void
    {
        /** create */
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $immobile = (new Vista())->findImmobile($data["immobile"])->callback();

            if (isset($immobile->status) && $immobile->status == 400) {
                $json["message"] = $this->message->warning($immobile->message)->render();
                echo json_encode($json);
                return;
            }

            $address = (new Address());
            $address->street = $immobile->Endereco;
            $address->number = $immobile->Numero;
            $address->complement = $immobile->Complemento;
            $address->neighborhood = $immobile->Bairro;
            $address->city = $immobile->Cidade;
            $address->uf = $immobile->UF;
            $address->zip = $immobile->CEP;
            $address->save();

            $contract = new Contract();
            $contract->immobile_code = $immobile->Codigo;
            $contract->address_id = $address->id;
            $contract->proprietary_id = $data["proprietary_id"];
            $contract->tenant_id = $data["tenant_id"];
            $contract->started = date('Y-m-d', strtotime($data["started"]));
            $contract->closing = date('Y-m-d', strtotime($data["closing"]));
            $contract->administration_fee = $data["administration_fee"];
            $contract->rent_value = str_replace(['.', ','], ['', '.'], $data["rent_value"]);
            $contract->condo_value = str_replace(['.', ','], ['', '.'], $data["condo_value"]);
            $contract->iptu_value = str_replace(['.', ','], ['', '.'], $data["iptu_value"]);

            if (!$contract->save()) {
                $json['message'] = $contract->message()->render();
                echo json_encode($json);
                return;
            }

            $invoice = new Invoice();
            if (!$invoice->launch($contract, $data)) {
                $json['message'] = $invoice->message()->render();
                echo json_encode($json);

                return;
            }

            $transfer = new Transfer();
            if (!$transfer->launch($contract, $data)) {
                $json['message'] = $transfer->message()->render();
                echo json_encode($json);

                return;
            }

            $this->message->success("Contrato cadastrado com sucesso!")->flash();
            echo json_encode(["redirect" => url("/admin/contrato/{$contract->id}")]);
            return;
        }


        $head = $this->seo->render(
            "Contratos" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        $contractId = filter_var($data["contract"], FILTER_VALIDATE_INT);
        $contract = (new Contract())->findById($contractId);
        $contract->address = (new Address())->findById($contract->address_id);
        $contract->proprietary = (new Proprietary())->findById($contract->proprietary_id);
        $contract->tenant = (new Tenant())->findById($contract->tenant_id);
        $contract->invoices = (new Invoice())->find("contract_id = :contract_id ", "contract_id={$contract->id}")->fetch(true);
        $contract->transfers = (new Transfer())->find("contract_id = :contract_id ", "contract_id={$contract->id}")->fetch(true);

//        var_dump($contract->data());

        if (!$contract) {
            $this->message->error('Ooops! Você tentou acessar um contrato que não existe')->flash();
            redirect(url('/admin/contratos'));
        }


        echo $this->view->render("contract", [
            "app" => "contracts",
            "head" => $head,
            "contract" => $contract
        ]);
    }

    /**
     * @param array $data
     */
    public function onpaid(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        /** invoice */
        if(isset($data["invoice"])){
            $invoice = (new Invoice())->findById($data["invoice"]);

            if (!$invoice) {
                $this->message->error('Ooops! Ocorreu um erro ao atualizar o lançamento :/')->flash();
                $json['reload'] = true;
                echo json_encode($json);

                return;
            }

            $invoice->status = ($invoice->status == 'paid' ? 'unpaid' : 'paid');
            $invoice->save();
            $json['onpaid'] = true;
            echo json_encode($json);
        }

        /** transfer */
        if(isset($data["transfer"])){
            $transfer = (new Transfer())->findById($data["transfer"]);

            if (!$transfer) {
                $this->message->error('Ooops! Ocorreu um erro ao atualizar o lançamento :/')->flash();
                $json['reload'] = true;
                echo json_encode($json);

                return;
            }

            $transfer->status = ($transfer->status == 'realized' ? 'unrealized' : 'realized');
            $transfer->save();

            $json['onpaid'] = true;
            echo json_encode($json);
        }
    }

    /**
     *
     */
    public function logout()
    {
        (new Message())->info("Você saiu com sucesso " . Auth::user()->first_name . ". Volte logo :)")->flash();

        Auth::logout();
        redirect("/entrar");
    }
}