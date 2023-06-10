@extends('dashboard.master')

@section('title', 'Add product')
@section('content')
    <form method="post" action="{{route('dashboard.products.store')}}" enctype="multipart/form-data">
        @csrf
        <product-form
            :statuses="{{json_encode($statuses)}}"
        >
        </product-form>
    </form>
@endsection
