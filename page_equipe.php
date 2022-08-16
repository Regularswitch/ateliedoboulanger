<?php
/*
Template Name: Equipe template
*/
?>

<?php get_header(); ?>
<?php include('page_components/links.php') ?>
<?php include_once('page_components/menu.php'); ?>

<div class="wrapper equipe">
    <div class="equipe__parrain">

        <div class="equipe__img_parrain">
            <?php
            $queryParrain = array(
                'posts_per_page' => 1,
                'post_type' => 'team',
                'category' => get_cat_ID('parrain'),
                'post_status' => 'publish',
                'order' => 'DESC',
                'suppress_filters' => 0,
            );

            $postsParrain = get_posts($queryParrain);

            foreach ($postsParrain as $key => $parrain) {
                $post_id = $parrain->ID;
                echo '<img src="' . get_image_url($post_id, 'medium') . '" alt="">';
            }
            ?>
        </div>
        <div class="clear"></div>
        <div class="description">
            <?php
            $postsParrain = get_posts($queryParrain);
            foreach ($postsParrain as $key => $parrain) {
                echo '<h2 class="equipe__parrain_name firstBlue parrain-' . $key . '">' . __(strip_tags($parrain->post_title), 'Equipe') . '</h2>';

                echo '<div class="equipe__description_content text bold blue parrain-' . $key . '">' . get_post_meta($parrain->ID, 'text_bold', true) . '</div>';
                echo '<div class="equipe__description_content text blue parrain-' . $key . '">' . strip_tags($parrain->post_content, '<b>') . '</div>';
            }
            ?>
        </div>
        <div class="clear"></div>
        <div class="picto__container_parrain">
            <img class="pain11" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain11.png"
                 data-bottom-top="top: -60px;"
                 data-top-bottom="top: -130px;"
                 alt="">
            <img class="picto7__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto7.png"
                 data-bottom-top="top: -20px;"
                 data-top-bottom="top: -100px;"
                 alt="">
            <img class="picto6__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto6.png"
                 data-bottom-top="top: 150px;"
                 data-top-bottom="top: 50px;"
                 alt="">
        </div>
    </div>

    <div class="teacher">
        <div class="title">
            <h2 class="firstBlue"><?= __('Profesores <br> do ateliê', 'Equipe'); ?></h2>
        </div>
        <div class="highlights">
            <?php
            $queryTeacher = array(
                'posts_per_page' => -1,
                'post_type' => 'team',
                'category' => get_cat_ID('teacher'),
                'post_status' => 'publish',
                'order' => 'DESC',
                'suppress_filters' => 0,
            );
            ?>

            <?php
            $postsTeacher = get_posts($queryTeacher);
            foreach ($postsTeacher as $key => $teacher) {
                $teacherID = $teacher->ID;

                echo '<div class="highlights__items">';
                echo '<div class="highlightd__img"><img src="' . get_image_url($teacherID, 'medium') . '" alt=""></div>';
                echo '<h5 class="black bold centered teacher teacher-' . $key . '">' . strip_tags($teacher->post_title) . '</h5>';
//                echo '<h3 class="equipe__description_content subtile text teacher teacher-' . $key . '">' . get_post_meta($teacher->ID, 'subtitle', true) . '</h3>';
                echo '<div class="equipe__description_content text bold teacher teacher-' . $key . '">' . get_post_meta($teacher->ID, 'text_bold', true) . '</div>';
                echo '<div class="equipe__description_content text teacher teacher-' . $key . '">' . strip_tags($teacher->post_content) . '</div>';
                echo '</div>';
            }
            ?>
            <div class="clear"></div>
        </div>
        <div class="pictos__container_teacher">
            <img class="pain04" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain04.png"
                 data-bottom-top="top: 70px;"
                 data-top-bottom="top: 30px;"
                 alt="">
            <img class="pain15" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain15.png"
                 data-bottom-top="top: 30px;"
                 data-top-bottom="top: -40px;"
                 alt="">
            <img class="pain03" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain03.png"
                 data-bottom-top="top: 30px;"
                 data-top-bottom="top: -40px;"
                 alt="">

            <img class="picto2__red" src="<?= get_template_directory_uri(); ?>/assets/picto/rouge/picto2.png"
                 data-bottom-top="top: 30px;"
                 data-top-bottom="top: -70px;"
                 alt="">
        </div>
    </div>

    <div class="participants">
        <div class="title">
            <h2 class="firstBlue"><?= __('participações <br> especiais', 'Equipe'); ?></h2>
        </div>
        <div class="highlights">

            <?php
            $queryParticipant = array(
                'posts_per_page' => -1,
                'post_type' => 'team',
                'category' => get_cat_ID('participants'),
                'post_status' => 'publish',
                'order' => 'DESC',
                'suppress_filters' => 0,
            );
            ?>
            <?php
            $postsParticipant = get_posts($queryParticipant);
            foreach ($postsParticipant as $key => $participant) {
                $participantID = $participant->ID;

                echo '<div class="highlights__items">';
                echo '<div class="highlightd__img"><img src="' . get_image_url($participantID, 'medium') . '" alt=""></div>';
                echo '<h4 class="blue centered participant-' . $key . '">' . strip_tags($participant->post_title) . '</h4>';
//                echo '<h3 class="equipe__description_content subtile text blue participant-' . $key . '">' . get_post_meta($participant->ID, 'subtitle', true) . '</h3>';
                echo '<div class="equipe__description_content text bold participants participant-' . $key . '">' . get_post_meta($participant->ID, 'text_bold', true) . '</div>';
                echo '<div class="equipe__description_content text participants participant-' . $key . '">' . strip_tags($participant->post_content) . '</div>';
                echo '</div>';
            }
            ?>
            <div class="clear"></div>
        </div>
        <div class="pictos__container_participants">
            <img class="pain01" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain01.png"
                 data-bottom-top="top: 110px;"
                 data-top-bottom="top: 50px;"
                 alt="">
            <img class="pain09" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain09.png"
                 data-bottom-top="top: 40px;"
                 data-top-bottom="top: -20px;"
                 alt="">

            <img class="picto3__red" src="<?= get_template_directory_uri(); ?>/assets/picto/rouge/picto3.png"
                 data-bottom-top="top: 50px;"
                 data-top-bottom="top: -50px;"
                 alt="">
            <img class="picto11__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto11.png"
                 data-bottom-top="top: 30px;"
                 data-top-bottom="top: -80px;"
                 alt="">
        </div>
    </div>

    <div class="wrapper__footer">
        <!-- <div class="wrapper__footer_newsletter">
            <h5 class="upper"><?= __('Newsletter', 'Equipe'); ?></h5>
            <div class="text white"><?= __('Receba nossas novidades através da newsletter !', 'Equipe'); ?></div>
            <div class="button red"><?= __('Inscreva-se', 'Equipe'); ?></div>
        </div> -->
        <div id="map"></div>
        <div class="clear"></div>
    </div>

</div>

<?php include_once('page_components/footer.php'); ?>
<?php get_footer(); ?>
