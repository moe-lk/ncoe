<?php
class MulikaPirivena extends CI_Controller{
    public function index(){
        $data['title'] = 'Enter Mulika Pirivena Exam index number';

        $this->load->view('templates/header');
        $this->load->view('pages/mulika_pirivena',$data);
        $this->load->view('templates/footer');
    }

    public function checkmulres(){
        $data['title'] = 'Mulika Pirivena Exam Results';

        $this->load->view('templates/header');
        $this->load->view('pages/mulikapirivenaresults',$data);
        $this->load->view('templates/footer');
    }
}
?>