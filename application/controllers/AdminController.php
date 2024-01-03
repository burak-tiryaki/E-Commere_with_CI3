<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Session $session
 * @property Authentication $Authentication
 * @property Input $input
 * @property Upload $upload
 */
class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Authentication');
        $this->Authentication->check_isAdmin();

        $this->load->model('UserModel');
        $this->load->model('ProductModel');
        $this->load->model('OrderModel');
    }

    public function index()
    {
        $UserModel = new UserModel();
        $users = $UserModel->getAllUser();

        $ProductModel = new ProductModel();
        $products = $ProductModel->getAllProducts('products');

        $OrderModel = new OrderModel();
        $orders = $OrderModel->getAllOrder();

        $viewData = new stdClass();
        $viewData->users = $users;
        $viewData->products = $products;
        $viewData->orders = $orders;

        $this->load->view('shared/header');
        $this->load->view('shared/navbar');
        $this->load->view('adminpage',$viewData);
        $this->load->view('shared/footer');
    }

    public function userList()
    {
        $this->load->view('includes/admin/adminPageOrders.php');
    }

    // mark order as completed.
    public function orderComplete($orderId)
    {
        $OrderModel = new OrderModel();
        $OrderModel->markOrderComplete($orderId);
        redirect(base_url('adminpage'));
    }

    public function getUpdateUser($userId)
    {
        $UserModel = new UserModel();
        $user = $UserModel->getOneUser(array("user_id"=>$userId));

        $viewData = new stdClass();
        $viewData->user = $user;

        $this->load->view('shared/header');
        $this->load->view('shared/navbar');
        $this->load->view('admin/userUpdate',$viewData);
        $this->load->view('shared/footer');
    }
    
    public function setUpdateUser()
    {
        $data = array(
            "user_id"  => $this->input->post('user_id'),
            "name"     => $this->input->post('name'),
            "surname"  => $this->input->post('surname'),
            "email"    => $this->input->post('email'),
            "password" => $this->input->post('password')
        );

        $UserModel = new UserModel();
        $UserModel->updateUser($data);

        $this->session->set_flashdata('status','Update successful.');

        $this->getUpdateUser($data["user_id"]);
    }

    public function deleteUser($userId)
    {
        $UserModel = new UserModel();
        $UserModel->deleteUser($userId);

        $this->session->set_flashdata('status','User deleted');
        redirect(base_url('adminpage'));
    }

    public function getAddProduct()
    {        

        $viewData = new stdClass();

        $this->load->view('shared/header');
        $this->load->view('shared/navbar');
        $this->load->view('admin/addProduct',$viewData);
        $this->load->view('shared/footer');
    }

    public function addProduct()
    {
        $getData = array(
            "product_name"     => $this->input->post('name'),
            "product_price"    => $this->input->post('price'),
            "product_summary"  => $this->input->post('summary'),
            "product_isActive" => $this->input->post('isActive')
        );
        
        $ProductModel = new ProductModel();
        $insertId = $ProductModel->addProduct($getData);

        // Image Upload
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpeg|jpg|png';

        $this->load->library('upload', $config);
    
        if($this->upload->do_upload('image'))
        {

            $data = array('upload_data' => $this->upload->data());

            // Dosya adını değiştirme
            $new_name = $insertId . $data['upload_data']['file_ext'];

            rename($data['upload_data']['full_path'], $data['upload_data']['file_path'] . $new_name);

            $imageUrl = $config['upload_path'].$new_name;

            $ProductModel->setImageUrl($insertId, $imageUrl);

            $this->session->set_flashdata('status','Product successfuly added.');

            redirect(base_url('adminpage'));
        }
        
    }

    public function getUpdateProduct($productId)
    {
        $ProductModel = new ProductModel();
        $product = $ProductModel->getOneProduct('products','*',array("product_id" => $productId));

        $viewData = new stdClass();
        $viewData->product = $product;

        $this->load->view('shared/header');
        $this->load->view('shared/navbar');
        $this->load->view('admin/updateProduct',$viewData);
        $this->load->view('shared/footer');
    }

    public function setUpdateProduct()
    {
        $getData = array(
            "product_id" => $this->input->post('product_id'),
            "product_name" => $this->input->post('name'),
            "product_price" => $this->input->post('price'),
            "product_summary" => $this->input->post('summary'),
            "product_isActive" => $this->input->post('isActive')
            //"product_imageurl" => $this->input->post('image')
        );

        $ProductModel = new ProductModel();
        $ProductModel->updateProduct($getData);

        $updateId = $getData["product_id"];

        //Eski dosyayı silme
        $this->load->helper('custom_helper');
        $projectPath = get_project_path();

        $oldFilePath = $projectPath.'/assets/images/'.$updateId.'.jpg';
        
        if (file_exists($oldFilePath))
            unlink($oldFilePath);

        // Image Upload
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $updateId.'.jpg';

        $this->load->library('upload', $config);
            
        if($this->upload->do_upload('newImage'))
        {
            $this->session->set_flashdata('status','Product Updated.');
        }
        else{
            $this->session->set_flashdata('status',$this->upload->display_errors());
        }

        redirect(base_url('adminpage'));
    }

    public function setProductStatus($productId)
    {
        $ProductModel = new ProductModel();
        $ProductModel->setProductStatusReverse($productId);

        redirect(base_url('adminpage'));
    }
}