<?php
class Olresults extends CI_Controller{
    public function index(){
        $data['title'] = 'Enter O/L index number/numbers';

        $this->load->view('templates/header');
        $this->load->view('pages/ol',$data);
        $this->load->view('templates/footer');
    }


    public function checkolres($olind1 = NULL, $olind2 = NULL, $olind3 = NULL,$yea1=NULL,$yes2=NULL,$yea3=NULL){
        $data['title'] = 'O/L Results sheet';

        $this->form_validation->set_rules('index1', 'Index Number', 'required|is_exist[stuents.olindex1]|is_exist[stuents.olindex2]|is_exist[stuents.olindex3]');
        $this->form_validation->set_rules('index2', 'Index Number', 'is_exist[stuents.olindex1]|is_exist[stuents.olindex2]|is_exist[stuents.olindex3]');
        $this->form_validation->set_rules('index3', 'Index Number', 'is_exist[stuents.olindex1]|is_exist[stuents.olindex2]|is_exist[stuents.olindex3]');
        $this->form_validation->set_rules('year1', 'Ol Year', 'required|is_exist[stuents.year1]|is_exist[stuents.year2]|is_exist[stuents.year3]');
        $this->form_validation->set_rules('year2', 'Ol Year', 'is_exist[stuents.year1]|is_exist[stuents.year2]|is_exist[stuents.year3]');
        $this->form_validation->set_rules('year3', 'Ol Year', 'is_exist[stuents.year1]|is_exist[stuents.year2]|is_exist[stuents.year3]');
        
        // $this->form_validation->set_rules('year1', );

        $this->form_validation->set_rules('sel1', 'Number of attempts', 'required');
        
        if($this->form_validation->run() === FALSE){
            $data['title'] = 'Enter O/L index number/numbers';
            $this->load->view('templates/header');
            $this->load->view('pages/ol', $data);
            $this->load->view('templates/footer');
        } else {
            $olindex1 = $this->input->post('index1');
            $olindex2 = $this->input->post('index2');
            $olindex3 = $this->input->post('index3');
            $year1 = $this->input->post('year1');
            $year2 = $this->input->post('year2');
            $year3 = $this->input->post('year3');
            

            $attempts = $this->input->post('sel1');
            
            if($olindex1 != "" && $year1 !=""){
                $data['olresults1'] = $this->olresults_model-> get_olresults1($olind1);
            }
            else{
                $data['olresults1'] = '';
                $olindex1 = 'N/A';
                $yea1= 'N/A';
            }
            if(($olindex2 != "" && $olindex2 != $olindex1) && ($year2 != "" && $year2 != $year1)){
                $data['olresults2'] = $this->olresults_model-> get_olresults2($olind2);
                // var_dump($data['olresults2']);
                if(!empty($data['olresults2'])){
                    if($data['olresults2'][0]['year'] != $data['olresults1'][0]['year'] ){
                    
                    }else{
                        $data['olresults2'] = '';
                        $olindex2 = 'N/A';
                        $year2 = 'N/A';
                    }
                    // var_dump($data['olresults2'][0]);
                }  
            }else{
                $data['olresults2'] = '';
                $olindex2 = 'N/A';
                $year2 = 'N/A';

            }
            if(($olindex2 != "" && $olindex3 != "" && $olindex3 != $olindex1 && $olindex3 != $olindex2) && ($year2 != "" && $year3 != "" && $year3 != $year1 && $year3 != $year2)){
                $data['olresults3'] = $this->olresults_model-> get_olresults3($olind3);
                if(!empty($data['olresults3']) && !empty($data['olresults2'])){
                    if($data['olresults3'][0]['year'] != $data['olresults1'][0]['year'] && $data['olresults3'][0]['year'] != $data['olresults2'][0]['year']){
                    
                    }else{
                        $data['olresults3'] = '';
                        $olindex3 = 'N/A';
                        $year3 = 'N/A';
                    }
                }
            }else{
                $data['olresults3'] = '';
                $olindex3 = 'N/A';
                $year3 = 'N/A';
            }
            // var_dump($olindex2);
            if ($olindex1 == "N/A" || $year1=="N/A") {
                echo "<script>alert('Please enter a valid Index or Valid Year')</script>";
                $data['title'] = 'Enter O/L index number/numbers';
                $this->load->view('templates/header');
                $this->load->view('pages/ol',$data);
                $this->load->view('templates/footer');
            }
          
            
            elseif ($olindex2 != "N/A" && empty($data['olresults2'])) {
                echo "<script>alert('Please enter a valid Index2')</script>";
                $data['title'] = 'Enter O/L index number/numbers';
                $this->load->view('templates/header');
                $this->load->view('pages/ol',$data);
                $this->load->view('templates/footer');
            }


            elseif ($year2 != "N/A" && empty($data['olresults2'])) {
                echo "<script>alert('Please enter a valid year2')</script>";
                $data['title'] = 'Enter O/L index number/numbers';
                $this->load->view('templates/header');
                $this->load->view('pages/ol',$data);
                $this->load->view('templates/footer');
            }

            elseif ($olindex3 != "N/A" && empty($data['olresults3'])) {
                echo "<script>alert('Please enter a valid Index3')</script>";
                $data['title'] = 'Enter O/L index number/numbers';
                $this->load->view('templates/header');
                $this->load->view('pages/ol',$data);
                $this->load->view('templates/footer');
            }
            elseif ($year3 != "N/A" && empty($data['olresults3'])) {
                echo "<script>alert('Please enter a valid year3')</script>";
                $data['title'] = 'Enter O/L index number/numbers';
                $this->load->view('templates/header');
                $this->load->view('pages/ol',$data);
                $this->load->view('templates/footer');
            }
            elseif ($olindex1 != "N/A" && empty($data['olresults3'])) {
                echo "<script>alert('Please enter a valid Index3')</script>";
                $data['title'] = 'Enter O/L index number/numbers';
                $this->load->view('templates/header');
                $this->load->view('pages/ol',$data);
                $this->load->view('templates/footer');
            }
            elseif ($year1 != "N/A" && empty($data['olresults3'])) {
                echo "<script>alert('Please enter a valid year3')</script>";
                $data['title'] = 'Enter O/L index number/numbers';
                $this->load->view('templates/header');
                $this->load->view('pages/ol',$data);
                $this->load->view('templates/footer');
            }
            else{
            // redirect('alresults');
                $this->load->view('templates/header');
                $this->load->view('pages/olresults',$data);
                $this->load->view('templates/footer');
            }

            $this->session->set_userdata('olindex1', $olindex1);
            $this->session->set_userdata('olindex2', $olindex2);
            $this->session->set_userdata('olindex3', $olindex3);
            $this->session->set_userdata('year1', $year1);
            $this->session->set_userdata('year2', $year2);
            $this->session->set_userdata('year3', $year3);
            
            $this->session->set_userdata('attempts', $attempts);
        }
        // var_dump($data);
        
    }

