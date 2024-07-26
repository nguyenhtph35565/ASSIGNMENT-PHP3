@extends('admin.layouts.master')

@section('title', 'Create')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Create Form</strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="text-input" class="col-md-3 col-form-label">Category Name</label>
                    <div class="col-md-9">
                        <input type="text" id="name-input" name="text-input" placeholder="Category Name"
                            class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-9 offset-md-3">
                        <button id="button" type="submit" class="btn btn-primary">
                            <span>CREATE</span>
                        </button>
                        <a href="" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
