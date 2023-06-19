@extends('dashboard.master')

@section('title', 'Add category')
@section('content')
    <form method="post" action="{{route('dashboard.categories.store')}}">
        @csrf
        <category-form>
        </category-form>
    </form>
@endsection
