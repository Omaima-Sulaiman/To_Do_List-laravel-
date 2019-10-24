<?php

namespace App\Http\Controllers;

use App\Modle\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::id();
//    $tasks =Task::where('user_id')->get();
        $user=User::findOrFail($user_id);
        $tasks=$user->tasks()->get();
//        tasks variable to use it in compact ,compact like params we use it to send data to anther palace
    return view('tasks.index',compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dd($request);
//        as console log
        $user_id=Auth::id();
//        auth take the user id dirctly with out reletionship betwwen tables
//        made vareablee to sored userid
        Task::create([
            'task'=>$request->input('task'),'user_id'=>$user_id
        ]);
        return $this->index();
//        return redirect()->route('tasks.index');

//        return view('tasks.index');
//        we cant use this way return view('tasks.index')
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

//
 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $task=Task::findOrFail($id);
        return view('tasks.edit',compact('task'));
//        return redirect()->route('tasks.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $task =Task::findOrFail($id);
        $task->update([
            'task'=>$request->input('task')
        ]);
//        dd($request);
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

//        $tasks=Task::where ('id',$id)->delete();
//        $tasks=$this->destroy($id);
          Task::destroy($id);
        return redirect()->route('tasks.index');
    }
}
