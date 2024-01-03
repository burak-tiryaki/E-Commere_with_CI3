<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property form_validation $form_validation
 * @property Input $input
 * @property Session $session
 */
class PageController extends CI_Controller{

    public function accessdenied()
    {
        $this->load->view('shared/header');
        $this->load->view('shared/navbar');
        $this->load->view('errors/403');
        $this->load->view('shared/footer');
    }

    public function orderSuccess($orderId)
    {
        $viewData = new stdClass();
        $viewData->OrderId = $orderId;
        $this->load->view('shared/header');
        $this->load->view('shared/navbar');
        $this->load->view('orderSuccess',$viewData);
        $this->load->view('shared/footer');
    }
}