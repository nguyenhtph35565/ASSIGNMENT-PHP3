@extends('client.layouts.master')

@section('content')
    @include('client.components.breadcrumb', ['pageName' => 'Tin Trong Loại'])

    <div class="site-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-9 order-2">
                    <div class="row mb-5">
                        @foreach ($data as $item)
                            <div class="col-12 mb-4" data-aos="fade-up">
                                <div class="block-4 d-flex align-items-center border">
                                    <figure class="block-4-image">
                                        <a href="{{ route('client.details', $item->id) }}">
                                            <img style="with:150px; height:150px"
                                                src="{{ asset('images/' . $item->image) }}" alt="Image placeholder"
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
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
