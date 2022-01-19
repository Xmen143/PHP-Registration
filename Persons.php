<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Persons extends CI_Controller {

    public function index(){

       
        // load base_url
        $this->load->helper('url');

        //load model
        $this->load->model('Main_model');

        // Get 
        $edit = $this->input->get('edit'); 

        if(!isset($edit)){
            // get data
            $data['response'] = $this->Main_model->getUsersList();
            $data['view'] = 1;

            // load view
            $this->load->view('person',$data);
        }else{

            // Check submit button POST or not
            if($this->input->post('submit') != NULL ){
                // POST data
                $postData = $this->input->post();

                

                //load model
                $this->load->model('Main_model');

                // Update record
                $this->Main_model->updateUser($postData,$edit);

                // Redirect page
                redirect('persons/');

            }else{

                // get data by id
                $data['response'] = $this->Main_model->getUserById($edit);
                $data['view'] = 2;

                // load view
                $this->load->view('person',$data);

            }
            

            
        }
        
        
    }

    public function deletedata()
	{
	$id=$this->input->get('id');
    $this->load->model('Main_model');
	$data['response'] = $this->Main_model->deleteskater($id);
	redirect("persons/");
	}

    public function savedata()
	{
		//load registration view form
		$this->load->view('create');
        $this->load->model('Main_model');
        $this->load->database();
		//Check submit button 
		if($this->input->post('save'))
		{
		//get form's data and store in local varable
		$n=$this->input->post('username');
		$e=$this->input->post('name');
		$m=$this->input->post('email');
		
//call saverecords method of Hello_Model and pass variables as parameter
		$this->Main_Model->saverecords($n,$e,$m);		
		echo "Records Saved Successfully";
        redirect("persons/");
		}
        
	}
    public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	//load database libray manually
	$this->load->database();
	
	//load Model
	$this->load->model('Main_Model');
	}

}