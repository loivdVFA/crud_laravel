@extends('layouts.home')
@section('title-header')
    Show
@endsection
@section('content')
   <div class="flex items-center w-full justify-center flex-col pt-5">
    <img src="{{asset($post->image)}}" height="90" width="90"/>
    <p>{{$post->title}}</p>
    <p>{{$post->description}}</p>
    <a href="/" class="p-2 bg-amber-300">Back</a>
   </div>
@endsection