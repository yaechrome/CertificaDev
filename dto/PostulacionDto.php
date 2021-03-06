<?php

class PostulacionDto {

    private $id;
    private $usuario;
    private $fechaNacimiento;
    private $sexo;
    private $telefono;
    private $email;
    private $direccion;
    private $comuna;
    private $educacion;
    private $experienciaProgramacion;
    private $cantidadAhos;
    private $modalidad;
    private $curso;
    private $fechaPostulacion;
    private $estado;

    function __construct() {
        
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function getFechaPostulacion() {
        return $this->fechaPostulacion;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getComuna() {
        return $this->comuna;
    }

    function getEducacion() {
        return $this->educacion;
    }

    function getExperienciaProgramacion() {
        return $this->experienciaProgramacion;
    }

    function getCantidadAhos() {
        return $this->cantidadAhos;
    }

    function getModalidad() {
        return $this->modalidad;
    }

    function getCurso() {
        return $this->curso;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setComuna($comuna) {
        $this->comuna = $comuna;
    }

    function setEducacion($educacion) {
        $this->educacion = $educacion;
    }

    function setExperienciaProgramacion($experienciaProgramacion) {
        $this->experienciaProgramacion = $experienciaProgramacion;
    }

    function setCantidadAhos($cantidadAhos) {
        $this->cantidadAhos = $cantidadAhos;
    }

    function setModalidad($modalidad) {
        $this->modalidad = $modalidad;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }

    function setFechaPostulacion($fechaPostulacion) {
        $this->fechaPostulacion = $fechaPostulacion;
    }

}
