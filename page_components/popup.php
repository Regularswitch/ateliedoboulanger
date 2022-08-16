<div class="popup popup__trabalhar">
    <div class="popupwrapper">

        <div class="popup_close" style="right: 65px;">
            <img style="width: 100%;" src="<?= get_template_directory_uri() . '/assets/icons/close.svg'; ?>" alt="">
        </div>

        <div class="mobile__container">
            <div class="popup__header">
                <div class="popup__header_logo">
                    <img src="<?= get_template_directory_uri() . '/assets/logos/logo_fp_small.svg' ?>" alt="">
                    <img src="<?= get_template_directory_uri() . '/assets/logos/logo_adb_small.svg' ?>" alt="">
                </div>
                <div class="popup__header_title">
                    <h2 class="blue firstBlue"><?= __('Intensivo em <br> Panificação', 'popup'); ?></h2>
                </div>
            </div>

            <div class="popup__content_title">
                <h4 class="black"><?= __('Salut!', 'popup'); ?></h4>
            </div>

            <div class="popup__content">
                <div class="popup__content_left">
                    <div class="text bold"><?= __('Se você tem interesse em formar um padeiro no Ateliê Do Boulanger durante 1 a 3 meses, receber uma formação técnica na sua padaria ou ter mais detalhes sobre os serviços que podemos oferecer para a sua empresa, detalhe o seu projeto e entraremos em contato:', 'popup'); ?>
                    </div>
                </div>
                <div class="popup__content_right">
                    <div class="text ">
                        <?= __('Se você gosta da panificação e gostaria de ser um aprendiz clique na caixa abaixo e entraremos em contato com você!', 'popup'); ?>

                    </div>
                </div>
            </div>

            <div class="button button_contato">
                <a href="mailto:contato@ateliedoboulanger.com.br    "><?= mb_strtoupper(__('entrar em contato', 'popup')); ?></a>
            </div>
        </div>
    </div>
</div>