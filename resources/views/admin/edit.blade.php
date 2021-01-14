@extends('layouts.master')

@section('content')
@include('partials.error')
@include('partials.info')
	<div class="article">
	    <form action="{{ route('adminEditPost') }}" method="post">
	        <div id="myDIV" class="header">
	          <h2>Change Task</h2>
	          @csrf
	          <input type="text" name="title" value="{{ $post->task }}" placeholder="Title...">
	          <input type="hidden" name="id" value="{{ $post->id }}">
	          <button type="submit" class="addBtn">Edit</button>
	        </div>
	    </form>
	</div>
@endsection
