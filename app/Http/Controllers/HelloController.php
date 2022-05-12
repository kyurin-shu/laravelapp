<?php

namespace App\Http\Controllers;

use App\Jobs\MyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;


class HelloController extends Controller
{
    //
    public function index(Request $request) 
    {
        // MyJob::dispatch()->delay(now()->addMinute(1));
        $output = new BufferedOutput;
        Artisan::call('route:list',[],$output);
        // dump($output->fetch());
        
        return view('hello.index');
    }
}
