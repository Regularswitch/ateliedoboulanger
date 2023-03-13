<?php
/*
Template Name: Cursos template
*/
?>

<?php get_header(); ?>
<?php include('page_components/links.php') ?>
<?php include_once('page_components/menu.php'); ?>



<div class="wrapper cursos">

	<div class="cursos__header">
		<div class="cursos__header_title">
			<div class="cursos__header_tite--left">
				<div class="text--number blue">4</div>
			</div>
			<div class="cursos__header_tite--right">
				<h1 class="firstBlue"><?= __('Niveis<br> de cursos', 'atelie'); ?></h1>
				<h1 class="firstBlue regular"></h1>
			</div>
			<div class="clear"></div>
		</div>
		<?php
		$queryNivels = array(
			'posts_per_page'   	=> -1,
			'post_type'		   	=> 'cursos_posts',
			'category_name'		=> 'curso-nivel',
			'orderby'		  	=> 'menu_order',
			'order'				=> 'DESC',
			'post_status'	  	=> 'publish',
			'suppress_filters' 	=> true
		);
		$postsNivels = get_posts( $queryNivels );
		$today = date('Ymd');

		$queryEvents = array(
			'posts_per_page'   	=> -1,
			'post_type'		   	=> 'events',
			'orderby'		  	=> 'meta_value',
			'meta_query' => array(
				array(
					'key'		=> 'date_start',
					'compare'	=> '>=',
					'value'		=> $today,
				),
			),
			'order'				=> 'ASC',
			'post_status'	  	=> 'publish',
			'suppress_filters' 	=> true
		);
		$postsEvents= get_posts( $queryEvents);



		?>
		<div class="cursos__header_onglets">
			<?php
				foreach($postsNivels as $keyniv => $postniv) {
					$key = $keyniv + 1;
					echo '<h4 class="onglet onglet_'.$key.' blue '. ($key == 1 ? 'active' : '') .'" data-tab="'.$key.'" '. ($key == 1 ? 'data-mobile="'.__('Amadores', 'atelie').'" data-desktop="'.__('Padeiros amadores', 'atelie').'"' : '') .'>'.$postniv->post_title.'</h4> <!-- Ecrire amadores en 21px pour iphone -->';
			}
			?>

			<span class="lineIndicator"></span>
		</div>


		<form action="<?= $lien ?>">
			<input type="hidden" value="<?= $eventID ?>">
			<buttom type="submit"></buttom>

		</form>

		<div class="cursos__header_tabs">
			<?php
			foreach($postsNivels as $keyniv => $postniv) {
				$key = $keyniv + 1;
				$postID = $postniv->ID;

				$i = -1;
				$eventCurso = -1;
				$classInactive = '';
				do {
					$i++;
					$eventID = $postsEvents[$i]->ID;
					$eventAvailability =  get_post_meta($eventID, 'available', true)[0];
					if($eventAvailability == 1) {
						$eventCurso =  get_post_meta($eventID, 'curso', true)[0];
					} else {
						$eventCurso = -1;
					}
				} while(($eventCurso != $postID) AND ($i < count($postsEvents)));

				if($i >= count($postsEvents)) {
					$classInactive = 'inactive';
				}

				switch($key) {
					case 1:
						$pictosHtml = '
							<img class="picto1" src="'.get_template_directory_uri().'/assets/img/pains/pain02.png">
							<img class="picto2" src="'.get_template_directory_uri().'/assets/img/pains/pain16.png">
							<img class="picto3" src="'.get_template_directory_uri().'/assets/img/pains/pain07.png">
							
							<img class="picto4" src="'.get_template_directory_uri().'/assets/picto/bleu/picto7.png">
							<img class="picto5" src="'.get_template_directory_uri().'/assets/picto/bleu/picto6.png">
							<img class="picto6" src="'.get_template_directory_uri().'/assets/picto/bleu/picto8.png">
							<img class="picto7" src="'.get_template_directory_uri().'/assets/picto/rouge/picto1.png">
						';
						break;
					case 2:
						$pictosHtml = '
							<img class="picto8 away" src="'.get_template_directory_uri().'/assets/img/pains/pain11.png">
							<img class="picto9 away" src="'.get_template_directory_uri().'/assets/img/pains/pain01.png">
							<img class="picto10 away" src="'.get_template_directory_uri().'/assets/img/pains/pain13.png">
							
							<img class="picto11 away" src="'.get_template_directory_uri().'/assets/picto/rouge/picto3.png">
							<img class="picto12 away" src="'.get_template_directory_uri().'/assets/picto/bleu/picto5.png">
							<img class="picto13 away" src="'.get_template_directory_uri().'/assets/picto/bleu/picto4.png">
							<img class="picto14 away" src="'.get_template_directory_uri().'/assets/picto/rouge/picto14.png">
						';
						break;
					case 3:
						$pictosHtml = '
							<img class="picto15 away" src="'.get_template_directory_uri().'/assets/img/pains/pain15.png">
							<img class="picto16 away" src="'.get_template_directory_uri().'/assets/img/pains/pain08.png">
							
							<img class="picto18 away" src="'.get_template_directory_uri().'/assets/picto/bleu/picto2.png">
							<img class="picto19 away" src="'.get_template_directory_uri().'/assets/picto/rouge/picto10.png">
							<img class="picto20 away" src="'.get_template_directory_uri().'/assets/picto/bleu/picto6.png">
							<img class="picto21 away" src="'.get_template_directory_uri().'/assets/picto/rouge/picto9.png">
						';
						break;
					case 4:
						$pictosHtml = '
							<img class="picto22 away" src="'.get_template_directory_uri().'/assets/img/pains/pain09.png">
							<img class="picto23 away" src="'.get_template_directory_uri().'/assets/img/pains/pain04.png">
						
							
							<img class="picto25 away" src="'.get_template_directory_uri().'/assets/picto/rouge/picto12.png">
							<img class="picto26 away" src="'.get_template_directory_uri().'/assets/picto/bleu/picto15.png">
							<img class="picto27 away" src="'.get_template_directory_uri().'/assets/picto/rouge/picto8.png">
							<img class="picto28 away" src="'.get_template_directory_uri().'/assets/picto/bleu/picto13.png">
						';
						break;
				}

			echo '<div class="tab tab_'.$key.' '. ($key == 1 ? 'active shown' : '') .'">
					<div class="tab__left pictos_'.$key.'">'.$pictosHtml.'</div> 
					<div class="tab__right">
					
						<h4 class="black">'.get_post_meta($postID, 'subtitle', true).'</h4>
						<div class="text bold">'.get_post_meta($postID, 'intro', true).'</div>
						
						<div class="text">'.$postniv->post_content.'</div>
						<a class="tabs__link button '.$classInactive.'" href="javascript:;"  data-id="'.$eventCurso.'">'.__('Agendar', 'atelie').'</a>
						<div class="tabs__esgotado '.$classInactive.'">'. mb_strtoupper(__('Em breve', 'atelie')) .'</div>
					</div>
					<div class="clear"></div>
				</div>';

			}

			?>


		</div>
	</div>

	<div class="cursos__specials">
		<div class="cursos__specials_title">
			<h1 class="firstBlue"><?= __('Cursos especiais', 'atelie'); ?></h1>
			<div class="text bold"><?= __('Com esse curso você pode dar mais ênfase às suas habilidades. No nível essencial você conta com workshops temáticos e desenvolve receitas e técnicas.', 'atelie'); ?></div>
			<div class="clear"></div>
		</div>

		<div class="cursos__specials_content highlights">
			<?php

				$queryCursos = array(
					'posts_per_page'   	=> -1,
					'post_type'		   	=> 'cursos_posts',
					'category_name'		=> 'curso-especial',
					'orderby'		  	=> 'menu_order',
					'order'				=> 'ASC',
					'post_status'	  	=> 'publish',
					'suppress_filters' 	=> true
				);
				$postsCursos = get_posts( $queryCursos );

				$cursosInfos = array();
				foreach($postsCursos as $key => $curso) {
					$cursoID = $curso->ID;

//					$subtitle = get_post_meta($cursoID, 'nivel', true);
					$time = wpautop(get_post_meta($cursoID, 'detail', true));
					$intro = wpautop($curso->post_content);
					$content = wpautop(get_post_meta($cursoID, 'objectifs', true));

					$price = get_post_meta($cursoID, 'price', true);

					$available = get_post_meta($cursoID, 'available', true);
					$pastillenew= get_post_meta($cursoID, 'pastille_new', true);
					$disconto = get_post_meta($cursoID, 'disconto', true);

					$link = get_permalink($cursoID);
					$galleryIDs = explode( ',', get_post_meta($cursoID, '_easy_image_gallery', true));
					$gallery = array();
					foreach ($galleryIDs as $key2 => $galleryID) {
						array_push($gallery, wp_get_attachment_url($galleryID));
					}

					$chefID = unserialize(get_post_meta($cursoID)['teacher'][0])[0];
					$chefInfos = get_post($chefID);
					$chef = array(
						'title' => $chefInfos->post_title,
						'subtitle' => get_post_meta($chefID, 'subtitle', true),
						'img' => get_image_url($chefID,'medium')
					);
//					$status = $available;
					$type = get_post_meta($cursoID, 'type', true);
					$i = -1;
					do {
						$i++;
						$eventID = $postsEvents[$i]->ID;
						$eventAvailability =  get_post_meta($eventID, 'available', true)[0];
						if($eventAvailability == 1) {
							$eventCurso =  get_post_meta($eventID, 'curso', true)[0];
						} else {
							$eventCurso = -1;
						}
					} while(($eventCurso != $cursoID) AND ($i < count($postsEvents)));

					if($i < count($postsEvents)) {
						$dateStartRaw = get_post_meta($eventID, 'date_start', true);
						$dateEndRaw = get_post_meta($eventID, 'date_end', true);

						$dateStart = date("d.m.Y", strtotime($dateStartRaw));
						$dateEnd = date("d.m.Y", strtotime($dateEndRaw));

						$dateStartJS = date("dmY", strtotime($dateStartRaw));
						$dateEndJS = date("dmY", strtotime($dateEndRaw));
					} else {
						$dateStart = null;
						$dateEnd = null;
						$available = 0;
					}






//					array_push($eventsList, array($dateStart, $dateEnd));

					array_push($cursosInfos, array(
						'id' => $cursoID,
						'title' => $curso->post_title,
//						'subtitle' => $subtitle,
						'dateStart' => $dateStart,
						'dateEnd' => $dateEnd,
						'intro' => $intro,
						'time' => $time,
						'content' => $content,
						'price' => $price,
						'chef' => $chef,
						'link' => $link,
						'gallery' => $gallery,
						'duration' => -1,
						'status' => $available,
						'type' => $type
					));

					if(!$available) {
						$class = ' esgotado';
					} else if($pastillenew) {
						$class = ' new';
					} else if($disconto) {
						$class = ' disconto';
					} else {
						$class = '';
					}

					$isLastOfRow = ($key + 1) % 3;// == 0 ? 'highlights__item_row' :  ($key + 1) % 3 == 2 ? 'highlights__item_2' : '';
					echo '<div class="highlights__items highlights__item_action highlights__item_'.($key + 1).''. $class .'" data-key="'.($key + 1).'" data-id="'.$cursoID.'">
							<img class="highlights__items_cover" src="'.get_image_url($cursoID, 'medium').'" alt="">
							<img src="'.get_template_directory_uri().'/assets/icons/icon_new.png" class="rollover_new">
							<div class="rollover_esgotado">'. mb_strtoupper(__('Em breve', 'atelie')) .'</div>
							<h3 class="rollover__disconto black">'.$disconto.'%</h3>
							<div class="cursos__specials_content--rollover container">

								<div class="rollover__intro">
									<div class="title text white fontBlack filet__bottom">'.mb_strtoupper($curso->post_title).'</div>

									<div class="text white rollover_type">'.mb_strtoupper($dateStart).'</div>
								</div>
								

									<div class="rollover__infos belowDesktop">
									<div class="rollover__infos_close"><img src="'.get_template_directory_uri().'/assets/icons/close_white.svg"></div>

									<div class="box__right">
										
										<div class="box__right_head">
											<div class="box__right_title">
												<h2 class="box__title"></h2>
												
												<span class="separator"></span>
												<div class="clear"></div>
	
											</div>
	
											<div class="box__right_date text bold">
												<!--<div class="box__date_days"></div>-->
												<div class="box__date_time"></div>
												<span class="separator"></span>
											</div>
										</div>
										<div class="box__right_teacher">
											<div class="box__left_img">
												<img src="" alt="">
											</div>
											<div class="box__right_teacher--infos">
												<h4 class="box__left_title black"></h4>
												<div class="box__left_separator"></div>
												<div class="box__left_subtitle text fontBlack"></div>
											</div>
											<div class="clear"></div>
										</div>	
										<div class="clear"></div>
										

										<div class="box__right_intro text bold white"></div>
										<div class="box__right_content text white"></div>

										<div class="box__right_bottom">
											<h2 class="box__bottom_price regular">
												<span>R$</span>
												<span class="price"></span>
											</h2>


										
											
										</div>
										<a class="box__right_link agendar__link_ipad" href="javascript:;"  data-id="'.$cursoID.'"><div class="button red">'.mb_strtoupper(__('Agendar', 'atelie')).'</div></a>


									</div>	
									<div class="cursos__specials_gallery gallery__mobile">
									</div>
								</div>
							</div>
							<span class="bottom_left"></span>
							<img class="bottom_img" src="'.get_template_directory_uri().'/assets/icons/cursos_mask.svg" alt="">
							<span class="bottom_right"></span>
						  </div>';
					$isLastOfRow = '';
				}



				$dateStartRaw = '';
				$dateEndRaw = '';
				$dateStart = '';
				$dateEnd = '';
				$eventsList = array();
				foreach($postsEvents as $key => $event) {
					$eventID = $event->ID;

					$dateStartRaw = get_post_meta($eventID, 'date_start', true);
					$dateEndRaw = get_post_meta($eventID, 'date_end', true);
					$dateStart = date("d.m.Y", strtotime($dateStartRaw));
					$dateEnd = date("d.m.Y", strtotime($dateEndRaw));

					$available = get_post_meta($eventID, 'available', true);

					$curso = get_post(get_post_meta($eventID, 'curso', true)[0]);
					$cursoID = $curso->ID;
					$link = get_permalink($eventID);
					$type = get_the_category($cursoID)[0]->slug;


					array_push($eventsList, array(
						'id' => $eventID,
						'dateStart' => $dateStart,
						'dateEnd' => $dateEnd,
						'curso' => $cursoID,
						'title' => $curso->post_title,
						'link' => $link,
						'duration' => -1,
						'status' => $available,
						'type' => $type,
						'raw' => $dateStartRaw
					));
				}
			?>

			<script>
				setEvents(<?= json_encode($eventsList) ?>);
				getCursosInfos(<?= json_encode($cursosInfos) ?>);
			</script>

			<div class="clear"></div>
		</div>

		<section class="cursos__specials_box">

			<div class="cursos__specials_boxcontent">
				<div class="box__left">
					<div class="box__left_img">
						<img src="" alt="">

					</div>
					<div class="box__left_title text fontBlack"></div>
					<div class="box__left_separator"></div>
					<div class="box__left_subtitle text"></div>

				</div>
				<div class="box__right">
					<div class="box__right_title">
						<h2 class="box__title"></h2>
