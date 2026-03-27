@extends('layouts.app')

@section('title', 'Products | ARCANA THE END')
@section('description', 'ARCANAの商品一覧。レザージャケットのベースモデルをご紹介。オーダーメイド対応商品です。')

@section('content')

<section class="products-page">
    <div class="container">

        <div class="products-intro">
            <h2>Products</h2>
            <h3>ARCANA ベースモデル</h3>
            <p>
                ARCANAベースモデルとは、ARCANAで定番商品としてオーダー可能なモデルになります。<br>
                ARCANAベースモデルは現在取扱商品として販売しております。
            </p>
        </div>

        @if(count($items) > 0)
        <div class="products-grid">
            @foreach($items as $item)
            <a href="https://theend0304.base.shop/items/{{ $item->item_id }}" target="_blank" rel="noopener" class="product-card">
                <div class="product-card-img">
                    <img src="{{ $item->image_url }}?imformat=generic&q=90&im=Resize,width=400,type=normal" alt="{{ $item->title }}">
                </div>
                <h4>{{ $item->title }}</h4>
                <p class="price">¥{{ $item->price }}-</p>
            </a>
            @endforeach
        </div>
        @else
        <p style="text-align:center;color:#666;padding:60px 0;">商品情報を準備中です。</p>
        @endif

    </div>

    {{-- Sub service links --}}
    <div class="products-services" style="margin-top:60px;">
        <a href="/order" class="products-service-item">
            <img src="/images/banner-images/ayakashi.jpg" alt="ARCANAレザーオーダー">
            <div class="products-service-item-body">
                <h4>ARCANAレザーオーダー</h4>
                <p>お客様だけの一着をオーダーメイドで製作します</p>
                <span style="font-size:11px;letter-spacing:0.1em;border-bottom:1px solid rgba(255,255,255,0.5);padding-bottom:2px;">詳しく見る</span>
            </div>
        </a>
        <a href="/the-end" class="products-service-item">
            <img src="/images/the-end.jpg" alt="ARCANAの古着販売">
            <div class="products-service-item-body">
                <h4>ARCANAの古着販売</h4>
                <p>国内外のこだわり古着を取り揃えています</p>
                <span style="font-size:11px;letter-spacing:0.1em;border-bottom:1px solid rgba(255,255,255,0.5);padding-bottom:2px;">詳しく見る</span>
            </div>
        </a>
        <a href="/repair" class="products-service-item">
            <img src="/images/make_a_story.jpg" alt="ARCANAレザー">
            <div class="products-service-item-body">
                <h4>ARCANAレザー</h4>
                <p>一番に二つとないARCANAレザーの世界</p>
                <span style="font-size:11px;letter-spacing:0.1em;border-bottom:1px solid rgba(255,255,255,0.5);padding-bottom:2px;">詳しく見る</span>
            </div>
        </a>
    </div>

</section>

@endsection
