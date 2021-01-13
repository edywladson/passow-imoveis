<?php $v->layout("_theme"); ?>

<div class="products_content mini_content">
    <div class="title_content d-flex align-items-center">
        <h2 class="mr-auto p-2">Locatários</h2>

        <div class="add_product nav-item">
            <button class="btn btn-success" type="button" role="button" data-toggle="modal" data-target="#modalLocador">
                Novo Locador
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <?php if(empty($proprietaries)): ?>
                        <div class="not_found_content">
                            <img src="<?= theme("assets/images/icons/product.svg", CONF_VIEW_ADMIN) ?>" alt="" width="100">
                            <h2>Você ainda tem nenhum locador cadastrado</h2>
                            <p>Clique no botão Novo Locador acima para cadastrar seu primeiro locador</p>
                        </div>
                    <?php else: ?>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Dia de Repasse</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($proprietaries as $proprietary): ?>
                                <tr>
                                    <th scope="row"><?= $proprietary->id; ?></th>
                                    <td scope="row"><a href="<?= url("/admin/locador/{$proprietary->id}"); ?>"><?= $proprietary->name; ?></a></td>
                                    <td scope="row"><?= $proprietary->email; ?></td>
                                    <td scope="row"><?= $proprietary->phone; ?></td>
                                    <td scope="row"><?= $proprietary->transfer_day; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                        <?= $paginator; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalLocador" tabindex="-1" role="dialog" aria-labelledby="modalLocador-label"
     aria-hidden="true" xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-variant-modal-label">Cadastrar Locador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="app_form" action="<?= url("/admin/locador"); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_input(); ?>

                    <!-- ACTION SPOOFING -->
                    <input type="hidden" name="action" value="create"/>

                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" class="form-control phone mask-phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label>Dia para repasse</label>
                        <input type="number" class="form-control transfer_day" min="1" max="31" name="transfer_day" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success btn-editar" name="acao-editar">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
