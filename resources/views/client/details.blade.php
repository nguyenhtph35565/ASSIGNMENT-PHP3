@extends('client.layouts.master')

@section('content')
    @include('client.components.breadcrumb', ['pageName' => 'Chi tiết'])

    <div class="site-section border-bottom py-5" data-aos="fade">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="content">
                        <div class="site-section-heading pt-3 mb-4 text-center">
                            {{-- @dd($data); --}}
                            <h2 class="text-black">{{ $data->titel }}</h2>
                        </div>
                        <div class="text-center mb-4">
                            <div class="block-16">
                                <figure>
                                    <img style="width:100%; height:auto" src="{{ asset('images/' . $data->image) }}"
                                        alt="Image placeholder" class="img-fluid rounded img-large">
                                </figure>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p><strong>Danh mục:</strong> {{ $data->category_name }}</p>
                            <p><strong>Lượt xem:</strong> {{ $data->view }}</p>
                            <p><strong>Ngày đăng:</strong> {{ $data->created_at }}</p>
                        </div>
                        <div class="content">
                            <p>{{ $data->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
