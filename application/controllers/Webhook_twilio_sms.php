<?php

header('content-type: text/xml');

defined('BASEPATH') OR exit('No direct script access allowed');

class Webhook_twilio_sms extends CI_Controller {

    public function xvdnWyBnrjfdZkTzbhhxpjfSTzYbYbTN() {
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $data = $this->input->get();
        log_message("error", "webhook incoming sms = " . json_encode($data));

        $Body = strtoupper(trim($data["Body"]));
//
        $From = $data["From"];
        //$Body = "1";
        //$From = "6479066970";

        if ($Body === "0" || $Body === "1" || $Body === "2" || $Body === "3") {
            //look for relative patient number
            log_message("error", "body is 1 or 2 or 3 => $Body");
            $this->db->select("r_pvr.*");
            $this->db->from("referral_patient_info pat, records_patient_visit_reserved r_pvr");
            $this->db->where(array(
                "pat.active" => 1,
                "r_pvr.active" => 1,
                "concat('+1',pat.cell_phone)" => $From
            ));
            $this->db->where("r_pvr.patient_id", "pat.id", false);
            $this->db->order_by("r_pvr.id", "desc");
            $this->db->limit(1);


//                "r_pvr.notify_sms" => 1,

            $result = $this->db->get()->result();
            //process latest visit only
            if ($result) {
                //if visit not expired 
                $reserved = $result[0];
                if ($reserved->visit_expire_time > date("Y-m-d H:i:s")) {
                    if ($Body === "0") {
                        $this->db->insert("records_patient_visit", array(
                            "visit_name" => $reserved->visit_name,
                            "patient_id" => $reserved->patient_id,
                            "notify_voice" => $reserved->notify_voice,
                            "notify_sms" => $reserved->notify_sms,
                            "notify_email" => $reserved->notify_email,
                            "visit_confirmed" => "Change required",
                            "confirm_visit_key" => $reserved->confirm_visit_key
                        ));
                        $msg = "Thank you. Staff from the clinic will be in touch shortly";
                    }

                    if ($Body === "1" || $Body === "2" || $Body === "3") {
                        $insert_data = array(
                            "visit_name" => $reserved->visit_name,
                            "patient_id" => $reserved->patient_id,
                            "notify_voice" => $reserved->notify_voice,
                            "notify_sms" => $reserved->notify_sms,
                            "notify_email" => $reserved->notify_email,
                            "visit_confirmed" => "Confirmed",
                            "confirm_visit_key" => $reserved->confirm_visit_key
                        );

                        if ($Body === "1") {
                            $insert_data["visit_date"] = $reserved->visit_date1;
                            $insert_data["visit_time"] = $reserved->visit_start_time1;
                            $insert_data["visit_end_time"] = $reserved->visit_end_time1;
                        }
                        if ($Body === "2") {
                            $insert_data["visit_date"] = $reserved->visit_date2;
                            $insert_data["visit_time"] = $reserved->visit_start_time2;
                            $insert_data["visit_end_time"] = $reserved->visit_end_time2;
                        }
                        if ($Body === "3") {
                            $insert_data["visit_date"] = $reserved->visit_date3;
                            $insert_data["visit_time"] = $reserved->visit_start_time3;
                            $insert_data["visit_end_time"] = $reserved->visit_end_time3;
                        }
                        $this->db->insert("records_patient_visit", $insert_data);
                        $msg = "Thank you. Your appointment has been scheduled for <date at time>.\n"
                                . "\n"
                                . "The address is:\n"
                                . "<address>\n"
                                . "\n"
                                . "Please be sure to arrive on time.";
                    }
                }
            }

            echo "<Response><Sms>" . $msg . "</Sms></Response>";
        }
    }

}
