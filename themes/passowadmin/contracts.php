<?php $v->layout("_theme"); ?>

<div class="products_content mini_content">
    <div class="title_content d-flex align-items-center">
        <h2 class="mr-auto p-2">Contratos</h2>

        <div class="add_product nav-item">
            <button class="btn btn-success" type="button" role="button" data-toggle="modal" data-target="#modalContrato">
                Novo Contrato
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <?php if(empty($tenants)): ?>
                        <div class="not_found_content">
                            <img src="<?= theme("assets/images/icons/product.svg", CONF_VIEW_ADMIN) ?>" alt="" width="100">
                            <h2>Você ainda tem nenhum contrato cadastrado</h2>
                            <p>Clique no botão Novo Contrato acima para cadastrar seu primeiro contrato</p>
                        </div>
                    <?php else: ?>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($tenants as $tenant): ?>
                                <tr>
                                    <th scope="row"><?= $tenant->id; ?></th>
                                    <td scope="row"><a href="<?= url("/admin/locatario/{$tenant->id}"); ?>"><?= $tenant->name; ?></a></td>
                                    <td scope="row"><?= $tenant->email; ?></td>
                                    <td scope="row"><?= $tenant->phone; ?></td>
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

<div class="modal fade" id="modalContrato" tabindex="-1" role="dialog" aria-labelledby="modalContrato-label"
     aria-hidden="true" xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-variant-modal-label">Cadastrar Contrato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="app_form" action="<?= url("/admin/contrato"); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_input(); ?>

                    <!-- ACTION SPOOFING -->
                    <input type="hidden" name="action" value="create"/>

                    <div class="form-group">
                        <label>Imóvel</label>
                        <input type="text" class="form-control" name="immobile" required>
                    </div>
                    <div class="form-group">
                        <label>Proprietário</label>
                        <input type="text" class="form-control" name="proprietary" required>
                    </div>
                    <div class="form-group">
                        <label>Locatário</label>
                        <input type="text" class="form-control" name="tenant" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label>Data de Início</label>
                            <input type="date" class="form-control" name="started"
                                   required>
                        </div>
                        <div class="form-group col">
                            <label>Data de Encerramento</label>
                            <input type="date" class="form-control" name="closing"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Valor do Aluguel</label>
                        <input type="text" class="form-control" name="rent_value" required>
                    </div>
                    <div class="form-group">
                        <label>Valor do Condomínio</label>
                        <input type="text" class="form-control" name="condo_value" required>
                    </div>
                    <div class="form-group">
                        <label>Valor do IPTU</label>
                        <input type="text" class="form-control" name="iptu_value" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success"">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
