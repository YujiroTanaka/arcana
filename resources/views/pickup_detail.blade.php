@extends('layouts.app')

@section('title', $blog->title . ' | PIC UP | ARCANA THE END')

@section('content')

<section style="background:#fff;padding:60px 0 80px;">
    <div class="container-narrow">

        {{-- Back --}}
        <div style="margin-bottom:32px;">
            <a href="/pickup" style="font-size:13px;color:#666;display:inline-flex;align-items:center;gap:6px;">
                &larr; PIC UPに戻る
            </a>
        </div>

        {{-- Header --}}
        <div style="margin-bottom:40px;padding-bottom:24px;border-bottom:1px solid #eee;">
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;font-size:12px;color:#666;">
                <span>{{ $blog->created_at->format('Y.m.d') }}</span>
                <span class="category-badge {{ $blog->category }}">
                    @if($blog->category == 'news') NEWS
                    @elseif($blog->category == 'order_repair') オーダー・リペア事例
                    @else OTHERS
                    @endif
                </span>
            </div>
            <h1 style="font-size:clamp(20px,3vw,28px);font-weight:700;color:#111;line-height:1.5;">{{ $blog->title }}</h1>
        </div>

        {{-- Thumbnail --}}
        @if($blog->thumbnail_url)
        <div style="margin-bottom:40px;">
            <img src="{{ $blog->thumbnail_url }}" alt="{{ $blog->title }}" style="width:100%;max-height:480px;object-fit:cover;">
        </div>
        @endif

        {{-- Content --}}
        <div class="blog-content" style="font-size:15px;line-height:2;color:#333;">
            {!! $blog->detail !!}
        </div>

        {{-- Navigation --}}
        <div style="display:flex;justify-content:space-between;margin-top:60px;padding-top:24px;border-top:1px solid #eee;">
            @if($prev)
            <a href="/pickup/{{ $prev->id }}" style="font-size:13px;color:#333;">&larr; {{ Str::limit($prev->title, 30) }}</a>
            @else
            <span></span>
            @endif

            @if($next)
            <a href="/pickup/{{ $next->id }}" style="font-size:13px;color:#333;">{{ Str::limit($next->title, 30) }} &rarr;</a>
            @endif
        </div>

    </div>
</section>

@endsection
