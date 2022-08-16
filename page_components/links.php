<?php

$homePage = get_home_url();

$sobrePage = get_page_link(get_page_by_path('sobre')->ID);
$cursosPage = get_page_link(get_page_by_path('cursos')->ID);
$equipePage = get_page_link(get_page_by_path('equipe')->ID);
$contatoPage = get_page_link(get_page_by_path('contato')->ID);
$page20 = get_page_link(get_page_by_path('atelier-2-0')->ID);
$francepanificacao = 'http://www.francepanificacao.com.br';

$currentPage = $wp_query->queried_object->post_name;
