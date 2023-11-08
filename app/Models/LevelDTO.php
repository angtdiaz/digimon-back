<?php


namespace App\Models;


class LevelDTO
{

    public int $id;
    public String $name;

    public function __construct($level)
    {
        $this->id = $level['id'];
        $this->name =  $level['level'];
    }
}
