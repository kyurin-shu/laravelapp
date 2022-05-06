<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(Request $request) 
    {
        // $items = Board::with('person')->get();
        $items = Board::with('person')->simplePaginate(5);
        return view('board.index',[
            'items' => $items
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Board::$rule);

        $person = new Board();
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();

        return redirect('/board');
    }
}
