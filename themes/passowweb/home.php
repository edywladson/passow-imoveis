<?php $v->layout("_theme"); ?>

<!--SEARCH-->
<section class="container-fluid search">
    <div class="container">
        <div class="row mb-2 search-btn">
            <div class="col-12">
                <a href="" class="btn btn-primary">Comprar</a>
                <a href="" class="btn btn-secondary">Alugar</a>
            </div>
        </div>
        <div class="row search-form">
            <div class="col-12">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="col-6 col-sm-6 col-md">
                            <select name="property_type" id="propertyType" class="form-control">
                                <option selected>Tipos de Imóveis</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-6 col-sm-6 col-md">
                            <select name="neighborhoods" id="neighborhoods" class="form-control">
                                <option selected>Bairros</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-6 col-sm-6 col-md">
                            <select name="dorms" id="dorms" class="form-control">
                                <option selected>Dormitórios</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-6 col-sm-6 col-md">
                            <select name="range_values" id="rangeValues" class="form-control">
                                <option selected>Faixa de Valores</option>
                                <option>...</option>
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
            <div class="col-md-4">
                <div class="property-body">
                    <div class="property-image">
                        <img src="<?= theme("/assets/images/casa.jpg"); ?>" alt="Casa em Condomínio">
                        <span>R$ 100,00</span>
                    </div>

                    <div class="property-content">
                        <div class="property-title">
                            <h3>Terra Nova</h3>
                            <h2>Casa em Condomínio</h2>
                            <span><i class="icon-pin"></i> Porto Alegre, Terraville - RS</span>
                        </div>

                        <div class="property-items d-flex">
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-bed"></i>
                                <span>3</span>
                                <span class="desc">Dormitórios</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-size"></i>
                                <span>350m <sup>2</sup></span>
                                <span class="desc">Privativo</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-size"></i>
                                <span>1.000m <sup>2</sup></span>
                                <span class="desc">Totais</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-shower"></i>
                                <span>3</span>
                                <span class="desc">Banheiros</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-car"></i>
                                <span>3</span>
                                <span class="desc">Dormitórios</span>
                            </div>
                        </div>

                        <div class="property-button">
                            <a href="" class="btn btn-primary">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="property-body">
                    <div class="property-image">
                        <img src="<?= theme("/assets/images/casa.jpg"); ?>" alt="Casa em Condomínio">
                        <span>R$ 100,00</span>
                    </div>

                    <div class="property-content">
                        <div class="property-title">
                            <h3>Terra Nova</h3>
                            <h2>Casa em Condomínio</h2>
                            <span><i class="icon-pin"></i> Porto Alegre, Terraville - RS</span>
                        </div>

                        <div class="property-items d-flex">
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-bed"></i>
                                <span>3</span>
                                <span class="desc">Dormitórios</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-size"></i>
                                <span>350m <sup>2</sup></span>
                                <span class="desc">Privativo</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-size"></i>
                                <span>1.000m <sup>2</sup></span>
                                <span class="desc">Totais</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-shower"></i>
                                <span>3</span>
                                <span class="desc">Banheiros</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-car"></i>
                                <span>3</span>
                                <span class="desc">Dormitórios</span>
                            </div>
                        </div>

                        <div class="property-button">
                            <a href="" class="btn btn-primary">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="property-body">
                    <div class="property-image">
                        <img src="<?= theme("/assets/images/casa.jpg"); ?>" alt="Casa em Condomínio">
                        <span>R$ 100,00</span>
                    </div>

                    <div class="property-content">
                        <div class="property-title">
                            <h3>Terra Nova</h3>
                            <h2>Casa em Condomínio</h2>
                            <span><i class="icon-pin"></i> Porto Alegre, Terraville - RS</span>
                        </div>

                        <div class="property-items d-flex">
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-bed"></i>
                                <span>3</span>
                                <span class="desc">Dormitórios</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-size"></i>
                                <span>350m <sup>2</sup></span>
                                <span class="desc">Privativo</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-size"></i>
                                <span>1.000m <sup>2</sup></span>
                                <span class="desc">Totais</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-shower"></i>
                                <span>3</span>
                                <span class="desc">Banheiros</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-car"></i>
                                <span>3</span>
                                <span class="desc">Dormitórios</span>
                            </div>
                        </div>

                        <div class="property-button">
                            <a href="" class="btn btn-primary">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="property-body">
                    <div class="property-image">
                        <img src="<?= theme("/assets/images/casa.jpg"); ?>" alt="Casa em Condomínio">
                        <span>R$ 100,00</span>
                    </div>

                    <div class="property-content">
                        <div class="property-title">
                            <h3>Terra Nova</h3>
                            <h2>Casa em Condomínio</h2>
                            <span><i class="icon-pin"></i> Porto Alegre, Terraville - RS</span>
                        </div>

                        <div class="property-items d-flex">
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-bed"></i>
                                <span>3</span>
                                <span class="desc">Dormitórios</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-size"></i>
                                <span>350m <sup>2</sup></span>
                                <span class="desc">Privativo</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-size"></i>
                                <span>1.000m <sup>2</sup></span>
                                <span class="desc">Totais</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-shower"></i>
                                <span>3</span>
                                <span class="desc">Banheiros</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-car"></i>
                                <span>3</span>
                                <span class="desc">Dormitórios</span>
                            </div>
                        </div>

                        <div class="property-button">
                            <a href="" class="btn btn-primary">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="property-body">
                    <div class="property-image">
                        <img src="<?= theme("/assets/images/casa.jpg"); ?>" alt="Casa em Condomínio">
                        <span>R$ 100,00</span>
                    </div>

                    <div class="property-content">
                        <div class="property-title">
                            <h3>Terra Nova</h3>
                            <h2>Casa em Condomínio</h2>
                            <span><i class="icon-pin"></i> Porto Alegre, Terraville - RS</span>
                        </div>

                        <div class="property-items d-flex">
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-bed"></i>
                                <span>3</span>
                                <span class="desc">Dormitórios</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-size"></i>
                                <span>350m <sup>2</sup></span>
                                <span class="desc">Privativo</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-size"></i>
                                <span>1.000m <sup>2</sup></span>
                                <span class="desc">Totais</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-shower"></i>
                                <span>3</span>
                                <span class="desc">Banheiros</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-car"></i>
                                <span>3</span>
                                <span class="desc">Dormitórios</span>
                            </div>
                        </div>

                        <div class="property-button">
                            <a href="" class="btn btn-primary">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="property-body">
                    <div class="property-image">
                        <img src="<?= theme("/assets/images/casa.jpg"); ?>" alt="Casa em Condomínio">
                        <span>R$ 100,00</span>
                    </div>

                    <div class="property-content">
                        <div class="property-title">
                            <h3>Terra Nova</h3>
                            <h2>Casa em Condomínio</h2>
                            <span><i class="icon-pin"></i> Porto Alegre, Terraville - RS</span>
                        </div>

                        <div class="property-items d-flex">
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-bed"></i>
                                <span>3</span>
                                <span class="desc">Dormitórios</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-size"></i>
                                <span>350m <sup>2</sup></span>
                                <span class="desc">Privativo</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-size"></i>
                                <span>1.000m <sup>2</sup></span>
                                <span class="desc">Totais</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-shower"></i>
                                <span>3</span>
                                <span class="desc">Banheiros</span>
                            </div>
                            <div class="item d-flex flex-column flex-fill">
                                <i class="icon-car"></i>
                                <span>3</span>
                                <span class="desc">Dormitórios</span>
                            </div>
                        </div>

                        <div class="property-button">
                            <a href="" class="btn btn-primary">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

