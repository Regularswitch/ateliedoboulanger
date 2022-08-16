<?php include('links.php') ?>
<div class="menu">
	<div class="menu__wrapper">
		<div class="menu__item no-desktop menu__burger">
			<div class="burger">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>

		<?php 
			$menu_items = wp_get_nav_menu_items(17);
			$last_3     = array_slice($menu_items, -3, 3, true);
			$removed    = array_splice($menu_items, count($menu_items) - 3, 3);
		?>

		<div class="menu__item no-ipad<?= ($currentPage == 'home' || $currentPage == NULL) ? ' active' : ''; ?> "><a href="<?= $homePage ?>"><?= mb_strtoupper(__('Home', 'menu')) ?></a></div>
		<div class="menu__item no-ipad<?= ($currentPage == 'sobre' || $currentPage == 'about-us') ? ' active' : ''; ?> "><a href="<?= $sobrePage ?>"><?= mb_strtoupper(__('Sobre', 'menu')) ?></a></div>
		<div class="menu__item no-ipad<?= ($currentPage == 'cursos' || $currentPage == 'workshops') ? ' active' : ''; ?>"><a href="<?= $cursosPage ?>"><?= mb_strtoupper(__('Cursos', 'menu')) ?></a></div>
		<div class="menu__item no-ipad<?= ($currentPage == 'equipe' || $currentPage == 'our-team') ? ' active' : ''; ?>"><a href="<?= $equipePage ?>"><?= mb_strtoupper(__('Equipe', 'menu')) ?></a></div>
		<div class="menu__item no-ipad openPopup"><a href="javascript:;"><?= mb_strtoupper(__('Intensivo em Panificação', 'menu')) ?></a></div>
		<div class="menu__item no-ipad<?= ($currentPage == 'contato' || $currentPage == 'contact') ? ' active' : ''; ?>"><a href="<?= $contatoPage ?>"><?= mb_strtoupper(__('Contato', 'menu')) ?></a></div>

		<div class="menu__item menu__logo">
			<a href="<?= $francepanificacao ?>">

				<div class="flip-container escola" ontouchstart="this.classList.toggle('hover');">
					<div class="flipper">
						<div class="front escola">
							<!-- front content -->
							<!--						<img src="-->
							<?//= get_template_directory_uri(); ?>
							<!--/assets/img/logos/logo-france-panificacao.svg" alt="">-->
						</div>
						<div class="back">
							<!-- back content -->
							<!--						<img src="-->
							<?//= get_template_directory_uri(); ?>
							<!--/assets/img/logos/logo-adb.svg" alt="">-->
						</div>
					</div>
				</div>

				<!-- <img class="<?= is_home() ? 'hidden' : '' ?>" src="<?= get_template_directory_uri(); ?>/assets/logos/logo_adb_line.svg" alt=""> -->
			</a>
		</div>
		<?php foreach ($last_3 as $item) : ?>
			<div class="menu__item no-ipad<?= ($currentPage == 'atelier-2-0' || $currentPage == 'atelie-2-0') ? ' active' : ''; ?>"><a href="<?= $item->url ?>"><?= __($item->title, 'menu'); ?></a></div>
		<?php endforeach ?>

		<div class="menu__item menu__social menu__social_instagram no-iphone">
			<a href="https://www.instagram.com/francepanificacao/" target="_blank">
				<img src="<?= get_template_directory_uri() . '/assets/icons/instagram.svg' ?>" alt="">
			</a>
		</div>
		<div class="menu__item menu__social menu__social_facebook no-iphone">
			<a href="https://www.facebook.com/francepanificacao/" target="_blank">
				<img src="<?= get_template_directory_uri() . '/assets/icons/facebook.svg' ?>" alt="">
			</a>
		</div>

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

		<a href="<?= $homePage; ?>">
			<h3 class="no-iphone firstBlue"><?= mb_strtoupper(__('Ateliê do boulanger', 'menu')) ?></h3>
		</a>

		<a class="menu__mobile_logolink" href="<?= $homePage ?>"><img class="menu__mobile_logo   iphone-only" src="<?= get_template_directory_uri(); ?>/assets/logos/logo_adb_full.svg" alt=""></a>

		<div class="ipadMenu<?= $currentPage == 'sobre' ? ' active' : ''; ?> "><a href="<?= $sobrePage ?>"><?= mb_strtoupper(__('Sobre', 'menu')) ?></a></div>
		<div class="ipadMenu<?= $currentPage == 'cursos' ? ' active' : ''; ?>"><a href="<?= $cursosPage ?>"><?= mb_strtoupper(__('Cursos', 'menu')) ?></a></div>
		<div class="ipadMenu<?= $currentPage == 'equipe' ? ' active' : ''; ?>"><a href="<?= $equipePage ?>"><?= mb_strtoupper(__('Equipe', 'menu')) ?></a></div>
		<div class="ipadMenu openPopup"><a href="javascript:;"><?= mb_strtoupper(__('Intensivo em Panificação', 'menu')) ?></a></div>
		<div class="ipadMenu<?= $currentPage == 'contato' ? ' active' : ''; ?>"><a href="<?= $contatoPage ?>"><?= mb_strtoupper(__('Contato', 'menu')) ?></a></div>
		<?php foreach ($last_3 as $item) : ?>
			<div class="menu__item ipadMenu<?= ($currentPage == 'atelier-2-0' || $currentPage == 'atelie-2-0') ? ' active' : ''; ?>"><a href="<?= $item->url ?>"><?= __($item->title, 'menu'); ?></a></div>
		<?php endforeach ?>
		<!--		<div class="ipadMenu menu__lang">-->
		<!--			<img class="no-iphone menu__lang_show" src="-->
		<?//= get_template_directory_uri(); ?>
		<!--/assets/img/icons/arrow-more.svg" alt="">-->
		<!--			<img class="iphone-only menu__lang_show" src="-->
		<?//= get_template_directory_uri(); ?>
		<!--/assets/img/icons/arrow-more-blue.svg" alt="">-->
		<!--			<ul>-->
		<!--				--><?php //echo_lang_menu(); 
								?>
		<!---->
		<!--			</ul>-->
		<!--		</div>-->
		<div class="menu__mobile_social">
			<a class="blue" href="https://www.instagram.com/francepanificacao/">
				<img src="<?= get_template_directory_uri() . '/assets/icons/instagram.svg' ?>" alt="">
			</a>
			<a class="red" href="https://www.facebook.com/francepanificacao/">
				<img src="<?= get_template_directory_uri() . '/assets/icons/facebook.svg' ?>" alt="">
			</a>
		</div>
	</div>
</div>