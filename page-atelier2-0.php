<?php
/*
Template Name: 2.0 template
*/
?>

<?php get_header(); ?>
<?php include('page_components/links.php') ?>
<?php include_once('page_components/menu.php'); ?>

<style>
    .my_popup {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        min-height: 100vh;
        width: 100vw;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        z-index: 9999;
        background-color: rgba(0, 0, 0, 0.8);
        transition: all 0.1s ease-in-out;
        height: 3000px;
    }

    [hidden] {
        display: none !important;
    }

    .my_popup>div {
        display: block;
        margin: 0 auto;
        width: 700px;
        max-width: calc(100vw - 30px);
        background-color: #FFF;
    }
</style>

<div class="wrapper doispntozero container">
    <div class="row" style="position: relative">
        <div class="col-12">
            <img class="sobre__img_top" src="<?= get_template_directory_uri(); ?>/assets/img/top20.png" alt="">
        </div>
        <div class="gradien">
            <div class="col-xl-7 col-lg-7 col-md-9 col-sm-12 col-12">
                <div class="text1">
                    <h1 class="blue"><?= __('OS CURSOS </br> DO ATELIÊ 2.0 ', 'atelie2'); ?></h1>
                    <div class="text-2point">
                        <p><?= __('A ambição da nossa plataforma é permitir a todos que não tem a 
                        possibilidade se deslocar até nossa escola ter acesso ao conhecimento que 
                        oferecemos diariamente aos nossos alunos em São Paulo. Disponibilizamos 
                        cursos de níveis adaptados ao seu progresso', 'atelie2'); ?></p>
                    </div>
                </div>
            </div>
            <div class="offset-xl-2 col-xl-3 offset-lg-2 col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="bts">
                    <a target="_blanc" href="https://www.youtube.com/watch?v=pO6WmES0b-U&feature=youtu.be" class="button trailer red"><?= __('Assistir o Trailer', 'atelie2'); ?></a>
                    <a href="https://ateliedoboulanger.club.hotmart.com/login" class="begin button red ancor">
                        <?= __('Espaço do Aluno', 'atelie2'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <?php

    $queryPacotes = array(
        'posts_per_page'   => -1,
        'category'         => 10,
    );
    $postsPacotes = get_posts($queryPacotes);

    ?>

    <?php
    $cursos       = get_posts(['posts_per_page' => 6, 'category' => 10]);
    $my_current_lang = apply_filters( 'wpml_current_language', NULL );
    $termchildren    = $my_current_lang == 'pt-br' ? get_term_children(10, 'category') : get_term_children(19, 'category');
    foreach ($termchildren as $key => $children) :
        $args     = ['cat' => $children, 'orderby' => 'post_date', 'order' => 'DESC', 'posts_per_page' => 10, 'post_status' => 'publish'];
        $posts    = query_posts($args);
        $name_cat = get_cat_name($children);
    ?>
        <h1 class="title__card_cursos"><?= $name_cat; ?></h1>
        <div class="row mar50" id="prices">
            <?php
            foreach ($posts as $curso) :
                $img   = explode(': ', get_field("estrelas", $curso->ID))[0];
                $cores = explode(': ', get_field("cores", $curso->ID))[0];
            ?>
                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-124">
                    <div class="iten__curso_2">
                        <div class="nivel_curso" style="background-color: <?= $cores ?> !important;">
                            <h2><?= __($curso->post_title, 'atelie2'); ?></h2>
                            <img src="<?= $img ?>" alt="">
                        </div>
                        <div class="text">

                            <ul>
                                <li><a href="javascript:void(0)" onclick="popup_pacotes('pacote-intermediario', <?= $curso->ID ?>, this)"><strong><?= __('Conteúdo Programático', 'atelie2'); ?></strong></a></li>
                            </ul>

                            <div class="h">
                                <hr>
                                <a style="text-decoration: none" href="#faq-footer" class="avaliation"><strong><?=__('Como funciona a plataforma?', 'atelie2'); ?></strong></a>
                            </div>

                            <div class="h">
                                <hr>
                                <p class="avaliation"><strong><?= get_field("pacotes_inclusos", $curso->ID) ?></strong></p>
                                <hr>
                            </div>

                            <span><?= get_field("detalhes", $curso->ID) ?></span>

                            <a target="_blanc" href="<?= get_field("link_hotmart", $curso->ID) ?>" class="button red begin"><img src="<?= get_template_directory_uri() . '/assets/icons/cadeado.svg'; ?>" alt=""><?= __('Começar', 'atelie2'); ?></a>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
        <?php endforeach ?>

        <div class="row white w_one">
            <div class="col-12">
                <p><?= __('*Só as Principais receitas são informadas, conteúdo constantemente alimentado', 'atelie2'); ?></p>
            </div>
        </div>

        <!-- <div class="row white w_two">
        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12">
            <div class="text blue">
                <p><strong><?= __('Cliente France Panificação e alunos do Ateliê', 'atelie2'); ?></strong></p>
            </div>
        </div>
        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12">
            <p class="blue text"><?= __('Entre em contato com a gente para benificiar do seu cupom de desconto', 'atelie2'); ?></p>
        </div>
        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12">
            <div class="bts">
                <a href="" class="button blue trailer"><?= __('Entre em contato', 'atelie2'); ?></a>
            </div>
        </div>
    </div> -->

        <div class="row">
            <div class="col-12">
                <div class="image_static relative">
                    <img src="<?= get_template_directory_uri() . '/assets/img/img-3.png'; ?>" alt="">
                    <div class="text white">
                        <h1 class="white"><?= __('Prove 7 dias!', 'atelie2'); ?></h1>
                        <p class="white"><?= __('Se você não ficar satisfeito nos primeiros 7 dias, </br>garantimos a devolução total do seu dinheiro', 'atelie2'); ?></p>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12">
                <div class="iten_white">
                    <div class="figure">
                        <img src="<?= get_template_directory_uri() . '/assets/icons/playnew.png'; ?>" alt="">
                        <h2 class="blue"><?= __('Constantemente </br> alimentado', 'atelie2') ?></h2>
                    </div>
                    <div class="content">
                        <p class="blue"><?= __('No decorrer do seu plano você tem acesso a novo conteúdo.', 'atelie2') ?></p>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12">
                <div class="iten_white">
                    <div class="figure">
                        <img src="<?= get_template_directory_uri() . '/assets/icons/blue3stars.svg'; ?>" alt="">
                        <h2 class="blue"><?= __('3 niveis </br>de cursos', 'atelie2') ?></h2>
                    </div>
                    <div class="content">
                        <p class="blue"><?= __('Adaptados ao seu aprendizado e progresso.', 'atelie2') ?></p>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12">
                <div class="iten_white">
                    <div class="figure">
                        <img src="<?= get_template_directory_uri() . '/assets/icons/responsive.svg'; ?>" alt="">
                        <h2 class="blue"><?= __('De fácil <br> acesso', 'atelie2') ?></h2>
                    </div>
                    <div class="content">
                        <p class="blue"><?= __('Através da plataforma Hotmart, você pode assistir os vídeos onde quizer, a qualquer momento.', 'atelie2') ?></p>
                    </div>

                </div>
            </div>
        </div>

        <div class="row gallery">
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <img src="<?= get_template_directory_uri() . '/assets/img/cap1.png' ?>" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <img src="<?= get_template_directory_uri() . '/assets/img/cap2.png' ?>" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <img src="<?= get_template_directory_uri() . '/assets/img/cap3.png' ?>" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <img src="<?= get_template_directory_uri() . '/assets/img/cap4.png' ?>" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <img src="<?= get_template_directory_uri() . '/assets/img/cap5.png' ?>" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <img src="<?= get_template_directory_uri() . '/assets/img/cap6.png' ?>" alt="">
            </div>
        </div>

        <div id="faq-footer" class="row">
            <div class="col-12">
                <p class="faq"><strong>FAQ</strong></p>
            </div>
            <div class="col-12" id="accordion">
                <ul id="accordion-courses" class="row" style="padding-left: 0;">
                    <li class="col-12">
                        <i class="close"></i>
                        <h2 class="blue product_section bloc_1" data-selected="bloc_1"><?= __('Qual é nosso objetivo', 'atelie2'); ?></h2>
                        <div class="bloc bloc_1">
                            <p><?= __('
                                Dar as chaves do entendimento da panificação para
                                se adaptar as condições que você tem na sua padaria, na sua casa... o
                                objetivo sendo de obter um produto de qualidade (sabor, visual).', 'atelie2'); ?>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                    <!--  -->
                    <li class="col-12">
                        <i class="close"></i>
                        <h2 class="blue product_section bloc_2" data-selected="bloc_2"><?= __('O que esperar das aulas ?', 'atelie2'); ?></h2>
                        <div class="bloc bloc_2">
                            <p>
                                <?= __('A melhor qualidade de um padeiro é saber se adaptar, e saber identificar os defeitos
                                de produtos para ajustar os processos e manter um padrão de qualidade a cada fornada.
                                E isso que vamos explicar ao longo das receitas.', 'atelie2'); ?>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                    <!--  -->
                    <li class="col-12">
                        <i class="close"></i>
                        <h2 class="blue product_section bloc_3" data-selected="bloc_3"><?= __('Qual é o conteúdo ?', 'atelie2'); ?></h2>
                        <div class="bloc bloc_3">
                            <p>
                                <?= __('Você terá acesso as receitas, processos e explicação do impacto do ambiente de trabalho em seu trabalho, com vídeo aulas gravadas com duração de 15 a 45 minutos
                                com um total de 12 h de filmagem, dividido em 120 vídeos, separados por receitas e etapas para facilitar o acesso ao conteúdo de necessidade imediata. ( podendo variar de acordo com os novos conteúdos que será inserido ao longo do tempo )', 'atelie2'); ?>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                    <!--  -->
                    <li class="col-12">
                        <i class="close"></i>
                        <h2 class="blue product_section bloc_4" data-selected="bloc_4"><?= __('Para quem são as aulas ?', 'atelie2'); ?></h2>
                        <div class="bloc bloc_4">
                            <p>
                                <?= __('Todos os perfis, todos que desejam abraçar uma carreira profissional ou amadora.', 'atelie2'); ?>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                    <!--  -->
                    <li class="col-12">
                        <i class="close"></i>
                        <h2 class="blue product_section bloc_5" data-selected="bloc_5"><?= __('Certificação', 'atelie2'); ?></h2>
                        <div class="bloc bloc_5">
                            <p>
                                <?= __('Após um ano de assinatura, com 100% de conclusão dos vídeos aulas', 'atelie2'); ?>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                    <li class="col-12">
                        <i class="close"></i>
                        <h2 class="blue product_section bloc_6" data-selected="bloc_6"><?= __('Posso cancelar ?', 'atelie2'); ?></h2>
                        <div class="bloc bloc_6">
                            <p>
                                <?= __('Sim, o cancelamento deve ser feito pelo próprio assinante dentro da Plataforma Hotmart, após o cancelamento você perde o acesso imediato.
                                Em até 7 dias, ressarcimento é integral, após esse prazo não será possível o reembolso do trimestre.', 'atelie2'); ?>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                    <li class="col-12">
                        <i class="close"></i>
                        <h2 class="blue product_section bloc_7" data-selected="bloc_7"><?= __('Fale conosco', 'atelie2') ?></h2>
                        <div class="bloc bloc_7">
                            <p>
                            <?= __('cursoonline@ateliedoboulanger.com.br<br>
                                Whatapps: (11) 982460042<br>
                                Telefone: (11) 2369 0887<br>', 'atelie2') ?>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
</div>

<script scoped>
    var $doc = $('html, body');
    $('a.ancor').click(function() {
        $doc.animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
        return false;
    });
    //Product Tab
    $('.bloc').hide();
    $('.product_section').click(function() {
        let blocName = $(this).data('selected');
        $(this).toggleClass('less');
        $('div.' + blocName).slideToggle();

    })
</script>


<?php include_once('page_components/footer.php'); ?>

<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-4-grid@3.4.0/css/grid.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div class="my_popup" onclick="closePop()" hidden>
    <div class="popup__content popup__content-pacotes">
        <div class="table__popup-pacotes">
            <?php foreach ($postsPacotes as $pacote) : ?>
                <?php
                $table = get_field('tabela_pacotes', $pacote->ID);
                if (!empty($table)) {
                    echo '<table class="table__popup-pacotes__content pac_' . $pacote->ID . ' pac_all" border="0" hidden>';
                    if (!empty($table['caption'])) {
                        echo '<caption>' . $table['caption'] . '</caption>';
                    }

                    if (!empty($table['header'])) {
                        echo '<thead>';
                        echo '<tr>';
                        foreach ($table['header'] as $th) {
                            echo '<th>';
                            echo $th['c'];
                            echo '</th>';
                        }

                        echo '</tr>';
                        echo '</thead>';
                    }

                    echo '<tbody>';
                    foreach ($table['body'] as $tr) {
                        echo '<tr>';
                        foreach ($tr as $td) {
                            echo '<td>';
                            echo $td['c'];
                            echo '</td>';
                        }
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                }
                ?>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>


<script src="//assets.adobedtm.com/7e3b3fa0902e/7ba12da1470f/launch-5de25e657d80.min.js" async></script>
<script src="//assets.adobedtm.com/7e3b3fa0902e/7ba12da1470f/launch-73c56043319a-staging.min.js" async></script>

<script>
    function startHidden() {
        Object.values(document.querySelectorAll('.pac_all')).forEach(div => {
            div.setAttribute('hidden', '');
        })
    }

    function popup_pacotes(seletor, id, el) {
        startHidden();
        let $pop = document.querySelector('.my_popup');
        let $table = document.querySelector(`.pac_${id}`);
        let $pop_cont = document.querySelector('.popup__content-pacotes');
        $pop_cont.style.marginTop = window.scrollY + 50 + "px";
        $pop.style.height = document.body.offsetHeight + 83 + 'px';
        $pop.removeAttribute('hidden');
        $table.removeAttribute('hidden');
    }

    function closePop() {
        let $pop = document.querySelector('.my_popup');
        $pop.setAttribute('hidden', '');
    }
</script>