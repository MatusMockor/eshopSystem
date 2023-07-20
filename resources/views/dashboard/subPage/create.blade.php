@extends('dashboard.master')

@section('title', 'Add page')
@section('content')
    <form method="post" action="">
        @csrf
        <page-form>
        </page-form>
    </form>
@endsection
