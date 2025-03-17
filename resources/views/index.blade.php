@extends('layouts.home')
@section('title-header')
    HOME
@endsection
@section('content')
    <div class="w-full px-4">
        <div class="my-2 flex justify-end items-center w-full gap-2">
            <button class="p-2 bg-green-300 rounded-md">
                <a href="{{ route('create') }}">Create</a>
            </button>
            <button class="p-2 bg-amber-300 rounded-md">Trash</button>
        </div>
        <table class="w-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Publish Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                            <div class="flex w-full justify-center">
                                <img src="{{asset('images/'.$post->image)}}" alt="" height="50" width="50">
                            </div>
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->category->name}}</td>
                        {{-- strtotime ==> parse timestamp --}}
                        <td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td>
                        <td>
                            <div class="flex flex-col items-center justify-center gap-1">
                                <a href="{{'show/' . $post->id}}" class="bg-green-400 block px-2">Show</a>
                                <a href="{{$post->id . '/edit'}}" class="bg-amber-400 block px-2">Edit</a>
                                {{-- <a href="#" class="bg-red-500 block px-2">Delete</a> --}}
                                <form action="{{route('destroy',$post->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button>Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection
