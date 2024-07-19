@extends('client.layouts.master')

@section('content')
    @include('client.components.breadcrumb', ['pageName' => 'Details'])

    <div class="site-section border-bottom" data-aos="fade">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="block-16">
                        <figure>
                            <img src="{{ asset('images/' . $data->image) }}" alt="Image placeholder" class="img-fluid rounded">

                        </figure>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="site-section-heading pt-3 mb-4">
                        <h2 class="text-black">{{ $data->titel }}</h2><br>
                    </div>
                    <div>
                        <p>Danh mục: {{ $data->category_name }}</p>
                        <p>Lượt xem: {{ $data->view }}</p>
                        <p>Ngày đăng: {{ $data->created_at }}</p>
                    </div>
                </div>
                <div>
                    <p>{{ $data->description }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Other sections can be included or modified as needed --}}
@endsection
