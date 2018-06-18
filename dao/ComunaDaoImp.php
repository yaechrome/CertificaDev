<?php
include_once '../bd/ClasePDO.php';
include_once '../dto/ComunaDto.php';
include_once 'BaseDao.php';
include_once 'ComunaDao.php';

class ComunaDaoImp implements ComunaDao{
    
    public static function listar() {
        $lista = new ArrayObject();
        try {
            $pdo= new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM comuna");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                $lista->append($value["descripcion"]);                
            }
            $pdo=NULL;
        } catch (Exception $exc) {
            echo "Error dao al listar ".$exc->getMessage();
        }
        return $lista;
    }

    public function buscarPorClavePrimaria($id) {
        $comuna = new ComunaDto();
        try {
            $pdo= new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM comuna where id=?");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                $comuna->setId($value["id"]);
                $comuna->setDescripcion($value["descripcion"]);
            }
            $pdo=NULL;
        } catch (Exception $exc) {
            echo "Error dao al buscar por id ".$exc->getMessage();
        }
        return $comuna;
    }
    
    public function buscarPorNombre($nombre){
        
        $comuna = null;
        try {
            $pdo= new clasePDO();
            $stmt = $pdo->prepare("select id from comuna where nombre=?");
            $stmt->bindParam(1, $nombre);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                $comuna= $value["descripcion"];
            }
            $pdo=NULL;
        } catch (Exception $exc) {
            echo "Error dao al buscar por id ".$exc->getMessage();
        }
        return $comuna;
    }

}
