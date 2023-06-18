@extends('dashboard.master')

@section('title', 'Add product')
@section('content')
    <div class="flex w-full mb-10 justify-end">
        <form action="{{route('dashboard.products.delete', $product)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                Remove
            </button>
        </form>
    </div>
    <form method="post" action="{{route('dashboard.products.update', $product)}}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <product-form
            :product="{{json_encode($product)}}"
            :statuses="{{json_encode($statuses)}}"
            :images="{{json_encode($images)}}"
        >
        </product-form>
    </form>

@endsection
