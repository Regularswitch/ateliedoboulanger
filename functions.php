<?php

// Allow Featured Images
add_theme_support('post-thumbnails');

// Remove admin bar
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header()
{
	remove_action('wp_head', '_admin_bar_bump_cb');
}

;

// Prevent HTTP Error when uploading images to the back office
add_filter('wp_image_editors', 'change_graphic_lib');
function change_graphic_lib($array)
{
	return array('WP_Image_Editor_GD', 'WP_Image_Editor_Imagick');
}

;

function truncate($string, $length, $stopanywhere = false)
{
	//truncates a string to a certain char length, stopping on a word if not specified otherwise.
	if (strlen($string) > $length) {
		//limit hit!
		$string = substr($string, 0, ($length - 3));
		if ($stopanywhere) {
			//stop anywhere
			$string .= '...';
		} else {
			//stop on a word.
			$string = substr($string, 0, strrpos($string, ' ')) . '&nbsp;&hellip;';
		}
	}
	return $string;
}

function get_image_url($id, $size = 'full')
{
	$att = wp_get_attachment_image_src(get_post_thumbnail_id($id), $size);
//		if(empty($att)) {
//			$o_ID = icl_object_id($id, 'post', false, 'pt-br');
//			$att = wp_get_attachment_image_src( get_post_thumbnail_id($o_ID), $size);
//		}
	return $att[0];
}

function get_gallery($id)
{
	$gallery = json_decode(get_post_meta($id, '_rsw_gallery_images', true));
	if (empty($gallery)) {
		$o_ID = icl_object_id($id, 'post', false, 'pt-br');
		$gallery = json_decode(get_post_meta($o_ID, '_rsw_gallery_images', true));
	}
	return $gallery;
}

function prefix_send_email_to_admin()
{
	/**
	 * At this point, $_GET/$_POST variable are available
	 *
	 * We can do our normal processing here
	 */

	// Sanitize the POST field
	// Generate email content
	// Send to appropriate email

	if (isset($_POST['action']) && $_POST['action'] == 'contact_form') {
		if (trim($_POST['name']) === '') {
			$nameError = 'Please enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['name']);
		}
		if (trim($_POST['email']) === '') {
			$emailError = 'Please enter your email address.';
			$hasError = true;
		} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
		if (trim($_POST['subject']) === '') {
			$subjectError = 'Please enter a subject.';
			$hasError = true;
		} else {
			$subject = trim($_POST['subject']);
		}
		if (trim($_POST['message']) === '') {
			$contentError = 'Please write a message.';
			$hasError = true;
		} else {
			$message = trim($_POST['message']);
		}
		if (trim($_POST['tel']) !== '') {
			$tel = trim($_POST['tel']);
		} else {
			$tel = '';
		}


		if (!isset($hasError)) {
			$emailTo = get_option('tz_email');
			if (!isset($emailTo) || ($emailTo == '')) {
				$emailTo = get_option('admin_email');
			}
			$subject = 'Contato Informações - ' . $subject;
			$body = "$message \n\nFrom: $name \nEmail: $email \nT.: $tel";
			$headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n" . 'Reply-To: ' . $email;

			wp_mail('contato@ateliedoboulanger.com.br', $subject, $body, $headers);
			$emailSent = true;
			wp_redirect(get_page_link(get_page_by_path('contato')->ID) . '?emailSent=1');
		} else {
			wp_redirect(get_page_link(get_page_by_path('contato')->ID) . '?emailSent=0');
		}

	}
}

add_action('admin_post_nopriv_contact_form', 'prefix_send_email_to_admin');
add_action('admin_post_contact_form', 'prefix_send_email_to_admin');

remove_filter('the_content', 'easy_image_gallery_append_to_content');

