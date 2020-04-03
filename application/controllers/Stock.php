<?php



if (!defined('BASEPATH')) exit('Direct access allowed');

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Stock_model");
        $this->load->model("Permissions_model");
    }
}