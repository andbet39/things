<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{


    public function __construct()
    {
          $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tasks=Task::with('owner')->get();

        return view('task/index',compact('tasks',$tasks));
    }

    public function angularTask(){


        return view('task/angular/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::all();
        return view('task/create',compact('users',$users));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $task=Request::all();

        Task::create($task);
        return redirect('task');
    }

    public function apitasks(){
        $tasks=Task::with('owner','assigned')->get();
        return $tasks;

    }
    public function apitaskDelete($id){

        Task::destroy($id);

    }
    public function apitasksPost(){
        $task=Request::all();

        $newTask= Task::create($task);
        return $newTask;
    }
    public function apitasksPut($id){

        $task = Task::find($id);

        $task->assigned_id=Request::input('assigned_id');
        $task->name=Request::input('name');
        $task->due_date=Request::input('due_date');
        $task->is_completed=Request::input('is_completed');

        $task->save();

        return $task;
    }

    public function apiUsers()
    {
        return User::all();

    }

    public function loggedUser(){
        return Auth::user();
    }

}
