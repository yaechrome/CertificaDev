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
                $postulacion->setFechaPostulacion($value["fecha_postulacion"]);
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
                $postulacion->setFechaPostulacion($value["fecha_postulacion"]);
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
                    . "sexo, telefono,email,direccion,comuna, educacion,experiencia_programacion,"
                    . "cantidad_anhos, modalidad, curso, fecha_postulacion) VALUES(?,?,?,?,?,?,?,?,?,?,?, now())");
            
            $stmt->bindValue(1, $dto->getRut());
            $stmt->bindValue(2, $dto->getFechaNacimiento());
            $stmt->bindValue(3, $dto->getSexo());
            $stmt->bindValue(4, $dto->getTelefono());
            $stmt->bindValue(5, $dto->getEmail());
            $stmt->bindValue(6, $dto->getDireccion());
            $stmt->bindValue(7, $dto->getComuna());
            $stmt->bindValue(8, $dto->getEducacion());
            $stmt->bindValue(9, $dto->getExperienciaProgamacion());
            $stmt->bindValue(10, $dto->getCantidadAhos());
            $stmt->bindValue(11, $dto->getModalidad());
            $stmt->bindValue(12, $dto->getCurso());
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
        
        try {
            $pdo = new clasePDO();
            $stmt= $pdo->prepare("delete from postulacion where id=?");

            $stmt->bindValue(1, $idPostulacion);

            $stmt->execute();
            if($stmt->rowCount()>0)
                return TRUE;
            $pdo=NULL;    
            
        } catch (Exception $exc) {
            echo "Error dao al eliminar ".$exc->getMessage();
        }
        return FALSE;
    }

    public function modificar($dto) {
         try {
            $pdo= new clasePDO();
            $stmt= $pdo->prepare("update postulacion set fecha_nacimiento=?, "
                    . "sexo=?, telefono=?, email=, direccion=?, comuna=?, "
                    . "educacion=?, experiencia_programacion=?, "
                    . "cantidad_anhos=?, modalidad=?, curso=? where id=?");
            
            $stmt->bindValue(1, $dto->getFechaNacimiento());
            $stmt->bindValue(2, $dto->getSexo());
            $stmt->bindValue(3, $dto->getTelefono());
            $stmt->bindValue(4, $dto->getEmail());
            $stmt->bindValue(5, $dto->getDireccion());
            $stmt->bindValue(6, $dto->getComuna());
            $stmt->bindValue(7, $dto->getEducacion());
            $stmt->bindValue(8, $dto->getExperienciaProgamacion());
            $stmt->bindValue(9, $dto->getCantidadAhos());
            $stmt->bindValue(10, $dto->getModalidad());
            $stmt->bindValue(11, $dto->getCurso());  
            $stmt->bindValue(11, $dto->getId());  

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
        try {
            $postulacion = new PostulacionDto();
            $pdo = new clasePDO();
            $stmt= $pdo->prepare("select * from postulacion where id=?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $registro = $stmt->fetchAll();
            foreach ($registro as $value) {
                
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
                
            }
            
            $pdo=NULL;     
            
        } catch (Exception $exc) {
            echo "Error dao al buscar postulación ".$exc->getMessage();
        }
        return $postulacion;
    }

    public function buscarPorFecha($desde, $hasta) {
       
        try {
            $lista = new ArrayObject();
            $pdo = new clasePDO();
            $stmt= $pdo->prepare("select * from postulacion where fecha_postulacion BETWEEN CAST(? AS DATE) AND CAST(? AS DATE)");
            $stmt->bindValue(1, $desde);
            $stmt->bindValue(2, $hasta);
            $stmt->execute();
            $registro = $stmt->fetchAll();
            foreach ($registro as $value) {
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
                $postulacion->setFechaPostulacion($value["fecha_postulacion"]);
                $lista->append($postulacion);
            }
            
            $pdo=NULL;     
            
        } catch (Exception $exc) {
            echo "Error dao al listar postulaciones por rango de fecha ".$exc->getMessage();
        }
        return $lista;
    }

}
