<?php $v->layout("_theme"); ?>

<!--SEARCH-->
<section class="container-fluid search">
    <div class="container">
        <div class="row mb-2 search-btn">
            <div class="col-12">
                <button class="btn btn-primary active btnGoal" data-goal="Venda">Comprar</button>
                <button class="btn btn-primary btnGoal" data-goal="Aluguel">Alugar</button>
            </div>
        </div>
        <div class="row search-form">
            <div class="col-12">
                <form action="<?= url('/buscar'); ?>" method="post">
                    <?= csrf_input(); ?>
                    <input type="hidden" value="Venda" class="goal" name="goal">

                    <div class="form-row">
                        <div class="col-6 col-sm-6 col-md">
                            <select name="property_type" id="propertyType" class="form-control">
                                <option value="all" selected>Tipos de Imóveis</option>
                                <?php foreach ($districts->Categoria as $type): ?>
                                    <option value="<?= $type ?>"><?= $type ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6 col-sm-6 col-md">
                            <select name="neighborhoods" id="neighborhoods" class="form-control">
                                <option value="all" selected>Bairros</option>
                                <?php for ($i = 1; $i < count($districts->Bairro); $i++): ?>
                                    <option value="<?= $districts->Bairro[$i] ?>"><?= $districts->Bairro[$i] ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-6 col-sm-6 col-md">
                            <select name="dorms" id="dorms" class="form-control">
                                <option value="" selected>Dormitórios</option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">Acima de 4</option>
                            </select>
                        </div>
                        <div class="col-6 col-sm-6 col-md value_sale" style="display: block;">
                            <select name="value_sale" id="rangeValues" class="form-control">
                                <option value="" selected>Faixa de Valores</option>
                                <option value="0-100000">até R$ 100.000,00</option>
                                <option value="100000-200000">R$ 100.000,00 à R$ 200.000,00</option>
                                <option value="200000-300000">R$ 200.000,00 à R$ 300.000,00</option>
                                <option value="300000-400000">R$ 300.000,00 à R$ 400.000,00</option>
                                <option value="400000-500000">R$ 400.000,00 à R$ 500.000,00</option>
                                <option value="500000-999999999">acima de R$ 500.000,00</option>
                            </select>
                        </div>
                        <div class="col-6 col-sm-6 col-md value_rent" style="display: none;">
                            <select name="value_rent" id="rangeValues" class="form-control">
                                <option value="" selected>Faixa de Valores</option>
                                <option value="0-1000">até R$ 1.000,00</option>
                                <option value="1000-2000">R$ 1.000,00 à R$ 2.000,00</option>
                                <option value="2000-3000">R$ 2.000,00 à R$ 3.000,00</option>
                                <option value="3000-4000">R$ 3.000,00 à R$ 4.000,00</option>
                                <option value="4000-5000">R$ 4.000,00 à R$ 5.000,00</option>
                                <option value="5000-7500">R$ 5.000,00 à R$ 7.500,00</option>
                                <option value="7500-10000">R$ 7.500,00 à R$ 10.000,00</option>
                                <option value="10000-999999">acima de R$ 10.000,00</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-12 col-md">
                            <input type="text" name="code" class="form-control" placeholder="Código">
                        </div>
                        <div class="col-12 col-sm-12 col-md">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!--PROPERTY LIST-->
<section class="container-fluid property-list">
    <div class="container">
        <div class="row">
            <?php if (empty($proprietaries)): ?>
                <div class="col-12">
                    <div class="not_found_content" style="text-align: center">
                        <h2>Não encontramos nenhum resultado :\</h2>
                        <p>Faça uma nova pesquisa utilizando outros termos :D</p>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($proprietaries as $proprietary): ?>
                    <div class="col-md-4">
                        <div class="property-body">
                            <div class="property-image">
                                <a href="<?= url("/imovel/{$proprietary->Codigo}"); ?>">
                                    <img src="<?= (!empty($proprietary->FotoDestaque)) ? $proprietary->FotoDestaque : theme("/assets/images/img-default.jpg") ?>"
                                         alt="Casa em Condomínio">
                                </a>
                                <span><?= "R$ " . str_price((!empty($proprietary->ValorVenda)) ? $proprietary->ValorVenda : $proprietary->ValorLocacao) ?></span>
                            </div>

                            <div class="property-content">
                                <div class="property-title">
                                    <h3></h3>
                                    <h2></h2>
                                    <span><i class="icon-pin"></i> <?= "{$proprietary->Cidade}, {$proprietary->Bairro}, {$proprietary->UF}"; ?></span>
                                </div>

                                <div class="property-items d-flex">
                                    <?php if (!empty($proprietary->Dormitorios)): ?>
                                        <div class="item d-flex flex-column flex-fill">
                                            <i class="icon-bed"></i>
                                            <span><?= $proprietary->Dormitorios; ?></span>
                                            <span class="desc">Dormitórios</span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($proprietary->AreaPrivativa)): ?>
                                        <div class="item d-flex flex-column flex-fill">
                                            <i class="icon-size"></i>
                                            <span><?= $proprietary->AreaPrivativa; ?>m <sup>2</sup></span>
                                            <span class="desc">Privativo</span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($proprietary->AreaTotal)): ?>
                                        <div class="item d-flex flex-column flex-fill">
                                            <i class="icon-size"></i>
                                            <span><?= $proprietary->AreaTotal; ?>m <sup>2</sup></span>
                                            <span class="desc">Totais</span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($proprietary->BanheiroSocialQtd)): ?>
                                        <div class="item d-flex flex-column flex-fill">
                                            <i class="icon-shower"></i>
                                            <span><?= $proprietary->BanheiroSocialQtd; ?></span>
                                            <span class="desc"><?= $proprietary->BanheiroSocialQtd > 1 ? "Banheiros" : "Banheiro" ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($proprietary->Vagas)): ?>
                                        <div class="item d-flex flex-column flex-fill">
                                            <i class="icon-car"></i>
                                            <span><?= $proprietary->Vagas; ?></span>
                                            <span class="desc">Vagas</span>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="property-button">
                                    <a href="<?= url("/imovel/{$proprietary->Codigo}"); ?>" class="btn btn-primary">Saiba
                                        Mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


                <div class="col-12">
                    <?= $paginator; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

