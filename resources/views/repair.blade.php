@extends('layouts.app')

@section('title', 'レザーリペア | ARCANA THE END')
@section('description', 'THE ENDのレザーリペアサービス。お気に入りのレザーアイテムのリペア・リメイクをお任せください。')

@section('content')

{{-- Hero --}}
<section class="repair-hero">
    <div class="repair-hero-bg"></div>
    <div class="repair-hero-content">
        <h1>Leather<br>Repair</h1>
        <p class="sub">
            お気に入りのレザーアイテムだから、<br>
            じっくり相談して丁寧に直してもらいたい
        </p>
    </div>
</section>

{{-- Problems --}}
<section class="repair-problem">
    <div class="repair-problem-inner">
        <div class="repair-problem-text">
            <h2>こんなお悩みはありませんか？</h2>
            <ul class="repair-problem-list">
                <li><span class="num">01</span>革ジャンやレザーアイテムのリペアをやってくれる直し屋さんが少ない</li>
                <li><span class="num">02</span>近くのお直し屋さんを何店舗も回ったけど断られた</li>
                <li><span class="num">03</span>細かなニュアンスやアイテムの価値を理解してくれない</li>
                <li><span class="num">04</span>仕上がりがイマイチな状態で戻ってきた</li>
                <li><span class="num">05</span>どこまでリペアしたら良いかアドバイスや相談がしたい</li>
            </ul>
        </div>
        <div>
            <img src="/images/the-end.jpg" alt="レザーリペア" style="width:100%;opacity:0.7;">
        </div>
    </div>
</section>

{{-- Why THE END --}}
<section class="repair-why">
    <div class="repair-why-inner">
        <h2>THE END</h2>
        <h3>THE ENDは レザーアイテムリペアの<br>お悩みを解決します</h3>
        <p style="color:rgba(255,255,255,0.7);font-size:14px;margin-bottom:48px;max-width:600px;line-height:2;">
            オリジナルブランドARCANAにてレザーアイテムを日々作成している為、<br>
            レザーアイテムの取り扱い知識や経験をもとにリペアします。
        </p>
        <div class="repair-features">
            <div class="repair-feature">
                <img src="/images/banner-images/ayakashi.jpg" alt="レザーアイテムのサイズダウン">
                <div class="repair-feature-body">
                    <h4>レザーアイテムのサイズダウン</h4>
                    <p>ご希望のシルエットに合わせたサイズダウン可能です。ステッチ跡・パーツ形状はできるだけ元に近い状態でお仕上げします。</p>
                </div>
            </div>
            <div class="repair-feature">
                <img src="/images/banner-images/abyspey.jpg" alt="レザーアイテムのサイズアップ">
                <div class="repair-feature-body">
                    <h4>レザーアイテムのサイズアップ</h4>
                    <p>ご希望のサイズ感に合わせたサイズアップ可能です。ベースのレザーに近い風合いの革パーツを入れ込みサイズアップします。</p>
                </div>
            </div>
            <div class="repair-feature">
                <img src="/images/banner-images/sunpachi.jpg" alt="ファスナーやパーツのリペア">
                <div class="repair-feature-body">
                    <h4>ファスナーやパーツのリペア</h4>
                    <p>テープ部分が裂けたり、エレメントが破損しているファスナーのリペア・交換可能です。WALDES、TALON、CLIX等にも対応。</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Repair Sample --}}
<section class="repair-sample">
    <div class="container">
        <div class="sec-heading center">
            <p class="sub">CASE STUDY</p>
            <h2 style="font-size:48px;color:#001f3f;font-weight:700;"> repair sample</h2>
        </div>
        @if(count($samples) > 0)
        <div class="repair-sample-grid">
            @foreach($samples as $sample)
            <a href="/pickup/{{ $sample->id }}" class="pickup-card">
                <div class="pickup-card-img">
                    @if($sample->thumbnail_url)
                        <img src="{{ $sample->thumbnail_url }}" alt="{{ $sample->title }}">
                    @else
                        <div style="width:100%;min-height:200px;background:#f0f0f0;display:flex;align-items:center;justify-content:center;">
                            <span style="color:#bbb;font-size:12px;">No Image</span>
                        </div>
                    @endif
                </div>
                <div class="pickup-card-meta">
                    <span>{{ $sample->created_at->format('Y.m.d') }}</span>
                    <span class="category-badge order_repair">オーダー・リペア事例</span>
                </div>
                <h3>{{ $sample->title }}</h3>
            </a>
            @endforeach
        </div>
        <div style="text-align:center;margin-top:8px;">
            <a href="/pickup?category=order_repair" class="btn btn-navy">VIEW MORE</a>
        </div>
        @else
        <p style="text-align:center;color:#666;padding:40px 0;">事例を準備中です。</p>
        @endif
    </div>
</section>

{{-- CTA with phone --}}
<section class="repair-cta">
    <div class="repair-cta-inner">
        <div class="repair-cta-text">
            <h2>Leather Repairのご相談はこちら</h2>
            <p>
                お気に入りのレザーアイテムだから、じっくり相談して丁寧に直してもらいたい—<br>
                そんなお客様のために作られたレザーに特化したリペアサービスです。<br>
                遠方のお客様でもお電話・お問い合わせフォームにてご相談いただけます。
            </p>
            <div style="display:flex;gap:16px;flex-wrap:wrap;">
                <a href="/contact" class="btn btn-outline-white">洋服お直しのご相談はこちら</a>
                <a href="/contact" class="btn btn-outline-white">レザーリペアのご相談はこちら</a>
            </div>
        </div>
        <div class="repair-cta-phone">
            <p class="tel-label">THE END　玉造</p>
            <p class="tel-num">06-6971-5005</p>
            <p class="tel-hours">営業時間　月・金・土・日　12:00〜19:00</p>
        </div>
    </div>
</section>

@endsection
