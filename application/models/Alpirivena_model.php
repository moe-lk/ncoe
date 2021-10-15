<?php 
class Alpirivena_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    } 

    public function post_alresults(){
        $data = array(
            'year' => $this->input->post('year'),
            'al_index' => $this->input->post('alindex'),
            'medium' => $this->input->post('medium'),
            'stream' => $this->input->post('stream'),
            'attempt' => $this->input->post('attempt'),
            'sub1' => $this->input->post('subjectnumber1'),
            // 'subjectname1' => $this->input->post('subjectname1'),
            'grade1' => $this->input->post('grade1'),
            'sub2' => $this->input->post('subjectnumber2'),
            // 'subjectname2' => $this->input->post('subjectname2'),
            'grade2' => $this->input->post('grade2'),
            'sub3' => $this->input->post('subjectnumber3'),
            // 'subjectname3' => $this->input->post('subjectname3'),
            'grade3' => $this->input->post('grade3'),
            'sub4' => $this->input->post('subjectnumber4'),
            // 'subjectname4' => $this->input->post('subjectname4'),
            'grade4' => $this->input->post('grade4'),
            'gentst' => $this->input->post('gentst'),
            'zscore' => $this->input->post('zscore'),
        );
        
        return $this->db->insert('al_pirivena', $data);
        // var_dump($query);
    }

    public function get_palresults($palindex = NULL){
        if($palindex == NULL){
         
            $palindex = $_SESSION['alindex'];
            $this->db->where('AL_index', $palindex);
            $query = $this->db->get('al_pirivena');

            return $query->result_array();
        }
        $palindex = $this->input->post('alindex');
        $this->db->where('AL_index', $palindex);
        $query = $this->db->get('al_pirivena');

        return $query->result_array();
    }
}
