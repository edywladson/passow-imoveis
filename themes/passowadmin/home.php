<?php $v->layout("_theme"); ?>

<div class="home_content mini_content">
    <header class="title_content">
        <h6>Olá <?= user()->first_name ?></h6>
        <h2>Seja bem vindo(a)!</h2>
    </header>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card shadow hover_item">
                <div class="card-body">
                    <div class="not_found_content">
<!--                        <img src="--><?//= theme("/assets/images/icons/store.svg", CONF_VIEW_ADMIN) ?><!--" alt="" width="100">-->
                        <h2>Insera seus Locatários</h2>
                        <p>Você pode inserir seus locatários de forma simples e rápida</p>
                        <a href="<?= url("/admin/locatarios") ?>" class="store-item btn btn-success" type="button" role="button">
                            Cadastrar Locatário
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card shadow hover_item">
                <div class="card-body">
                    <div class="not_found_content">
                        <h2>Insera seus Locadores</h2>
                        <p>Você pode inserir seus locadores de forma simples e rápida</p>
                        <a href="<?= url("/admin/locadores") ?>" class="store-item btn btn-success" type="button" role="button">
                            Cadastrar Locador
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card shadow hover_item">
                <div class="card-body">
                    <div class="not_found_content">
                        <h2>Crie seus Contratos</h2>
                        <p>Com apenas alguns cliques, você poderá criar seus contratos</p>
                        <a href="<?= url("/admin/contratos") ?>" class="store-item btn btn-success" type="button" role="button">
                            Cadastrar Contratos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

