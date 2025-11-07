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


            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm mb-3">Create Product</a>
            <div class="table-responsive">
                <table class="table table-striped  table-bordered ">
                    <thead class="table-light">

                        <tr>
                            <th width="30px">ID</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($products as $Product)
                            <tr>
                                <td>{{ $Product->id }}</td>
                                <td>{{ $Product->name }}</td>
                                <td>{{ $Product->details }}</td>
                                <td>


                                    <form action="{{ route('products.destroy', $Product->id) }}" method="POST">
                                        <a href="{{ route('products.show', $Product->id) }}"
                                            class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('products.edit', $Product->id) }}""
                                            class="btn btn-info btn-sm">Edit</a>
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
    </div>
@endsection
