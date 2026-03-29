@extends('layouts.app')

@section('title', 'ARCANA | THE END - 大阪玉造のレザーオーダー・リペア・古着')
@section('description', 'ARCANAは大阪玉造の古着屋THE ENDから生まれたダメージディアスキンブランド。レザーオーダー・リペア・古着販売。')

@section('content')

{{-- ===== HERO ===== --}}
<section class="top-hero">
    <div class="top-hero-bg"></div>

    {{-- センターのロゴオーバーレイ --}}
    <div class="top-hero-title-wrap sa-hero">
        <img src="/images/logo.png" alt="ARCANA" class="top-hero-logo">
    </div>

    {{-- 下部のサービスラベル --}}
    <div class="top-hero-labels">
        <a href="/order" class="top-hero-label-item">
            <span class="top-hero-label-text">
                <span class="top-hero-label-en">ARCANA</span>
                <span class="top-hero-label-ja">レザーオーダーメイドサービス</span>
            </span>
            <span class="top-hero-label-arrow"></span>
        </a>
        <a href="/repair" class="top-hero-label-item">
            <span class="top-hero-label-text">
                <span class="top-hero-label-en">THE END</span>
                <span class="top-hero-label-ja">レザーリペアサービス</span>
            </span>
            <span class="top-hero-label-arrow"></span>
        </a>
        <a href="/the-end" class="top-hero-label-item">
            <span class="top-hero-label-text">
                <span class="top-hero-label-en">THE END</span>
                <span class="top-hero-label-ja">古着販売</span>
            </span>
            <span class="top-hero-label-arrow"></span>
        </a>
    </div>
</section>

{{-- ===== ブランド紹介 + 商品 (白背景) ===== --}}
<section class="top-brand-section">
    <div class="top-brand-text-wrap sa sa-up">
        <h2 class="top-brand-heading">唯一無二のダメージディアスキン</h2>
        <p class="top-brand-desc">
            大阪玉造の古着屋THE ENDから生まれたARCANA。<br>
            害獣駆除された鹿革を活用し、キズやスレをデザインとして<br>
            生かすダメージディアスキンブランドです。<br>
            廃棄される革に新たな意味を与え、自然の素材を活用して社会に還元することを目指しています。
        </p>
    </div>

    {{-- ジャケット3点 --}}
    <div class="top-jackets">
        @foreach($baseModels as $index => $model)
        <a href="{{ $model->url ?: '#' }}" target="_blank" rel="noopener" class="top-jacket-item sa sa-up sa-delay-{{ $index + 1 }}">
            <img src="{{ $model->image }}?imformat=generic&q=90&im=Resize,width=500,type=normal" alt="{{ $model->title }}">
            <p class="top-jacket-name">{{ $model->title }}</p>
        </a>
        @endforeach
    </div>

    {{-- ベースモデルを見るリンク --}}
    <div class="top-basemodel-link-wrap">
        <a href="/products" class="top-basemodel-link">
            <span class="top-basemodel-link-text">ARCANAベースモデルを見る</span>
            <span class="top-basemodel-link-circle"></span>
        </a>
    </div>
</section>

