<?php
include_once '../bd/ClasePDO.php';
include_once "UsuarioDao.php";
include_once '../dto/UsuarioDto.php';
include_once "BaseDao.php";


class UsuarioDaoImp implements UsuarioDao{
    
    public function agregar($dto) {
        try {
            $pdo = new clasePDO();
            $stmt= $pdo->prepare("INSERT INTO usuario(rut, nombre,"
                    . "apellido_paterno, apellido_materno,contrasena) VALUES(?,?,?,?,?)");

            $stmt->bindValue(1, $dto->getRut());
            $stmt->bindValue(2, $dto->getNombre());
            $stmt->bindValue(3, $dto->getApellidoPaterno());
            $stmt->bindValue(4, $dto->getApellidoMaterno());
            $stmt->bindValue(5, $dto->getContrasena());
            $stmt->execute();
            if($stmt->rowCount()>0)
                return TRUE;
            $pdo=NULL;            
        } catch (Exception $exc) {
            echo "Error dao al agregar ".$exc->getMessage();
        }
        return FALSE;
    }

    public function existeRegistro($key) {
        try {
            $pdo = new clasePDO();
            $stmt= $pdo->prepare("SELECT RUT FROM usuario WHERE rut=?");
            $stmt->bindParam(1, $key);
            $stmt->execute();
            
            if(count($stmt->fetchAll())>0){
                return TRUE;
            }
            $pdo=NULL;            
        } catch (Exception $exc) {
            echo "Error dao al validar rut ".$exc->getMessage();
        }
        return FALSE;
    }

    public static function listar() {
        $lista = new ArrayObject();
        try {
            $pdo= new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM usuario");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                $dto = new UsuarioDto();
                $dto->setRut($value["rut"]);
                $dto->setNombre($value["nombre"]);
                $dto->setApellidoPaterno($value["apellido_paterno"]);
                $dto->setApellidoMaterno($value["apellido_materno"]);
                $dto->setContrasena($value["contrasena"]);
                $dto->setPerfil($value["perfil"]);
                $lista->append($dto);                
            }
            $pdo=NULL;
        } catch (Exception $exc) {
            echo "Error dao al listar ".$exc->getMessage();
        }
        return $lista;
    }

    public function modificar($dto) {
        try {
            $pdo= new clasePDO();
            $stmt= $pdo->prepare("UPDATE Alumno SET nombre=?,"
                    . "apellido_paterno=?, apellido_materno=?, contrasena=? WHERE rut=?");
            $stmt->bindValue(1, $dto->getNombre());
            $stmt->bindValue(2, $dto->getApellidoPaterno());
            $stmt->bindValue(3, $dto->getApellidoMaterno());
            $stmt->bindValue(4, $dto->getContrasena());
            $stmt->bindValue(5, $dto->getRut());
            $stmt->execute();
            if($stmt->rowCount()>0)
                return TRUE;
            $pdo=NULL;                             
        } catch (Exception $exc) {
            echo "Error dao al modificar ".$exc->getMessage();
        }
        return FALSE;
    }


    public function buscarPorClavePrimaria($id) {
        $usuario = null;
        try {
            $pdo= new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM usuario WHERE rut=?");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                $usuario = new UsuarioDto();
                $usuario->setRut($value["rut"]);
                $usuario->setNombre($value["nombre"]);
                $usuario->setApellidoPaterno($value["apellido_paterno"]);
                $usuario->setApellidoMaterno($value["apellido_materno"]);
                $usuario->setContrasena($value["contrasena"]);
                $usuario->setPerfil($value["perfil"]);            
            }
            $pdo=NULL;
        } catch (Exception $exc) {
            echo "Error dao al buscar por clave primaria ".$exc->getMessage();
        }
        return $usuario;
    }

}
