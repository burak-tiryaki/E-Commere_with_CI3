<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Input $input  
 * @property Cart $cart
 * */
class ProductModel extends CI_Model{

    public function getAllProducts($table,$select='*',$where=array())
    {
        return $this->db
                ->select($select)
                ->where($where)
                ->get($table)
                ->result();
    }

    
    public function getOneProduct($table,$select='*',$where=array())
    {
        return $this->db
        ->select($select)
        ->where($where)
        ->get($table)
        ->row();
    }

    public function getFiltredProducts($searchTerm ="", $minPrice = "", $maxPrice = "")
    {   
        $this->db->from('products');

        if (!empty($minPrice)) {
            $this->db->where('product_price >=', $minPrice);
        }
    
        if (!empty($maxPrice)) {
            $this->db->where('product_price <=', $maxPrice);
        }
        
        $this->db->like('product_name', $searchTerm);
    
        return $this->db->get()->result();
    }

    public function addProduct($data = array())
    {

        $this->db->insert('products',$data);

        return $this->db->insert_id();

    }

    public function setImageUrl($productId,$imageUrl)
    {
        $this->db
            ->set('product_imageurl',$imageUrl)
            ->where('product_id',$productId)
            ->update('products');
    }

    public function updateProduct($data)
    {
        $this->db
            ->where('product_id',$data["product_id"])
            ->update('products',$data);
    }

    public function setProductStatusReverse($productId)
    {
        $productStatus = $this->getOneProduct('products','product_isActive',array("product_id"=>$productId));

        if($productStatus->product_isActive == 1)
            $this->db->set('product_isActive',0);
        else
            $this->db->set('product_isActive',1);
        
        $this->db
        ->where('product_id',$productId)
        ->update('products');
    }
}