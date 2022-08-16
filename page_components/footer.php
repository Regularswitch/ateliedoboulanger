<?php include('links.php') ?>
<?php include_once('popup.php'); ?>

<style>
	.button_whats {
		position: fixed;
		z-index: 999;
		bottom: 35px;
		right: 15px;
		display: flex;
		align-items: center;
	}

	.button_whats a .normal {
		z-index: 1;
		opacity: 1;
	}

	.button_whats a img {
		width: 48px;
		height: 48px;
	}

	.button_whats a .hover_wt {
		z-index: -1;
		position: absolute;
		left: -111px;
		opacity: 0;
	}
</style>


<div class="button_whats">
	<a href="https://api.whatsapp.com/send?phone=5511982460042&amp;text=Olá%2C%20gostaria%20de%20um%20atendimento" target="_blanc">
		<img class="normal" src="<?= get_template_directory_uri(); ?>/assets/icons/whatsapp.png" alt="" />
	</a>
</div>

<footer>
	<div class="footer__filet"></div>
	<div class="footer__wrapper">
		<div class="footer__item footer__item_logos" style="display: flex;">
			<img src="<?= get_template_directory_uri(); ?>/assets/logos/logo_fp_small.svg" alt="">
			<img src="<?= get_template_directory_uri(); ?>/assets/logos/logo_adb_small.svg" alt="">
		</div>
		<ul class="footer__item text--footer upper">
			<li><a href="<?= $sobrePage ?>"><?= __('Sobre', 'footer'); ?></li></a>
			<li><a href="<?= $sobrePage ?>"><?= __('Cursos', 'footer'); ?></li></a>
			<li><a href="<?= $equipePage?>"><?= __('Equipe ', 'footer'); ?></li></a>
		</ul>
		<ul class="footer__item text--footer upper">
			<li><a class="openPopup" href="javascript:;"><?= __('INTENSIVO EM PANIFICAÇÃO', 'footer'); ?></li></a>
			<li><a href="<?= $contatoPage ?>"><?= __('Contato', 'footer'); ?></li></a>

		</ul>
		<ul class="footer__item text--footer footer__item_address">
			<a href="mailto:contato@ateliedoboulanger.com.br">contato@ateliedoboulanger.com.br</a>
			<li><?= __('T: (11) 2372 0444 ', 'footer'); ?></li>
			<li><?= __('Rua Abib Miguel Haddad 69', 'footer'); ?></li>
			<li><?= __('Vila Firmiano Pinto<br>04125-210 Sao Paulo', 'footer'); ?></li>
		</ul>
	</div>
</footer>