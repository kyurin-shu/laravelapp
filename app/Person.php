<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public static $rule = [
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    ];

    public function getData() 
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }
}
