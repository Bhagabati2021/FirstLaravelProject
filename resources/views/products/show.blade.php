@extends('layouts.app')
@section('content')

    <div class="card mt-5">
        <div class="card-header">
            <h4>Product List</h4>
        </div>

        <div class="card-body">
            @session('success')
                <div class="alert alert-success">{{ $value }}</div>
            @endsession


            <a href="{{ route('products.index') }}" class="btn btn-info btn-sm mb-3">Back</a>

        </div class="mt-4">
        <p><strong>Name:</strong>{{ $product->name }}</p>
        <p><strong>Details:</strong>{{ $product->details }}</p>

    </div>
    </div>


@endsection
