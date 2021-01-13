<?php


namespace Source\App;


use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\Report\Access;
use Source\Models\Report\Online;
use Source\Models\User;
use Source\Support\Message;
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

    public function tenants():void
    {
        $head = $this->seo->render(
            "Locatários" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );


        echo $this->view->render("tenants", [
            "app" => "tenants",
            "head" => $head
        ]);
    }

    public function proprietaries(): void
    {
        $head = $this->seo->render(
            "Locadores" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );


        echo $this->view->render("proprietaries", [
            "app" => "proprietaries",
            "head" => $head
        ]);
    }

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