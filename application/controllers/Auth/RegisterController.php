<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Form_validation $form_validation
 * @property Input $input
 * @property Session $session
 */
class RegisterController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('UserModel');
    }

    public function index()
    {
        $this->load->view('shared/header.php');
        $this->load->view('shared/navbar.php');
        $this->load->view('auth/register.php');
        $this->load->view('shared/footer.php');
    }

    public function register()
    {

        $this->form_validation->set_rules("name","Name","required|trim");
        $this->form_validation->set_rules("lastName","Surname","required|trim");
        $this->form_validation->set_rules("email","Email","required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password","Password","required|min_length[6]");
        $this->form_validation->set_rules("cpassword","Confirm Password","required|matches[password]");

        $this->form_validation->set_message(array(
            "required"    => "%s is required.",
            "is_unique"   => "This email already exists.",
            "valid_email" => "Email is not valid.",
            "min_length"  => "Min lenght must be {param} charecters.",
            "matches"     => "%s has to be match.",
        ));

        $validate = $this->form_validation->run();

        if($validate == FALSE){
            $this->index();
        }
        else{
            $data = array(
                "name"     => $this->input->post("name"),
                "surname" => $this->input->post("lastName"),
                "email"    => $this->input->post("email"),
                "password" => $this->input->post("password"),
            );
            
            $register_user = new UserModel;
            $check = $register_user->registerUser($data);

            if(isset($_SESSION['auth_user']))
            {
               if($check){
                $this->session->set_flashdata("status","Registered Successfully.");
                    redirect(base_url('adminpage'));
               }
            }
            else{

                if($check){
                    $this->session->set_flashdata("status","Registered Successfully. Please login");
                    redirect(base_url('login'));
                }
                else{
                    $this->session->set_flashdata("status","Registered Failed!");
                    redirect(base_url('login'));
                }
            }
        }
    }
}