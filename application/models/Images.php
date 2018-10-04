<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Images extends CI_Model{   
    public function insert($data = array()) {

        $attData = array(
                'name' => $data['upload_data']['file_name'],
                'file_path' => base_url().'files/'.$data['upload_data']['file_name'],
                'root_path' => $data['upload_data']['file_path']
        );

        $this->load->database();

        $insert = $this->db->insert('attachment', $attData);
        
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }

}