<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?= $head; ?>

    <link rel="icon" type="image/png" href="<?= theme("/assets/images/favicon.png"); ?>"/>
    <link rel="stylesheet" href="<?= theme("/assets/style.css"); ?>"/>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<!--HEADER-->
<header class="container-fluid header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 header_logo">
                <a href="<?= url("/"); ?>">
                    <img src="<?= theme("/assets/images/logo.png"); ?>" alt="Passow Imóveis" class="logo">
                </a>
            </div>
            <div class="col-md-10 d-flex align-items-center justify-content-end header_menus_contacts">
                <div class="header_menus">

                    <button class="btn btn-link dropdown-toggle menu" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-menu"></i> Menu
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= url("/"); ?>">Página Inicial</a>
                        <a class="dropdown-item" href="<?= url("/entrar"); ?>">Login</a>
                    </div>

                    <a href="" class="menu btn btn-link"><i class="icon-file"></i> 2ª Via Boleto</a>
                </div>
                <div class="header_phones d-flex">
                    <div class="contact d-flex align-items-center">
                        <i class="icon-whatsapp"></i>
                        <div>
                            <span>Locação</span>
                            <span>(51) 98122-8895</span>
                        </div>
                    </div>
                    <div class="contact d-flex align-items-center">
                        <i class="icon-whatsapp"></i>
                        <div>
                            <span>Financeiro</span>
                            <span>(51) 98278-2222</span>
                        </div>
                    </div>
                    <div class="contact d-flex align-items-center">
                        <i class="icon-whatsapp"></i>
                        <div>
                            <span>Vendas</span>
                            <span>(51) 98278-1111</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--CONTENT-->
<main class="main_content">
    <?= $v->section("content"); ?>
</main>

<footer class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer-logo">
                <img src="<?= theme("/assets/images/logo.png"); ?>" alt="Passow Imóveis" class="logo">
                <span>AV. Wencesçau Escobar, 2037</span>
                <span>Tristeza - Porto Alegre - RS</span>
            </div>
            <div class="col-md-3 footer-contact">
                <div class="d-flex align-items-center">
                    <i class="icon-whatsapp"></i>
                    <div>
                        <span>Locação</span>
                        <span>(51) 98122-8895</span>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <i class="icon-whatsapp"></i>
                    <div>
                        <span>Vendas</span>
                        <span>(51) 98278-1111</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 footer-contact">
                <div class="d-flex align-items-center">
                    <i class="icon-whatsapp"></i>
                    <div>
                        <span>Financeiro</span>
                        <span>(51) 98278-2222</span>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <i class="icon-phone"></i>
                    <div>
                        <span>Ligue!</span>
                        <span>(51) 3269-2901</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 footer-social">
                <a target="_blank" class="icon-facebook"
                   href="https://www.facebook.com/<?= CONF_SOCIAL_FACEBOOK_PAGE; ?>"
                   title="Passow Imóveis no Facebook"></a>
                <a target="_blank" class="icon-youtube"
                   href="https://www.youtube.com/<?= CONF_SOCIAL_YOUTUBE_PAGE; ?>"
                   title="Passow Imóveis no YouTube"></a>
                <a target="_blank" class="icon-instagram"
                   href="https://www.instagram.com/<?= CONF_SOCIAL_INSTAGRAM_PAGE; ?>"
                   title="Passow Imóveis no Instagram"></a>
            </div>
        </div>
        <div class="row footer-copyright">
            <div class="col-12">
                <p>Copyright © Todos os Direitos Reservados</p>
            </div>
        </div>
    </div>
</footer>

<script src="<?= theme("/assets/scripts.js"); ?>"></script>
<?= $v->section("scripts"); ?>

</body>
</html>