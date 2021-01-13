<?php $v->layout("_theme"); ?>

<section class="auth">
    <div class="auth_content container content">
        <div class="row">
            <div class="col-12">
                <div class="auth_header">
                    <h1>Criar nova senha</h1>
                    <p>Informe e repita uma nova senha para recuperar seu acesso.</p>
                </div>

                <form class="auth_form" action="<?= url("/recuperar/resetar"); ?>" method="post" enctype="multipart/form-data">
                    <div class="ajax_response"><?= flash(); ?></div>
                    <input type="hidden" name="code" value="<?= $code; ?>"/>
                    <?= csrf_input(); ?>

                    <div class="form-group">
                        <div class="unlock-alt">
                            <label>Nova Senha:</label>
                            <span><a title="Voltar e entrar!" href="<?= url("/entrar"); ?>">Voltar e entrar!</a></span>
                        </div>
                        <input class="form-control" type="password" name="password" placeholder="Nova senha:" required />
                    </div>
                    <div class="form-group">
                        <label>Repita a nova senha:</label>
                        <input class="form-control" type="password" name="password_re" placeholder="Repita a nova senha:" required />
                    </div>

                    <button type="submit" class="btn btn-primary">Alterar Senha</button>
                </form>
            </div>
        </div>
    </div>
</section>