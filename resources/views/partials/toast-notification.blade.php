@if (Session::has('message'))
    <div id="toast"
        class="fixed top-10 right-1/2 translate-x-1/2 bg-gray-100 bg-opacity-85 border shadow-sm border-gray-300 py-4 px-8 rounded-lg z-50 text-md text-gray-600 font-medium transition-opacity duration-500">
        {!! session('message') !!}
    </div>
@endif
