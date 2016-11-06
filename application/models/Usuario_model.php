<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }
    public function getUsuarios()
    {
        $this->db->select('*');
       $this->db->from('Usuario');
       $this->db->limit(1);
       $query = $this->db->get();

       if ($query->num_rows() == 1) {
         return $query->result();
       } else {
         return false;
       }
    }
    public function login($data)
    {
       $condition = "ID_usuario =" . "'" . $data['username'] . "' AND " . "Pass =" . "'" . $data['password']."'";
       $this->db->select('*');
       $this->db->from('Usuario');
       $this->db->where($condition);
       $this->db->limit(1);
       $query = $this->db->get();

       if ($query->num_rows() == 1) {
         return true;
       } else {
         return false;
       }
    }
    public function leerUsuario($username) {

       $condition = "ID_usuario =" . "'" . $username . "'";
       $this->db->select('*');
       $this->db->from('Usuario');
       $this->db->where($condition);
       $this->db->limit(1);
       $query = $this->db->get();

       if ($query->num_rows() == 1) {
         return $query->result();
       } else {
         return false;
       }
     }
    
}
         