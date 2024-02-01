@include('dashboard._inc.head')
<body id="app" class="bg-white dark:bg-gray-800">
@include('dashboard._inc.header')
@include('dashboard._inc.sidebar')
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        @include('dashboard._inc.alerts')
    </div>
    @yield('content')
</div>
</body>
</html>