@extends('layouts.home')

@section('title-header')
    Test Component
@endsection

@section('content')
    <x-button> Hello bạn</x-button>
    <div class="grid grid-cols-5 gap-2">
        @foreach ($posts as $post)
            <x-post.index :post="$post" />
        @endforeach
    </div>
@endsection
