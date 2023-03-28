@extends('master')
@section('content')
    <div class="container-fluid">
        @if (session('pesan'))
            <div class="alert alert-success">
                {{ session('pesan') }}
            </div>
        @endif
        @if ($isSearch)
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($movies as $i)
                    @if (session('user') && session('user')->plan_id == 1 && $i->paid == 1)
                        @continue
                    @endif
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $i->image) }}" alt="{{ asset('images/alt.png') }}"
                                class="card-img-top" height=400>
                            <div class="card-body">
                                <h5 class="card-title">{{ $i->name }}</h5>
                                <p class="card-text">{{ $i->studio }}</p>
                                <a href="/movie/{{ $i->id }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="header">
                <h2 class="heading text-dark">All Movies</h2>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($movies as $i)
                    @if (session('user') && session('user')->plan_id == 1 && $i->paid == 1)
                        @continue
                    @endif
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $i->image) }}" alt="{{ asset('images/alt.png') }}"
                                class="card-img-top" height=400>
                            <div class="card-body">
                                <h5 class="card-title">{{ $i->name }}</h5>
                                <p class="card-text">{{ $i->studio }}</p>
                                <a href="/admin/{{ $i->id }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
