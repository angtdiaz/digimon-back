<?php

namespace App\Models;


class FieldDTO
{

    public int $id;
    public String $name;

    public function __construct($field)
    {
        $this->id = $field['id'];
        $this->name = $field['field'];
    }
}
