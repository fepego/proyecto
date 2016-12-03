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
    public function getAnalitas()
    {
      $condicion= "ID_rol= 3";
        $this->db->select('*');
       $this->db->from('Usuario');
       $this->db->where($condicion);
       $query = $this->db->get();

       if ($query->num_rows() > 0) {
         return $query;
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
public function buscarIdUsuario($data)
{
  $cond="ID_usuario= '". $data['ID_usuario']."'";
  $this->db->select('*');
  $this->db->from('usuario');
  $this->db->where($cond);
  $this->db->limit(1);
  $query = $this->db->get();
  if($query->num_rows()==1)
  {
    return FALSE;
  }
  return TRUE;
}
public function buscarEmail($data)
{
  $cond="email= '".$data['Email']."'";
  $this->db->select('*');
  $this->db->from('usuario');
  $this->db->where($cond);
  $this->db->limit(1);
  $query = $this->db->get();
  if($query->num_rows()==1)
  {
    return FALSE;
  }
  return TRUE;
}
    public function insertarUsuario($datos)
{
    if($this->db->insert('usuario',$datos))
   {
     return TRUE;
   }
   else {
     return FALSE;
   }
}
    public function obtenerRoles()
    {
        $this->db->select('*');
       $this->db->from('Rol');
       $query = $this->db->get();
        if ($query->num_rows() >= 1) {
         return $query;
       } else {
         return false;
       }
    }
    public function obtenerIdRol($rol)
    {
        $cond= "nombre_rol= '".$rol."'";
        $this->db->select('ID_rol');
        $this->db->from('Rol');
        $this->db->where($cond);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $res= $query->result();
            return $res[0]->ID_rol;
        }
        return FALSE;
    }
    public function consPass($datos)
{
  $cond="ID_usuario='".$datos['usuario']."' AND Pass='".$datos['passAct']."'";
  $this->db->select('*');
  $this->db->from('Usuario');
  $this->db->where($cond);
  $res=$this->db->get();
  if($res->num_rows()>0)
  {
    return true;
  }
  return false;
}
    public function cambiarPass($datos)
{
  $tup=array(
    'pass'=>$datos['passNuevo']
  );
  $qry="UPDATE usuario SET Pass='".$datos['passNuevo']."' WHERE ID_usuario='".$datos['usuario']."'";
  if($this->db->query($qry))
  {
    return true;
  }
  return false;
}

}
