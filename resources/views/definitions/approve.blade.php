@extends('layouts.app')

@section('title', 'Approve Definitions')

@section('content')
    <div class="container mt-5">
        <h2 class="font-extrabold text-3xl mb-5">Unapproved Definitions</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($definitions->isEmpty())
            <p>No unapproved definitions found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Term</th>
                        <th>Definition</th>
                        <th>Example</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($definitions as $definition)
                        <tr>
                            <td>{{ $definition->id }}</td>
                            <td>{{ $definition->term->name }}</td>
                            <td>{{ $definition->definition }}</td>
                            <td>{{ $definition->example }}</td>
                            <td>
                                <form action="{{ route('definitions.approve.update', $definition->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Approve
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
