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
                            <strong class="card-title">CATEGORY TABLE</strong><br><br>
                            <div class="d-flex justify-content-between mb-3">

                                <a href="{{ route('admin.categories.create') }}"
                                    class="btn btn-success btn-sm mb-2">Create</a>
                                <div class="d-flex">
                                    <form method="GET" action="{{ route('admin.categories.table') }}"
                                        class="form-inline mr-2">
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
                                        <th class="text-center">ID</th>
                                        <th class="text-center">NAME</th>
                                        <th class="text-center">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->id }}</td>
                                            <td class="text-center">{{ $item->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.categories.edit', ['id' => $item->id]) }}"
                                                    class="btn btn-sm btn-warning me-2">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.categories.destroy', ['id' => $item->id]) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                                        Delete
                                                    </button>
                                                </form>
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
