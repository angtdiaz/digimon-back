<?php


namespace App\Models;


class TypeDTO
{

    public int $id;
    public String $name;


    public function __construct($type)
    {
        $this->id = $type['id'];
        $this->name = $type['type'];
    }
}
