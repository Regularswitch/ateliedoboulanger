<?php
$langs = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
// var_dump($langs);exit;
$activeLang = "pt-br";
$activeLangCode = "pt-br";

function echo_lang_menu(){
	// global $langs;
	//   	global $activeLang;
	//   	global $activeLangCode;
	echo get_lang_menu();
}
function get_lang_menu(){
	global $langs;
	global $activeLang;
	global $activeLangCode;
	$response = '';
	$i=1;
	if(count($langs) >= 1){
		foreach($langs as $lang){
			$code = substr($lang["language_code"],0,2);
			$name = substr($lang['native_name'],0);
			// if($code == "pt"){
			//     $code = "br";
			// }
			if($lang["active"]){
				$activeLang = substr($lang["language_code"],0,2);
				$activeLangCode = $lang["language_code"];
				$response = '<li class="'.($lang["active"] ? "active":"").'"><a href="'.$lang["url"].'">'.mb_strtoupper($name).'</a></li>'.$response;
			} else {
				$response .= '<li class="' . ($lang["active"] ? "active" : "") . '"><a href="' . $lang["url"] . '">' . mb_strtoupper($name) . '</a></li>';
			}

			$i++;
		}
	}

	return $response;
}
function get_lang(){
	global $langs;
	global $activeLang;
	global $activeLangCode;
	foreach($langs as $lang) {
		$code = substr($lang["language_code"],0,2);
		// if($code == "pt"){
		//     $code = "br";
		// }
		if($lang["active"]){
			$activeLang = substr($lang["language_code"],0,2);
			$activeLangCode = $lang["language_code"];
			return $activeLang;
		}
	}
}
function get_other_lang(){
	global $langs;
	global $activeLang;
	global $activeLangCode;

	if($activeLang == 'en') {
		return 'pt';
	} else {
		return 'en';
	}

}
function get_active_lang() {

	global $activeLang;
	return $activeLang;
}