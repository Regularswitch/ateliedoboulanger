<?php
/*
Template Name: Sobre template
*/
?>

<?php get_header(); ?>
<?php include('page_components/links.php') ?>
<?php include_once('page_components/menu.php'); ?>

<div class="wrapper sobre">

    <div class="sobre__header">
        <h1 class="firstBlue"><?= __('ateliê do <br> boulanger', 'Sobre'); ?></h1>
    </div>

    <div class="sobre__image img1">
        <img class="sobre__img_top" src="<?= get_template_directory_uri(); ?>/assets/img/page__sobre_top.jpg" alt="">
        <div class="sobre__box1 animate">
            <div class="text white"><?= __('<strong>A ideia de montar o Ateliê Boulanger  surgiu a partir das solicitações dos nossos clientes e profissionais da área.</strong><br><br>
            Começamos por organizar treinamentos na padaria de um cliente,  mas o número de pedidos aumentou e assim decidimos montar uma estrutura  profissional para atender a demanda de capacitar padeiros.', 'Sobre'); ?>
            </div>
        </div>
    </div>

    <!-- <div class="sobre__title">
        <div class="sobre__title_left">
            <h2 class="firstBlue"><?= __('Nosso <br>objetivo', 'Sobre'); ?></h2>
        </div>
        <div class="sobre__text_right">
            <div class="text bold"><?= __('Capacitar profissionais para o setor da panificação artesanal, valorizar o ofício e assim atrair os jovens para tornarem-se padeiro e garantir um futuro a nossa profissão.<br>Os nossos professores são reconhecidos e ainda participam de missões no mundo inteiro. ', 'Sobre'); ?>
            </div>
            <div class="text"><?= __('A escola foi pensada seguindo o padrão das escolas francesas. Usamos a melhor infra-estrutura.<br>O local é amplo e climatizado, é uma padaria "modelo" ou seja é um exemplo a seguir para quem quer montar uma padaria artesanal.', 'Sobre'); ?></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="sobre__title">
        <div class="sobre__title_left">
            <h2 class="firstBlue"><?= __('Os cursos <br>da escola', 'Sobre'); ?></h2>
        </div>
        <div class="sobre__text_right">
            <div class="text bold"><?= __('Os  cursos são para todas as pessoas que se interessam pela panificação, da pessoa que gostaria de fazer pão na sua casa ao profissional que pretende se atualizar no ofício.', 'Sobre'); ?>
            </div>
            <div class="text"><?= __('Ensinamos as técnicas artesanais francesas, que são usadas no mundo inteiro.  Oferecemos também muitos produtos desenvolvidos por nossa equipe com ingredientes típicos brasileiros tais como: "o tradicional pao francês do Brasil", "o brioche de chocolate branco e goiabada", "O Caipiripão”…', 'Sobre'); ?></div>
        </div>
        <div class="clear"></div>
    </div> -->

    <div class="text">  
        <?= __('O projeto Ateliê Do Boulanger surgiu da necessidade de capacitar cada vez mais
        profissionais, devido ao crescimento no segmento de panificação artesanal. O uso
        de uma farinha pura, sem aditivos ou melhorador, requer adquirir conhecimento
        teórico e técnico para tirar o melhor proveito dela e desenvolver produtos de
        qualidade', 'Sobre') ?>
        <?= __('O objetivo, além de capacitar os padeiros, é valorizar a profissão, atrair os jovens e
        garantir um futuro para cada um. A escola está aberta a todos, iniciantes,
        profissionais ou amadores, e as aulas do Ateliê Do Boulanger são elaboradas para
        que cada aluno possa adquirir os conhecimentos necessários ao seu objetivo.
        Hoje, o Ateliê do Boulanger não só ministra aulas como também acolhe padeiros
        dos nossos clientes por período de 1 a 3 meses, com o objetivo de treiná-los a
        reproduzir diariamente uma gama de produtos e controlar os processos', 'Sobre') ?>
    </div>


    <div class="sobre__title">

            <h2 class="firstBlue"><?= __('Como fazer <br>um bom pão', 'Sobre'); ?></h2>

    </div>
    <div class="sobre__highlights">
        <div class="sobre__highlights_items">
            <img class="sobre__icons" src="<?= get_template_directory_uri(); ?>/assets/picto/sobre/BP-picto-01.png" alt="">
            <h4 class="blue bold centered"><?= __('Tempo', 'Sobre'); ?></h4>
        </div>
        <div class="sobre__highlights_items">
            <img class="sobre__icons" src="<?= get_template_directory_uri(); ?>/assets/picto/sobre/BP-picto-02.png" alt="">
            <h4 class="blue bold centered"><?= __('Boa matéria prima', 'Sobre'); ?></h4>
        </div>
        <div class="sobre__highlights_items">
            <img class="sobre__icons" src="<?= get_template_directory_uri(); ?>/assets/picto/sobre/BP-picto-03.png" alt="">
            <h4 class="blue bold centered"><?= __('Amor ao Ofício', 'Sobre'); ?></h4>
        </div>
        <div class="sobre__highlights_items">
            <img class="sobre__icons" src="<?= get_template_directory_uri(); ?>/assets/picto/sobre/BP-picto-04.png" alt="">
            <h4 class="blue bold centered"><?= __('Dedicação', 'Sobre'); ?></h4>

        </div>
        <div class="clear"></div>
    </div>

    <div class="sobre__image img2">
        <div class="sobre__box2">
            <h2><?= __('Agendar', 'Sobre'); ?></h2>
            <h3><?= __('Um curso', 'Sobre'); ?></h3>
            <a href="<?= $cursosPage ?>/#calendar" class="button red"><?= __('Ver o calendario', 'Sobre'); ?></a>
        </div>
        <img class="sobre__img_bottom" src="<?= get_template_directory_uri(); ?>/assets/img/page__sobre_bottom.jpg"
             alt="">
    </div>

    <div class="sobre__map">
        <div id="map"></div>
    </div>

    <div class="sobre__pictos_container">
        <img class="pain04" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain04.png"
             data-bottom-top="top: -20px;"
             data-top-bottom="top: -80px;"
             alt="">
        <img class="pain10" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain10.png"
             data-bottom-top="top: 300px;"
             data-top-bottom="top: 200px;"
             alt="">

        <img class="picto4_red" src="<?= get_template_directory_uri(); ?>/assets/picto/rouge/picto4.png"
             data-bottom-top="top: 150px;"
             data-top-bottom="top: 50px;"
             alt="">
        <img class="picto5_blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto5.png"
             data-bottom-top="top: 190px;"
             data-top-bottom="top: 80px;"
             alt="">
        <img class="picto9_red" src="<?= get_template_directory_uri(); ?>/assets/picto/rouge/picto9.png"
             data-bottom-top="top: 130px;"
             data-top-bottom="top: 40px;"
             alt="">
    </div>
</div>

<?php include_once('page_components/footer.php'); ?>
<?php get_footer(); ?>
