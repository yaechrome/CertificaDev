<?php

interface UsuarioDao extends BaseDao{

    public function agregar($dto);

    public function modificar($dto);

    public function existeRegistro($key);
    
    public function buscarUsuarioPorRut($rut);
    
}
