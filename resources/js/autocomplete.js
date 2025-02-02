var path = "{{ route('autocomplete') }}";

$("#search").typeahead({
    source: function(query, process) {
        return $.get(
            path,
            {
                query: query,
            },
            function(data) {
                return process(data);
            },
        );
    },
});