<!--						<h2 class="box__title_sub regular">-->
<!--							<span>--><?//= mb_strtoupper(__('Nível', 'atelie')); ?><!--</span>-->
<!--							<span class="sub_nivel"></span>-->
<!--						</h2>-->
						<span class="separator"></span>
						<div class="clear"></div>

					</div>

					<div class="box__right_date text bold">
						<div class="box__date_days"></div>
						<div class="box__date_time"></div>
						<span class="separator"></span>
					</div>

					<div class="box__right_intro text bold white"></div>
					<div class="box__right_content text white"></div>

					<div class="box__right_bottom">
						<a class="box__right_link agendar__link_box" href="" data-id=""><div class="button red"><?= mb_strtoupper(__('Agendar', 'atelie')); ?></div></a>
						<h2 class="box__bottom_price regular">
							<span>R$</span>
							<span class="price"></span>
						</h2>
					</div>


				</div>

				<div class="clear"></div>

			</div>

			<div class="cursos__specials_pagination">
<!--				<div class="pagination firstPagination active"><span></span></div>-->
<!--				<div class="pagination" data-id="1"><span></span></div>-->
<!--				<div class="pagination" data-id="2"><span></span></div>-->
			</div>

			<div class="cursos__specials_gallery">
<!--				<img src="--><?//= get_template_directory_uri(); ?><!--/assets/tmp/5.png" alt="" class="img_1">-->
<!--				<img src="--><?//= get_template_directory_uri(); ?><!--/assets/tmp/4.png" alt="" class="img_2">-->
			</div>


		</section>

		<div class="cursos__alacarte">
			<div class="title_container">
				<h3 class="blue"><?= __('cursos', 'atelie'); ?></h3>
				<h1 class="blue"><?= __('à la carte', 'atelie'); ?></h1>
				<div class="cursos__alacarte_button belowIpad">
					<img class="alacarte__button" src="<?= get_template_directory_uri(); ?>/assets/icons/page__cursos_button.png" alt="">
				</div>
			</div>

			<div class="cursos__alacarte_button aboveIpad">
				<img class="alacarte__button" src="<?= get_template_directory_uri(); ?>/assets/icons/page__cursos_button.png" alt="">
			</div>

			<div class="curso__pictos_container">
				<img class="picto1__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto1.png" alt="">
				<img class="picto2__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto2.png" alt="">
				<img class="picto4__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto4.png" alt="">
				<img class="picto6__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto6.png" alt="">
				<img class="picto15__blue" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto15.png" alt="">
				<img class="pictoMobile1" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain14.png" alt="">
				<img class="pictoMobile2" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain11.png" alt="">
			</div>

			<?php
			$queryCartes = array(
				'posts_per_page'   	=> -1,
				'post_type'		   	=> 'cursos_posts',
				'category_name'		=> 'curso-carte',
				'orderby'		  	=> 'menu_order',
				'order'				=> 'ASC',
				'post_status'	  	=> 'publish',
				'suppress_filters' 	=> true
			);

			$postsCartes= get_posts( $queryCartes);
			?>
			<div class="content__container">
				<div class="content__container_title">
					<h4 class="blue bold"><?= get_post_meta($postsCartes[0]->ID, 'subtitle', true); ?></h4>
				</div>

				<div class="content__container_content">
					<div class="content_left text blue bold">
						<?= get_post_meta($postsCartes[0]->ID, 'intro', true); ?>
					</div>
					<div class="content_right text blue">
						<div>
							<?= wpautop($postsCartes[0]->post_content); ?>
						</div>
						<div class="content__container_button button">
							<a href="<?= get_page_link(get_page_by_title('Contato')->ID) ?>">
								<?= mb_strtoupper(__('entrar em contato', 'atelie')); ?>
							</a>
						</div>
					</div>
				</div>

				<img class="pictos__1" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto5.png" alt="">
				<img class="pictos__2" src="<?= get_template_directory_uri(); ?>/assets/picto/bleu/picto7.png" alt="">
				<img class="pictos__3" src="<?= get_template_directory_uri(); ?>/assets/img/pains/pain11.png" alt="">

			</div>
		</div>

		<?php include_once('page_components/calendar.php'); ?>
	</div>

	<div class="wrapper__footer">
		<div class="wrapper__footer_newsletter">
			<h5 class="upper"><?= __('Newsletter', 'atelie'); ?></h5>
			<div class="text white"><?= __('Receba nossas novidades através da newsletter !', 'atelie'); ?></div>
			<a href="http://eepurl.com/cpC9gv" class="button red" target="_blank"><?= __('Inscrever-se', 'atelie'); ?></a>
		</div>
		<div id="map"></div>
		<div class="clear"></div>
	</div>
</div>

<?php include_once('page_components/footer.php'); ?>
<?php get_footer(); ?>
