<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Dictocracy: @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap3-typeahead.min.js') }}"></script>
</head>

<body class="text-black dark:bg-[#000000] bg-[#ffffff] dark:text-white flex flex-col min-h-screen">
    <div class="flex-1">
        @include('partials.header')

        <div id="notification" class="fixed bottom-4 right-4 z-50 hidden bg-green-500 text-white p-4 rounded shadow-lg">
            {{ session('success') }}
        </div>

        <div id="error-notification"
            class="fixed bottom-4 right-4 z-50 hidden bg-red-500 text-white p-4 rounded shadow-lg">
            {{ session('error') }}
        </div>

        <div class="container mx-auto px-10">
            @yield('content')
        </div>
    </div>

    <div>
        @include('partials.footer')
    </div>

</body>

<script>
    var path = "{{ route('autocomplete') }}";

    $("#search").typeahead({
        source: function(query, process) {
            return $.get(
                path, {
                    query: query,
                },
                function(data) {
                    return process(data);
                },
            );
        },
    });

    $('#search').on('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            $(this).closest('form').submit();
        }
    });

    window.addEventListener('load', function() {
        const successMessage = "{{ session('success') }}";
        const errorMessage = "{{ session('error') }}";

        if (successMessage) {
            showNotification('notification', successMessage);
        }

        if (errorMessage) {
            showNotification('error-notification', errorMessage);
        }
    });

    function showNotification(id, message) {
        const notification = document.getElementById(id);
        notification.classList.remove('hidden');
        notification.innerHTML = message;

        setTimeout(() => {
            notification.classList.add('hidden');
        }, 2000);
    }
</script>

</html>
