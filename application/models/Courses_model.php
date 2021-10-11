<?php 
class Courses_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_courses($course_no = FALSE){
        if($course_no == NULL){
            $query = $this->db->get('courses');
            return $query->result_array();
        }
        
        $query = $this->db->get_where('courses', array('course_no' => $course_no));
		return $query->row_array();
        // var_dump($query);
    }

    public function preferdetails($post_file1, $post_file2, $post_file3, $post_filer1, $post_filer2, $post_filer3 , $post_filew1, $post_filew2, $post_filew3){
        // Students data array
        $data = array(
            'pref1' => $this->input->post('course1'),
            'pref2' => $this->input->post('course2'),
            'pref3' => $this->input->post('course3'),
            'stuid' => $this->input->post('alindex'),
            'AL_year' => $this->input->post('year'),
            // 'marks' => $this->input->post('pemarks1'),
            // 'marks2' => $this->input->post('pemarks2'),
            // 'marks3' => $this->input->post('pemarks3'),
            // 'myfile' => $this->input->post('myfile'),
            'category' => $this->input->post('category'),
            'filename' => $post_file1.','.$post_file2.','.$post_file3,
            'filenamer' => $post_filer1.','.$post_filer2.','.$post_filer3,
            'filenamew' => $post_filew1.','.$post_filew2.','.$post_filew3,
            'gitmarks' => $this->input->post('gitmk'),
        );

        // Insert preference detail
        return $this->db->insert('courseselect', $data);//Tablename is used as 'student      


    }

    public function choiceDetails(){
        $alindex = $this->input->post('alindex');
        $this->db->where('stuid', $alindex);
        $query = $this->db->get('courseselect');

        return $query->result_array();
    }

    public function updatecourses(){
        $alindex = $this->input->post('alindex');
        $data = array(
            'pref1' => $this->input->post('course1'),
            'pref2' => $this->input->post('course2'),
            'pref3' => $this->input->post('course3'),
            'category' => $this->input->post('category'),
            'gitmarks' => $this->input->post('gitmk')
        );

        $this->db->where('stuid', $alindex);
		return $this->db->update('courseselect', $data);
    }
}
