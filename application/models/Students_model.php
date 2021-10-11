<?php 
class Students_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function personaldetails(){
        // Students data array
        $data = array(
            'fullname' => $this->input->post('fullname'),
            'namewithinitials' => $this->input->post('namewithinitials'),
            'dob' => $this->input->post('dob'),
            'Addressl1' => $this->input->post('addressline1'),
            'Addressl2' => $this->input->post('addressline2'),
            'Addressl3' => $this->input->post('addressline3'),
            'Addressl4' => $this->input->post('addressline4'),
            'Resdistrict' => $this->input->post('district'),
            'NIC' => $this->input->post('nic'),
            'gender' => $this->input->post('gender'),//Radio button for gender
            // 'optradio' => $this->input->post('optradio'),//Radio button for gender
            'Title' => $this->input->post('title'),
            'Ethnicity' => $this->input->post('ethnicity'),
            'AL_year' => $this ->input->post('year'),
            'Mobile' => $this->input->post('mobile'),
            'home' => $this->input->post('home'),
            'email' => $this->input->post('email'),
            'ALindex' => $this->input->post('alindex'),
			'syllabus' => $this->input->post('syllabus'),
            'OLindex1' => $this->input->post('olindex1'),
            'OL_year1' => $this->input->post('year1'),
            'OLindex2' => $this->input->post('olindex2'),
            'OL_year2' => $this->input->post('year2'),
            'OLindex3' => $this->input->post('olindex3'),
            'OL_year3' => $this->input->post('year3'),
            'sripadancoe'=> $this->input->post('sripada'),
            'stateworker'=> $this->input->post('sworker'),
            'pirivena'=> $this->input->post('pirivena'),
            'pemarks'=> $this->input->post('pemarks'),
            'git'=> $this->input->post('git')
        );

        // Insert student personal detail
        return $this->db->insert('stuents', $data);//Tablename is used as 'student      


    }

    public function getPersonal(){
        $alindex = $this->input->post('alindex');
        $this->db->where('ALindex', $alindex);
        $query = $this->db->get('stuents');

        return $query->result_array();
    }

    public function getStudents(){
        $query = $this->db->get('stuents');
        return $query->result_array();
    } 

    public function updatepersonal(){
        $alindex = $this->input->post('alindex');

        $data = array(
            'fullname' => $this->input->post('fullname'),
            'namewithinitials' => $this->input->post('namewithinitials'),
            'dob' => $this->input->post('dob'),
            'Addressl1' => $this->input->post('addressline1'),
            'Addressl2' => $this->input->post('addressline2'),
            'Addressl3' => $this->input->post('addressline3'),
            'Addressl4' => $this->input->post('addressline4'),
            'Resdistrict' => $this->input->post('district'),
            'NIC' => $this->input->post('nic'),
            'gender' => $this->input->post('gender'),//Radio button for gender
            // 'optradio' => $this->input->post('optradio'),//Radio button for gender
            'Title' => $this->input->post('title'),
            'Ethnicity' => $this->input->post('ethnicity'),
            'AL_year' => $this ->input->post('year'),
            'Mobile' => $this->input->post('mobile'),
            'home' => $this->input->post('home'),
            'email' => $this->input->post('email'),
            'syllabus' => $this->input->post('syllabus'),
            'OLindex1' => $this->input->post('olindex1'),
            'OL_year1' => $this->input->post('year1'),
            'OLindex2' => $this->input->post('olindex2'),
            'OL_year2' => $this->input->post('year2'),
            'OLindex3' => $this->input->post('olindex3'),
            'OL_year3' => $this->input->post('year3'),
            'sripadancoe'=> $this->input->post('sripada'),
            'stateworker'=> $this->input->post('sworker'),
            'pirivena'=> $this->input->post('pirivena'),
            'pemarks'=> $this->input->post('pemarks'),
            'version'=> $this->input->post('version')
        );

        $this->db->where('ALindex', $alindex);
		return $this->db->update('stuents', $data);
    }
}
