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
        $this->load->model("Patient_model");
    }
    function index() {
        $db = $this->Patient_model->get_patient_table(array("id","name", "tajszam", "DOB"));
        $this->load->view("templates/header");
        $this->load->view("templates/menu");
        $this->load->view("patient/index", array("db" => $db));
        $this->load->view("templates/footer");
    }
    function create_patients($number = 1){

        $this->Patient_model->create_random_patient($number);
    }


}