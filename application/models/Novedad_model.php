<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Novedad_model extends CI_Model
{
  function __construct()
  {
       // Call the Model constructor
       parent::__construct();
  }
  /**
   * agregar en bd la novedad del analista
   * @param  [type] $datos [arreglo de datos con la novedad del analista a partir del formulario]
   * @return [type]        [description]
   */
  public function agregarNovedad($datos)
  {
    if($this->db->insert('novedad',$datos))
   {
     return TRUE;
   }
   else {
     return FALSE;
   }
  }
  /**
   * Consulta las novedades realizadas por un usuario
   * @param  [type] $usuario [description]
   * @return [type]          [description]
   */
  public function consultarNovedad($usuario)
  {
    $this->db->select('*');
    $this->db->from('novedad');
    $this->db->where('Usuario = ',$usuario);
    $this->db->order_by("FechaInicio","desc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
  /**
   * Obtiene una novedad a partir de un id
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function getNovedad($id)
  {
    $this->db->select('*');
    $this->db->from('novedad');
    $this->db->where('ID = ',$id);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
  /**
   * cambia el estado de la novedad
   * @param  [type] $datos [arreglo con estado a modificar y el id de la nvedad]
   * @return [type]        [description]
   */
  public function actualizarNovedad($datos)
  {
    $qry="UPDATE novedad SET Estado='".$datos['Estado']."' WHERE ID='".$datos['ID']."'";
    if($this->db->query($qry))
    {
      return true;
    }
    return false;
  }
}
