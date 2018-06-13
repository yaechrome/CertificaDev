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
                $usuarioDao = new UsuarioDaoImp();
                $comunaDao = new ComunaDaoImp();
                $educacionDao = new EducacionDaoImp();
                $usuario = $usuarioDao->buscarPorClavePrimaria($value["rut"]);
                $educacion = $educacionDao->buscarPorClavePrimaria($value["educacion"]);
                $comuna = $comunaDao->buscarPorClavePrimaria($value["comuna"]);
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
        try {
            $pdo = new clasePDO();
            $stmt= $pdo->prepare("INSERT INTO postulacion(rut, fecha_nacimiento,"
                    . "sexo, telefono,email,direccion,comuna, educacion,experiencia_programacion,) VALUES(?,?,?,?,?)");
            //dado que pasamos el rut por referencia cambiamos de
            //bindParam a bindValue
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

    public function eliminar($idPostulacion) {
        
    }

    public function modificar($dto) {
        
    }

    public function buscarPorClavePrimaria($id) {
        
    }

}
