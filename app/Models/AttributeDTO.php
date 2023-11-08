<?php


namespace App\Models;


class AttributeDTO
{

    public int $id;
    public String $name;



    public function __construct($attribute)
    {
        $this->id = $attribute['id'];
        $this->name = $attribute['attribute'];
    }
}
