<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Input $input  
 * @property Cart $cart
 * @property ProductModel $ProductModel
 * @property Session $session
 * @property Db $db
 * */
class ProductController extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('cart');
        $this->load->model('ProductModel');
    }

    public function index()
    {
        $viewData = new stdClass();
        $viewData->products = $this->ProductModel
                            ->getAllProducts('products','*',array("product_isActive"=>1));

        $this->load->view('shared/header');
        $this->load->view('shared/navbar');
        $this->load->view('product/index',$viewData);
        $this->load->view('shared/footer');
    }

    public function filterProduct()
    { 
        
        $searchTerm = $this->input->get('SearchTerm');
        $minPrice   = $this->input->get('MinPrice');
        $maxPrice   = $this->input->get('MaxPrice');
        
        if(empty($searchTerm) && empty($maxPrice) && empty($minPrice))
        {
            $this->index();
        }else{
            echo 'is not null or empty'.$searchTerm.$minPrice.$maxPrice;
            $viewData = new stdClass();
            $viewData->products = $this->ProductModel
                                ->getFiltredProducts($searchTerm,$minPrice,$maxPrice);
    
            echo $this->db->last_query();

            $this->load->view('shared/header');
            $this->load->view('shared/navbar');
            $this->load->view('product/index',$viewData);
            $this->load->view('shared/footer');
        }
    }


}