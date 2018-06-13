<?php


class PostulacionDaoImp implements PostulacionDao{
    
    public function listar() {
        try {
            $lista = new ArrayObject();
            $pdo = new clasePDO();
            $stmt= $pdo->prepare("select * from postulacion");
            $stmt->execute();
            
            $postulaciones = $stmt->fetchAll();
            foreach ($postulaciones as $value) {
                $postulacion = new PostulacionDto();
                $usuario = null;
                $comuna = null;
                $educacion = null;
                $postulacion->setId($value["id"]);
                $postulacion->setUsuario($usuario);
                $postulacion->setFechaNacimiento($value["fecha_nacimiento"]);
                $postulacion->setSexo($value["sexo"]);
                $postulacion->setTelefono($value["telefono"]);
                $postulacion->setEmail($value["email"]);
                $postulacion->setDireccion($value["direccion"]);
                $postulacion->setComuna($comuna);
                $postulacion->setEducacion($educacion);
                $postulacion->setExperienciaProgramacion($value["experiencia_programacion"]);
                $postulacion->setCantidadAhos($value["cantidad_anhos"]);
                $postulacion->setModalidad($value["modalidad"]);
                $postulacion->setCurso($value["curso"]);
                $lista->append($postulacion);
            }
            
            $pdo=NULL;     
            
        } catch (Exception $exc) {
            echo "Error dao al listar Postulaciones ".$exc->getMessage();
        }
        return $lista;
    }

    public function listarPorRut($rut) {
        try {
            $lista = new ArrayObject();
            $pdo = new clasePDO();
            $stmt= $pdo->prepare("select * from postulacion where rut=?");
            $stmt->bindValue(1, $rut);
            $stmt->execute();
            $registro = $stmt->fetchAll();
            foreach ($registro as $value) {
                $postulacion = new PostulacionDto();
                $usuario = null;
                $comuna = null;
                $educacion = null;
                $postulacion->setId($value["id"]);
                $postulacion->setUsuario($usuario);
                $postulacion->setFechaNacimiento($value["fecha_nacimiento"]);
                $postulacion->setSexo($value["sexo"]);
                $postulacion->setTelefono($value["telefono"]);
                $postulacion->setEmail($value["email"]);
                $postulacion->setDireccion($value["direccion"]);
                $postulacion->setComuna($comuna);
                $postulacion->setEducacion($educacion);
                $postulacion->setExperienciaProgramacion($value["experiencia_programacion"]);
                $postulacion->setCantidadAhos($value["cantidad_anhos"]);
                $postulacion->setModalidad($value["modalidad"]);
                $postulacion->setCurso($value["curso"]);
                $lista->append($postulacion);
            }
            
            $pdo=NULL;     
            
        } catch (Exception $exc) {
            echo "Error dao al listar postulaciones ".$exc->getMessage();
        }
        return $lista;
    }

    public function agregar($dto) {
        
    }

    public function eliminar($idPostulacion) {
        
    }

    public function modificar($dto) {
        
    }

    public function buscarPorClavePrimaria($id) {
        
    }

}
