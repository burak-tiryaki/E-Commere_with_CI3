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
}