<div class="container mx-auto">
    <div class="card mt-5 rounded-lg">
        <div class="card-body p-6">
            <form action="{{ route('search') }}" method="GET" class="flex items-center space-x-4 justify-center">
                <input
                    class="typeahead form-control bg-yellow-200 text-black rounded-lg px-4 py-2 w-full md:w-2/3 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    id="search" name="query" type="text" placeholder="Search...">

                <button type="submit"
                    class="btn btn-success px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                    Search
                </button>
            </form>
        </div>
    </div>
</div>
