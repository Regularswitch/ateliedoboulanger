<?php include('links.php') ?>
<?php //include('lang-block.php'); ?>
<div class="menu">
	<div class="menu__wrapper">
		<div class="menu__item no-desktop menu__burger">
			<div class="burger">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<div class="menu__item <?= $currentPage == 'sobre' ? 'active' : ''; ?> no-ipad"><a href="<?= $sobrePage ?>"><?= mb_strtoupper(__('Sobre', 'atelie')); ?></a></div>
		<div class="menu__item <?= $currentPage == 'cursos' ? 'active' : ''; ?> no-ipad"><a href="<?= $cursosPage ?>"><?= mb_strtoupper(__('Cursos', 'atelie')); ?></a></div>
		<div class="menu__item <?= $currentPage == 'equipe' ? 'active' : ''; ?> no-ipad"><a href="<?= $equipePage ?>"><?= mb_strtoupper(__('Equipe', 'atelie')); ?></a></div>
		<div class="menu__item no-ipad openPopup"><a href="javascript:;"><?= mb_strtoupper(__('Estagio e Treinamento ', 'atelie')); ?></a></div>
		<div class="menu__item <?= $currentPage == 'contato' ? 'active' : ''; ?> no-ipad"><a href="<?= $contatoPage ?>"><?= mb_strtoupper(__('Contato', 'atelie')); ?></a></div>

		<div class="menu__item menu__logo">
			<a href="<?= is_home() ? $francepanificacao : $homePage ?>">

				<div class="flip-container <?= is_home() ? '' : ($currentPage == 'escola' ? '' : 'hidden') ?>" ontouchstart="this.classList.toggle('hover');">
					<div class="flipper">
						<div class="front escola">
							<!-- front content -->
							<!--						<img src="--><?//= get_template_directory_uri(); ?><!--/assets/img/logos/logo-france-panificacao.svg" alt="">-->
						</div>
						<div class="back">
							<!-- back content -->
							<!--						<img src="--><?//= get_template_directory_uri(); ?><!--/assets/img/logos/logo-adb.svg" alt="">-->
						</div>
					</div>
				</div>

				<img class="<?= is_home() ? 'hidden' : '' ?>" src="<?= get_template_directory_uri(); ?>/assets/logos/logo_adb_line.svg" alt="">
			</a>
		</div>

		<div class="menu__item  no-ipad menu__item_newsletter"><a href="http://eepurl.com/cpC9gv" target="_blank"><?= mb_strtoupper(__('Newsletter', 'atelie')); ?></a></div>

		<div class="menu__item menu__social menu__social_instagram no-iphone"><a href="https://www.instagram.com/francepanificacao/" target="_blank"><?= file_get_contents(get_template_directory_uri().'/assets/icons/instagram.svg'); ?></a></div>
		<div class="menu__item menu__social menu__social_facebook no-iphone"><a href="https://www.facebook.com/francepanificacao/" target="_blank"><?= file_get_contents(get_template_directory_uri().'/assets/icons/facebook.svg'); ?></a></div>
	</div>
</div>


<div class="menu__mobile">
	<div class="menu__mobile_wrapper">
		<div class="menu__burger">
			<div class="burger">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>

		<a href="<?= $homePage; ?>"><h3 class="no-iphone firstBlue"><?= mb_strtoupper(__('Ateliê do boulanger', 'atelie')) ?></h3></a>

		<a class="menu__mobile_logolink" href="<?= $homePage ?>"><img class="menu__mobile_logo   iphone-only" src="<?= get_template_directory_uri(); ?>/assets/logos/logo_adb_full.svg" alt=""></a>

		<div class="ipadMenu<?= $currentPage == 'sobre' ? ' active' : ''; ?> "><a href="<?= $sobrePage ?>"><?= mb_strtoupper(__('Sobre', 'atelie')) ?></a></div>

		<div class="ipadMenu<?= $currentPage == 'cursos' ? ' active' : ''; ?>"><a href="<?= $cursosPage ?>"><?= mb_strtoupper(__('Cursos', 'atelie')) ?></a></div>
		<div class="ipadMenu<?= $currentPage == 'equipe' ? ' active' : ''; ?>"><a href="<?= $equipePage ?>"><?= mb_strtoupper(__('Equipe', 'atelie')) ?></a></div>
		<div class="ipadMenu openPopup"><a href="javascript:;"><?= mb_strtoupper(__('Estagio e Treinamento', 'atelie')) ?></a></div>
		<div class="ipadMenu<?= $currentPage == 'contato' ? ' active' : ''; ?>"><a href="<?= $contatoPage ?>"><?= mb_strtoupper(__('Contato', 'atelie')) ?></a></div>

		<div class="ipadMenu"><a href="http://eepurl.com/cpC9gv" target="_blank"><?= mb_strtoupper(__('Newsletter', 'francepan')); ?></a></div>
		<!--		<div class="ipadMenu menu__lang">-->
		<!--			<img class="no-iphone menu__lang_show" src="--><?//= get_template_directory_uri(); ?><!--/assets/img/icons/arrow-more.svg" alt="">-->
		<!--			<img class="iphone-only menu__lang_show" src="--><?//= get_template_directory_uri(); ?><!--/assets/img/icons/arrow-more-blue.svg" alt="">-->
		<!--			<ul>-->
		<!--				--><?php //echo_lang_menu(); ?>
		<!---->
		<!--			</ul>-->
		<!--		</div>-->
		<div class="menu__mobile_social">
			<a class="blue" href="https://www.instagram.com/francepanificacao/"><?= file_get_contents(get_template_directory_uri().'/assets/icons/instagram.svg'); ?></a>
			<a class="red" href="https://www.facebook.com/francepanificacao/"><?= file_get_contents(get_template_directory_uri().'/assets/icons/facebook.svg'); ?></a>
		</div>
	</div>
</div>