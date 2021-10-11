<?php
	class Submission extends CI_Controller{
        public function index(){
            $data['title'] = 'Submit your details';
    
            $this->load->view('templates/header');
            $this->load->view('pages/submission',$data);
            $this->load->view('templates/footer');
        }

        public function submit(){
            $post_file1 = $_SESSION['post_file1']; 
            $post_file2 = $_SESSION['post_file2']; 
            $post_file3 = $_SESSION['post_file3']; 
            $post_filer1 = $_SESSION['post_filer1']; 
            $post_filer2 = $_SESSION['post_filer2']; 
            $post_filer3 = $_SESSION['post_filer3']; 
            $post_filew1 = $_SESSION['post_filew1']; 
            $post_filew2 = $_SESSION['post_filew2']; 
            $post_filew3 = $_SESSION['post_filew3'];
            $data['title'] = 'Form Submit';

            $this->students_model->personaldetails();
            $this->courses_model->preferdetails($post_file1, $post_file2, $post_file3, $post_filer1, $post_filer2, $post_filer3, $post_filew1, $post_filew2, $post_filew3);

            
            $this->load->view('pages/afterload');
        }
    }