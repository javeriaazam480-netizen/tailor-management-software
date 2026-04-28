 @extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header">
        <h4>Edit Customer</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="/customers/{{ $customer->id }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ $customer->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" value="{{ $customer->address }}" class="form-control" required>
            </div>

            <button class="btn btn-primary">Update Customer</button>
            <a href="/customers" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>

@endsection