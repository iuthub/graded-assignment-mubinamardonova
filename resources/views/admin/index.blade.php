@extends('layouts.master')

@section('content')
@include('partials.info')
@include('partials.error')
<div class="">
    <form action="{{ route('adminCreatePost') }}" method="post">
        <div id="myDIV" class="header">
          <h2>Add New Task</h2>
          @csrf
          <input type="text" name="title" placeholder="Task..." >
          <button type="submit" class="addBtn">Add</button>
        </div>
    </form>
</div>

<ul id="myUL">
    @foreach($tasks as $post)
        <li>
            <div class="task">
                {{$post->task}}
            </div>
            <div class="action">
                <a href="{{ route('adminEdit', ['id'=> $post->id ]) }}"><i class="fa fa-edit"></i></a>
            </div>
            <div class="action">
                <a href="{{ route('adminDelete', ['id'=> $post->id ]) }}"><i class="fa fa-trash-alt"></i></a> 
            </div>
          </li>
    @endforeach
</ul>

@endsection