<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Input $input
 * @property Session $session
 */
class LogoutController extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Authentication');
    }

    public function logout()
    {
        $this->session->unset_userdata('authenticated');
        $this->session->unset_userdata('auth_user');

        $this->session->set_flashdata('status','You are logged out successfully');
        redirect(base_url('login'));
    }
}