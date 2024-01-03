<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property form_validation $form_validation
 * @property Input $input
 * @property Session $session
 */
class LoginController extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('authenticated'))
        {
            $this->session->set_flashdata('status','You are already logged in.');
            redirect(base_url('userpage'));
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('UserModel');
    }

    public function index()
    {
        $this->load->view('shared/header');
        $this->load->view('shared/navbar');
        $this->load->view('auth/login');
        $this->load->view('shared/footer');
    }

    public function login()
    {
        $this->form_validation->set_rules('email','Email Adress','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        $validate = $this->form_validation->run();

        if($validate == FALSE){
            //validation failed.
            $this->index();
        }
        else{
            $data = array(
                "email" => $this->input->post("email"),
                "password" => $this->input->post("password"),
            );
            $userModel = new UserModel;
            $result = $userModel->loginUser($data);

            if($result != FALSE){
                //user here
                $getUser = array(
                    "user_id"         => $result->user_id,
                    "name"       => $result->name,
                    "surname"   => $result->surname,
                    "email"      => $result->email,
                    "password"   => $result->password,
                    "create_date" => $result->create_date
                );
                
                // 1 = user(default), 2 = admin
                $this->session->set_userdata('authenticated',$result->user_role);
                $this->session->set_userdata('auth_user',$getUser);
                $this->session->set_flashdata('status','You are Login successfuly');
                
                redirect('userpage');
            }
            else{
                //user not found
                $this->session->set_flashdata("status","Invalid Email or Password!");
                redirect(base_url('login'));
            }
        }
    }
}