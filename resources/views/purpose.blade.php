@extends('layouts.app')

@section('title', 'ARCANA Purpose 私たちの存在意義 | ARCANA THE END')
@section('description', 'ARCANAが提案する洋服はこれまでの洋服の概念を変えるものです。一般的に受け入れられない概念をデザインに変えて、唯一無二の服を創る。')

@section('content')

@include('partials.page_header', ['title' => 'ARCANA Purpose 私たちの存在意義', 'current' => 'purpose'])

{{-- Hero --}}
<section class="purpose-hero">
    <div class="purpose-hero-bg" style="background-image:url('/images/purpose-1.jpg');">
        <div class="purpose-hero-text sa sa-fade">
            <p>一般的に受け入れられない概念を<br>デザインに変えて、唯一無二の服を創る</p>
        </div>
    </div>
</section>

{{-- 説明文 --}}
<section class="purpose-intro">
    <div class="container">
        <p class="sa sa-up">
            一般的には綺麗な生地を使って洋服を作る。<br>
            傷があったり、破れがある生地は廃棄される。<br>
            我々が使用するのは日本国内に生息する野生の鹿革。<br>
            喧嘩傷「けんかきず」はもちろん、害獣駆除の際に付いてしまう銃痕「じゅうこん」、<br>
            微生物が分解してしまった銀面が禿げた革。<br>
            この自然界で起きた事実を心から尊重し愛して、<br>
            一般的に受け入れられない概念をデザインに変えて、唯一無二の服を創ることが私たちの存在意義です。
        </p>
    </div>
</section>

{{-- レザー画像2枚 --}}
<div class="leather-images-2col">
    <img src="/images/purpose-2.jpg" alt="ARCANAレザー">
    <img src="/images/purpose-2-2.jpg" alt="ARCANAレザー">
</div>

{{-- デザイナー紹介 --}}
<section class="purpose-designer">
    <div class="container">
        <div class="purpose-designer-inner sa sa-up">
            <div class="purpose-designer-photo">
                <img src="/images/purpose-3.jpg" alt="比嘉俊">
            </div>
            <div class="purpose-designer-text">
                <h3>比嘉俊 ｜ ARCANAデザイナー・THE END店長</h3>
                <p>
                    沖縄県出身。大阪モード学園を卒業後、大阪のアパレル商社で縫製に携わる。大量生産・廃棄に疑問を抱き、リフォーム店の展開や店舗運営を経験。自らものの作りを再開するため独立し、2022年に害獣駆除された鹿革を使用するブランド「ARCANA」を設立。サステナブルなアイテムの製作に取り組み、顧客と共に日々新たな挑戦を続けている。
                </p>
            </div>
        </div>
    </div>
</section>

{{-- OUTCOME --}}
<section class="purpose-outcome">
    <div class="container">
        <p class="about-section-label">ARCANA /THE ENDの成果</p>
        <h2 class="about-section-title sa sa-up">OUTCOME</h2>
        <p class="about-section-desc" style="color:red;">
            ARCANAが提案する洋服はこれまでの洋服の概念を変えるものです。<br>
            一般的に受け入れられない概念をデザインに変えて、唯一無二の服を創ることを目的とするARCANAのブランドストーリーを紹介します。
        </p>
    </div>
    <div class="purpose-outcome-img sa sa-fade">
        <img src="/images/purpose-4.jpg" alt="OUTCOME">
    </div>
</section>

{{-- 実績 --}}
<section class="about-policy purpose-stats">
    {{-- 約1000枚 --}}
    <div class="about-policy-item sa sa-up">
        <div class="about-policy-img">
            <img src="/images/purpose-5-1.jpg" alt="害獣駆除革再利用">
        </div>
        <div class="purpose-stats-text about-policy-text">
            <p class="purpose-stats-num">約<span>1000</span>枚</p>
            <p class="purpose-stats-label">害獣駆除革再利用枚数<br>（2022年4月〜2024年7月）</p>
            <p class="purpose-stats-desc">基本的に日本国内にて害獣駆除される鹿革を使用しており、その中でもキズや穴の多い一般的なアパレルでは使用できず通常廃棄される革を使用しています。</p>
        </div>
    </div>

    {{-- 約160件 --}}
    <div class="about-policy-item reverse sa sa-up">
        <div class="about-policy-img">
            <img src="/images/purpose-5-2.jpg" alt="ARCANAオーダー実績">
        </div>
        <div class="about-policy-text purpose-stats-text">
            <p class="purpose-stats-num">約<span>160</span>件</p>
            <p class="purpose-stats-label">ARCANAオーダー実績<br>（2022年10月〜2024年7月）</p>
            <p class="purpose-stats-desc">ARCANAレザーを使用してお客さまのこだわりやアイディアを形にしております。お客さまの体型やライフスタイルに合ったサイズ感やカスタマイズを提案しております。</p>
        </div>
    </div>

    {{-- 約200件 --}}
    <div class="about-policy-item sa sa-up">
        <div class="about-policy-img">
            <img src="/images/purpose-5-3.jpg" alt="レザーリペア実績">
        </div>
        <div class="about-policy-text purpose-stats-text">
            <p class="purpose-stats-num">約<span>200</span>件</p>
            <p class="purpose-stats-label">・レザーリペア実績<br>（2022年4月〜2024年7月）</p>
            <p class="purpose-stats-desc">レザー製品を一から作り上げる技術を経験を元にリペアしております。レザーブランドからヴィンテージアイテムまで出来るだけオリジナルに近い仕様を意識してリペアを施しております。</p>
        </div>
    </div>
</section>

@include('partials.service_links')

@endsection
