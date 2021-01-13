<?php


namespace Source\App;


use Source\Core\Controller;
use Source\Models\Admin\Proprietary;
use Source\Models\Admin\Tenant;
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
     *
     */
    public function tenants(): void
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
     *
     */
    public function proprietaries(): void
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
     *
     */
    public function contracts(): void
    {
        $head = $this->seo->render(
            "Contratos" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );


        echo $this->view->render("contracts", [
            "app" => "contracts",
            "head" => $head
        ]);
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