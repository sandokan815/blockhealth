<?php
class Manage_physician_model extends CI_Model {
    public function ssp_clinic_physician_model() {
        $table = "manage_physician_dash";
        $primaryKey = "id";
        $columns = array(
            array('db' => 'physician_name', 'dt' => 0),
            array('db' => 'status', 'dt' => 1),
            array('db' => 'current_patients', 'dt' => 2),
            array('db' => 'completed_patients', 'dt' => 3),
            array('db' => 'id', 'dt' => 4)
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
        $where = "1";
        if ($this->session->userdata("login_role") == "clinic_admin")
            $where = "clinic_admin=" . $this->session->userdata("user_id");
        else if ($this->session->userdata("login_role") == "clinic_physician")
            $where = "clinic_admin=" . $this->session->userdata("user_id");
        // $where = "physician_id=". $this->session->userdata("physician_id");

        require('ssp.class.php');
        return json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, $where));
    }
    public function add_physician_model() {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email Id', 'required|is_unique[clinic_physician_info.email_id]');
//        $this->form_validation->set_rules('fax_number', 'Fax Number', 'required');
//        $this->form_validation->set_rules('office_phone', 'Office Phone', 'required');

        if ($this->form_validation->run()) {
            $data = $this->input->post();
            if ($this->session->userdata("login_role") == "clinic_admin") {
                $login_key = $this->generate_random_string(60);
                $password = $this->generate_random_string(10);
                $this->db->insert("clinic_physician_info", array(
                    "clinic_id" => $this->session->userdata("user_id"),
                    "first_name" => $data["first_name"],
                    "last_name" => $data["last_name"],
                    "email_id" => $data["email"],
                    "fax_number" => $data["fax_number"],
                    "phone_number" => $data["office_phone"],
                    "login_key" => $login_key,
                    "password" => password_hash($password, PASSWORD_BCRYPT),
                    "active" => 0
                        )
                );

                $this->db->select("clinic_institution_name");
                $this->db->from("clinic_user_info");
                $this->db->where(
                        array(
                            "active" => 1,
                            "id" => $this->session->userdata("user_id")
                        )
                );
                $clinic_name = $this->db->get()->result()[0]->clinic_institution_name;

                // login_key
                //template implement starts
                $template = file_get_contents("assets/templates/physician_invite.html");
                $template = str_replace("<drFirstName></drFirstName>", $data["first_name"], $template);
                $template = str_replace("<drLastName></drLastName>", $data["last_name"], $template);
                $template = str_replace("<clinicName></clinicName>", $clinic_name, $template);
                $template = str_replace("verify_link", base_url() . "login/verify_new_physician_account/" .
                        $login_key, $template);
                //template implement ends
                // 	"Email Id : " . $data["email"] . "<br/>".
                // 	"Password : " . $password;

                //send mail informing ticket raised
                // old mail code starts
//                $this->load->library('email');
//                $this->email->from($this->email->smtp_user , "BlockHealth");
//                $this->email->to($data["email"]);
//                $this->email->subject("BlockHealth Invite");
//                $this->email->message($template);
//                $this->email->send();
                // old mail code ends
                $response = send_mail("", "BlockHealth", $data["email"], "", "BlockHealth Invite", $template);
            

                return true;
            } else {
                return "Operation Failed";
            }
        } else
            return validation_errors();
    }
    private function generate_random_string($length = 32) {
        $timestamp = time();

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $timestamp . "_" . $randomString;
    }
}
