@extends('dashboard.master')

@section('title', 'Add page')
@section('content')
    <form method="post" action="">
        @csrf
        <sub-page-form>
        </sub-page-form>
    </form>
@endsection
