<?php
/*
Template Name: contato template
*/
?>

<?php get_header(); ?>
<?php include('page_components/links.php') ?>
<?php include_once('page_components/menu.php'); ?>

<div class="wrapper contato">
    <div class="contato__header">
        <h1 class="blue"><?= __('contato', 'Contato') ?></h1>
    </div>

    <div class="contato__form">

        <?php
        if (isset($_GET['emailSent']) && $_GET['emailSent']) {
            echo '<div class="formSuccess">' . __('Seu email foi enviado com sucesso.<br>Entraremos em contato o mais breve possivel !', 'Contato') . '</div>';
        } elseif (isset($_GET['emailSent']) && !$_GET['emailSent']) {
            echo '<div class="formError">' . __('Seu email não foi enviado. Por favor, tente de novo mais tarde.', 'Contato') . '</div>';
        }
        ?>

        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <input type="text" name="name" class="input50_left champ" placeholder="<?= __('Nome', 'Contato'); ?>" required>
            <input type="text" name="tel" class="input50_right champ" placeholder="<?= __('Telefone', 'Contato'); ?>">

            <div class="clear"></div>

            <input type="email" name="email" class="input100 champ" placeholder="<?= __('E-mail', 'Contato'); ?>" required>
            <input type="text" name="subject" class="input100 champ" placeholder="<?= __('Assunto', 'Contato'); ?>" required>
            <textarea name="message" class="input100 champ" required placeholder="<?= __('Messagem', 'Contato'); ?>"></textarea>


            <input type="hidden" name="action" class="champ" value="contact_form">
            <input class="button contato__form_button" name="subscribe" type="submit"
                   value="<?= mb_strtoupper(__('Enviar', 'Contato')); ?>">
            <div class="clear"></div>


        </form>
    </div>

    <div class="contato__pictos_container">
        <img class="picto2__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto2.png"
             data-bottom-top="top: 220px;"
             data-top-bottom="top: 100px;"
             alt="">
        <img class="picto5__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto5.png"
             data-bottom-top="top: 430px;"
             data-top-bottom="top: 300px;"
             alt="">
        <img class="picto7__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto7.png"
             data-bottom-top="top: 160px;"
             data-top-bottom="top: 100px;"
             alt="">
        <img class="picto3__red" src="<?= get_template_directory_uri(); ?>/assets/picto/rouge/picto3.png"
             data-bottom-top="top: 330px;"
             data-top-bottom="top: 200px;"
             alt="">

        <img class="pain16" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain16.png"
             data-bottom-top="top: 150px;"
             data-top-bottom="top: 100px;"
             alt="">
        <img class="pain10" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain10.png"
             data-bottom-top="top: 280px;"
             data-top-bottom="top: 210px;"
             alt="">

        <img class="pain04" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain04.png"
             data-bottom-top="top: 330px;"
             data-top-bottom="top: 260px;"
             alt="">
        <img class="pain03" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain03.png"
             data-bottom-top="top: 530px;"
             data-top-bottom="top: 460px;"
             alt="">
    </div>
</div>


<?php include_once('page_components/footer.php'); ?>
<?php get_footer(); ?>