@extends('layouts.app')

@section('title', 'THE ENDについて | ARCANA THE END')
@section('description', '大阪・玉造のレザー専門店 THE END について。レザーオーダー・リペア・古着販売・アクセスのご案内。')

@section('content')

{{-- Intro --}}
<section class="theend-intro">
    <div class="container">
        <h1 class="theend-intro-title sa sa-fade">THE ENDについて</h1>
        <hr class="theend-intro-line">
        <p class="theend-intro-desc sa sa-up">大阪玉造の古着屋THE ENDを拠点として古着の取り扱い、オリジナルブランドARCANAを展開、洋服のリペア/リメイクを行っております。</p>
    </div>
</section>

{{-- Service Banners --}}
<div class="top-service-banners">
    <a href="/order" class="top-service-banner sa sa-up sa-delay-1">
        <img src="/images/banner-order.jpg" alt="ARCANA レザーオーダーメイドサービス">
        <div class="top-service-banner-container">
            <div class="top-service-banner-body">
                <p class="top-service-banner-label">ARCANA</p>
                <div class="top-service-banner-header">
                    <p class="top-service-banner-en">leather order made Service</p>
                    <span class="top-service-banner-circle"></span>
                </div>
                <hr class="top-service-banner-line">
                <p class="top-service-banner-ja">レザーオーダーサービス</p>
                <p class="top-service-banner-desc">国内の鹿革を使用したレザーアイテムをオーダーメイドにて作成。<br>お客さまのこだわりを形に変えます。</p>
            </div>
        </div>
    </a>

    <a href="/repair" class="top-service-banner sa sa-up sa-delay-2">
        <img src="/images/banner-repair.jpg" alt="THE END Leather Repair Service">
        <div class="top-service-banner-container">
            <div class="top-service-banner-body">
                <p class="top-service-banner-label">THE END</p>
                <div class="top-service-banner-header">
                    <p class="top-service-banner-en">Leather Repair Service</p>
                    <span class="top-service-banner-circle"></span>
                </div>
                <hr class="top-service-banner-line">
                <p class="top-service-banner-ja">レザーリペアサービス</p>
                <p class="top-service-banner-desc">レザーアイテムを専門的にリペア/リメイクを行っております。<br>レザー特有の製法を熟知した職人が一点一点丁寧に仕上げております。</p>
            </div>
        </div>
    </a>

    <a href="/the-end" class="top-service-banner sa sa-up sa-delay-3">
        <img src="/images/banner-used.jpg" alt="THE END Used clothing sales">
        <div class="top-service-banner-container">
            <div class="top-service-banner-body">
                <p class="top-service-banner-label">THE END</p>
                <div class="top-service-banner-header">
                    <p class="top-service-banner-en">Used clothing sales</p>
                    <span class="top-service-banner-circle"></span>
                </div>
                <hr class="top-service-banner-line">
                <p class="top-service-banner-ja">古着の販売</p>
                <p class="top-service-banner-desc">国内外のこだわりのある古着を取り扱っております。<br>ヴィンテージからレギュラーまでジャンルに捉われないアイテムを取り揃えております。</p>
            </div>
        </div>
    </a>
</div>

{{-- Access --}}
<section class="theend-access">
    <div class="container">
        <h2 class="theend-access-title sa sa-up">アクセス</h2>
        <div class="theend-access-info">
            <dl>
                <dt>アクセス</dt>
                <dd>〒537-0024<br>大阪府大阪市東成区東小橋２丁目２−１６</dd>
                <dt>営業時間</dt>
                <dd>月・金・土・日　12:00〜19:00</dd>
                <dt>電話番号</dt>
                <dd><a href="tel:06-6971-5005" class="theend-access-tel">06-6971-5005</a></dd>
            </dl>
        </div>
        <div class="theend-access-map sa sa-fade">
            <iframe
                src="https://maps.google.com/maps?q=THE+END+ARCANA+大阪府大阪市東成区東小橋2丁目2-16&output=embed&hl=ja&z=17"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="THE END / ARCANA Map">
            </iframe>
        </div>
    </div>
</section>

{{-- YouTube --}}
<section class="theend-youtube">
    <div class="container">
        <div class="theend-youtube-embed sa sa-fade">
            <iframe
                src="https://www.youtube.com/embed/iiUtTT7fklI"
                title="JR玉造からの道"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </div>
</section>

@endsection
