<?php

namespace Kdion4891\LaravelLivewireForms;

use App\Components\Helpers\FormField;
use Illuminate\Support\Str;

class Field extends BaseField
{
    protected $label;
    protected $key;
    protected $file_multiple;
    protected $array_fields = [];
    protected $array_sortable = false;

    /**
     * @var string
     */
    public $cssClass = '';

    public function __construct($label, $name)
    {
        if(is_null($name) && strtolower($label) == $label){
            // Translate label like sfFormWidgets do
            $name = $label;
            $label = __(str_replace('_', ' ', ucfirst('_id' == substr($label, -3) ? substr($label, 0, -3) : $label)));
        }
        $this->label = $label;
        $this->name = $name ?? Str::snake(Str::lower($label));
        $this->key = 'form_data.' . $this->name;
    }

    public static function make($label, $name = null) : Field
    {
        return new static($label, $name);
    }

    public function file() : Field
    {
        $this->type = 'file';

        return $this;
    }

    public function multiple() : Field
    {
        $this->file_multiple = true;

        return $this;
    }

    public function array($fields = []) : Field
    {
        $this->type = 'array';
        $this->array_fields = $fields;

        return $this;
    }

    public function sortable() : Field
    {
        $this->array_sortable = true;

        return $this;
    }

    public function cssClass(string $class) : Field
    {
        $this->cssClass = $class;

        return $this;
    }

}
