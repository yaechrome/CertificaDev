<?php

interface BaseDao {

    public function listar();
    
    public function buscarPorClavePrimaria($id);
}
