<?php
/*
Template Name: calendar template
*/
?>
	<script type="text/javascript">
		var template_uri = '<?php echo get_theme_file_uri(); ?>';
	</script>

<?php include('links.php') ?>
<?php
$dayOfWeek = array(__('DOM', 'calendario'), __('SEG', 'calendario'), __('TER', 'calendario'), __('QUA', 'calendario'), __('QUI', 'calendario'), __('SEX', 'calendario'), __('SAB', 'calendario'));
?>

	<div class="calendar" id="agendar">
		<div class="calendar__title">
			<h1 class="blue"><?= __('agendar', 'calendario'); ?></h1>
		</div>
		<div class="calendar__container">
			<div class="calendar__resume">

				<div class="calendar__resume_inactive"><?= mb_strtoupper(__('ESGOTADO', 'calendario')); ?></div>

				<div class="calendar__head">
					<div class="calendar__day">
						<h5 class="text white upper" ><?= $dayOfWeek[date('w')];?></h5>
					</div>
					<div class="calendar__day_number text white"><?= date('d'); ?></div>
				</div>
				<div class="calendar__content">
					<div class="curso__title text upper white fontBlack"></div>
					<div class="button button__border button_curso button__curso_carte">
						<a href="<?= get_page_link(get_page_by_title('Contato')->ID) ?>" id="cadastro_link" data-link="<?= get_page_link(get_page_by_title('Contato')->ID) ?>"><?= mb_strtoupper(__('Entrar em contato', 'calendario')); ?></a>
					</div>
					<div class="button button__border button_curso button__curso_special">
						<!-- <a href="" id="cadastro_link"><?= mb_strtoupper(__('Inscrever-se', 'calendario')); ?></a> -->
						<a href="<?= $contatoPage ?>"><?= mb_strtoupper(__('Matricule-se', 'calendario')); ?></a>
					</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="calendar--wrapper">
				<div id="divCal"></div>
			</div>
		</div>
	</div>