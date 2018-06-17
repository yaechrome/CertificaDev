<?php
include_once "BaseDao.php";
interface UsuarioDao extends BaseDao{

    public function agregar($dto);

    public function modificar($dto);

    public function existeRegistro($key);
    
    
}
