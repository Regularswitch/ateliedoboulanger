<?php
/*
Template Name: Cursos template
*/
?>

<?php get_header(); ?>
<?php include('page_components/links.php') ?>
<?php include_once('page_components/menu.php'); ?>

<div class="wrapper cursos">

    <div class="cursos__header">
        <div class="cursos__header_title">
            <div class="cursos__header_tite--left">
                <div class="text--number blue">5</div>
            </div>
            <div class="cursos__header_tite--right">
                <h1 class="firstBlue"><?= __('Niveis<br> de cursos', 'curso'); ?></h1>
                <h1 class="firstBlue regular"></h1>
            </div>
            <div class="clear"></div>
        </div>
        <?php
        $queryNivels = array(
            'posts_per_page'       => -1,
            'post_type'               => 'cursos_posts',
            'category_name'        => 'curso-nivel',
            'orderby'              => 'menu_order',
            'order'                => 'DESC',
            'post_status'          => 'publish',
            'suppress_filters'     => true
        );
        $postsNivels = get_posts( $queryNivels );
        $today = date('Ymd');

        $queryEvents = array(
            'posts_per_page'       => -1,
            'post_type'               => 'events',
            'orderby'              => 'meta_value',
            'meta_query' => array(
                array(
                    'key'        => 'date_start',
                    'compare'    => '>=',
                    'value'        => $today,
                ),
            ),
            'order'                => 'ASC',
            'post_status'          => 'publish',
            'suppress_filters'     => true
        );
        $postsEvents = get_posts( $queryEvents);

        if(isset($_GET['d'])) {
            var_dump($queryEvents);

        }



        ?>
        <div class="cursos__header_onglets">
            <?php
                foreach($postsNivels as $keyniv => $postniv) {
                    $key = $keyniv + 1;
                    echo '<h4 class="onglet onglet_'.$key.' blue '. ($key == 1 ? 'active' : '') .'" data-tab="'.$key.'" '. ($key == 1 ? 'data-mobile="'.__('NÍVEL I', 'curso').'" data-desktop="'.__('NÍVEL I', 'curso').'"' : '') .'>'.$postniv->post_title.'</h4> <!-- Ecrire amadores en 21px pour iphone -->';
            }
            ?>

            <span class="lineIndicator"></span>
        </div>


        <form action="<?= $lien ?>">
            <input type="hidden" value="<?= $eventID ?>">
            <buttom type="submit"></buttom>

        </form>

        <div class="cursos__header_tabs">
            <?php
            foreach($postsNivels as $keyniv => $postniv) {
                $key = $keyniv + 1;
                $postID = $postniv->ID;

                $i = -1;
                $eventCurso = -1;
                $classInactive = '';
                do {
                    $i++;
                    $eventID = $postsEvents[$i]->ID ?? [];
                    $eventAvailability =  get_post_meta($eventID, 'available', true)[0] ?? '';
                    if($eventAvailability == 1) {
                        $eventCurso =  get_post_meta($eventID, 'curso', true)[0];
                    } else {
                        $eventCurso = -1;
                    }
                } while(($eventCurso != $postID) AND ($i < count($postsEvents)));
                if($i >= count($postsEvents)) {
                    $classInactive = 'inactive';
                }

                switch($key) {
                    case 1:
                        $pictosHtml = '
                            <img style="position: static; width: 100%;" class="" src="'.get_template_directory_uri().'/assets/img/curso-nv1.jpeg">
                        ';
                        break;
                    case 2:
                        $pictosHtml = '
                            <img style="position: static; width: 100%;" class="" src="'.get_template_directory_uri().'/assets/img/curso-nv2.jpeg">
                        ';
                        break;
                    case 3:
                        $pictosHtml = '
                            <img style="position: static; width: 100%;" class="" src="'.get_template_directory_uri().'/assets/img/curso-nv3.jpeg">
                        ';
                        break;
                    case 4:
                        $pictosHtml = '
                            <img style="position: static; width: 100%;" class=""" src="'.get_template_directory_uri().'/assets/img/curso-nv4.jpeg">
                        ';
                        break;
                    case 5:
                        $pictosHtml = '
                            <img style="position: static; width: 100%;" class=""" src="'.get_template_directory_uri().'/assets/img/curso-nv5.jpeg">
                        ';
                        break;
                }
            echo '<div class="tab tab_'.$key.' '. ($key == 1 ? 'active shown' : '') .'">
                    <div class="tab__left pictos_'.$key.'">'.$pictosHtml.'</div> 
                    <div class="tab__right">
                    
                        <h4 class="black">'.get_post_meta($postID, 'subtitle', true).'</h4>
                        <div class="text bold">'.get_post_meta($postID, 'intro', true).'</div>
                        
                        <div class="text">'.$postniv->post_content.'</div>
                        <div style="display:grid;grid-template-columns: 1fr 1fr;align-items: center">
                            <a class="button '.$classInactive.'" href="'. $contatoPage .'"  data-id="'.$eventCurso.'">'.__('Matricule-se', 'curso').'</a>
                            <span class="price-workshop" style="display:grid;justify-items: right;">R$ '.get_post_meta($postID, 'price', true).'</span>
                        </div>
                        
                    </div>
                    <div class="clear"></div>
                </div>';

            };

            ?>
            <!--<?php echo '<div class="tabs__esgotado ' .  $classInactive . '"> '.__('ESGOTADO', 'curso').' </div>' ?>-->

        </div>
    </div>
    
    <div class="box__more-info">
        <div class="box__more-info-title">
            <span>INFORMAÇÕES IMPORTANTES:</span>
        </div>
        <span class="box__more-info-text">
            <ul>
                <li>Uniforme obrigatório: Camiseta branca, calça preta, branca ou xadrez, calçado antiderrapante (temos a venda, consultar disponibilidade)</li>
                <li>A realização do CURSO está condicionada ao número mínimo de 3 (três) alunos matriculados por turma</li>
                <li>Tendo como cortesia, avental, bandana e almoço.</li>
            </ul>
            <ul>
                <li>A sua participação será confirmada via e-mail ou whatsapp.</li>
                <li>Não nos responsabilizamos por compra de passagens e reservas de hotel antes da confirmação formal de realização do curso.</li>
                <li>As Receitas podem ser alteradas sem aviso prévio.</li>
            </ul>
        </span>
    </div>

    <div class="cursos__specials">
        <div class="cursos__specials_title">
            <h1 class="firstBlue aboveDesktop"><?= __('Cursos de especialidades', 'curso'); ?></h1>
            <div class="text bold"><?= __('Com esse curso você pode dar mais ênfase às suas habilidades. No nível essencial você conta com workshops temáticos e desenvolve receitas e técnicas.', 'curso'); ?></div>
            <div class="clear"></div>
        </div>

        <div class="cursos__specials_content highlights">
            <?php
                $my_current_lang = apply_filters( 'wpml_current_language', NULL );
                $queryCursos = array(
                    'posts_per_page'       => -1,
                    'post_type'            => 'cursos_posts',
                    'category_name'        => 'curso-especial',
                    'orderby'              => 'menu_order',
                    'order'                => 'ASC',
                    'post_status'          => 'publish',
                    'suppress_filters'     => true
                );
                $postsCursos = get_posts( $queryCursos );
                $cursosInfos = array();
                foreach($postsCursos as $key => $curso) {
                    $cursoID = $curso->ID;

                    // $subtitle = get_post_meta($cursoID, 'nivel', true);
                    $time    = wpautop(get_post_meta($cursoID, 'detail', true));
                    $intro   = wpautop($curso->post_content);
                    $content = wpautop(get_post_meta($cursoID, 'objectifs', true));

                    $price = get_post_meta($cursoID, 'price', true);

                    $available   = get_post_meta($cursoID, 'available', true);
                    $pastillenew = get_post_meta($cursoID, 'pastille_new', true);
                    $disconto    = get_post_meta($cursoID, 'disconto', true);

                    $link       = get_permalink($cursoID);
                    $galleryIDs = explode( ',', get_post_meta($cursoID, '_easy_image_gallery', true));
                    $gallery    = array();
                    foreach ($galleryIDs as $key2 => $galleryID) {
                        array_push($gallery, wp_get_attachment_url($galleryID));
                    }

                    $chefID    = unserialize(get_post_meta($cursoID)['teacher'][0])[0];
                    $chefInfos = get_post($chefID);
                    $chef      = array(
                        'title' => $chefInfos->post_title,
                        'subtitle' => get_post_meta($chefID, 'subtitle', true),
                        'img' => get_image_url($chefID,'medium')
                    );
//                  $status = $available;
                    $type = get_post_meta($cursoID, 'type', true);
                    $i = -1;
                    do {
                        $i++;
                        $eventID = $postsEvents[$i]->ID ?? '';
                        $eventAvailability =  get_post_meta($eventID, 'available', true)[0] ?? '';
                        if($eventAvailability == 1) {
                            $eventCurso =  get_post_meta($eventID, 'curso', true)[0];
                        } else {
                            $eventCurso = -1;
                        }
                    } while(($eventCurso != $cursoID) AND ($i < count($postsEvents)));

                    if($i < count($postsEvents)) {
                        $dateStartRaw = get_post_meta($eventID, 'date_start', true);
                        $dateEndRaw = get_post_meta($eventID, 'date_end', true);

                        $dateStart = date("d.m.Y", strtotime($dateStartRaw));
                        $dateEnd = date("d.m.Y", strtotime($dateEndRaw));

                        $dateStartJS = date("dmY", strtotime($dateStartRaw));
                        $dateEndJS = date("dmY", strtotime($dateEndRaw));
                    } else {
                        $dateStart = null;
                        $dateEnd = null;
                        $available = 0;
                    }


                    // array_push($eventsList, array($dateStart, $dateEnd));
                    array_push($cursosInfos, array(
                        'id'        => $cursoID,
                        'title'     => $curso->post_title,
                        'dateStart' => $dateStart,
                        'dateEnd'   => $dateEnd,
                        'intro'     => $intro,
                        'time'      => $time,
                        'content'   => $content,
                        'price'     => $price,
                        'chef'      => $chef,
                        'link'      => $link,
                        'gallery'   => $gallery,
                        'duration'  => -1,
                        'status'    => $available,
                        'type'      => $type
                        // 'subtitle' => $subtitle,
                    ));
                    
                    if(!$available) {
                        $class = ' esgotado';
                    } else if($pastillenew) {
                        $class = ' new';
                    } else if($disconto) {
                        $class = ' disconto';
                    } else {
                        $class = '';
                    }

                    // $isLastOfRow = ($key + 1) % 3;// == 0 ? 'highlights__item_row' :  ($key + 1) % 3 == 2 ? 'highlights__item_2' : '';
                    // echo '<div class="highlights__items highlights__item_action highlights__item_'.($key + 1).''. $class .'" data-key="'.($key + 1).'" data-id="'.$cursoID.'">
                    //         <img class="highlights__items_cover" src="'.get_image_url($cursoID, 'medium').'" alt="">
                    //         <img src="'.get_template_directory_uri().'/assets/icons/icon_new.png" class="rollover_new">
                            
                    //         <h3 class="rollover__disconto black">'.$disconto.'%</h3>
                    //         <div class="cursos__specials_content--rollover container">

                    //             <div class="rollover__intro">
                    //                 <div class="title text white fontBlack">'.mb_strtoupper($curso->post_title).'</div>
                    //             </div>
                                

                    //                 <div class="rollover__infos belowDesktop">
                    //                 <div class="rollover__infos_close"><img src="'.get_template_directory_uri().'/assets/icons/close_white.svg"></div>

                    //                 <div class="box__right">
                                        
                    //                     <div class="box__right_head">
                    //                         <div class="box__right_title">
                    //                             <h2 class="box__title"></h2>
                                                
                    //                             <span class="separator"></span>
                    //                             <div class="clear"></div>
    
                    //                         </div>
    
                    //                         <div class="box__right_date text bold">
                    //                             <!--<div class="box__date_days"></div>-->
                    //                             <div class="box__date_time"></div>
                    //                             <span class="separator"></span>
                    //                         </div>
                    //                     </div>
                    //                     <div class="box__right_teacher">
                    //                         <div class="box__left_img">
                    //                             <img src="" alt="">
                    //                         </div>
                    //                         <div class="box__right_teacher--infos">
                    //                             <h4 class="box__left_title black"></h4>
                    //                             <div class="box__left_separator"></div>
                    //                             <div class="box__left_subtitle text fontBlack"></div>
                    //                         </div>
                    //                         <div class="clear"></div>
                    //                     </div>    
                    //                     <div class="clear"></div>
                                        

                    //                     <div class="box__right_intro text bold white"></div>
                    //                     <div class="box__right_content text white"></div>

                    //                     <div class="box__right_bottom">
                    //                         <h2 class="box__bottom_price regular">
                    //                             <span>R$</span>
                    //                             <span class="price"></span>
                    //                         </h2>                                     
                                            
                    //                     </div>
                    //                     <a class="" href="'. $contatoPage .'"  data-id="'.$cursoID.'"><div class="button red">'.mb_strtoupper(__('Matricule-se', 'curso')).'</div></a>


                    //                 </div>    
                    //                 <div class="cursos__specials_gallery gallery__mobile">
                    //                 </div>
                    //             </div>
                    //         </div>
                    //         <span class="bottom_left"></span>
                    //         <img class="bottom_img" src="'.get_template_directory_uri().'/assets/icons/cursos_mask.svg" alt="">
                    //         <span class="bottom_right"></span>
                    //       </div>';
                    // $isLastOfRow = '';
                }



                $dateStartRaw = '';
                $dateEndRaw = '';
                $dateStart = '';
                $dateEnd = '';
                $eventsList = array();
                foreach($postsEvents as $key => $event) {
                    $eventID = $event->ID;

                    $dateStartRaw = get_post_meta($eventID, 'date_start', true);
                    $dateEndRaw = get_post_meta($eventID, 'date_end', true);
                    $dateStart = date("d.m.Y", strtotime($dateStartRaw));
                    $dateEnd = date("d.m.Y", strtotime($dateEndRaw));

                    $available = get_post_meta($eventID, 'available', true);

                    $curso = get_post(get_post_meta($eventID, 'curso', true)[0]);
                    $cursoID = $curso->ID ?? '';
                    $link = get_permalink($eventID);
                    $type = get_the_category($cursoID)[0]->slug ?? '';


                    array_push($eventsList, array(
                        'id' => $eventID,
                        'dateStart' => $dateStart,
                        'dateEnd' => $dateEnd,
                        'curso' => $cursoID,
                        'title' => $curso->post_title ?? '',
                        'link' => $link,
                        'duration' => -1,
                        'status' => $available,
                        'type' => $type,
                        'raw' => $dateStartRaw
                    ));
                }
            ?>

            <script>
                setEvents(<?= json_encode($eventsList) ?>);
                getCursosInfos(<?= json_encode($cursosInfos) ?>);
            </script>

            <div class="clear"></div>
        </div>

        <section class="cursos__specials_box">

            <div class="cursos__specials_boxcontent">
                <div class="box__left">
                    <div class="box__left_img">
                        <img src="" alt="">

                    </div>
                    <div class="box__left_title text fontBlack"></div>
                    <div class="box__left_separator"></div>
                    <div class="box__left_subtitle text"></div>
                    <h2 class="box__bottom_price regular" style="display:grid;justify-items:center;margin-top:20px;">
                        <div>R$<span class="price"></span></div>
                    </h2>
                </div>
                <div class="box__right">
                    <div class="box__right_title">
                        <h2 class="box__title"></h2>
