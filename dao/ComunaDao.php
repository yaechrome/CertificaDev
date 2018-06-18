<?php

include_once 'BaseDao.php';

interface ComunaDao extends BaseDao{
    public function buscarPorNombre($nombre);
}
