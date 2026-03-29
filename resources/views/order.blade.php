@extends('layouts.app')

@section('title', 'ARCANAオーダー | ARCANA THE END')
@section('description', 'ARCANAのレザーオーダーメイドサービス。日本の野山で育った野生の鹿革を使った唯一無二のレザーオーダーメイド。')

@section('content')

@include('partials.page_header', ['title' => 'ARCANA レザーオーダーメイド', 'current' => 'order'])

{{-- Hero --}}
<section class="order-hero">
    <div class="order-hero-bg"></div>
    <div class="order-hero-content">
        <p style="font-size:13px;letter-spacing:0.2em;color:rgba(255,255,255,0.6);margin-bottom:12px;">LEATHER ORDERMADE</p>
        <h1>Leather<br>Ordermade</h1>
        <p>日本の野山で育った野生の鹿革を使った<br>唯一無二のレザーオーダーメイドサービス</p>
    </div>
</section>

{{-- What is ARCANA Order --}}
<section style="background:#fff;padding:80px 0;">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;">
            <div>
                <div class="sec-heading">
                    <p class="sub">ABOUT ORDER</p>
                    <h2>ARCANAのオーダーだからこそ<br>叶う、特別な体験</h2>
                </div>
                <p style="color:#444;font-size:14px;line-height:2;margin-bottom:32px;">
                    ARCANAベースモデルとは、ARCANAで定番商品としてオーダー可能なモデルになります。<br><br>
                    ARCANAベースモデルもしくはお好きなデザインからお選び頂けます。
                    デザイン画像やサンプル持ち込み頂けますと再現性が高まります。
                </p>
            </div>
            <div>
                <img src="/images/banner-images/ayakashi.jpg" alt="ARCANA order" style="width:100%;">
            </div>
        </div>
    </div>
</section>

{{-- Order Features (warm gray bg) --}}
<section class="order-features">
    <div class="container">
        <div class="sec-heading">
            <p class="sub">CUSTOMIZE</p>
            <h2>ARCANAオーダーの特徴</h2>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:start;">
            <div class="order-feature-list">
                <div class="order-feature-item">
                    <div class="num">①</div>
                    <div>
                        <h4>デザインオーダー</h4>
                        <p>ベースモデルにないデザインでもオーダー頂けます。お客さまの拘りとアイディアを詰め込んだ世界に一着のアイテムを作成します。</p>
                    </div>
                </div>
                <div class="order-feature-item">
                    <div class="num">②</div>
                    <div>
                        <h4>カラーオーダー</h4>
                        <p>100種類以上のカラー見本からお客さまの希望に合った色で作成頂けます。他にはない拘りのカラーで自分だけの1着を作成します。</p>
                    </div>
                </div>
                <div class="order-feature-item">
                    <div class="num">③</div>
                    <div>
                        <h4>裏地/パーツオーダー</h4>
                        <p>ボタンなどのパーツをご提案させて頂きます。思い入れのある生地や好みの柄・肌触りなどお気に入りの裏地をご使用頂けます。</p>
                    </div>
                </div>
            </div>
            <div>
                <img src="/images/banner-images/abyspey.jpg" alt="ARCANA customize" style="width:100%;">
            </div>
        </div>
    </div>
</section>

{{-- Order Flow --}}
<section class="order-flow">
    <div class="container">
        <div class="sec-heading center" style="margin-bottom:40px;">
            <p class="sub">FLOW</p>
            <h2>オーダーの流れ</h2>
        </div>
        <div class="order-flow-grid">
            <div class="order-flow-step">
                <div class="step-num">01</div>
                <h4>お問合せ/来店予約</h4>
                <p>問い合わせフォームよりお気軽にお問い合わせください。スムーズに受付させていただく為、来店予約をお願いしております。</p>
            </div>
            <div class="order-flow-step">
                <div class="step-num">02</div>
                <h4>デザイン選び</h4>
                <p>ARCANAベースモデルもしくはお好きなデザインからお選び頂けます。デザイン画像やサンプル持ち込みも可能です。</p>
            </div>
            <div class="order-flow-step">
                <div class="step-num">03</div>
                <h4>レザー選び</h4>
                <p>ご希望に合わせ鞣し方法や色合いなどをお選び頂けます。店舗のレザーサンプルで実際に質感や風合いをご確認いただけます。</p>
            </div>
            <div class="order-flow-step">
                <div class="step-num">04</div>
                <h4>裏地選び</h4>
                <p>お好みの裏地・パーツをお選び頂きます。製作後にお渡しまたは発送いたします（約2〜4ヶ月）。</p>
            </div>
        </div>
    </div>
</section>

{{-- Base Models --}}
<section class="order-models">
    <div class="container">
        <div class="sec-heading center" style="margin-bottom:40px;">
            <p class="sub">LINEUP</p>
            <h2>ARCANAベースモデル</h2>
        </div>
        @if(count($items) > 0)
        <div class="order-models-grid">
            @foreach($items as $item)
            <a href="https://theend0304.base.shop/items/{{ $item->item_id }}" target="_blank" rel="noopener" class="order-model-card">
                <img src="{{ $item->image_url }}?imformat=generic&q=90&im=Resize,width=400,type=normal" alt="{{ $item->title }}">
                <h4>{{ $item->title }}</h4>
                <p class="price">¥{{ $item->price }}-</p>
            </a>
            @endforeach
        </div>
        <div style="text-align:center;margin-top:8px;">
            <a href="/products" class="btn btn-outline-dark">ARCANAベースモデル全てを見る</a>
        </div>
        @else
        <p style="text-align:center;color:#666;padding:40px 0;">商品情報を準備中です。</p>
        @endif
    </div>
</section>

@include('partials.service_links')

{{-- CTA --}}
<section class="section-cta">
    <div class="container">
        <h2>ARCANAレザーオーダーのご相談はこちら</h2>
        <p>まずはお気軽にお問い合わせください</p>
        <a href="/contact" class="btn btn-outline-white">お問い合わせ</a>
    </div>
</section>

@endsection
