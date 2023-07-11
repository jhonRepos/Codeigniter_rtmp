<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	    $this->load->model('Movie_model');
        $this->load->library('user_agent');
        $logged_in = $this->session->userdata('logged_in');
        
        if($logged_in !== TRUE || empty($logged_in))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('login'); # Login view
        }
	}
    public function index()
    {
        
        $data['category']=$this->Movie_model->getCategory();

        $this->load->view('templates/Header');
		$this->load->view('templates/NavHead');
		$this->load->view('templates/NavSide');
		$this->load->view('movie_view',$data);
		$this->load->view('templates/Footer');
		$this->load->view('movie_footer');
		
    }

    private $error;
    //variable for storing success message
    private $success;
    //appends all error messages
    private function handle_error($err) {
        $this->error .= $err . "\r\n";
    }
    
    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "\r\n";
    }
    
    
    function uploadvideo() {
        
       $catfolder= $this->input->post('category');
        $upload=array();
        $upload_path = './public/uploads/movie/'.$catfolder;
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'mp4|avi|flv|wmv|ogv|webm|';
        $config['max_size'] = '20000000';
        $config['quality'] = '100%';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = FALSE;
        $video_data = array();
        $is_file_error = FALSE;
        if (!$_FILES) {
            $is_file_error = TRUE;
            $this->handle_error('Select a video file.');
        }
        //if file was selected then proceed to upload
        if (!$is_file_error) {
            //load the preferences
            $this->load->library('upload', $config);
            //check file successfully uploaded. 'video_name' is the name of the input
            if (!$this->upload->do_upload('video_name')) {
                //if file upload failed then catch the errors
                $this->handle_error($this->upload->display_errors());
                $is_file_error = TRUE;
            } else {
                //store the video file info
                $video_data = $this->upload->data();
                
            }
        }
        // There were errors, you have to delete the uploaded video
        if ($is_file_error) {
            if ($video_data) {
                $file = $upload_path . $video_data['file_name'];
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        } else {
            $data['video_name'] = $video_data['file_name'];
            $data['video_path'] = $upload_path;
            $data['video_type'] = $video_data['file_type'];
//             $code50=array(
                
//                 'Ma_applicant_id'         =>$this->input->post('maidinsert'),
//                 'Attachment'         =>$video_data['file_name'],
//                 'Label'                   =>'Video',
                
                
//             );
//             $sigresult= $this->db->insert('ma_requirements',$code50);
            $upload['res']= 'ok';
            $upload['msg']= $video_data['file_name'];
          
        }
        
        echo json_encode($upload);
    }
    

    public function add() {
        // Load the form helper and validation library
        
        
        // Set validation rules for the form fields
        $this->form_validation->set_error_delimiters('<span style="color:red;">(',')</span>');
        $this->form_validation->set_rules('category', 'Category Name', 'required');
        $this->form_validation->set_rules('title', 'Stream URL', 'required');
        $this->form_validation->set_rules('description', 'description ', 'required');
        $this->form_validation->set_rules('duration', 'duration ', 'required');
        $this->form_validation->set_rules('video_nameses', 'Movie ', 'required');
        $this->form_validation->set_rules('thumbnail', 'Thumbnail', 'callback_file_check');
        $this->form_validation->set_rules('subtitle', 'Subtitle', 'callback_subtitle_check');
        
        $this->form_validation->set_message('is required');
        
        if ($this->form_validation->run() === FALSE) {
            // Display the form again if validation fails
            $this->session->set_flashdata("category",form_error('category'));
            $this->session->set_flashdata("title",form_error('title'));
            $this->session->set_flashdata("description",form_error('description'));
            $this->session->set_flashdata("duration",form_error('duration'));
            $this->session->set_flashdata("thumbnail",form_error('thumbnail'));
            $this->session->set_flashdata("subtitle",form_error('subtitle'));
            $this->session->set_flashdata("video_nameses",form_error('video_nameses'));
            
            $this->session->set_flashdata("categoryVal",$this->input->post('category'));
            $this->session->set_flashdata("titleVal",$this->input->post('title'));
            $this->session->set_flashdata("descriptionVal",$this->input->post('description'));
            $this->session->set_flashdata("durationVal",$this->input->post('duration'));
            $this->session->set_flashdata("video_namesesVal",$this->input->post('video_nameses'));
            
            $this->session->set_flashdata("success","Failed to insert");
            redirect('movie');
        } else {
            // Insert the new channel into the database
            
            $this->Movie_model->addMovie();
            // Redirect to the channel list page
            $this->addjson($this->input->post('category'),$this->input->post('video_nameses'));
            $this->session->set_flashdata("success","Success to insert");
            
            
            redirect('movie');
        }
    }
    
    public function file_check($str)
    {
        $allowed_mime_types = array('image/gif', 'image/jpeg', 'image/png', 'image/jpg');
        $mime_type = get_mime_by_extension($_FILES['thumbnail']['name']);
        
        if (in_array($mime_type, $allowed_mime_types)) {
            return true;
        }
        else {
            $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
            return false;
        }
    }
    
    public function subtitle_check($str)
    {
    
        $allowed_mime_types = array('text/vtt', 'application/x-subrip');
        $mime_type = get_mime_by_extension($_FILES['subtitle']['name']);
        
        if (in_array($mime_type, $allowed_mime_types)) {
            return true;
        } else {
            $this->form_validation->set_message('subtitle_check', 'Please select only vtt/srt file.');
            return false;
        }
    }
//     function joke(){
        
 
//         // Set the directory path
//         $directory_path = './public/uploads/thumbnails/';
        
//         // Set the pattern to match image files with
//         $pattern = '*.{jpg,jpeg,png,gif}';
        
//         // Use glob() function to get a list of image files that match the pattern
//         $image_list = glob($directory_path . $pattern, GLOB_BRACE);
        
//         // Loop through the image list and output each image name
//         foreach ($image_list as $image_path) {
//             $image_name = basename($image_path);
//             echo $image_name . "<br>";
//         }
        
        
        
//     }
    function addjson($cat,$name){
        
        $split= explode('.' ,$name);
        $data = [
            'sequences' => [
                [
                    'clips' => [
                        [
                            'type' => 'source',
                            'path' => '/var/www/managetv/public/uploads/movie/'.$cat.'/'.$name.''
                        ]
                    ]
                ]
            ]
        ];

        
       $json_string = json_encode($data);
       $json = str_replace('\\/', '/', $json_string);
       
       
       $file_path = './public/uploads/json/'.$split[0].'.json'; // Replace with the path where you want to create the JSON file
        
      if ( ! write_file($file_path, $json))
        {
           
             'Unable to write the file';
        }
        else
        {
             'JSON file created!';
           
        }
        
      
    }
}
