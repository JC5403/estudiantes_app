<?php

namespace models;


class Estudiante 
{
    protected $id;
    protected $codigo;
    protected $nombres;
    protected $apellidos;
    protected $edad;

    public function get ($nameFiel){
        return $this->{$nameFiel};
    }
    public function set ($nameFiel, $value){
        $this->{$nameFiel}= $value;
    }
}