    public function checkpirolres(){
        $this->form_validation->set_rules('index1', 'Index Number', 'required|is_exist[stuents.olindex1]|is_exist[stuents.olindex2]|is_exist[stuents.olindex3]');
        $this->form_validation->set_rules('index2', 'Index Number', 'is_exist[stuents.olindex1]|is_exist[stuents.olindex2]|is_exist[stuents.olindex3]');
        $this->form_validation->set_rules('index3', 'Index Number', 'is_exist[stuents.olindex1]|is_exist[stuents.olindex2]|is_exist[stuents.olindex3]');
        $this->form_validation->set_rules('year1', 'Ol Year', 'required|is_exist[stuents.year1]|is_exist[stuents.year2]|is_exist[stuents.year3]');
        $this->form_validation->set_rules('year2', 'Ol Year', 'is_exist[stuents.year1]|is_exist[stuents.year2]|is_exist[stuents.year3]');
        $this->form_validation->set_rules('year3', 'Ol Year', 'is_exist[stuents.year1]|is_exist[stuents.year2]|is_exist[stuents.year3]');
        
        if($this->form_validation->run() === FALSE){
            $data['title'] = 'Enter Mulika Pirivena index numbers';
            $this->load->view('templates/header');
            $this->load->view('pages/olpirivena', $data);
            $this->load->view('templates/footer');
        } else {
            $olindex1 = $this->input->post('index1');
            $olindex2 = $this->input->post('index2');
            $olindex3 = $this->input->post('index3');
            $year1 = $this->input->post('year1');
            $year2 = $this->input->post('year2');
            $year3 = $this->input->post('year3');
            $attempts = $this->input->post('sel1');

            $this->session->set_userdata('olindex1', $olindex1);
            $this->session->set_userdata('olindex2', $olindex2);
            $this->session->set_userdata('olindex3', $olindex3);
            $this->session->set_userdata('year1', $year1);
            $this->session->set_userdata('year2', $year2);
            $this->session->set_userdata('year3', $year3);
            $this->session->set_userdata('attempts', $attempts);

            redirect('students/sripada');
        }
    }
}

