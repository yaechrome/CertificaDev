<?php

interface PostulacionDao extends BaseDao {

    public function listarPorRut($rut);
    
    public function agregar($dto);

    public function modificar($dto);
    
    public function eliminar($idPostulacion);

}
