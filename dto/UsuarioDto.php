<?php

class UsuarioDto {
    private $rut;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $contrasena;
    private $perfil;
    
    function __construct() {
        
    }
    
    function getRut() {
        return $this->rut;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidoPaterno() {
        return $this->apellidoPaterno;
    }

    function getApellidoMaterno() {
        return $this->apellidoMaterno;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidoPaterno($apellidoPaterno) {
        $this->apellidoPaterno = $apellidoPaterno;
    }

    function setApellidoMaterno($apellidoMaterno) {
        $this->apellidoMaterno = $apellidoMaterno;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

//    public function __toString() {
//        return $this->rut . " " . $this->nombre . " " .
//                $this->apellidoPaterno . " " . $this->apellidoMaterno.
//                $this->contrasena . " " . $this->perfil;
//    }


}
