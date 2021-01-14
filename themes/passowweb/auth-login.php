<?php $v->layout("_theme"); ?>

<section class="auth container">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="auth_header">
                <h1>Fazer Login</h1>
<!--                <p>Ainda não tem conta? <a title="Cadastre-se" href="--><?//= url("cadastrar"); ?><!--">Cadastre-se!</a></p>-->
            </div>

            <form class="auth_form" action="<?= url("/entrar"); ?>" method="post" enctype="multipart/form-data">
                <div class="ajax_response"><?= flash(); ?></div>
                <?= csrf_input(); ?>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Informe seu e-mail:" required/>
                </div>
                <div class="form-group">
                    <div class="unlock-alt">
                        <label>Senha:</label>
<!--                        <span><a title="Recuperar senha" href="--><?//= url("recuperar"); ?><!--">Esqueceu a senha?</a></span>-->
                    </div>
                    <input class="form-control" type="password" name="password" placeholder="Informe sua senha:"
                           required/>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="save">
                    <label>Lembrar dados?</label>
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>
    </div>
</section>