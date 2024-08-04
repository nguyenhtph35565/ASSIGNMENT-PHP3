@extends('client.layouts.master')

@section('content')
    <div class="site-blocks-cover" style="background-image: url(/client/images/tt.jpg);" data-aos="fade">
        {{--  --}}
    </div>

    <div class="site-section site-blocks-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-truck"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Free Shipping</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-refresh2"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Free Returns</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-help"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Customer Support</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2 class="mb-4">Danh mục Tin Tức</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach ($collections as $item)
                            <div class="item">
                                <div class="block-4">
                                    <figure class="block-4-image">
                                        {{-- Uncomment and add an image if available --}}
                                        {{-- <img src="{{ asset('images/' . $item->image) }}" alt="Category Image" class="img-fluid"> --}}
                                    </figure>
                                    <div class="block-4-owl-text p-4 text-center">
                                        <h3 class="mb-3"><a href="{{ route('client.category', ['id' => $item->id]) }}"
                                                class="text-dark">{{ $item->name }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Tin Nổi Bật</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach ($mostViewedNews as $item)
                            <div class="item">
                                <div class="block-4 text-center">
                                    <figure class="block-4-image">
                                        <div style="position: relative; width: 100%; padding-bottom: 56.25%;">
                                            <img src="{{ asset('images/' . $item->image) }}" alt="Image placeholder"
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a
                                                href="{{ route('client.details', ['id' => $item->id]) }}">{{ $item->titel }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Tin Mới Nhất</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach ($latestNews as $item)
                            <div class="item">
                                <div class="block-4 text-center">
                                    <figure class="block-4-image">
                                        <div style="position: relative; width: 100%; padding-bottom: 56.25%;">
                                            <img src="{{ asset('images/' . $item->image) }}" alt="Image placeholder"
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                                        </div>

                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a
                                                href="{{ route('client.details', ['id' => $item->id]) }}">{{ $item->titel }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        .site-section {
            padding: 4rem 0;
            background-color: #f8f9fa;
        }

        .site-section-heading h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #343a40;
            margin-bottom: 1rem;
            text-transform: uppercase;
        }

        .block-4 {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e3e3e3;
        }

        .block-4:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .block-4 .block-4-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-bottom: 1px solid #e3e3e3;
        }

        .block-4-owl-text {
            padding: 1.5rem;
            background-color: #ffffff;
        }

        .block-4-owl-text h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #007bff;
            margin-bottom: 0;
        }

        .block-4-owl-text a {
            text-decoration: none;
            color: #007bff;
        }

        .block-4-owl-text a:hover {
            text-decoration: underline;
        }
    </style>
@endsection
