<?php $v->layout("_theme"); ?>

<section class="auth">
    <div class="auth_content container content">
        <div class="row">
            <div class="col-12">
                <div class="auth_header">
                    <h1>Recuperar senha</h1>
                    <p>Informe seu e-mail para receber um link de recuperação.</p>
                </div>

                <form class="auth_form" action="<?= url("/recuperar"); ?>" method="post" enctype="multipart/form-data">
                    <div class="ajax_response"><?= flash(); ?></div>
                    <?= csrf_input(); ?>

                    <div class="form-group">
                        <div class="unlock-alt">
                            <label>Email:</label>
                            <span><a title="Recuperar senha" href="<?= url("/entrar") ?>">Voltar e entrar!</a></span>
                        </div>
                        <input type="email" name="email" class="form-control"  placeholder="Informe seu e-mail:" required/>
                    </div>
                    <button type="submit" class="btn btn-primary">Recuperar</button>
                </form>
            </div>
        </div>
    </div>
</section>