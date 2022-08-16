<?php get_header(); ?>
<?php include('page_components/links.php') ?>
<?php include_once('page_components/menu.php'); ?>

<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <?php
        $cursoID = get_post_meta(get_the_ID(), 'curso', true)[0];
        $curso = get_post($cursoID);

        $curso_detail = wpautop(get_post_meta($cursoID, 'detail', true));
        $curso_nivel = wpautop(get_post_meta($cursoID, 'nivel', true));
        $curso_objectifs = wpautop(get_post_meta($cursoID, 'objectifs', true));
        $curso_dateStart = get_post_meta(get_the_ID(), 'date_start', true);
        $curso_dateEnd = get_post_meta(get_the_ID(), 'date_end', true);
        $curso_price = get_post_meta($cursoID, 'price', true);
        $curso_content = wpautop($curso->post_content);
        $curso_image = get_image_url($cursoID);
        $curso_category = get_the_category($cursoID)[0]->slug;

        ?>

        <div class="wrapper single">
            <div class="single__title">
                <h1 class="blue"><?= __('cadastro', 'atelie'); ?></h1>
            </div>

            <?php
            if (isset($_GET['emailSent']) && $_GET['emailSent']) {
                echo '<div class="formSuccess">' . __('Seu email foi enviado com sucesso.<br>Entraremos em contato o mais breve possivel !', 'atelie') . '</div>';
            } elseif (isset($_GET['emailSent']) && !$_GET['emailSent']) {
                echo '<div class="formError">' . __('Seu email não foi enviado. Por favor, tente de novo mais tarde.', 'atelie') . '</div>';
            }
            ?>

            <div class="single__img">
                <img src="<?= $curso_image ?>" alt="">
            </div>

            <div class="single__container_2c">
                <div class="left title">
                    <h2 class="blue bold"><?= $curso->post_title; ?></h2>
                </div>


            </div>

            <div class="single__container">
                <div class="single__detail black bold text">
                    <?= $curso_detail; ?>
                </div>
            </div>

            <div class="single__container_2c">
                <div class="left content black bold text">
                    <?= $curso_content ?>
                </div>
                <div class="right content black text">
                    <?= $curso_objectifs ?>
                </div>
            </div>

            <div class="single__container_2c no-iphone">
                <div class="left">
                    <div>
                        <div class="item text blue bold"><?= mb_strtoupper(__('curso', 'atelie')); ?></div>

                        <div class="item text blue bold"><?= mb_strtoupper(__('data', 'atelie')); ?></div>
                    </div>
                </div>
                <div class="right">
                    <div>
                        <div class="item text blue"><?= $curso->post_title; ?></div>

                        <div class="item text blue">
                            <?php echo date("d/m/Y", strtotime($curso_dateStart)); ?>
                            <?= __(' até ', 'atelie'); ?>
                            <?php echo date("d/m/Y", strtotime($curso_dateEnd)); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single__container_iphone iphone-only">
                <div class="item text blue bold"><?= mb_strtoupper(__('curso: ', 'atelie')); ?></div>
                <div class="item text blue"><?= $curso->post_title; ?></div>
                <?php
                if ($curso_category === 'curso-nivel') {
                    echo '<div class="item text blue bold">' . mb_strtoupper(__('nível: ', 'atelie')) . '</div>';
                }
                ?>
                <?php
                if ($curso_category === 'curso-nivel') {
                    echo ' <div class="item text blue">' . $curso_nivel . '</div>';
                }
                ?>
                <div class="item text blue bold"><?= mb_strtoupper(__('data: ', 'atelie')); ?></div>
                <div class="item text blue">
                    <?php echo date("d/m/Y", strtotime($curso_dateStart)); ?>
                    <?= __(' até ', 'atelie'); ?>
                    <?php echo date("d/m/Y", strtotime($curso_dateEnd)); ?>
                </div>
            </div>

            <div class="single__price">
                <div class="single__price_total">
                    <div class="left">
                        <h5 class="blue bold upper">total</h5>
                    </div>
                    <div class="right">
                        <h4 class="blue bold price">R$ <?= $curso_price ?></h4>
                    </div>
                </div>

                <div class="single__price_buy">
                    <form action="<?= get_page_link(get_page_by_title('Comprar')) ?>" method="post">
                        <input type="hidden" name="eventid" value="<?= the_ID() ?>">
                        <input class="button" name="subscribe" type="submit"
                               value="<?= mb_strtoupper(__('agendar', 'atelie')); ?>">
                    </form>
                </div>
            </div>

            <div class="clear"></div>

            <div class="single__pictos_container no-iphone">
                <img class="pain11" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain11.png"
                     data-bottom-top="top: 60px;"
                     data-top-bottom="top: 0px;"
                     alt="">
                <img class="pain05" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain05.png"
                     data-bottom-top="top: 40px;"
                     data-top-bottom="top: -30px;"
                     alt="">
                <img class="pain04" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain04.png"
                     data-bottom-top="top: 130px;"
                     data-top-bottom="top: 60px;"
                     alt="">

                <img class="picto6__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto6.png"
                     data-bottom-top="top: 250px;"
                     data-top-bottom="top: 150px;"
                     alt="">
                <img class="picto7__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto7.png"
                     data-bottom-top="top: 200px;"
                     data-top-bottom="top: 100px;"
                     alt="">
                <img class="picto14__red" src="<?= get_template_directory_uri(); ?>/assets/picto/rouge/picto14.png"
                     data-bottom-top="top: 170px;"
                     data-top-bottom="top: 70x;"
                     alt="">
                <img class="picto2__red" src="<?= get_template_directory_uri(); ?>/assets/picto/rouge/picto2.png"
                     data-bottom-top="top: 250px;"
                     data-top-bottom="top: 150x;"
                     alt="">
            </div>

            <div class="single__picto_container_iphone iphone-only">
                <img class="pain11" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain11.png"
                     data-bottom-top="top: -40px;"
                     data-top-bottom="top: -100px;"
                     alt="">

                <img class="picto14__red" src="<?= get_template_directory_uri(); ?>/assets/picto/rouge/picto14.png"
                     data-bottom-top="top: 70px;"
                     data-top-bottom="top: 0x;"
                     alt="">
                <img class="picto6__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto6.png"
                     data-bottom-top="top: 220px;"
                     data-top-bottom="top: 120px;"
                     alt="">
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

</div>

<?php include_once('page_components/footer.php'); ?>
<?php get_footer(); ?>
