<?php
class HT_AJAX extends HT_THEMES
{

	public function __construct() {
		parent::__construct();
		add_action( 'init', array(&$this,'init') );
	}

	public function init() {
		$this->add_actions();
	}

	public function add_actions() {
		add_action( 'wp_ajax_sign_in', array(&$this,'ht_ajax_sign_in') );
		add_action( 'wp_ajax_nopriv_sign_in', array(&$this,'ht_ajax_sign_in') );
	}

	public function ht_ajax_sign_in() {
		if(isset($_POST['username']) && isset($_POST['password'])) {
			$response 	= array();

			$user 		= get_user_by('login' , $_POST['username']);

			// if the user name doesn't exist
			if(!$user) {
				$response['empty_username'] = 1;
			} else {
				if(!wp_check_password($_POST['password'], $user->user_pass, $user->ID)) {
					// if the password is incorrect for the specified user
					$response['wrong_password'] = 1;
				}
			}

			// check the user's login with their password
			

			if(empty($response)) {
				wp_set_auth_cookie( $user->ID) ;
				do_action('wp_login', $user->user_login);
			}

			wp_send_json($response); die();
		}
	}
}
$HT_AJAX = new HT_AJAX();