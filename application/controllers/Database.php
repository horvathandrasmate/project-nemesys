<?php


/**
 * @property Database_model Database_model
 * @property
 */
class Database extends CI_Controller
{

    
    function index()
    {
        require_login();

        $this->load->view('templates/header');
        $this->load->view('templates/menu');


        $this->load->view('templates/footer');
    }

    function create_table()
    {

        if (NULL !== $this->input->post("submit")) {
            $table_name = $this->input->post("table_name");
            $counter = $this->input->post("counter");
            $array_of_inputs = array();
            for($i=1;$i<=$counter;$i++){

                $array_of_inputs[$i] = $this->input->post("input-".$i);

            }
            $array_of_types = array();
            for($i=1;$i<=$counter;$i++){

                $array_of_types[$i] = $this->input->post("input-type-".$i);

            }

            try {
                $this->Database_model->create_table($table_name, $array_of_inputs, $array_of_types);
            } catch (Exception $e) {
                if($e->getMessage() === "unknown_type") alert_swal_error(lang("unknown_type"), "database/create_table");
                if($e->getMessage() === "table_name_exists") alert_swal_error(lang("table_name_exists"), "database/create_table");
                if($e->getMessage() === "table_exists") alert_swal_error(lang("table_exists"), "database/create_table");
            }
            redirect("database/");
        } else {

            $this->load->view('templates/header');
            $this->load->view('templates/menu');

            $type_data = $this->Database_model->get_column_types();

            $this->load->view("database/create_table" , array("type_data" => $type_data));

            $this->load->view('templates/footer');
        }
    }

    function get_table($table_name = "")
    {
        if ($table_name == "") {
            alert_swal_error(lang("table_not_given"), "account/admin");
        }
        $this->load->helper("login");
        if (require_login()) {
            //require_permission("admin");
            $this->load->view('templates/header');
            $this->load->view('templates/menu');
            $data = $this->Database_model->get_table($table_name);

            try {
                $this->load->view('database/table', array("data" => $data, "table_name" => $table_name));
            } catch (Exception $e) {
                if ($e->getMessage() == "table_not_found") alert_swal_error(lang("table_not_found"), "account/admin");
            }
            $this->load->view('templates/footer');
        }

    }

    function delete_table($table_name){
        require_login();
        $this->load->dbforge();
        $this->Database_model->delete_row($this->config->item('table_prefix')."tables", array('table_name' => $table_name));
        $this->dbforge->drop_table($table_name);
        redirect("account/admin");
    }
    

    function add_table()
    {
        if (require_login()) {
            //require_permission("admin");

            if (NULL !== $this->input->post("submit_table")) {

                $table_name = $this->input->post("table_name");
                $table_nice_name = $this->input->post("table_name");

                try {
                    if (!in_array($table_name, flatten($this->Database_model->get_column($this->config->item("table_prefix") . "tables", "table_name")))) {
                        $this->Database_model->upload_row($this->config->item("table_prefix") . "tables", array("table_name" => $table_name, "table_nice_name" => $table_nice_name));
                        redirect(base_url("database/add_table"));
                    } else {
                        alert_swal_error(lang("table_duplicate"), "account/admin");
                    }
                } catch (Exception $e) {
                    alert_swal_error(lang("denied_upload"), "account/admin");
                }


            } else {

                $this->load->view('templates/header');
                $this->load->view('templates/menu');

                $table_name = $this->config->item("table_prefix") . "tables";

                $this->load->view("database/add_table", array("table_name" => $table_name));

                $this->load->view('templates/footer');
            }
        }
    }
    //API-------------------------------------------------------------------------------------------------------
    //API-------------------------------------------------------------------------------------------------------
    //API-------------------------------------------------------------------------------------------------------
    //API-------------------------------------------------------------------------------------------------------
    function get_table_json($table_name, $converted = 0)
    {
        if ($table_name == "") {
            alert_swal_error(lang("table_not_given"), "account/admin");
        }
        $this->load->helper("login");
        if (require_login()) {

            $this->load->library("Datatables");
            $this->load->model("Database_model");
            $result = $this->db->get($table_name)->result_array();
            if($converted){
                $table_columns = $this->Database_model->get_columns($table_name);
                
                foreach ($result as $key => $value) {
                    foreach($value as $key2 => $value2){
                    $dataport = $this->Database_model->get_dataport_of_column($table_name, $key2);
                    if ($dataport != "") {
                        $data_parts = explode(".", $dataport);
                        $result[$key][$key2] = get_x_by_y($data_parts[1], "id", $value2, $data_parts[0]);
                        
                    }
                }
            }
            }
            foreach($result as $key => $value){
                $result[$key]["buttons"] = "<button class='btn btn-warning' onclick='edit_row(".$result[$key]["id"].")'>".lang("edit")."</button>";
                $result[$key]["buttons"] .= "<button class='btn btn-danger' onclick='delete_row(".$result[$key]["id"].")'>".lang("delete")."</button>";
            }
            $iDraw = "0";
            $recordsTotal = $this->db->count_all($table_name);
            $recordsFiltered = $recordsTotal;
           
            echo json_encode(array(
            "draw" => isset($iDraw) ? $iDraw : 1,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $result)
            );
            
        }
    }
    
    function upload_row($table_name, $condition = ""){
        $array_of_data = $this->input->post(NULL, TRUE);
        if($condition != ""){
            $condition = json_decode(urldecode($condition));
        }
        //CONVERT BACK
        foreach($array_of_data as $key => $value){
            $dataport = $this->Database_model->get_dataport_of_column($table_name, $key);
            if($dataport != ""){
                $data_parts = explode(".", $dataport);
                $array_of_data[$key] = get_x_by_y("id", $data_parts[1], $value, $data_parts[0]);
            }
        }
        try{

            $this->Database_model->insert_or_update_row($table_name, $condition, $array_of_data);
        }catch(Exception $e){
           //echo $e->getMessage();
            echo json_encode(array("error" => $e->getMessage()));
            die();
        }
    }
    function delete_row($table_name, $id){
        try{
            $this->Database_model->delete_row($table_name, array("id" => $id));
        }catch(Exception $e){
           //echo $e->getMessage();
            echo json_encode(array("error" => $e->getMessage()));
            die();
        }
    }
    function get_row($table_name, $id){
        
        echo json_encode(get_x_by_y("*", "id", $id, $table_name));
    }

}