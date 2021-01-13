<?php $v->layout("_theme"); ?>

<div class="products_content mini_content">
    <header class="title_content">
        <div class="row d-flex align-items-center">
            <div class="col">
                <h6>Locador</h6>
                <h2><?= $proprietary->name; ?></h2>
            </div>
            <div class="col-auto">
                <a href="<?= url("admin/locadores"); ?>" class="btn btn-light btn_icons_space">< Voltar</a>
            </div>
        </div>
    </header>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <form class="app_form" action="<?= url("/admin/locador"); ?>" method="post"
                          enctype="multipart/form-data" autocomplete="off">
                        <?= csrf_input(); ?>

                        <!-- ACTION SPOOFING -->
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="id" value="<?= $proprietary->id ?>"/>

                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control name" name="name" value="<?= $proprietary->name ?>"
                                   required>
                        </div>

                        <div class="form-row">
                            <div class="form-group  col">
                                <label>E-mail</label>
                                <input type="email" class="form-control email" name="email"
                                       value="<?= $proprietary->email ?>"
                                       required>
                            </div>
                            <div class="form-group col">
                                <label>Telefone</label>
                                <input type="text" class="form-control phone mask-phone" name="phone"
                                       value="<?= $proprietary->phone ?>" required>
                            </div>
                            <div class="form-group col">
                                <label>Dia de repasse</label>
                                <input type="number" class="form-control transfer_day" min="1" max="31" name="transfer_day"
                                       value="<?= $proprietary->transfer_day ?>" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Salvar</button>
                    </form>
                </div>
            </div>

            <a href="" class="text-danger mt-2 d-block btn btn-link text-left" type="button" role="button"
               data-toggle="modal"
               data-target="#modalDelete" data-id="<?= $proprietary->id; ?>" data-name="<?= $proprietary->name; ?>">Excluir
                Locatário</a>
        </div>
    </div>

    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog"
         aria-labelledby="modalDelete-label"
         aria-hidden="true" xmlns="http://www.w3.org/1999/html">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-label"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
                <form class="app_form m-0" action="<?= url("/admin/locador"); ?>" method="post"
                      enctype="multipart/form-data" autocomplete="off">
                    <!--ACTION SPOOFING-->
                    <input type="hidden" name="action" value="delete"/>
                    <input type="hidden" name="id" class="id"/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Sim, quero excluir</button>
                </form>
            </div>
        </div>
    </div>

    <?php $v->start("scripts"); ?>
    <script type="text/javascript">
        // MODAL
        $('#modalDelete').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            let name = button.data('name');
            let modal = $(this);

            modal.find('.modal-title').html("Excluir " + name + "?");
            modal.find('.modal-body').html("Tem certeza de que deseja excluir o locador " + name + "? Essa ação não pode ser desfeita.");
            modal.find('.id').val(id);
        });
    </script>
    <?php $v->end(); ?>


</div>




