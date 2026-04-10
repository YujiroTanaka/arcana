@extends('layouts.app')

@section('title', '古着販売 | THE END')
@section('description', 'THE ENDの古着販売。国内外のこだわりのある古着を取り扱っております。ヴィンテージからレギュラーまでジャンルに捉われないアイテムを取り揃えております。')

@section('content')

{{-- Hero --}}
<section class="used-hero">
    <div class="used-hero-bg" style="background-image:url('/images/used-1.png');"></div>
    <div class="used-hero-content sa sa-fade">
        <h1>THE END<br>Used clothing sales</h1>
        <p class="used-hero-desc">国内外のこだわりのある古着を取り扱っております。<br>ヴィンテージからレギュラーまでジャンルに捉われないアイテムを取り揃えております。</p>
        <a href="https://theend0304.base.shop/" target="_blank" rel="noopener" class="order-hero-btn">オンラインショップはこちら</a>
    </div>
</section>

{{-- Features --}}
<section class="used-features">
    <div class="container" style="text-align:center;">
        <p class="used-features-label">THE END</p>
        <h2 class="order-section-title decorated sa sa-up">THE ENDの古着の特徴</h2>
    </div>
    <div class="used-features-grid">
        <div class="used-feature-card sa sa-up sa-delay-1">
            <div class="used-feature-card-img">
                <img src="/images/used-2-1.png" alt="豊富な革ジャンの取り揃え">
            </div>
            <div class="used-feature-card-body">
                <h4>豊富な革ジャンの取り揃え</h4>
                <p>ルイスレザーやショット、バンソンからヴィンテージまで拘りの革ジャン揃えております。</p>
            </div>
        </div>
        <div class="used-feature-card sa sa-up sa-delay-2">
            <div class="used-feature-card-img">
                <img src="/images/used-2-2.png" alt="幅広いジャンルセレクト">
            </div>
            <div class="used-feature-card-body">
                <h4>幅広いジャンルセレクト</h4>
                <p>アメカジ、ユーロ、ミリタリー、ヴィンテージからレギュラー古着までジャンルに捉われない良いものをセレクトしております。</p>
            </div>
        </div>
        <div class="used-feature-card sa sa-up sa-delay-3">
            <div class="used-feature-card-img">
                <img src="/images/used-2-3.png" alt="古着のサイズ調整/カスタマイズ">
            </div>
            <div class="used-feature-card-body">
                <h4>古着のサイズ調整/カスタマイズ</h4>
                <p>店舗内に工房を備えている為、丈詰めやシルエット調整など対応可能。<br>古着の雰囲気は好きだけどサイズ感に困ってる方はご相談ください。</p>
            </div>
        </div>
    </div>
</section>

{{-- Online Store Banner --}}
<section class="used-store-banner">
    <div class="used-store-banner-bg" style="background-image:url('/images/used-3.png');"></div>
    <div class="used-store-banner-content sa sa-fade">
        <div class="used-store-banner-header">
            <h2>THE END<br>Used clothing sales　オンラインストア</h2>
            <span class="top-service-banner-circle"></span>
        </div>
        <p class="used-store-banner-desc">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。<br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
    </div>
</section>

@endsection
