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
                            <strong class="card-title">News Table</strong><br><br>
                            <div class="d-flex justify-content-between mb-3">
                                <a href="{{ route('admin.create') }}" class="btn btn-success btn-sm mb-2">Create</a>
                                <div class="d-flex">
                                    <form method="GET" action="{{ route('admin.table') }}" class="form-inline mr-2">
                                        <div class="form-group mb-2">
                                            <label for="category_id" class="sr-only">Category</label>
                                            <select name="category_id" id="category_id"
                                                class="form-control form-control-sm">
                                                <option value="">All Categories</option>
                                                @foreach ($categories as $id => $name)
                                                    <option value="{{ $id }}"
                                                        {{ request('category_id') == $id ? 'selected' : '' }}>
                                                        {{ $name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-secondary btn-sm mb-2">Filter</button>
                                    </form>
                                    <form method="GET" action="{{ route('admin.table') }}" class="form-inline">
                                        <div class="form-group mb-2">
                                            <label for="search" class="sr-only">Search</label>
                                            <input type="text" name="search" id="search"
                                                class="form-control form-control-sm" placeholder="Search..."
                                                value="{{ request('search') }}">
                                        </div>
                                        <button type="submit" class="btn btn-secondary btn-sm mb-2">Search</button>
                                    </form>
                                </div>
                            </div>
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
                                                <a href="{{ route('admin.edit', ['id' => $item->id]) }}"
                                                    class="btn btn-sm btn-warning btn-sm mb-2">
                                                    Edit
                                                </a>
                                                <a href="{{ route('admin.details', ['id' => $item->id]) }}"
                                                    class="btn btn-primary btn-sm mb-2">
                                                    Details
                                                </a>
                                                <a href="{{ route('admin.delete', ['id' => $item->id]) }}"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                                                    class="btn btn-sm btn-danger btn-sm mb-2">
                                                    Delete
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
        </div>
    </div>
@endsection
