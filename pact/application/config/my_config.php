<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$CI = &get_instance();
$CI->config->load();
define('FOLDERNAME','');
$config['site_name'] = 'Pact';
$config['site_link'] = 'http://localhost:8080/pact/';
$config['site_email'] = 'nirdosh.shrestha2@hotmail.com';

$config['site_path'] = $CI->config->item('base_url');	
$config['admin_dir'] = 'admin';
$config['admin_path'] = $config['site_path'].$config['admin_dir'].'/';

$config['site_root'] = $_SERVER['DOCUMENT_ROOT'].'Slink/';

// Define assets path
$config['assets'] = $config['site_path'].'assets/';
$config['uploads'] = $config['site_root'].'uploads/';



// Error page
$config['css'] = $config['assets'].'css/Slink/';
$config['js'] = $config['assets'].'js/Slink/';
$config['site_js'] = $config['js'].'site_js/Slink/';
$config['images'] = $config['assets'].'images/';
$config['plugins'] = $config['assets'].'plugins/';

$config['admin_asset'] = $config['assets'];
$config['admin_css'] = $config['admin_asset'].'css/';
$config['admin_js'] = $config['admin_asset'].'js/';
$config['admin_images'] = $config['admin_asset'].'images/';

$config['site_asset'] = $config['assets'].'site/';
$config['site_css'] = $config['site_asset'].'css/Slink/';
$config['site_images'] = $config['site_asset'].'images/';

// path to jquery Uploadify
$config['uploadify'] = $config['assets'].'uploadify/';

//path to Ckeditor
$config['ckeditor'] = $config['assets'].'editor/ckeditor/';
$config['ckfinder'] = $config['assets'].'editor/ckfinder/';

//Uploads Files

//$config['banner_images_root'] = $config['site_root'].'uploads/banner_images/';
//$config['banner_images_path'] = $config['uploads'].'banner_images/';

$config['rows_per_page'] = '10';
$config['currency'] = '&pound';