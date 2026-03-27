@extends('layouts.app')

@section('title', 'PIC UP | ARCANA THE END')
@section('description', 'ARCANAのニュース・オーダー・リペア事例・その他の情報をお届けします。')

@section('content')

<section class="pickup-page">
    <div class="container">

        <div class="pickup-page-header">
            <h1>PIC UP</h1>
        </div>

        {{-- Category Tabs --}}
        <div class="pickup-tabs">
            <a href="/pickup" class="pickup-tab {{ $currentCategory == 'all' ? 'active' : '' }}">ALL</a>
            <a href="/pickup?category=news" class="pickup-tab {{ $currentCategory == 'news' ? 'active' : '' }}">NEWS</a>
            <a href="/pickup?category=order_repair" class="pickup-tab {{ $currentCategory == 'order_repair' ? 'active' : '' }}">オーダー・リペア事例</a>
            <a href="/pickup?category=others" class="pickup-tab {{ $currentCategory == 'others' ? 'active' : '' }}">OTHERS</a>
        </div>

        {{-- Posts --}}
        @if($blogs->count() > 0)
        <div class="pickup-list">
            @foreach($blogs as $blog)
            <a href="/pickup/{{ $blog->id }}" class="pickup-card">
                <div class="pickup-card-img">
                    @if($blog->thumbnail_url)
                        <img src="{{ $blog->thumbnail_url }}" alt="{{ $blog->title }}">
                    @else
                        <div style="width:100%;height:100%;background:#f0f0f0;display:flex;align-items:center;justify-content:center;min-height:200px;">
                            <span style="color:#bbb;font-size:12px;">No Image</span>
                        </div>
                    @endif
                </div>
                <div class="pickup-card-body">
                    <div class="pickup-card-meta">
                        <span>{{ $blog->created_at->format('Y.m.d') }}</span>
                        <span class="category-badge {{ $blog->category }}">
                            @if($blog->category == 'news') NEWS
                            @elseif($blog->category == 'order_repair') オーダー・リペア事例
                            @else OTHERS
                            @endif
                        </span>
                    </div>
                    <h3>{{ $blog->title }}</h3>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="pagination-wrap">
            {{-- First / Prev --}}
            @if($blogs->currentPage() > 1)
                <a href="{{ $blogs->url(1) }}">&laquo;</a>
                <a href="{{ $blogs->previousPageUrl() }}">&lsaquo;</a>
            @else
                <span>&laquo;</span>
                <span>&lsaquo;</span>
            @endif

            {{-- Page numbers --}}
            @for($i = max(1, $blogs->currentPage() - 2); $i <= min($blogs->lastPage(), $blogs->currentPage() + 2); $i++)
                @if($i == $blogs->currentPage())
                    <span class="current">{{ $i }}</span>
                @else
                    <a href="{{ $blogs->url($i) }}">{{ $i }}</a>
                @endif
            @endfor

            {{-- Next / Last --}}
            @if($blogs->hasMorePages())
                <a href="{{ $blogs->nextPageUrl() }}">&rsaquo;</a>
                <a href="{{ $blogs->url($blogs->lastPage()) }}">&raquo;</a>
            @else
                <span>&rsaquo;</span>
                <span>&raquo;</span>
            @endif
        </div>

        @else
        <p style="text-align:center;color:#666;padding:60px 0;">記事はまだありません。</p>
        @endif

    </div>
</section>

@endsection
