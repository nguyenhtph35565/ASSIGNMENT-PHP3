@extends('admin.layouts.master')

@section('title')
    Details
@endsection

@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">News Details</strong>
                            <a href="{{ route('admin.table') }}" class="btn btn-secondary float-right">Back</a>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $data->id }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $data->titel }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $data->description }}</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td>
                                        @if ($data->image)
                                            <img src="{{ asset('images/' . $data->image) }}" alt="{{ $data->titel }}"
                                                style="max-width: 200px;">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>View</th>
                                    <td>{{ $data->view }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $data->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $data->category_name }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
