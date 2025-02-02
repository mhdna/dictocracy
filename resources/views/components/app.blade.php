<!DOCTYPE html>
<html>

<head>
    <!-- TODO: Make it look like Meriam Webster -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Welcome</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} "> <!-- Custom stlylesheet -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sageland&display=swap" rel="stylesheet">
</head>

<body class="text-black dark:bg-[#111111] bg-[#faf9f4] dark:text-white">
    <x-header />
    <main class="mt-20 max-w-[986px] mx-20">
        {{ $slot }}
    </main>
</body>

<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";

    $('#search').typeahead({
        source: function(query, process) {
            return $.get(path, {
                query: query
            }, function(data) {
                return process(data);
            });
        }
    });
</script>

</html>