<!--                        <h2 class="box__title_sub regular">-->
<!--                            <span>--><?//= mb_strtoupper(__('Nível', 'curso')); ?><!--</span>-->
<!--                            <span class="sub_nivel"></span>-->
<!--                        </h2>-->
                        <span class="separator"></span>
                        <div class="clear"></div>

                    </div>

                    <div class="box__right_date text bold">
                        <div class="box__date_days"></div>
                        <div class="box__date_time"></div>
                        <span class="separator"></span>
                    </div>

                    <div class="box__right_intro text bold white"></div>
                    <div class="box__right_content text white"></div>

                    <div class="box__right_bottom">
                        <a href="<?= $contatoPage ?>"><div class="button red"><?= mb_strtoupper(__('Matricule-se', 'curso')); ?></div></a>
                        <!-- <a class="box__right_link agendar__link_box" href="" data-id=""><div class="button red"><?= mb_strtoupper(__('Agendar', 'curso')); ?></div></a> -->
                    </div>


                </div>

                <div class="clear"></div>

            </div>

            <div class="cursos__specials_pagination">
<!--                <div class="pagination firstPagination active"><span></span></div>-->
<!--                <div class="pagination" data-id="1"><span></span></div>-->
<!--                <div class="pagination" data-id="2"><span></span></div>-->
            </div>

            <div class="cursos__specials_gallery">
