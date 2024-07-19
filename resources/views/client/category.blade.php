@extends('client.layouts.master')

@section('content')
    @include('client.components.breadcrumb', ['pageName' => 'Tin Trong Loại'])

    <div class="site-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-9 order-2">
                    <div class="row mb-5">
                        @foreach ($data as $item)
                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="block-4 text-center border">
                                    <figure class="block-4-image">
                                        <a href="{{ route('client.details', $item->id) }}">
                                            <img src="{{ asset('images/' . $item->image) }}" alt="Image placeholder"
                                                class="img-fluid">
                                        </a>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="{{ route('client.details', $item->id) }}">{{ $item->titel }}</a></h3>
                                        <p class="font-weight-bold">Lượt xem: {{ $item->view }}</p>
                                        <p class="mb-0">Ngày đăng: {{ $item->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-center">
                            <div class="site-block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