function prefix_send_email_to_admin_comprar(){

	$eventID = $_POST['eventidcomprar'];
	$event_permalien = get_permalink($eventID);
	$event_dateStart = get_post_meta($eventID, 'date_start', true);
	$event_dateEnd = get_post_meta($eventID, 'date_end', true);

	$curso = get_post(get_post_meta($eventID, 'curso', true)[0]);
	$cursoID = $curso->ID;
	$curso_title = $curso->post_title;
	$curso_price = get_post_meta($cursoID, 'price', true);;
	if (isset($_POST['action']) && $_POST['action'] == 'comprar_form') {

		if (isset($_POST['pessoas']) && $_POST['pessoas'] == 'pessoas_fisica') {

			if (trim($_POST['name']) === '') {
				$nameError = 'Please enter your name.';
				$hasError = true;
			} else {
				$name = trim($_POST['name']);
				$formName = $name;
			}

			if (trim($_POST['rg']) === '') {
				$subjectError = 'Please enter a RG.';
				$hasError = true;
			} else {
				$rg = trim($_POST['rg']);
			}

			if (trim($_POST['cpf']) === '') {
				$subjectError = 'Please enter a CPF.';
				$hasError = true;
			} else {
				$cpf = trim($_POST['cpf']);
			}

			if (trim($_POST['birthday']) === '') {
				$subjectError = 'Please enter your birthday.';
				$hasError = true;
			} else {
				$birthday = trim($_POST['birthday']);
			}

			if (trim($_POST['empresa']) === '') {
				$contentError = 'Please write an empresa.';
				$hasError = true;
			} else {
				$empresa = trim($_POST['empresa']);
			}

			$content = "Nome: $name\n RG: $rg\n CPF: $cpf\n Data Aniversario: $birthday\n Empresa: $empresa\n";
		}

		if (isset($_POST['pessoas']) && $_POST['pessoas'] == 'pessoas_juridica') {

			if (trim($_POST['razaosocial']) === '') {
				$contentError = 'Please write a social reason.';
				$hasError = true;
			} else {
				$razaosocial = trim($_POST['razaosocial']);
				$formName = $razaosocial;
			}

			if (trim($_POST['nomefantasia']) === '') {
				$contentError = 'Please write a nome fantasia.';
				$hasError = true;
			} else {
				$nomefantasia = trim($_POST['nomefantasia']);
			}

			if (trim($_POST['cnpj']) === '') {
				$contentError = 'Please write a CNPJ.';
				$hasError = true;
			} else {
				$cnpj = trim($_POST['cnpj']);
			}

			if (trim($_POST['ie']) === '') {
				$contentError = 'Please write an I.E.';
				$hasError = true;
			} else {
				$ie = trim($_POST['ie']);
			}

			$content = "Razao social: $razaosocial\n Nome Fantasia: $nomefantasia\n CNPJ: $cnpj\n I.E: $ie\n";
		}

		if (trim($_POST['adress']) === '') {
			$subjectError = 'Please enter an adress.';
			$hasError = true;
		}  else {
			$adress = trim($_POST['adress']);
		}

		if (trim($_POST['cep']) === '') {
			$subjectError = 'Please enter a CEP.';
			$hasError = true;
		} else {
			$cep = trim($_POST['cep']);
		}

		if (trim($_POST['uf']) === '') {
			$subjectError = 'Please enter a UF.';
			$hasError = true;
		} else {
			$uf = trim($_POST['uf']);
		}

		if (trim($_POST['cidade']) === '') {
			$subjectError = 'Please enter a cidade.';
			$hasError = true;
		} else {
			$cidade = trim($_POST['cidade']);
		}

		if (trim($_POST['tel']) !== '') {
			$tel = trim($_POST['tel']);
		} else {
			$tel = '';
		}

		if (trim($_POST['email']) === '') {
			$emailError = 'Please enter your email address.';
			$hasError = true;
		} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		if (trim($_POST['quantidade']) === '') {
			$contentError = 'Please write a quantidade.';
			$hasError = true;
		} else {
			$quantidade = trim($_POST['quantidade']);
		}

		$totalPrice = $quantidade * $curso_price;
		$commonContent =  "Enderco: $adress\n CEP: $cep\n UF: $uf\n Cidade: $cidade\n";
		$cursoContent = "Curso: $curso_title\n Data: $event_dateStart ao $event_dateEnd\n Preço: $curso_price\n Quantidade: $quantidade \n Total: $totalPrice";

		if (!isset($hasError)) {
			$emailTo = get_option('tz_email');
			if (!isset($emailTo) || ($emailTo == '')) {
				$emailTo = get_option('admin_email');
			}
			$subject = 'Curso Agendamento - ' . $curso_title;
			$body = "From: $formName \nEmail: $email \nT.: $tel\n\n $cursoContent\n\n $content \n\n $commonContent\n ";

			$headers = 'From: ' . $formName . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;

			wp_mail('contato@ateliedoboulanger.com.br', $subject, $body, $headers);
			$emailSent = true;
			wp_redirect($event_permalien . '?emailSent=1');
		} else {
			wp_redirect($event_permalien . '?emailSent=0');
		}
	}

}

add_action('admin_post_nopriv_comprar_form', 'prefix_send_email_to_admin_comprar');
add_action('admin_post_comprar_form', 'prefix_send_email_to_admin_comprar');

