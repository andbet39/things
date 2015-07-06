<?php

namespace App\Http\Controllers;

use App\Category;
use Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entry;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class EntryController extends Controller
{
    public function index()
    {
        $entries = Entry::all();

        return view('entry/index',compact('entries',$entries));
    }

    public function create()
    {
        $categories= Category::all();

        return view('entry/create',compact('categories',$categories));
    }

    public function store()
    {


        $entry=Request::all();

        $id = Entry::create($entry);

        $file = Request::file('filefield');

        if($file!=null){
            Storage::disk('local')->put('/allegato/'.$id->id.'/'.$file->getClientOriginalName(),  File::get($file));

            $id->filepath='/allegato/'.$id->id.'/'.$file->getClientOriginalName();

            $id->save();
        }

        return redirect('entry');
    }

    public function download($id){


        $entry= Entry::find($id);

        $file = Storage::disk('local')->get($entry->filepath);

        return (new Response($file, 200))
            ->header('Content-Type', 'application/pdf');

    }

    public function delete($id){

        Entry::destroy($id);
        return redirect('entry');

    }


}
