<?php $v->layout("_theme"); ?>

<div class="mini_content">
    <header class="title_content">
        <div class="row d-flex align-items-center">
            <div class="col">
                <h6>Imóvel</h6>
                <h2>Contrato - <?= $contract->id; ?></h2>
            </div>
            <div class="col-auto">
                <a href="<?= url("admin/contratos"); ?>" class="btn btn-light btn_icons_space">< Voltar</a>
            </div>
        </div>
    </header>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <form class="app_form" action="" method="post"
                          enctype="multipart/form-data" autocomplete="off">

                        <div class="form-row">
                            <div class="form-group  col-12 col-sm">
                                <label>Código do Imóvel</label>
                                <input type="text" class="form-control" value="<?= $contract->immobile_code; ?>"
                                       readonly>
                            </div>
                            <div class="form-group col-12 col-sm">
                                <label>Proprietário</label>
                                <input type="text" class="form-control" value="<?= $contract->proprietary->name; ?>"
                                       readonly>
                            </div>
                            <div class="form-group col-12 col-sm">
                                <label>Locatário</label>
                                <input type="text" class="form-control" value="<?= $contract->tenant->name; ?>"
                                       readonly>
                            </div>
                        </div>

                        <h4>Endereço</h4>

                        <div class="form-row">
                            <div class="form-group  col-12 col-sm">
                                <label>Locradouro</label>
                                <input type="text" class="form-control" value="<?= $contract->address->street; ?>"
                                       readonly>
                            </div>
                            <div class="form-group col-12 col-sm">
                                <label>Número</label>
                                <input type="text" class="form-control" value="<?= $contract->address->number; ?>"
                                       readonly>
                            </div>
                            <div class="form-group col-12 col-sml">
                                <label>Complemento</label>
                                <input type="text" class="form-control" value="<?= $contract->address->complement; ?>"
                                       readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12 col-sm">
                                <label>Bairro</label>
                                <input type="text" class="form-control" value="<?= $contract->address->neighborhood; ?>"
                                       readonly>
                            </div>
                            <div class="form-group col-12 col-sm">
                                <label>Cidade</label>
                                <input type="text" class="form-control" value="<?= $contract->address->city; ?>"
                                       readonly>
                            </div>
                            <div class="form-group col-12 col-sm">
                                <label>UF</label>
                                <input type="text" class="form-control" value="<?= $contract->address->uf; ?>" readonly>
                            </div>
                            <div class="form-group col-12 col-sm">
                                <label>CEP</label>
                                <input type="text" class="form-control" value="<?= $contract->address->zip; ?>"
                                       readonly>
                            </div>
                        </div>

                        <h4>Datas</h4>
                        <div class="form-row">
                            <div class="form-group  col">
                                <label>Data de Início</label>
                                <input type="date" class="form-control" value="<?= $contract->started; ?>" readonly>
                            </div>
                            <div class="form-group col">
                                <label>Data de Encerramento</label>
                                <input type="date" class="form-control" value="<?= $contract->closing; ?>" readonly>
                            </div>
                        </div>

                        <h4>Taxas e Valores</h4>
                        <div class="form-row">
                            <div class="form-group  col-12 col-sm">
                                <label>Taxa de Administração</label>
                                <input type="number" class="form-control" value="<?= $contract->administration_fee; ?>"
                                       readonly>
                            </div>
                            <div class="form-group col-12 col-sm">
                                <label>Valor do Aluguel</label>
                                <input type="text" class="form-control mask-money" value="<?= $contract->rent_value; ?>"
                                       readonly>
                            </div>
                            <div class="form-group col-12 col-sm">
                                <label>Valor do Condomínio</label>
                                <input type="text" class="form-control mask-money"
                                       value="<?= $contract->condo_value; ?>" readonly>
                            </div>
                            <div class="form-group col-12 col-sm">
                                <label>Valor do IPTU</label>
                                <input type="text" class="form-control mask-money" value="<?= $contract->iptu_value; ?>"
                                       readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 col-sm">
            <div class="card shadow">
                <div class="card-header">
                    Mensalidades
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($contract->invoices as $invoice): ?>
                            <li class="list-group-item list-group-flush d-flex justify-content-between align-items-center">
                                <div class="list-check-date">
                                    <?= date_fmt($invoice->due_at, "d/m/Y"); ?>
                                </div>
                                <div class="list-check-price">
                                    R$ <?= str_price($invoice->value); ?>
                                    <span class="check icon-check transition"
                                          data-toggleclass="active icon-thumbs-o-down icon-thumbs-o-up"
                                          data-onpaid="<?= url("/admin/onpaid"); ?>"
                                          data-invoice="<?= $invoice->id; ?>"></span>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm">
            <div class="card shadow">
                <div class="card-header">
                    Repasses
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($contract->transfers as $transfer): ?>
                            <li class="list-group-item list-group-flush d-flex justify-content-between align-items-center">
                                <div class="list-check-date">
                                    <?= date_fmt($transfer->due_at, "d/m/Y"); ?>
                                </div>
                                <div class="list-check-price">
                                    R$ <?= str_price($transfer->value); ?>
                                    <span class="check icon-check transition"
                                          data-toggleclass="active icon-thumbs-o-down icon-thumbs-o-up"
                                          data-onpaid="<?= url("/admin/onpaid"); ?>"
                                          data-transfer="<?= $transfer->id; ?>"></span>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>