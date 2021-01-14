<?php $v->layout("_theme"); ?>

<div class="mini_content">
    <div class="title_content d-flex align-items-center">
        <h2 class="mr-auto p-2">Locatários</h2>

        <div class="add_product nav-item">
            <button class="btn btn-success" type="button" role="button" data-toggle="modal" data-target="#modalLocatario">
                Novo Locatário
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <?php if(empty($tenants)): ?>
                        <div class="not_found_content">
                            <h2>Você não possui locatários cadastrados</h2>
                            <p>Clique no botão Novo Locatário acima para cadastrar seu primeiro locatário</p>
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

<div class="modal fade" id="modalLocatario" tabindex="-1" role="dialog" aria-labelledby="modalLocatario-label"
     aria-hidden="true" xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-variant-modal-label">Cadastrar Locatário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="app_form" action="<?= url("/admin/locatario"); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $v->start("scripts"); ?>
<script type="text/javascript">
    // MODAL
    $('#modalProduct').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let id = button.data('id');
        let name = button.data('name');
        let modal = $(this);

        modal.find('.modal-title').html("Adicionar produto da "+name);
        modal.find('.modal-body .store_id').val(id);
    });
</script>
<?php $v->end(); ?>
