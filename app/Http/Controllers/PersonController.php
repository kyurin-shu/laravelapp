<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    public function index(Request $request) 
    {
        $items = Person::all();
        return view('person.index',[
            'items' => $items
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Person::$rule);

        $person = new Person;
        $form = $request->all();
        unset($form['_token']);

        $person->fill($form)->save();

        return redirect('/person');
    }
}
