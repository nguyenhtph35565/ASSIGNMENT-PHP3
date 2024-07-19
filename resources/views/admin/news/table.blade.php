@extends('admin.layouts.master')

@section('title')
    Table
@endsection

@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong><br><br>
                            <a href="{{ route('admin.create') }}">
                                <button class="btn btn-success">Create</button>
                            </a>
                        </div>

                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TITLE</th>
                                        <th>DESCRIPTION</th>
                                        <th>IMAGE</th>
                                        <th>VIEW</th>
                                        <th>CREATED_AT</th>
                                        <th>CATEGORY</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->titel }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <img src="{{ asset('images/' . $item->image) }}" alt=""
                                                    style="max-width: 200px;">
                                            </td>
                                            <td>{{ $item->view }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->category_name }}</td>
                                            <td>
                                                <a href="{{ route('admin.edit', ['id' => $item->id]) }}">
                                                    <button class="btn btn-sm btn-warning edit-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                                </a>
                                                <a href="{{ route('admin.details', ['id' => $item->id]) }}">
                                                    <button class="btn btn-primary">Details</button>
                                                </a>
                                                <a href="{{ route('admin.delete', ['id' => $item->id]) }}">
                                                    <button class="btn btn-sm btn-danger remove-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#deleteRecordModal"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Delete</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
