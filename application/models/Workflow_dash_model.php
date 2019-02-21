<?phpclass Workflow_dash_model extends CI_Model {    public function get_workflow_dash_info_model() {        $this->db->select("count(DISTINCT (r_pv.patient_id)) AS patients, md5(c_dr.id) AS dr_id," .                "concat('Dr. ', `c_dr`.`first_name`, ' ', c_dr.last_name) AS dr_name");        $this->db->from("`clinic_physician_info` `c_dr`");        $this->db->join("`clinic_referrals` `c_ref`", "c_ref.assigned_physician = c_dr.id AND        `c_ref`.`active` = 1", "left");        $this->db->join("`referral_patient_info` `pat`", "pat.referral_id = c_ref.id AND `pat`.`active` = 1", "left");        $this->db->join("`records_patient_visit` `r_pv`", "r_pv.active = 1 and r_pv.patient_id = pat.id and "                . "TIMESTAMP(concat(date_format(`r_pv`.`visit_date`, '%Y-%m-%d '),`r_pv`.`visit_time`)) > now()", "left");        $this->db->where("`c_dr`.`active` = 1 AND `c_dr`.`clinic_id` = ".$this->session->userdata("user_id"));        $this->db->group_by("c_dr.id");        $this->db->order_by("1 desc");        $result = $this->db->get()->result();        // log_message("error", "workflow sql = " . $this->db->last_query());        return $result;    }    public function get_scheduled_patients_model() {        $this->form_validation->set_rules('id', 'Physician', 'required');        if ($this->form_validation->run()) {            $data = $this->input->post();            $this->db->select("md5(pat.id) as patient_id," .                    "LOWER(c_ref.status) as status," .                    "date_format(`r_pv`.`visit_date`, '%Y-%m-%d') AS start_date," .                    "date_format(TIMESTAMP(concat(date_format(`r_pv`.`visit_date`,'%Y-%m-%d '),`r_pv`.`visit_time`)),'%H:%i:00') as start_time," .                    "date_format(TIMESTAMPADD(MINUTE, 90, TIMESTAMP(concat(date_format(`r_pv`.`visit_date`, '%Y-%m-%d '),`r_pv`.`visit_time`))), '%Y-%m-%d') as end_date," .                    "date_format(TIMESTAMPADD(MINUTE, 90, TIMESTAMP(concat(date_format(`r_pv`.`visit_date`, '%Y-%m-%d '),`r_pv`.`visit_time`))), '%H:%i:00') as end_time,".                    "r_pv.visit_confirmed,".                    "concat(pat.fname , ' ', pat.lname ) as patient_name,".                    "if(TIMESTAMP(concat(date_format(`r_pv`.`visit_date`, '%Y-%m-%d '),`r_pv`.`visit_time`)) > now(), 'yet', 'done') as execution");            $this->db->from("records_patient_visit r_pv, clinic_referrals c_ref, clinic_physician_info c_dr, referral_patient_info pat");            $this->db->where(array(                "r_pv.active" => 1,                "c_ref.active" => 1,                "c_dr.active" => 1,                "pat.active" => 1,                "md5(c_dr.id)" => $data["id"],                "c_dr.clinic_id" => $this->session->userdata("user_id")            ));            $this->db->where("r_pv.patient_id", "pat.id", false);            $this->db->where("pat.referral_id", "c_ref.id", false);            $this->db->where("c_ref.assigned_physician", "c_dr.id", false);            $this->db->where("c_ref.assigned_physician <>", "0", false);            // $this->db->where("TIMESTAMP(concat(date_format(`r_pv`.`visit_date`,'%Y-%m-%d '),`r_pv`.`visit_time`)) > ", "now()", false);//            $this->db->order_by()            $result = $this->db->get()->result();            log_message("error", "work schedule = " . $this->db->last_query());            //Awaiting Confirmation/Confirmed/Change required            $color_codes = array(                "Confirmed" => '#08b5a2',                "Change required" => "#999900",                "Awaiting confirmation" => '#f70000',                "N/A" => '#f70000',                "Wrong Number" => '#fff3cd'            );            $event_data = array();            foreach ($result as $event) {                $color = (isset($color_codes[$event->visit_confirmed]))?$color_codes[$event->visit_confirmed]:"#f0f0f0";                $cur_event = array(                    "title" => $event->patient_name . "\n" . $event->visit_confirmed,                    "start" => $event->start_date . "T" . $event->start_time,                    "end" => $event->end_date . "T" . $event->end_time,                    "url" => base_url() . str_replace(" ", "_", $event->status) . (($event->status == 'completed')? "":"/referral_details/" . $event->patient_id),                    "color" => ($event->execution == "done")?"#D3D3D3":$color                );                array_push($event_data, $cur_event);            }            // log_message("error", "data = " . json_encode($event_data));            return $event_data;                    } else {            return validation_errors();        }    }}