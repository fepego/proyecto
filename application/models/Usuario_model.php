<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }
     /**
      * obtene todos los usuarios de la base de datos
      * @return [type] [description]
      */
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
    /**
     * Obtiene todos los analistas de la base de datos
     * @return [type] [description]
     */
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
    /**
     * Verifica si el usuario existe en la bd con ese usuario y contraseña
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
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
    /**
     * Obtiene la información del usuario
     * @param  [type] $username [Id de usuario]
     * @return [type]           [description]
     */
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
     /**
      * Busca un usuario a partir de su ID
      * @param  [type] $data [description]
      * @return [type]       [description]
      */
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
/**
 * busca si existe el usuario mediante su correo electronico
 *
 * @param  [type] $data [email de usuario]
 * @return [boolean]       [si existe el usuario false, si no true]
 */
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
/**
 * persiste usuario en base de datos
 * @param  [type] $datos [arreglo con la información de usuario]
 * @return [boolean]        [true si se realizó con exito la operación]
 */
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
/**
 * Obtiene los roles del sistema
 * @return [type] [arreglo de roles]
 */
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
    /**
     * busca si existe el rol en la base de datos
     * @param  [type] $rol [rol a buscar]
     * @return [type]      [información del rol ]
     */
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
/**
 * actualiza en la base de datos la contraseña de usuario
 * @param  [type] $datos [description]
 * @return [type]        [description]
 */
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
