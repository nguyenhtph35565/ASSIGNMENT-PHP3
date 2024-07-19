@extends('client.layouts.master')

@section('title')
    Kết quả tìm kiếm
@endsection

@section('content')
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if ($news->count() > 0)
                        <h2 class="mb-5">Kết quả tìm kiếm cho: "{{ request('search') }}"</h2>
                        <ul class="list-unstyled">
                            @foreach ($news as $new)
                                <li class="media my-4">
                                    <img src="{{ asset('images/' . $new->image) }}" class="mr-3" alt="..."
                                        style="width: 100px; height: auto;">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1">
                                            <a href="{{ route('client.details', $new->id) }}">{{ $new->titel }}</a>
                                        </h5>
                                        <p>{{ Str::limit($new->description, 300, '...') }}</p>
                                        <a href="{{ route('client.details', $new->id) }}">Đọc thêm</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{ $news->links() }}
                    @else
                        <h2 class="mb-5">Không tìm thấy kết quả phù hợp cho: "{{ request('search') }}"</h2>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
