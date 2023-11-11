<?php

namespace App\Models;


class FieldDTO
{

    public int $id;
    public String $name;
    public ?String $image;

    public function __construct($field)
    {
        $this->id = $field['id'];
        $this->name = $field['field'];
        $this->image  = $field['image'] ?? null;
    }
}
