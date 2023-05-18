@extends('dashboard.master')

@section('title', 'Add category')
@section('content')
    <form method="post">
        @csrf
        <category-form>
        </category-form>
    </form>
@endsection
