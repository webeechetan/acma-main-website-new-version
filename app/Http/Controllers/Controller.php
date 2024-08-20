<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;


abstract class Controller
{
    public function alert($body){
        Session::flash('alert', [
            'body' => $body,
        ]);
    }
}
