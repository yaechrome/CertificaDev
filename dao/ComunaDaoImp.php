<?php


class ComunaDaoImp implements BaseDao{
    
    public function listar() {
        $lista = new ArrayObject();
        try {
            $pdo= new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM comuna");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                $dto = new ComunaDto();
                $dto->setId($value["id"]);
                $dto->setDescripcion($value["descripcion"]);
                $lista->append($dto);                
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
