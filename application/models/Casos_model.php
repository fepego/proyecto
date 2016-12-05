<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Casos_model extends CI_Model
{
  function __construct()
  {
       // Call the Model constructor
       parent::__construct();
  }
  /**
   * Function agrega el reporte en la base de datsos
   * @param  [type] $datos [arreglo de datos del reporte a partir del formulario ]
   * @return [type]        [description]
   */
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
  /**
   * Recupera en orden ascendente reportes
   * @param  [type] $datos [arreglo con intervalo de fechas a consultar]
   * @return [type]        [description]
   */
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
