@extends('layouts.home')
@section('title-header')
    EDIT POST
@endsection
@section('content')
    <div class="p-4 flex items-center justify-center flex-col">
        <h4 class="text-center text-2xl font-bold">Form edit posts</h4>
        <form action="{{ route('update',$post->id) }}" method="POST" enctype="multipart/form-data"
            class="flex items-center justify-center flex-col max-w-[400px] gap-2">
            @csrf
            <div class="flex flex-col gap-1 w-full">
                <label class="font-bold">Image</label>
                <img src="{{asset($post->image)}}" height="70" width="70"/>
                <input type="file" class="hover:cursor-pointer" name="image" />
            </div>
            <div class="flex flex-col gap-1 w-full">
                <label class="font-bold">Title</label>
                <input type="text" placeholder="Input title" class="border-[1px] border-green-500 outline-none p-2" value="{{$post->title}}"
                    name="title" />
            </div>
            <div class="flex flex-col gap-1 w-full">
                <label class="font-bold">Category</label>
                <select name="category_id" class="border-[1px] border-green-500 outline-none p-2">
                    @foreach ($categories as $category)
                       <option {{ $category->id === $post->category_id ? 'selected' : ''}}  value="{{ $category->id }}">{{$category->name}}</option>                       
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-1 w-full">
                <label class="font-bold">Description</label>
                <textarea rows="4" class="border-[1px] border-green-500 outline-none p-2" name="description">{{ $post->description }}</textarea>
            </div>
            <div>
                <button class="p-2 bg-green-300 rounded-md" type="submit">
                    Submit
                </button>
                <button class="p-2 bg-red-300 rounded-md">
                    <a href="{{ route('index') }}">Back</a>
                </button>
            </div>
        </form>
    </div>
@endsection
