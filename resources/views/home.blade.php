@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if($links->isNotEmpty())
        <div class="col-12">
            <div class="card-columns">
                @foreach($links as $link)
                <div class="card mb-3 {{ $link->is_private ? ' bg-light' : '' }}">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ $link->url }}" target="_blank" rel="nofollow">
                                {{ $link->title }}
                            </a>
                        </h5>
                        <p class="card-text">
                            {!! $link->content !!}
                        </p>
                        @if($link->extra)
                            {!! $link->extra !!}
                        @endif

                        @if($link->tags->isNotEmpty())
                            @foreach($link->tags as $tag)
                                <span class="badge badge-secondary">{{ $tag->name }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="card-footer">
                        {{ $link->created_at->diffForHumans() }}
                    </div>
                </div>
                @endforeach
            </div>

            {{ $links->links() }}
        </div>
        @else
        <div class="col-12 col-md-8">
            <div class="alert alert-info">
                {{ __("Aucun lien.") }}
                @if(auth()->user())
                    <a href="{{ route('link.create') }}" class="alert-link">Ajouter le premier lien</a>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
