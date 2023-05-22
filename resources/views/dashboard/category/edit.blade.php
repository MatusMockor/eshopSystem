@extends('dashboard.master')

@section('title', 'Edit category')
@section('content')
    <form method="post" action="{{route('dashboard.categories.update', $category->id)}}">
        @method('PATCH')
        @csrf
        <category-form
            :category="{{json_encode($category)}}"
        >
        </category-form>
    </form>
@endsection
