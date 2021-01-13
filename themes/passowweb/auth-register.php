<?php $v->layout("_theme"); ?>

<section class="auth">
    <div class="auth_content container content">
        <div class="row">
            <div class="col-12">
                <div class="auth_header">
                    <h1>Cadastre-se</h1>
                    <p>Já tem uma conta? <a title="Entrar" href="<?= url("/entrar"); ?>">Fazer login!</a></p>
                </div>

                <form class="auth_form" action="<?= url("/cadastrar"); ?>" method="post" enctype="multipart/form-data">
                    <div class="ajax_response"><?= flash(); ?></div>
                    <?= csrf_input(); ?>

                    <div class="form-group">
                        <label>Nome:</label>
                        <input class="form-control" type="text" name="first_name" placeholder="Primeiro nome:" required/>
                    </div>
                    <div class="form-group">
                        <label>Sobrenome:</label>
                        <input class="form-control" type="text" name="last_name" placeholder="Último nome:" required/>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input class="form-control" type="text" name="email" placeholder="Informe seu e-mail:" required/>
                    </div>
                    <div class="form-group">
                        <label>Senha:</label>
                        <input class="form-control" type="password" name="password" placeholder="Informe sua senha:" required/>
                    </div>
                    <button type="submit" class="btn btn-primary">Criar conta</button>
                </form>
            </div>
        </div>
    </div>
</section>