{{-- ===== フォトグリッド ===== --}}
<section>
    <div class="top-grid">
        {{-- 1: Purpose (左上小) --}}
        <a href="/about" class="top-grid-cell top-grid-cell--photo top-grid-purpose sa sa-up sa-delay-1">
            <img src="/images/grid-purpose.jpg" alt="ARCANA Purpose">
            <div class="top-grid-cell-body">
                <p class="top-grid-cell-en">ARCANA Purpose</p>
                <h3 class="top-grid-cell-ja">私たちの存在意義</h3>
                <span class="top-grid-more">MORE</span>
            </div>
        </a>

        {{-- 2: ARCANA Leather (上2番目小) --}}
        <a href="/about" class="top-grid-cell top-grid-cell--photo top-grid-leather sa sa-up sa-delay-2">
            <img src="/images/grid-leather.jpg" alt="ARCANA Leather">
            <div class="top-grid-cell-body">
                <p class="top-grid-cell-en">ARCANA Leather</p>
                <h3 class="top-grid-cell-ja">ARCANAレザーについて</h3>
                <span class="top-grid-more">MORE</span>
            </div>
        </a>

        {{-- 3: ARCANA about (右縦長) --}}
        <a href="/about" class="top-grid-cell top-grid-cell--photo top-grid-about sa sa-left sa-delay-3">
            <img src="/images/grid-about.jpg" alt="ARCANA">
            <div class="top-grid-cell-body">
                <p class="top-grid-cell-en">about</p>
                <h3 class="top-grid-cell-ja">ARCANAについて</h3>
                <span class="top-grid-more">MORE</span>
            </div>
        </a>

        {{-- 4-6: PICK UP（ブログ上位3件） --}}
        @foreach($pickups as $i => $pickup)
        @php
            $gridClass = $i === 0 ? 'top-grid-interview' : ($i === 1 ? 'top-grid-order' : 'top-grid-repair');
            $saClass = $i === 0 ? 'sa sa-right' : 'sa sa-up sa-delay-' . $i;
            $categoryLabels = ['news' => 'news', 'order_repair' => 'order repair', 'others' => 'others'];
        @endphp
        <a href="/pickup/{{ $pickup->id }}" class="top-grid-cell top-grid-cell--photo {{ $gridClass }} {{ $saClass }}">
            @if($pickup->thumbnail_url)
                <img src="{{ $pickup->thumbnail_url }}" alt="{{ $pickup->title }}">
            @else
                <img src="/images/grid-designer.jpg" alt="{{ $pickup->title }}">
            @endif
            <span class="top-grid-pickup-label">pickup</span>
            <div class="top-grid-cell-body">
                <p class="top-grid-cell-en">{{ $categoryLabels[$pickup->category] ?? 'NEWS' }}</p>
                <h3 class="top-grid-cell-ja">{{ $pickup->title }}</h3>
                <span class="top-grid-more">MORE</span>
            </div>
        </a>
        @endforeach

    </div>

    {{-- PICK UP一覧を見るリンク --}}
    <div class="top-basemodel-link-wrap">
        <a href="/pickup" class="top-basemodel-link">
            <span class="top-basemodel-link-text">PICK UP一覧を見る</span>
            <span class="top-basemodel-link-circle"></span>
        </a>
    </div>

</section>

{{-- ===== サービスセクション見出し (白背景) ===== --}}
<section class="top-service-intro">
    <p class="top-service-intro-sub sa sa-fade">Service</p>
    <h2 class="top-service-intro-heading sa sa-up">ARCANA・THE ENDのサービスソリューション</h2>
    <p class="top-service-intro-desc sa sa-up sa-delay-1">洋服のリペア/リメイク/古着の販売を行うTHE END<br>そのオリジナルブランドとしてARCANAを展開しております。</p>
</section>

{{-- ===== 3本の横長サービスバナー ===== --}}
<div class="top-service-banners">
    <a href="/order" class="top-service-banner sa sa-left">
        <img src="/images/banner-order.jpg" alt="ARCANA レザーオーダーメイドサービス">
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
    </a>

    <a href="/repair" class="top-service-banner sa sa-right">
        <img src="/images/banner-repair.jpg" alt="THE END Leather Repair Service">
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
    </a>

    <a href="/the-end" class="top-service-banner sa sa-left">
        <img src="/images/banner-used.jpg" alt="THE END Used clothing sales">
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
    </a>
</div>

{{-- ===== YouTube (#f5f5f5) ===== --}}
<section class="top-youtube">
    <div class="container">
        <h2 class="top-youtube-title sa sa-fade">YOUTUBE</h2>
        <div class="youtube-grid">
            @foreach($snippets as $movie)
            <div class="youtube-item">
                <iframe src="https://www.youtube.com/embed/{{ $movie->videoId }}"
                    title="{{ $movie->title }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <p class="youtube-item-title">{{ $movie->title }}</p>
            </div>
            @endforeach
        </div>

        {{--Moreリンク --}}
        <div class="top-basemodel-link-wrap">
            <a href="https://www.youtube.com/@THE_END" class="top-basemodel-link">
                <span class="top-basemodel-link-text">MORE</span>
                <span class="top-basemodel-link-circle"></span>
            </a>
        </div>
    </div>
</section>

{{-- ===== お問い合わせCTA ===== --}}
<section class="top-cta">
    <div class="container" style="text-align:center;">
        <p class="top-cta-sub sa sa-fade">CONTACT</p>
        <a href="/contact" class="top-cta-link sa sa-up">
            <h2 class="top-cta-heading">お問い合わせ</h2>
            <span class="top-cta-circle"></span>
        </a>
    </div>
</section>

@endsection
