@extends('layouts.home')
@section('title-header')
    CREATE POST
@endsection
@section('content')
    <div class="p-4 flex items-center justify-center flex-col">
        <h4 class="text-center text-2xl font-bold">Form create posts</h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="flex gap-2 fle flex-col">
                    @foreach ($errors->all() as $error)
                        <li class="flex items-start p-2 bg-red-200 rounded-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data"
            class="flex items-center justify-center flex-col max-w-[400px] gap-2">
            @csrf
            <div class="flex flex-col gap-1 w-full">
                <label class="font-bold">Image</label>
                <input type="file" class="hover:cursor-pointer" name="image" />
            </div>
            <div class="flex flex-col gap-1 w-full">
                <label class="font-bold">Title</label>
                <input type="text" placeholder="Input title" class="border-[1px] border-green-500 outline-none p-2"
                    name="title" />
            </div>
            <div class="flex flex-col gap-1 w-full">
                <label class="font-bold">Category</label>
                <select name="category_id" class="border-[1px] border-green-500 outline-none p-2">
                    <option value="0">Select</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-1 w-full">
                <label class="font-bold">Description</label>
                <textarea rows="4" class="border-[1px] border-green-500 outline-none p-2" name="description"> </textarea>
            </div>
            <div>
                <button class="p-2 bg-green-300 rounded-md" type="submit">
                    <a href="#" class="w-full h-full block">Submit</a>
                </button>
                <button class="p-2 bg-red-300 rounded-md">
                    <a href="{{ route('index') }}">Back</a>
                </button>
            </div>
        </form>
    </div>
@endsection
