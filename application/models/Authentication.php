<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Model{
    public function __construct()
    {
        parent::__construct();

        //when model load somewhere, if user not authenticated redirect to login. 
        if(!$this->session->userdata('authenticated'))
        {
            $this->session->set_flashdata('status','Login First');
            redirect(base_url('login'));
        }
    }

    public function check_isAdmin()
    {
        if($this->session->userdata('authenticated'))
        {
            if($this->session->userdata('authenticated') != 2 )
            {
                //user has a permession but not have a admin.
                $this->session->set_flashdata('status','Access denied!');
                redirect(base_url('403'));
            }
        }
        else{
            //If the user does not have any permissions go to the login page
            $this->session->set_flashdata('status','Login First');
            redirect(base_url('login'));
        }
    }
}