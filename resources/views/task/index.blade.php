@extends('layouts.master')

@section('content')
	<div id="myDIV" class="header">
	    <h2>To Do List</h2>
	</div>
<ul id="myUL">
	@foreach($users as $user)
		<li>
            {{$user->name}} has {{count($user->tasks)}} tasks
        </li>
	 @endforeach
</ul>
@endsection