@extends('dashboard.master')

@section('title', 'Add product')
@section('content')
    <form method="post" action="{{route('dashboard.products.store')}}" enctype="multipart/form-data">
        @csrf
        <product-form
            :statuses="{{json_encode($statuses)}}"
            :categories="{{json_encode($categories)}}"
        >
        </product-form>
    </form>
@endsection
