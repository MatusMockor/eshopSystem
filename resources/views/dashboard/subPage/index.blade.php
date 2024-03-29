@extends('dashboard.master')

@section('title', 'All Pages')
@section('content')
    @if($pages->count())
        <div
            class="mt-10 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @foreach($pages as $page)
                <a href="#"
                   class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                    {{ $page->name }}
                </a>
            @endforeach
        </div>
    @else()
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            <mark class="px-2 text-white bg-blue-600 rounded dark:bg-red-500">No pages 😥</mark>
        </h1>
    @endif
@endsection
