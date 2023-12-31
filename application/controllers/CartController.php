<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Input $input
 * @property Session $session
 * @property CartModel $CartModel
 * @property Database $db
 * */
class CartController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CartModel');
    }

    public function index()
    {
        if(isset($_SESSION["auth_user"]))
        {
            
            $viewData = new stdClass();
            $cartLines = $this->CartModel->getCart($this->session->userdata('auth_user')["user_id"]);

            if($cartLines != FALSE)
                $viewData->cartLines = $cartLines;

            $this->load->view('shared/header');
            $this->load->view('shared/navbar');
            $this->load->view('cart/index',$viewData);
            $this->load->view('shared/footer');
        }
        else
        {
            $this->session->set_flashdata('status','First you need to login.');
            echo 'go to the login';
            //redirect(base_url('login'));
        }
    }
    
    //add product to cart
    public function insertCart()
    {
        $data = array(
            "user_id" => $this->session->userdata("auth_user")["user_id"],
            "product_id" => $this->input->post('product_id'),
            "quantity"   => $this->input->post('quantity'),
        );

        $where=array(
            "user_id" => $data["user_id"],
            "product_id" => $data["product_id"]
        );

        $rowCount = $this->db
                    ->where($where)
                    ->count_all_results('cart');

        if($rowCount < 1)
        {
            $check = $this->db->insert('cart',$data);
        }
        else{
            $dbqty = $this->db->where($where)->get('cart')->row();
            $newqty = $dbqty + (int)$data["quantity"];
            $update = $this->db
                    ->set('quantity',$newqty)
                    ->where($where)
                    ->update('cart');
        }

        

        
            redirect(base_url('cart'));
        
    }

    public function updateCart()
    {
        $data = array(
            "user_id" => $this->session->userdata("auth_user")["user_id"],
            "product_id" => $this->input->post('product_id'),
            "quantity"   => $this->input->post('quantity'),
        );

        $where=array(
            "user_id" => $data["user_id"],
            "product_id" => $data["product_id"]
        );

        $rowCount = $this->db
                    ->where($where)
                    ->count_all_results('cart');

        if($rowCount > 0)
        {
            $update = $this->db
                        ->set('quantity',$data["quantity"])
                        ->where($where)
                        ->update('cart');
        }

        redirect(base_url('cart'));
    }

    public function deleteOneCart($pid)
    {
        $this->db
        ->where("product_id", $pid)
        ->delete('cart');

        redirect(base_url('cart'));
    }

    public function deleteAllCart()
    {
        $this->db
        ->where("user_id",$this->session->userdata('auth_user')["user_id"])
        ->delete('cart');

            $this->session->set_flashdata('status','Cart is cleared.');

        redirect(base_url('cart'));
    }
}