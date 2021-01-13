<?php $v->layout("_theme"); ?>

<div class="products_content mini_content">
    <div class="title_content d-flex align-items-center">
        <h2 class="mr-auto p-2">Contratos</h2>

        <div class="add_product nav-item">
            <button class="btn btn-success" type="button" role="button" data-toggle="modal"
                    data-target="#modalContrato">
                Novo Contrato
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <?php if (empty($contracts)): ?>
                        <div class="not_found_content">
                            <img src="<?= theme("assets/images/icons/product.svg", CONF_VIEW_ADMIN) ?>" alt=""
                                 width="100">
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

                            <?php foreach ($contracts as $contract): ?>
                                <tr>
                                    <th scope="row"><?= $contract->id; ?></th>
                                    <td scope="row"><a
                                                href="<?= url("/admin/locatario/{$contract->id}"); ?>"><?= $contract->name; ?></a>
                                    </td>
                                    <td scope="row"><?= $contract->email; ?></td>
                                    <td scope="row"><?= $contract->phone; ?></td>
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
                <form class="app_form" action="<?= url("/admin/contrato"); ?>" method="post"
                      enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_input(); ?>

                    <!-- ACTION SPOOFING -->
                    <input type="hidden" name="action" value="create"/>

                    <div class="form-group">
                        <label>Código do Imóvel</label>
                        <input type="text" class="form-control ajax_immobile" name="immobile" required>
                    </div>
                    <div class="form-group">
                        <label>Proprietário</label>
                        <select name="property_id" class="form-control">
                            <option value="" selected>Escolha o proprietário</option>
                            <?php foreach ($proprietaties as $proprietary): ?>
                                <option value="<?= $proprietary->id ?>"><?= $proprietary->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Locatário</label>
                        <select name="tenant_id" class="form-control">
                            <option value="" selected>Escolha o locatário</option>
                            <?php foreach ($tenants as $tenant): ?>
                                <option value="<?= $tenant->id ?>"><?= $tenant->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 col-sm">
                            <label>Data de Início</label>
                            <input type="date" class="form-control" name="started"
                                   required>
                        </div>
                        <div class="form-group col-12 col-sm">
                            <label>Data de Encerramento</label>
                            <input type="date" class="form-control" name="closing"
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Taxa de Administração</label>
                        <input type="number" class="form-control" min="10" name="administration_fee" required>
                    </div>
                    <div class="form-group">
                        <label>Valor do Aluguel</label>
                        <input type="text" class="form-control mask-money" name="rent_value" required>
                    </div>
                    <div class="form-group">
                        <label>Valor do Condomínio</label>
                        <input type="text" class="form-control mask-money" name="condo_value" required>
                    </div>
                    <div class="form-group">
                        <label>Valor do IPTU</label>
                        <input type="text" class="form-control mask-money" name="iptu_value" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success"
                ">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
