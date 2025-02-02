<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Dictocracy: @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} "> <!-- Custom stlylesheet -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- required for autocompletion --}}
    {{-- TODO jquery local install --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

</head>

<body class="text-black dark:bg-[#111111] bg-[#faf9f4] dark:text-white">
    @include('partials.header')

    <div id="notification" class="fixed bottom-4 right-4 z-50 hidden bg-green-500 text-white p-4 rounded shadow-lg">
        {{ session('success') }}
    </div>

    <div id="error-notification" class="fixed bottom-4 right-4 z-50 hidden bg-red-500 text-white p-4 rounded shadow-lg">
        {{ session('error') }}
    </div>

    <div class="min-h-screen container mx-auto p-6">
        @yield('content')
    </div>

    @include('partials.footer')

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

    // Function to show the notification
    function showNotification(id, message) {
        const notification = document.getElementById(id);
        notification.classList.remove('hidden');
        notification.innerHTML = message;

        // After 5 seconds, hide the notification
        setTimeout(() => {
            notification.classList.add('hidden');
        }, 5000);
    }
</script>

</html>
