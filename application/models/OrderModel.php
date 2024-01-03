<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Input $input
 * @property Session $session
 * @property ProductModel $ProductModel
 * @property Database $db
 * */

class OrderModel extends CI_Model{

   public function getAllOrder($where=array())
   {
         return $this->db
                     ->where($where)
                     ->get('orders')
                     ->result();
   }

   public function getOrderDetails($orderId)
   {
       return $this->db
            ->from('order_detail od')
            ->select('od.order_id, od.orderdetail_quantity, od.orderdetail_uprice, p.product_name, p.product_imageurl')
            ->where('order_id',$orderId)
            ->join('products p','p.product_id = od.product_id','right')
            ->get()
            ->result();
   }

   public function markOrderComplete($orderId)
   {
       $this->db
            ->set('isCompleted',1)
            ->where('order_id',$orderId)
            ->update('orders');
   }
}