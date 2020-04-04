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
        require_login();
        $db = $this->Patient_model->get_patient_table(array("id","name", "tajszam", "DOB"));
        $this->load->view("templates/header");
        $this->load->view("templates/menu");
        $this->load->view("patient/index", array("db" => $db));
        $this->load->view("templates/footer");
    }
    function create_patients($number = 1){
        require_login();
        $number = 0;
        $this->Patient_model->create_random_patient($number);
    }
    function medrecord($user_id = -1){
        require_login();
        if($user_id == -1){
            alert_swal_error("Invalid User Id","patient/index");
        }else{
            $patient_data = $this->Patient_model->get_patient($user_id);
            $active_case = $this->Patient_model->get_active_case($user_id);
            $this->load->view("templates/header");
            $this->load->view("templates/menu");
            $this->load->view("patient/medrecord", array("data" => array("user_data" => $patient_data, "active_case" => $active_case)));
            $this->load->view("templates/footer");   
        }
    }


}