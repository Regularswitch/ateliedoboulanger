<?php get_header(); ?>
<?php include('page_components/links.php') ?>
<?php include_once('page_components/menu.php'); ?>


    <div class="wrapper home">

        <div class="home__header">
            <div class="home__header_tram">
                <img class="home__header_tram--logo"
                     src="<?= get_template_directory_uri(); ?>/assets/logos/logo_adb_full.png" alt="">

                <img class="home__header_tram--pain12" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain12.png"
                     data-bottom-top="top: 20px;"
                     data-top-bottom="top: -40px;"
                     alt="">
                <img class="home__header_tram--pain03" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain02.png"
                     data-bottom-top="top: 480px;"
                     data-top-bottom="top: 420px;"
                     alt="">
                <img class="home__header_tram--pain01" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain01.png"
                     data-bottom-top="top: 800px;"
                     data-top-bottom="top: 440px;"
                     alt="">
                <img class="home__header_tram--pain06" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain06.png"
                     data-bottom-top="top: 300px;"
                     data-top-bottom="top: 240px;"
                     alt="">

                <img class="home__header_tram--pain10" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain10.png"
                     data-bottom-top="top: 530px;"
                     data-top-bottom="top: 490px;"
                     alt="">
                <img class="home__header_tram--pain11" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain11.png"
                     data-bottom-top="top: 50px;"
                     data-top-bottom="top: 10px;"
                     alt="">
                <img class="home__header_tram--pain16" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain16.png"
                     data-bottom-top="top: 40px;"
                     data-top-bottom="top: 0px;"
                     alt="">

                <img class="home__header_tram--picto2-blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto2.png"
                     data-bottom-top="top: 100px;"
                     data-top-bottom="top: 0px;"
                     alt="">
                <img class="home__header_tram--picto3-red" src="<?= get_template_directory_uri(); ?>/assets/picto/rouge/picto3.png"
                     data-bottom-top="top: 80px;"
                     data-top-bottom="top: -40px;"
                     alt="">
                <img class="home__header_tram--picto5-blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto5.png"
                     data-bottom-top="top: 610px;"
                     data-top-bottom="top: 400px;"
                     alt="">
                <img class="home__header_tram--picto4-bleu" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto4.png"
                     data-bottom-top="top: 460px;"
                     data-top-bottom="top: 250px;"
                     alt="">
                <img class="home__header_tram--picto14-red" src="<?= get_template_directory_uri(); ?>/assets/picto/rouge/picto14.png"
                     data-bottom-top="top: 560px;"
                     data-top-bottom="top: 450px;"
                     alt="">
                <img class="home__header_tram--picto13-red" src="<?= get_template_directory_uri(); ?>/assets/picto/rouge/picto13.png"
                     data-bottom-top="top: 400px;"
                     data-top-bottom="top: 50px;"
                     alt="">
                <img class="home__header_tram--picto1-red" src="<?= get_template_directory_uri(); ?>/assets/picto/rouge/picto1.png"
                     data-bottom-top="top: 180px;"
                     data-top-bottom="top: 30px;"
                     alt="">
            </div>
            <div class="home__header_content">
				
					<div class="home__header_box1 home__header_matricula" style="background-color: #E22000;">

						<h3 class="black white"><?= __('MATRICULAS', 'Home'); ?></h3>
						<h3><?= __('ABERTAS', 'Home'); ?></h3>
						<a 
						   
						   href="https://tinyurl.com/qwpsy5y" 
						   target="_blank" 
						   class="button button__border button_matricula"
						   style="color: var(--cor1,  #E22000); border-color: var(--cor1,  #E22000); "
						   >
							<?= __('INSCREVA-SE', 'Home'); ?>
						</a>
					</div>

					<div class="home__header_box1">
						<h3 class="black white"><?= __('Agendar', 'Home'); ?></h3>
						<h3><?= __('Um curso', 'Home'); ?></h3>
						<a href="<?= $cursosPage ?>/#calendar" class="button button__border">
							<?= __('Ver o calendário', 'Home'); ?>
						</a>
					</div>
				
                <a class="home__header_box2" href="<?= $cursosPage ?>">
                    <h3 class="black white"><?= __('VEJA OS CURSOS DISPONIVEIS', 'Home'); ?></h3>
                    <div class="box2__bg"></div>
                </a>
            </div>
        </div>

        <div class="home__savoir">
            <h1 class="blue">
                <?= __('O “SAVOIR FAIRE”', 'Home'); ?>
                <span></span>
            </h1>
            <div class="home__savoir_content">
                <div class="team__item">
                    <div class="team__item_img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/team/jean.png" alt="">
                    </div>
                    <h3 class="blue">Jean<br>Jacob</h3> <!-- OLD h5-->
                    <div class="text"><?= __('Campeão da frança em 2015 e vice campeão da Europa em panificação.', 'Home') ?></div>
                </div>
            </div>
        </div>

        <div class="home__curso">
            <?php

            $queryFacebook = array(
                'posts_per_page' => 2,
                'post_type' => 'facebook',
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'suppress_filters' => true
            );
            $postsFacebook = get_posts($queryFacebook);

            ?>
            <div class="home__curso_logos">
                <img src="<?= get_template_directory_uri(); ?>/assets/logos/logo_fp_small.svg" alt="">
                <img src="<?= get_template_directory_uri(); ?>/assets/logos/logo_adb_small.svg" alt="">
            </div>
            <h1 class="firstBlue"><?= __('Cursos 100% praticos', 'Home'); ?></h1>
            <div class="home__curos_desc">
                <span class="text"><?= __('Somos uma empresa de importação da autentica farinha de trigo francesa, com alto padrão de qualidade e acompanhamento técnico e personalizado. Venha conhecer nosso Facebook!', 'Home'); ?></span>
                <a href="<?= get_post_meta($postsFacebook[0]->ID, 'link', true) ?>" target="_blank" class="button"><?= __('Saiba mais', 'Home'); ?></a>
            </div>
            <div class="clear"></div>

            <div class="home__curso_facebook">
                <?php

                foreach ($postsFacebook as $key => $post) {

                    /*$post1_url = strip_tags($post->post_content);
                    $post1_img = get_image_url($post->ID);*/
                    echo '	<a class="home__curso_facebook--' . ($key + 1) . '" href="' . get_post_meta($post->ID, 'link', true) . '" target="_blank">
								<img src="' . get_image_url($post->ID, 'medium') . '" alt="">
								<div class="foreground"><img src="' . get_template_directory_uri() . '/assets/icons/facebook_line.svg" alt=""></div>					
							</a>';
                }
                ?>
                <div class="clear"></div>
            </div>
        </div>

        <!-- <div class="home__tradition">
            <div class="home__tradition_left">
                <?php
                // $queryFrancePan = array(
                //     'posts_per_page' => 1,
                //     'category' => get_cat_ID('francepan'),
                //     'orderby' => 'date',
                //     'order' => 'DESC',
                //     'post_status' => 'publish',
                //     'suppress_filters' => true
                // );
                // $postsFrancePan = get_posts($queryFrancePan);
                ?>
                <h1 class="firstBlue"><?= __('Tradição francesa', 'Home'); ?></h1>
                <div class="text"><?= __($postsFrancePan[0]->post_content, 'Home'); ?></div>
                <div class="clear"></div>

                <div class="home__tradition_left--img">
                    <?php
                    // foreach ($postsFrancePan as $fp) {
                    //     echo '<img src="' . get_image_url($fp->ID, 'full') . '" alt="">';
                    //     echo '<a class="button" href="' . strip_tags(get_post_meta($fp->ID, 'link', true)) . '" target="_blank">' . __('Saiba mais', 'Home') . '</a>';
                    // }
                    ?>
                </div>
            </div>
            <div class="home__tradition_right">
                <h3 class="filet--bottom"><?= __('Curiosidade', 'Home'); ?></h3>
                <?php
                // $querySabia = array(
                //     'posts_per_page' => 20,
                //     'post_type' => 'sabia_que',
                //     'post_status' => 'publish',
                //     'order' => 'DESC',
                //     'suppress_filters' => 0
                // );
                // $postsSabia = get_posts($querySabia);


                // foreach ($postsSabia as $key => $sabia) {
                //     echo '<h5 class="regular sabia_content sabia-' . $key . '">' . strip_tags($sabia->post_content) . '</h5>';
                // }
                ?>

                <img class="refreshButton" src="<?= get_template_directory_uri(); ?>/assets/icons/refresh.png" alt="">
            </div>
            <div class="clear"></div>
        </div> -->

        <div class="wrapper__footer">
            <div class="wrapper__footer_newsletter">
                <h5 class="upper"><?= __('Newsletter', 'Home'); ?></h5>
                <div class="text white"><?= __('Receba nossas novidades através da newsletter !', 'Home'); ?></div>
                <a class="button red button__border" href="http://eepurl.com/cpC9gv"
                   target="_blank"><?= __('Inscreva-se', 'Home'); ?></a>
            </div>
            <div id="map"></div>
            <div class="clear"></div>
        </div>
    </div>

<?php include_once('page_components/footer.php'); ?>
<?php get_footer(); ?>