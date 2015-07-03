<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entry;

class EntryController extends Controller
{
    public function index()
    {
        $entries = Entry::all();

        return view('entry/index',compact('entries',$entries));
    }
}
