<?php

if (!defined('BASEPATH')) exit('Direct access allowed');

class Patient_model extends CI_Model
{
    static public $PATIENT_TABLE = "patients";
    static public $ESETEK_TABLE = "esetek";
    static public $STATUSOK_TABLE = "statusok";
    function __construct()
    {
        parent::__construct();
        self::$PATIENT_TABLE = $this->config->item("table_prefix") . self::$PATIENT_TABLE;
        self::$ESETEK_TABLE = $this->config->item("table_prefix") . self::$ESETEK_TABLE;
        self::$STATUSOK_TABLE = $this->config->item("table_prefix") . self::$STATUSOK_TABLE;
        
    }
    function get_patient_table($select = array()){
        return $this->Database_model->get_table(self::$PATIENT_TABLE, $select);
    }
    function create_random_patient($patient_amount){
        $vezeteknev = array("Kiss", "Nagy", "Horváth", "Tóth", "Mátraházi", "Újlaki", "Erőss", "Honti", "Kovács", "Kelemen");
        $keresztnev = array("Ábrahám", "Ágoston", "Alexander", "Dénes", "Erzsébet", "Gergő", "István", "Jakab", "Béla", "Tamás", "Izabella", "Lilla");
        $noi_keresztnevek = array("Erzsébet","Anna", "Júlia", "Zita", "Tímea", "Judit", "Eszter", "Dorka", "Dorottya", "Sára", "Emma");
        $telefonszamok = array("30","70","20","31");
        for($i=0;$i<$patient_amount;$i++){
            $name = $vezeteknev[array_rand($vezeteknev)]." ".$keresztnev[array_rand($keresztnev)];
            $tajszam = rand(100,999) . "-" . rand(100,999) . "-" . rand(100,999);
            $timestamp = mt_rand(1, time());
            $randomDate = date("Y-m-d", $timestamp);
            $anyja_neve = $vezeteknev[array_rand($vezeteknev)]." ".$noi_keresztnevek[array_rand($noi_keresztnevek)];
            $legkozelebbi_hozzatartozo = $vezeteknev[array_rand($vezeteknev)]." ".$keresztnev[array_rand($keresztnev)];
            $telefonszam = "+36" . $telefonszamok[array_rand($telefonszamok)] . rand(1000000,9999999);
            $korhazi_id = rand(1,10);
            $karszalag_id = rand(1000,9999);
            $this->db->insert(self::$PATIENT_TABLE, array("name" => $name, "tajszam" => $tajszam, "DOB" => $randomDate, "mother_name" => $anyja_neve,"legkozelebbi_hozzatartozo" => $legkozelebbi_hozzatartozo, "lh_telefonszam" => $telefonszam, "korhazi_id" =>$korhazi_id, "karszalag_id" =>$karszalag_id));
        }
    }
    function get_patient($user_id){
        return get_x_by_y("*", "id", $user_id, self::$PATIENT_TABLE);
    }
    function get_active_case($id){

        $data = get_x_by_y("*", "paciens_id", $id, self::$ESETEK_TABLE);
        foreach($data as $key => $value){ 
            if($data[$key]["statusofcase"] == get_x_by_y("id", "nice_name", "aktív", self::$STATUSOK_TABLE)){
                return $data[$key];  
            }
        }
        return array();
    }

}