<?php

interface BaseDao {

    public static function listar();
    
    public function buscarPorClavePrimaria($id);
}
