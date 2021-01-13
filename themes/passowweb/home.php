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
                                <option value="" selected>Tipos de Imóveis</option>
                                <option value="Casa">Casa</option>
                                <option value="Apartamento">Apartamento</option>
                                <option value="Casa Em Condominio">Casa Em Condomínio</option>
                                <option value="Cobertura">Cobertura</option>
                                <option value="Loft">Loft</option>
                                <option value="Terreno">Terreno</option>
                                <option value="casa">Casa</option>
                                <option value="Terreno Em Condominio">Terreno Em Condomínio</option>
                            </select>
                        </div>
                        <div class="col-6 col-sm-6 col-md">
                            <select name="neighborhoods" id="neighborhoods" class="form-control">
                                <option value="" selected>Bairros</option>
                                <option value="Aberta Dos Morros">Aberta Dos Morros</option>
                                <option value="Agronomia">Agronomia</option>
                                <option value="Alphaville">Alphaville</option>
                                <option value="Belem Novo">Belem Novo</option>
                                <option value="Camaqua">Camaqua</option>
                                <option value="Cavalhada">Cavalhada</option>
                                <option value="Centro">Centro</option>
                                <option value="Centro Histórico">Centro Histórico</option>
                                <option value="Chapeu do Sol">Chapeu do Sol</option>
                                <option value="Cristal">Cristal</option>
                                <option value="Espirito Santo">Espirito Santo</option>
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
            <?php foreach ($properties as $property): ?>
                <div class="col-md-4">
                    <div class="property-body">
                        <div class="property-image">
                            <a href="<?= url("/imovel/{$property->Codigo}"); ?>">
                                <img src="<?= (!empty($property->FotoDestaque)) ? $property->FotoDestaque : theme("/assets/images/img-default.jpg") ?>" alt="Casa em Condomínio">
                            </a>
                            <span><?= "R$ " . str_price((!empty($property->ValorVenda)) ? $property->ValorVenda : $property->ValorLocacao) ?></span>
                        </div>

                        <div class="property-content">
                            <div class="property-title">
                                <h3></h3>
                                <h2></h2>
                                <span><i class="icon-pin"></i> <?= "{$property->Cidade}, {$property->Bairro}, {$property->UF}"; ?></span>
                            </div>

                            <div class="property-items d-flex">
                                <?php if (!empty($property->Dormitorios)): ?>
                                    <div class="item d-flex flex-column flex-fill">
                                        <i class="icon-bed"></i>
                                        <span><?= $property->Dormitorios; ?></span>
                                        <span class="desc">Dormitórios</span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($property->AreaPrivativa)): ?>
                                    <div class="item d-flex flex-column flex-fill">
                                        <i class="icon-size"></i>
                                        <span><?= $property->AreaPrivativa; ?>m <sup>2</sup></span>
                                        <span class="desc">Privativo</span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($property->AreaTotal)): ?>
                                    <div class="item d-flex flex-column flex-fill">
                                        <i class="icon-size"></i>
                                        <span><?= $property->AreaTotal; ?>m <sup>2</sup></span>
                                        <span class="desc">Totais</span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($property->BanheiroSocialQtd)): ?>
                                    <div class="item d-flex flex-column flex-fill">
                                        <i class="icon-shower"></i>
                                        <span><?= $property->BanheiroSocialQtd; ?></span>
                                        <span class="desc"><?= $property->BanheiroSocialQtd > 1 ? "Banheiros" : "Banheiro" ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($property->Vagas)): ?>
                                    <div class="item d-flex flex-column flex-fill">
                                        <i class="icon-car"></i>
                                        <span><?= $property->Vagas; ?></span>
                                        <span class="desc">Vagas</span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="property-button">
                                <a href="<?= url("/imovel/{$property->Codigo}"); ?>" class="btn btn-primary">Saiba
                                    Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

