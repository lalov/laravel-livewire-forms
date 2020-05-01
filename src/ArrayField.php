<?php

namespace Smartcode\LaravelLivewireForms;

class ArrayField extends BaseField
{
    protected $column_width;

    /**
     * @var string
     */
    public $cssClass = '';

    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function make($name) : ArrayField
    {
        return new static($name);
    }

    public function columnWidth($width) : ArrayField
    {
        $this->column_width = $width;

        return $this;
    }

    public function cssClass(string $class) : ArrayField
    {
        $this->cssClass = $class;

        return $this;
    }
}
