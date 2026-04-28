 @extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header d-flex justify-content-between">
        <h4 class="mb-0">Customers List</h4>
        <a href="/customers/create" class="btn btn-primary">+ Add Customer</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->phone }}</td>
                    <td>{{ $c->address }}</td>
                    <td>
                        <a href="/customers/{{ $c->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                        <form action="/customers/{{ $c->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
