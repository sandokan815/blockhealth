<?php

if (!defined('BASEPATH'))
    exit("Access Denied!");

class Efax extends CI_Controller {

    public function index() {
      $From = "+123456";
      echo substr($From, 1);
    }

    public function send_referral_efax() {
        if (clinic_login()) {
            $this->load->model("efax_model");
            $response = $this->efax_model->send_referral_efax_model();
        } else {
            $response = "Session Expired";
        }
        echo json_encode($response);
    }

    public function show_session() {
        echo json_encode($this->session->userdata);
    }

    public function call_handle() {
        // echo "call handle" . json_encode($this->input->post());
        log_message("error", "from call handeling => " . json_encode($this->input->post()));

        $data = $this->input->post();
        $From = $data["to"];
        $Body = $data["data"];


        //remove + sign
        $From = substr($From, 2);

        log_message("error", "body is 1 or 2 is => " . $Body);
        $this->db->select("DISTINCT(r_pv.id), r_pv.visit_confirmed");
        $this->db->from("referral_patient_info pat, records_patient_visit r_pv");
        $this->db->where(array(
            "pat.active" => 1,
            "r_pv.active" => 1,
            "pat.cell_phone" => $From
        ));
        $this->db->where("r_pv.patient_id", "pat.id", false);
        $result = $this->db->get()->result();

        log_message("error", "webhook sql = " . $this->db->last_query());

        $change_status = false;

        $this->db->trans_start();
        foreach ($result as $row) {
            log_message("error", "row = " . json_encode($row) . "with body = " . $Body . ", status = " . $row->visit_confirmed);
            if ($Body == "1") {
                if ($row->visit_confirmed == "Awaiting Confirmation" || $row->visit_confirmed == "Change required") {
                    //change status to confirm
                    $this->db->where(array(
                        "id" => $row->id
                    ));
                    $this->db->set("visit_confirmed", "Confirmed");
                    $this->db->update("records_patient_visit");
                    $change_status = true;
                    log_message("error", "change (1) " . $this->db->last_query());
                }
            }
            if ($Body == "2") {
                if ($row->visit_confirmed == "Awaiting Confirmation") {
                    //change status to Change required
                    $this->db->where(array(
                      "id" => $row->id
                    ));
                    $this->db->set("visit_confirmed", "Change required");
                    $this->db->update("records_patient_visit");
                    $change_status = true;
                    log_message("error", "change (2) " . $this->db->last_query());
                }
            }
        }
        $this->db->trans_complete();
    }

}
