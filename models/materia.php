<?php 

namespace models;

class Estudiante
{
    protected $id;
    protected $codigo;
    protected $nombres;
    
    public function get ($nameField){
        return $this->{$nameField};
    }

    public function set ($nameField, $value){
        $this->{$nameField} = $value;
    }
}