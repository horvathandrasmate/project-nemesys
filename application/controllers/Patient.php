<?php

/**
 * Created by PhpStorm.
 * User: horva
 * Date: 2019.03.14.
 * Time: 19:26
 */

if (!defined('BASEPATH')) exit('Direct access allowed');

class Patient extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index() {
        $this->load->view("templates/header");
        $this->load->view("templates/menu");
        $this->load->view("patient/index");
        $this->load->view("templates/footer");
    }


}