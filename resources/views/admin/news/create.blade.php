@extends('admin.layouts.master')

@section('title', 'Create')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Create Form</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="text-input" class="col-md-3 col-form-label">Title</label>
                    <div class="col-md-9">
                        <input type="text" id="title-input" name="text-input" placeholder="Title" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="file-input" class="col-md-3 col-form-label">File input</label>
                    <div class="col-md-9">
                        <input type="file" id="file-input" name="file-input" class="form-control-file">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="view-input" class="col-md-3 col-form-label">View</label>
                    <div class="col-md-9">
                        <input type="text" id="view-input" name="view-input" placeholder="View" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="created-at-input" class="col-md-3 col-form-label">Created At</label>
                    <div class="col-md-9">
                        <input type="datetime-local" id="created-at-input" name="created-at-input" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="select" class="col-md-3 col-form-label">Category</label>
                    <div class="col-md-9">
                        <select name="select" id="select" class="form-control">
                            <option value="0">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="textarea-input" class="col-md-3 col-form-label">Description</label>
                    <div class="col-md-9">
                        <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="..." class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-9 offset-md-3">
                        <button id="button" type="submit" class="btn btn-primary">
                            <span>CREATE</span>
                        </button>
                        <a href="{{ route('admin.table') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
