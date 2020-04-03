<?php



if (!defined('BASEPATH')) exit('Direct access allowed');

class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Stock_model");
        $this->load->model("Permissions_model");
    }
    public function index(){
        $this->load->view("templates/header");
        $this->load->view("templates/menu");
        $this->load->view("stock/index");
        $this->load->view("templates/footer");
    }
}