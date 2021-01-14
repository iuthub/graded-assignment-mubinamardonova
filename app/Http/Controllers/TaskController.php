<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
   public function getIndex()
    {
        return view('task.index',
         ['users' => User::orderBy('name','desc')->get()
    ]);

    }

    public function getAdminIndex() {
    
        $task = Auth::user()->tasks;
        return view('admin.index', [
             'tasks' => $task
        ]);

    }

    public function getAdminEdit($id) {
        
        $post = Task::find($id);

        if(Gate::denies('update-post', $post)) {
            return redirect()->back()->with([
                'info'=>'You are not authorized to edit this post'
            ]);
        }

        return view('admin.edit', [
            'post' => $post,
        ]);
    }

    public function postAdminEdit(Request $req) {
        $this->validate($req, [
            'title' => 'required|regex:/\w{2,}(\s)\w{2,}/'
        ]);
        $post = Task::find($req->input('id'));
        if(Gate::denies('update-post', $post)) {
            return redirect()->back()->with([
                'info'=>'You are not authorized to edit this post'
            ]);
        }
        $post->task = $req->input('title');
        $post->save();
        return redirect()->route('adminIndex')->with([
            'info'=>'Successfully updated! Task is '. $req->input('title')
        ]);
    }

    public function postAdminCreate(Request $req) {
        $this->validate($req, [
            'title' => 'required|regex:/\w{2,}(\s)\w{2,}/'
        ]);
        $user = Auth::user();
        $task = new Task([
            'task'=> $req->input('title'),
        ]);
        $user->tasks()->save($task);
        return redirect()->route('adminIndex')->with([
            'info'=>'Successfully created! Task is '. $req->input('title')
        ]);
    }

    public function getAdminDelete($id) {
        $post = Task::find($id);

        if(Gate::denies('update-post', $post)) {
            return redirect()->back()->with([
                'info'=>'Warning! You are not authorized to delete this post'
            ]);
        }
        
        $post->delete();

        return redirect()->route('adminIndex')->with([
            'info'=>'Successfully deleted!  Task id is '. $id
        ]);
    }   
}
