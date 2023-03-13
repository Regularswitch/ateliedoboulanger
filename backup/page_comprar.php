<?php
/*
Template Name: comprar template
*/
?>

<?php get_header(); ?>
<?php include('page_components/links.php') ?>
<?php include_once('page_components/menu.php'); ?>

<div class="wrapper comprar">
	<?php
	$eventID = $_POST['eventid'];

	$event = get_post($eventID);
	$event_nivel = wpautop(get_post_meta($eventID, 'nivel', true));
	$event_dateStart = get_post_meta($eventID, 'date_start', true);
	$event_dateEnd = get_post_meta($eventID, 'date_end', true);


	$curso = get_post(get_post_meta($eventID, 'curso', true)[0]);
	$cursoID = $curso->ID;
	$curso_detail = wpautop(get_post_meta($cursoID, 'detail', true));
	$curso_price = wpautop(get_post_meta($cursoID, 'price', true));

	?>
	<div class="comprar__panel_top">
		<div class="comprar__curso_reusme">
			<h2 class="blue"><?= $curso->post_title ?></h2>
			<div class="text blue">
				<?php echo date("d/m/Y", strtotime($event_dateStart)); ?>
				<?= __(' até ', 'atelie'); ?>
				<?php echo date("d/m/Y", strtotime($event_dateEnd)); ?>
			</div>
			<div class="text blue bold"><?= $curso_detail ?></div>
		</div>
	</div>




	<div class="comprar__form">

		<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">

			<div class="comprar__pessoa">
				<div><input type="radio" name="pessoas" id="pessoas_fisica" value="pessoas_fisica" class="pessoas_fisica"
							checked>
					<label for="pessoas_fisica" class="text blue"><?= __('Pessoas fisicas', 'atelie'); ?></label>
				</div>

				<div><input type="radio" name="pessoas" id="pessoas_juridica" value="pessoas_juridica" class="pessoas_juridica">
					<label for="pessoas_juridica" class="text blue"><?= __('Pessoas juridicas', 'atelie'); ?></label>
				</div>
			</div>
			<input type="text" name="name" class="input100 fisica" placeholder="<?= __('Nome completo', 'atelie'); ?>" required>
			<input type="text" name="razaosocial" class="input100 juridica" placeholder="<?= __('Razao social', 'atelie'); ?>" >
			<input type="text" name="nomefantasia" class="input100 juridica" placeholder="<?= __('Nome Fantasia', 'atelie'); ?>" >

			<input type="text" name="adress" class="input100" placeholder="<?= __('Enderco', 'atelie'); ?>" required>
			<div class="clear"></div>

			<input type="text" name="cep" class="input30_left" placeholder="<?= __('CEP', 'atelie'); ?>" required>
			<input type="text" name="uf" class="input30_middle" placeholder="<?= __('UF', 'atelie'); ?>" required>
			<input type="text" name="cidade" class="input30_right" placeholder="<?= __('Cidade', 'atelie'); ?>"
				   required>


			<input type="text" name="tel" class="input50_left" placeholder="<?= __('Telefone', 'atelie'); ?>" required>
			<input type="email" name="email" class="input50_right" placeholder="<?= __('E-mail', 'atelie'); ?>"
				   required>

			<input type="text" name="rg" class="input30_left fisica"
				   placeholder="<?= mb_strtoupper(__('rg', 'atelie')); ?>" requiredv>
			<input type="text" name="cpf" class="input30_middle fisica"
				   placeholder="<?= mb_strtoupper(__('cpf', 'atelie')); ?>" required>

			<input type="date" name="birthday" class="input100 fisica"
				   placeholder="<?= __('Data de anniversario dia/mes/ano', 'atelie'); ?>" required>
			<input type="text" name="empresa" class="input100 fisica" placeholder="<?= __('Empresa', 'atelie'); ?>"
				   required>

			<input type="text" name="cnpj" class="input50_left juridica" placeholder="<?= __('CNPJ', 'atelie'); ?>">
			<input type="text" name="ie" class="input50_right juridica" placeholder="<?= __('I.E', 'atelie'); ?>">

			<input type="number" name="quantidade" class="quantite" min="1" placeholder="<?= __('Qtde', 'atelie'); ?>"
				   required>

			<div class="input30_middle text blue comprar__curso_price">
				<h5 class="blue bold">X R$ <?= wp_strip_all_tags($curso_price) ?></h5>
			</div>
			<div class="comprar__total_price">
				<h5 class="blue bold upper"></h5>
			</div>

			<div class="clear"></div>

			<input type="hidden" name="action" value="comprar_form">
			<input type="hidden" name="eventidcomprar" value="<?= $eventID ?>">
			<input class="button comprar__form_button" name="subscribe" type="submit"
				   value="<?= mb_strtoupper(__('Comprar', 'atelie')); ?>">
			<div class="clear"></div>
		</form>
	</div>
	<div class="comprar__picto_container no-ipad">
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

	<div class="single__picto_container_ipad no-iphone ipad-only">

		<img class="pain16" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain16.png"
			 data-bottom-top="top: 150px;"
			 data-top-bottom="top: 100px;"
			 alt="">
		<img class="pain10" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain10.png"
			 data-bottom-top="top: 380px;"
			 data-top-bottom="top: 330px;"
			 alt="">

		<img class="picto2__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto2.png"
			 data-bottom-top="top: 120px;"
			 data-top-bottom="top: 80px;"
			 alt="">
	</div>

	<div class="single__picto_container_iphone iphone-only">

	</div>
</div>

<?php include_once('page_components/footer.php'); ?>
<?php get_footer(); ?>
