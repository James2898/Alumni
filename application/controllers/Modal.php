<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
		$this->load->database();
		//$this->load->library('session');
		session_start();
    }
	
	/***default functin, redirects to login page if no admin logged in yet***/
	public function index(){
		
	}
	
	
	/*
	*	$page_name		=	The name of page
	*/
	function popup($page_name = '' ,$param1 ='', $param2 = '' , $param3 = ''){
		$account_type		=	$_SESSION['account_type'];
		$page_data['param1']		=	$param1;
		$page_data['param2']		=	$param2;
		$page_data['param3']		=	$param3;
		
		$this->load->view( 'backend/'.$account_type.'/'.$page_name.'.php' ,$page_data);
		
		echo '<script src="assets/js/neon-custom-ajax.js"></script>';
	}
}

