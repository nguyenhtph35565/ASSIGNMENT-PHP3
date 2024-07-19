@extends('admin.layouts.master')

@section('title', 'Edit News')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Form</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('admin.update', ['id' => $news->id]) }}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="text-input" class="col-md-3 col-form-label">Title</label>
                    <div class="col-md-9">
                        <input type="text" id="text-input" name="text-input" value="{{ $news->titel }}"
                            placeholder="Title" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="file-input" class="col-md-3 col-form-label">Current Image</label>
                    <div class="col-md-9">
                        @if ($news->image)
                            <img src="{{ asset('images/' . $news->image) }}" alt="Current Image" style="max-width: 100%;">
                        @else
                            <p>No image uploaded</p>
                        @endif
                        <input type="file" id="file-input" name="file-input" class="form-control-file mt-3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="view-input" class="col-md-3 col-form-label">View</label>
                    <div class="col-md-9">
                        <input type="text" id="view-input" name="view-input" value="{{ $news->view }}"
                            placeholder="View" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="created-at-input" class="col-md-3 col-form-label">Created At</label>
                    <div class="col-md-9">
                        <input type="datetime-local" id="created-at-input" name="created-at-input"
                            value="{{ date('Y-m-d\TH:i', strtotime($news->created_at)) }}" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="select" class="col-md-3 col-form-label">Category</label>
                    <div class="col-md-9">
                        <select name="select" id="select" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $news->category_id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="textarea-input" class="col-md-3 col-form-label">Description</label>
                    <div class="col-md-9">
                        <textarea name="textarea-input" id="textarea-input" rows="9" class="form-control">{{ $news->description }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">
                            <span>UPDATE</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
