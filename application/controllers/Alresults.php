<?php
class Alresults extends CI_Controller{
    
	public function index(){
        $data['title'] = 'Enter your GCE Advanced Level(A/L) information below to see the results';

        $this->load->view('templates/header');
        $this->load->view('pages/al',$data);
        $this->load->view('templates/footer');
    }

    // function exist($str, $value){       
    //     list($table, $column) = explode('.', $value, 2);    
    //     $query = $this->CI->db->query("SELECT COUNT(*) AS count FROM $table WHERE $column = '$str'");
    //     $row = $query->row();
      
    //     return ($row->count > 0) ? FALSE : TRUE;
    // }

    public function checkalres($alindex = NULL){
		$data['title'] = 'A/L Results sheet';
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');

		
		// Check whether any input fields are empty, if so flash error message - done
        // If all fields are filled, then compare the values with database - done
        // If all the values are ok, then proceed to results page - done
        // Otherwise flash error message - doneName
		// Edit the results page

		// set the validation rules
		$this->form_validation->set_rules('year', 'A/L Year', 'required');
		$this->form_validation->set_rules('syllabus', 'Syllabus Type', 'required');
		$this->form_validation->set_rules('alindex', 'Index Number', 'required');
		$this->form_validation->set_message('required', '{field} is a required field');

		// checking validation rules
		if($this->form_validation->run() == FALSE) {

			$data['title'] = 'Enter your GCE Advanced Level(A/L) information below to see the results';

			$this->load->view('templates/header');
			$this->load->view('pages/al', $data);
			$this->load->view('templates/footer');
			

		} else {
			// assign variable values got from the POST request 
			$year = $this->input->post('year');
			$syllabus = $this->input->post('syllabus');
			$alindex = $this->input->post('alindex');

			$this->session->set_userdata('year', $year);
			$this->session->set_userdata('syllabus', $syllabus);
			$this->session->set_userdata('alindex', $alindex);
			// var_dump($year);

			// check whether those values are match with any database record
			$this->load->model('Alresults_model');
			$data['alresults'] = $this->Alresults_model->get_alresults();

			if( !empty($data['alresults']) ) {

				$data['title'] = 'Al index';
				$this->load->view('templates/header');
				$this->load->view('pages/alresults',$data);
				$this->load->view('templates/footer');
				$this->session->set_userdata('pdfdone', 0);
			} else {

				$data['title'] = 'Al index';
				$this->load->view('templates/header');
				$this->load->view('pages/al',$data);
				$this->load->view('templates/footer');

			}
		}
    }
}
