<?php


namespace App\Models;


class DigimonDTO
{

    public int $id;
    public String $name;
    public String $image;
    public ?array $levels;
    public ?array $attributes;
    public ?array $types;
    public ?array $fields;


    public function __construct($parameters)
    {

        $this->id = $parameters['id'];
        $this->name = $parameters['name'];
        $this->image = $parameters['image'] ?? $parameters['images'][0]['href'] ?? null;

        $this->levels =  array_map(function ($level) {
            return new LevelDTO($level);
        }, $parameters['levels'] ?? []);
        $this->attributes = array_map(function ($attribute) {
            return new AttributeDTO($attribute);
        }, $parameters['attributes'] ?? []);
        $this->types = array_map(function ($type) {
            return new TypeDTO($type);
        }, $parameters['types'] ?? []);
        $this->fields = array_map(function ($field) {
            return new FieldDTO($field);
        }, $parameters['fields'] ?? []);
    }
}
