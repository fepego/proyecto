<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Casos_model extends CI_Model
{
  function __construct()
  {
       // Call the Model constructor
       parent::__construct();
  }
  public function agregarReporte($datos)
  {
      if($this->db->insert('asignacion_casos',$datos))
     {
       return TRUE;
     }
     else {
       return FALSE;
     }
  }
  public function consultarReportes($datos)
  {

    $this->db->select("*");
    $this->db->from("asignacion_casos");
    $this->db->where("Fecha >=",$datos['fechaInicio']);
    $this->db->where("Fecha <=",$datos['fechaFin']);
    $query = $this->db->get();
    if($query->num_rows()>0)
    {
      return $query;
    }
    else {
      return false;
    }
  }
}