<!--                <img src="--><?//= get_template_directory_uri(); ?><!--/assets/tmp/5.png" alt="" class="img_1">-->
<!--                <img src="--><?//= get_template_directory_uri(); ?><!--/assets/tmp/4.png" alt="" class="img_2">-->
            </div>


        </section>
        
                <div class="open__popup_card">
            <?php foreach( $postsCursos as $key => $info ) : ?>
                <div class="open__popup_card-inner open-button_<?= $key ?>" onclick="openPopUp(<?= $key ?>)">
                    <img src="<?= get_image_url($info->ID, 'medium'); ?>" alt="">
                    <span><?= $info->post_title ?></span>
                </div>
            <?php endforeach; ?>
        </div>
        
        <?php foreach( $cursosInfos as $key => $info ) : ?>
            <dialog class="popup-curso" id="popup-curso_<?= $key ?>">
                <div class="popup-curso__inner">
                    <div class="popup-curso__info">
                        <div class="popup-curso__info-title">
                            <div class="popup-curso__info-title-close">
                                <img onclick="closePopup(<?= $key ?>)" src="<?= get_template_directory_uri() ?>/assets/icons/close_white.svg" alt="Close">
                            </div>
                            <h2><?= $info['title'] ?></h2>
                        </div>
                        <div class="popup-curso__info-info">
                            <span class="popup-curso__info-info-text">
                                <?= $info['time']; ?>
                            </span>
                            <div class="popup-curso__info-info-list">
                                <?= $info['content']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="popup-curso__instrutor">
                        <div class="popup-curso__instrutor-img">
                            <img src="<?= $info['chef']['img'] ?>" alt="Chef">
                        </div>
                        <div class="popup-curso__instrutor-info--inner">
                            <div class="popup-curso__instrutor-info">
                                <span class="popup-curso__instrutor-name__red">Instrutor</span>
                                <span class="popup-curso__instrutor-name__instrutor"><?= $info['chef']['title'] ?></span>
                                <span class="popup-curso__instrutor-name__role"><?= $info['chef']['subtitle'] ?></span>
                            </div>
                            <div class="popup-curso__deco">
                                <img class="popup-curso__deco-img" src="<?= get_template_directory_uri() ?>/assets/picto/rouge/picto1.png">
                                <img class="popup-curso__deco-img" src="<?= get_template_directory_uri() ?>/assets/picto/bleu/picto8.png">
                            </div>
                            <div>
                                <span class="popup-curso__instrutor-price">R$ <?= $info['price'] ?></span>
                                <a href="#" class="popup-curso__instrutor-btn">MATRICULE-SE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </dialog>
        <?php endforeach; ?>

        <!-- <div class="cursos__alacarte">
            <div class="title_container">
                <h3 class="blue"><?= __('cursos', 'curso'); ?></h3>
                <h1 class="blue"><?= __('à la carte', 'curso'); ?></h1>
                <div class="cursos__alacarte_button belowIpad">
                    <img class="alacarte__button" src="<?= get_template_directory_uri(); ?>/assets/icons/page__cursos_button.png" alt="">
                </div>
            </div>

            <div class="cursos__alacarte_button aboveIpad">
                <img class="alacarte__button" src="<?= get_template_directory_uri(); ?>/assets/icons/page__cursos_button.png" alt="">
            </div>

            <div class="curso__pictos_container">
                <img class="picto1__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto1.png" alt="">
                <img class="picto2__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto2.png" alt="">
                <img class="picto4__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto4.png" alt="">
                <img class="picto6__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto6.png" alt="">
                <img class="picto15__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto15.png" alt="">
                <img class="pictoMobile1" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain14.png" alt="">
                <img class="pictoMobile2" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain11.png" alt="">
            </div>

            <?php
            $queryCartes = array(
                'posts_per_page'       => -1,
                'post_type'               => 'cursos_posts',
                'category_name'        => 'curso-carte',
                'orderby'              => 'menu_order',
                'order'                => 'ASC',
                'post_status'          => 'publish',
                'suppress_filters'     => true
            );

            $postsCartes= get_posts( $queryCartes);
            ?>
            <div class="content__container">
                <div class="content__container_title">
                    <h4 class="blue bold"><?= get_post_meta($postsCartes[0]->ID, 'subtitle', true); ?></h4>
                </div>

                <div class="content__container_content">
                    <div class="content_left text blue bold">
                        <?= get_post_meta($postsCartes[0]->ID, 'intro', true); ?>
                    </div>
                    <div class="content_right text blue">
                        <div>
                            <?= wpautop($postsCartes[0]->post_content); ?>
                        </div>
                        <div class="content__container_button button">
                            <a href="<?= get_page_link(get_page_by_title('Contato')->ID) ?>">
                                <?= mb_strtoupper(__('entrar em contato', 'curso')); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <img class="pictos__1" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto5.png" alt="">
                <img class="pictos__2" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto7.png" alt="">
                <img class="pictos__3" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain11.png" alt="">

            </div>
        </div> -->

        <?php include_once('page_components/calendar.php'); ?>
    </div>

    <div class="wrapper__footer">
        <div class="wrapper__footer_newsletter">
            <h5 class="upper"><?= __('Newsletter', 'curso'); ?></h5>
            <div class="text white"><?= __('Receba nossas novidades através da newsletter !', 'curso'); ?></div>
            <a href="http://eepurl.com/cpC9gv" class="button red" target="_blank"><?= __('Inscrever-se', 'curso'); ?></a>
        </div>
        <div id="map"></div>
        <div class="clear"></div>
    </div>
</div>

<?php include_once('page_components/footer.php'); ?>
<?php get_footer(); ?>

<script>
    function openPopUp(key) {
        const modal      = document.querySelector(`#popup-curso_${key}`);
        const openModal  = document.querySelector(`.open-button_${key}`);
        
        modal.showModal();
    }

    function closePopup(key) {
        const modal      = document.querySelector(`#popup-curso_${key}`);
        const closeModal = document.querySelector(".close-button");
        modal.close();
    }

</script>