<?php

interface PostulacionDao extends BaseDao {

    public function listarPorRut($rut);
    
    public function agregar($dto);

    public function modificar($dto);
    
    public function eliminar($idPostulacion);
    
    public function buscarPorFecha($desde, $hasta);
    
    public function BuscarUltimaSolicitud($rut);

}
