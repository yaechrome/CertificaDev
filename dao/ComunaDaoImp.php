<?php
include_once '../bd/ClasePDO.php';
include_once '../dto/ComunaDto.php';
include_once 'BaseDao.php';

class ComunaDaoImp implements BaseDao{
    
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

}
