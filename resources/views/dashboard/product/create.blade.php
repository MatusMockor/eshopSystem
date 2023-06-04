@extends('dashboard.master')

@section('title', 'Add product')
@section('content')
    <form method="post" action="{{route('dashboard.products.store')}}" enctype="multipart/form-data">
        @csrf
        <product-form>
        </product-form>
        {{--        <button type="button"--}}
        {{--                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">--}}
        {{--            Remove--}}
        {{--        </button>--}}
    </form>

@endsection
