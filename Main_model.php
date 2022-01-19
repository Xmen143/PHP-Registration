<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_model extends CI_Model {

    
    function getUsersList(){
        $this->db->select('*');
        $q = $this->db->get('person');
        $result = $q->result_array();
        return $result;
    }

    
    function getUserById($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        $q = $this->db->get('person');
        $result = $q->result_array();
        return $result;
    }

    
    function updateUser($postData,$id){

        $username = trim($postData['txt_username']);
        $name = trim($postData['txt_name']);
        $email = trim($postData['txt_email']);
        if($name !='' && $email !='' && $username !=''  ){

            // Update
            $value=array('name'=>$name,'email'=>$email, 'username'=>$username);
            $this->db->where('id',$id);
            $this->db->update('person',$value);

        }
         

    }

   function deleteskater($id){
        $this->load->database();
        $this->db->query("delete from person where id='".$id."'");
    }


    function saverecords($username,$name,$email)
	{
        $this->load->database();
	$query="insert into person values('id','$username','$name','$email')";
	$save = $this->db->query($query);
    print_r($save);
	}
}