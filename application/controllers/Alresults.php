<?php
class Alresults extends CI_Controller{
    
	public function index(){
		// if($_SESSION['passed'] == 1){
			
			$data['title'] = 'Enter Your G.C.E. Advanced Level (A/L) Information';

			$this->load->view('templates/header');
			$this->load->view('pages/al',$data);
			$this->load->view('templates/footer');
		// } else{
		// 	redirect('/');
		// }
    }

    // function exist($str, $value){       
    //     list($table, $column) = explode('.', $value, 2);    
    //     $query = $this->CI->db->query("SELECT COUNT(*) AS count FROM $table WHERE $column = '$str'");
    //     $row = $query->row();
      
    //     return ($row->count > 0) ? FALSE : TRUE;
    // }

    public function checkalres($alindex = NULL,$year=NULL){
		$data['title'] = 'G.C.E. Advanced Level (A/L) Results Sheet';
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
		$this->form_validation->set_rules('alindex', 'Index Number', 'required|xss_clean|is_exist[stuents.alindex]',array('is_exist' => 'You have Already submit an application, Please contact us for more support.'));
		$this->form_validation->set_message('required', '{field} is a required field');
		
		
		// checking validation rules
		if($this->form_validation->run() == FALSE) {
			
			$data['title'] = 'Enter Your G.C.E. Advanced Level (A/L) Information';
     
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

			if($alindex != "" && $year !=""){
                $data['alresults'] = $this->alresults_model-> get_alresults();
            } else if($alindex != ""){
                $data['alresults'] = '';
                $alindex = 'N/A';           
            } else {
                $data['alresults'] = '';
                $year= 'N/A';
            }

			if (($year != "N/A" || $alindex !="N/A") && empty($data['alresults'])){
                echo "<script>alert('Year or Index is incorrect')</script>";

                $data['title'] = 'Enter Your G.C.E. Advanced Level (A/L) Information';
                $this->load->view('templates/header');
                $this->load->view('pages/al',$data);
                $this->load->view('templates/footer');
            }

			else{
				// redirect('alresults');
				$this->load->view('templates/header');
				$this->load->view('pages/alresults',$data);
				$this->load->view('templates/footer');
			}
			
			

			// check whether those values are match with any database record
			$this->session->unset_userdata('passed');
			$this->session->set_userdata('pdfdone',0);
			 //var_dump($data);
		}
    }
}
