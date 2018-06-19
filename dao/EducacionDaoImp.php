<?php
include_once 'BaseDao.php';
include_once '../bd/ClasePDO.php';

class EducacionDaoImp implements BaseDao{
    
    public static function listar() {
        try {
            $lista = new ArrayObject();
            $pdo = new clasePDO();
            $stmt= $pdo->prepare("select * from educacion");
            $stmt->execute();
            
            $educaciones= $stmt->fetchAll();
            foreach ($educaciones as $value) {
                $educacion = new EducacionDto();
                $educacion->setId($value["id"]);
                $educacion->setDescripcion($value["descripcion"]);

                $lista->append($educacion);
            }
            
            $pdo=NULL;     
            
        } catch (Exception $exc) {
            echo "Error dao al listar Postulaciones ".$exc->getMessage();
        }
        return $lista;
    }

    public function buscarPorClavePrimaria($id) {
        $educacion = new EducacionDto();
        try {
            $pdo= new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM educacion WHERE id=?");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                $educacion->setId($value["id"]);
                $educacion->setDescripcion($value["descripcion"]);               
            }
            $pdo=NULL;
        } catch (Exception $exc) {
            echo "Error dao al buscar por clave primaria ".$exc->getMessage();
        }
        return $educacion;
    }

}
