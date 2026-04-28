 @extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header">
        <h4>Add Customer</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="/customers">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>

            <button class="btn btn-success">Save Customer</button>
            <a href="/customers" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>

@endsection