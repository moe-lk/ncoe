<?php
    class Courseselect extends CI_Controller{
        public function index(){
            $data['title'] = 'Course Selection';
     //Autoload the page
            $this->load->view('templates/header');
            $this->load->view('pages/prefer',$data);
            $this->load->view('templates/footer');

        }
        public function preferdetails(){
            $data['title'] = 'Course Selection';

            //validation
            $this->form_validation->set_rules('course1', 'course1', 'required');
            $this->form_validation->set_rules('marks', 'marks', 'required');
            $this->form_validation->set_rules('marks2', 'marks2', 'required');
            $this->form_validation->set_rules('marks3', 'marks3', 'required');
            $this->form_validation->set_rules('myfile', 'myfile', 'required');


            //assign data the variables
            $course1 = $this->input->post("course1");
            $course2 = $this->input->post("course2");
            $course3 = $this->input->post("course3");
            $marks = $this->input->post("marks");
            $marks2 = $this->input->post("marks2");
            $marks3 = $this->input->post("marks3");
            $myfile = $this->input->post("myfile");    

                 
        if($this->form_validation->run() === FALSE){
            
             $this->load->view('templates/header');
             $this->load->view('pages/prefer',$data);
             $this->load->view('templates/footer');
        
        }else{
            
            $this->session->set_userdata('course1', $course1);
            $this->session->set_userdata('course2', $course2);
            $this->session->set_userdata('course3', $course3);
            $this->session->set_userdata('marks', $marks);
            $this->session->set_userdata('marks2', $marks2);
            $this->session->set_userdata('marks3', $marks3);
            $this->session->set_userdata('myfile', $myfile);




            //next page
            $this->load->view('templates/header');
            $this->load->view('pages/personal',$data);
            $this->load->view('templates/footer');
         }
    }                    
}
?>