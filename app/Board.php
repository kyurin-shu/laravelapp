<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = ['id'];

    public static $rule = [
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required'
    ];

    public function getData() 
    {
        return $this->person_id . ': <' . $this->title . '> ' . $this->message;
    }

    public function person()
    {
        return $this->belongsTo('App\Person');
    }
}
