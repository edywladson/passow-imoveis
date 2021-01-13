<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="mit" content="2020-04-29T07:11:33-03:00+173748">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?= $head; ?>
    <link rel="icon" type="image/png" href="<?= theme("/assets/images/favicon.png"); ?>"/>
    <link rel="stylesheet" href="<?= theme("/assets/style.css", CONF_VIEW_ADMIN); ?>"/>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response"><?= flash(); ?></div>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar" class="main_sidebar">
        <div class="sidebar_header">
            <img src="<?= theme("/assets/images/logo-updase-icon.svg", CONF_VIEW_ADMIN); ?>" class="mobile_logo" alt="Passow Imóveis" title="Passow Imóveis">
            <img src="<?= theme("/assets/images/logo.png", CONF_VIEW_ADMIN); ?>" class="desktop_logo" alt="Passow Imóveis" title="Passow Imóveis">
        </div>

        <div class="sidebar_body">
            <ul>
                <li <?= ($app == "home") ? 'class="active"' : "" ?>><a href="<?= url("/admin") ?>" title="Home"><span>Home</span></a></li>
                <li <?= ($app == "tenants") ? 'class="active"' : "" ?>><a href="<?= url("/admin/locatarios") ?>" title="Locatários"><span>Locatários</span></a></li>
                <li <?= ($app == "proprietaries") ? 'class="active"' : "" ?>><a href="<?= url("/admin/locadores") ?>" title="Locadores"><span>Locadores</span></a></li>
                <li <?= ($app == "contracts") ? 'class="active"' : "" ?>><a href="<?= url("/admin/contratos") ?>" title="Contratos"><span>Contratos</span></a></li>
            </ul>
        </div>
    </nav>

    <!--CONTENT-->
    <main class="main_content d-flex flex-column">
        <nav class="topbar navbar navbar-expand">
            <button type="button" id="sidebarCollapse" class="btn sidebarCollapse">
                <i class="icon-menu"></i>
            </button>
            <ul class="nav navbar-nav ml-auto d-flex align-items-center">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= user()->first_name ?></span>
                        <span class="img-profile j_profile_image d-flex align-items-center justify-content-center" style="background-image: url('<?= image(user()->photo, 260, 260); ?>')">
                            <?= !user()->photo ? substr(user()->first_name, 0, 1) : "" ; ?>
                        </span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= url("/admin/perfil"); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Minha Conta
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= url("/admin/sair"); ?>">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Sair
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="app_main">
            <?= $v->section("content"); ?>
        </div>
    </main>
</div>

<div class="overlay">
    <div id="dismiss">
        <i class="fas fa-times"></i>
    </div>
</div>

<script src="<?= theme("/assets/scripts.js", CONF_VIEW_ADMIN); ?>"></script>
<?= $v->section("scripts"); ?>

</body>
</html>