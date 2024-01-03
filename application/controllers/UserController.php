<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property form_validation $form_validation
 * @property Input $input
 * @property Session $session
 */
class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Authentication');
        $this->load->model('OrderModel');
        $this->load->model('UserModel');

        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $userId = $this->session->userdata('auth_user')['user_id'];

        $UserModel = new UserModel();
        $user = $UserModel->getOneUser(array("user_id" => $userId));


        $OrderModel = new OrderModel();
        $userOrders = $OrderModel->getAllOrder(array("user_id" => $userId));

        $userOrderDetails = array();
        foreach($userOrders as $order)
        {
            $orderDetails = $OrderModel->getOrderDetails($order->order_id);

            $userOrderDetails[$order->order_id] = $orderDetails;
        }

        

        $viewData = new stdClass();
        $viewData->user = $user;
        $viewData->userOrders = $userOrders;
        $viewData->userOrderDetails = $userOrderDetails;
        
        $this->load->view('shared/header');
        $this->load->view('shared/navbar');
        $this->load->view('userpage',$viewData);
        $this->load->view('shared/footer');
    }

    public function userUpdate()
    {
        
        $this->form_validation->set_rules("name","Name","required|trim");
        $this->form_validation->set_rules("surname","Surname","required|trim");
        $this->form_validation->set_rules("email","Email","required|trim|valid_email|callback_email_check");
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
                "user_id"     => $this->input->post("user_id"),
                "name"     => $this->input->post("name"),
                "surname" => $this->input->post("surname"),
                "email"    => $this->input->post("email"),
                "password" => $this->input->post("password"),
            );
            
            $UserModel = new UserModel;

            $UserModel->updateUser($data);
            
            $this->session->set_flashdata('status','Informations updated.');

            redirect(base_url('userpage'));
        }
    }
    public function email_check($mail)
    {
        $UserModel = new UserModel();
        $userId = $this->session->userdata('auth_user')['user_id'];

        if($UserModel->userMailCheck($mail,$userId) > 0)
        {
            $this->form_validation->set_message('email_check', 'This email is already being used by someone else.');
            return FALSE;
        }
        else
            return TRUE;
    }
}