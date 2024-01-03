<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Input $input
 * @property Session $session
 * @property ProductModel $ProductModel
 * @property Database $db
 * */

 class CartModel extends CI_Model
 {
    public function getCart($userId)
    {
        $cart = $this->db
                    ->select('c.user_id, c.product_id, p.product_name, p.product_price, p.product_imageurl, SUM(c.quantity) AS total_quantity, SUM(p.product_price * c.quantity) AS LineTotal')
                    ->from('cart c')
                    ->join('products p','p.product_id = c.product_id','right')
                    ->where("user_id",$userId)
                    ->group_by(array('c.user_id','c.product_id','p.product_name','p.product_price','p.product_imageurl'))
                    ->get();

        if($cart->num_rows() > 0){
            return $cart->result();
        }
        else{
            $this->session->set_flashdata('status','Cart is empty.');
            return FALSE;

        }
                    
    }

    /* Select sorgusu
        SELECT
            c.user_id,
            c.product_id,
            p.product_name,
            p.product_price,
             p.product_imageurl,
            SUM(c.quantity) AS total_quantity,
            SUM(p.product_price * c.quantity) AS LineTotal
        FROM
            cart c
        RIGHT JOIN
            products p ON p.product_id = c.product_id
        WHERE
            c.user_id = 1
        GROUP BY
            c.user_id, c.product_id, p.product_name, p.product_price,p.product_imageurl;

    */

    public function getCartForOrder($userId)
    {
        $cart = $this->db
                    ->where('user_id',$userId)
                    ->get('cart');

        if($cart->num_rows() > 0){
            return $cart->result();
        }
        else{
            $this->session->set_flashdata('status','Cart is empty.');
            return FALSE;
        }
    }

    public function createOrder($userId)
    {
        $this->db
            ->set('user_id',$userId)
            ->insert('orders');

        return $this->db
                    ->select_max('order_id')
                    ->where('user_id',$userId)
                    ->get('orders')
                    ->row();
    }

    public function createOrderDetail($orderID, $cartLines)
    {
        $this->load->model('ProductModel');
        $ProductModel = new ProductModel();

        foreach($cartLines as $line)
        {

            $productPrice = $ProductModel->getOneProduct('products','product_price',array('product_id'=>$line->product_id));
            
            $lineTotal = ($productPrice->product_price * $line->quantity);
            
            $this->db
            ->set('order_id',$orderID)
            ->set('product_id',$line->product_id)
            ->set('orderdetail_quantity',$line->quantity)
            ->set('orderdetail_uprice',$lineTotal)
            ->insert('order_detail');
        
        }

        //set orders-> order_sum
        $orderSum = $this->db
            ->select_sum('orderdetail_uprice')
            ->where('order_id',$orderID)
            ->get('order_detail')
            ->row();

        $this->db
            ->set('order_sum',$orderSum->orderdetail_uprice)
            ->where('order_id',$orderID)
            ->update('orders');
    }
 }