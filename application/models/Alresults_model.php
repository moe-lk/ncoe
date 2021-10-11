<?php 
class Alresults_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_alresults($alindex = FALSE){
        if($alindex == NULL){
            $alindex = $_SESSION['alindex'];
            $this->db->where('AL_index', $alindex);
            $query = $this->db->get('al_result');

            return $query->result_array();
        }
        $alindex = $this->input->post('index');
        $this->db->where('AL_index', $alindex);
        $query = $this->db->get('al_result');

        return $query->result_array();
        // var_dump($query);
    }
}