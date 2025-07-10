<?= $render("header", ["loggedUser" => $loggedUser]) ?>

<section class="container main">

    <?= $render("sidebar") ?>

    <section class="feed mt-10">

        <div class="row">
            <div class="column pr-5">

                <?= $render("feed-new", ["loggedUser" => $loggedUser]) ?>

                <?php foreach ($feeds as $feedItem): ?>


                <?= $render("feed-item", ["feeds" => $feedItem]) ?>

                <?php endforeach; ?>

                <!--                html do feed -->

            </div>
            <div class="column side pl-5">
                <div class="box banners">
                    <div class="box-header">
                        <div class="box-header-text">Patrocinios</div>
                        <div class="box-header-buttons">

                        </div>
                    </div>
                    <div class="box-body">
                        <a href=""><img
                                    src="https://montinkantigo.s3.amazonaws.com/data/camisas/camiseta-php-elefante-5dd7ba3378ee8-estampa-301.png"/></a>

                        <a href=""><img
                                    src="https://i0.wp.com/blog.nstecnologia.com.br/wp-content/uploads/2022/03/Laravel-PHP-Framework-1920-px-%C3%97-1080-px-6.png?fit=1920%2C1080&ssl=1"/></a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-body m-10">
                        Criado por Victor
                    </div>
                </div>
            </div>
        </div>

    </section>
</section>
<?= $render("footer"); ?>
