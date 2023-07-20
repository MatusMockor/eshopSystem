@extends('dashboard.master')

@section('title', 'Add page')
@section('content')
    <form method="post" action="{{route('dashboard.subPages.store')}}">
        @csrf
        <sub-page-form>
        </sub-page-form>
    </form>
@endsection
