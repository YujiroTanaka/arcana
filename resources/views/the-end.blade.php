@extends('layouts.app')

@section('title', 'THE ENDについて | ARCANA THE END')
@section('description', '大阪・玉造のレザー専門店 THE END について。レザーオーダー・リペア・古着販売・アクセスのご案内。')

@section('content')

{{-- Hero --}}
<section style="background:#0d0d0d;padding:80px 0;">
    <div class="container">
        <div class="about-intro">
            <div class="about-intro-text">
                <h2>ABOUT</h2>
                <h3>THE END について</h3>
                <p>
                    THE ENDは、大阪・玉造に拠点を置くレザー専門店です。<br><br>
                    レザーオーダーメイド・レザーリペア・古着販売を中心に、
                    オリジナルレザーブランド「ARCANA」の製作・販売も行っています。<br><br>
                    お客様一人ひとりのご要望に真摯に向き合い、世界にひとつだけの一着をお作りします。
                </p>
            </div>
            <div>
                <img src="/images/the-end.jpg" alt="THE END" style="width:100%;">
            </div>
        </div>
    </div>
</section>

{{-- Services --}}
<div class="the-end-services">

    <div class="the-end-service">
        <div class="the-end-service-img">
            <img src="/images/banner-images/ayakashi.jpg" alt="Leather Order">
        </div>
        <div class="the-end-service-body">
            <p class="label">THE END</p>
            <h3>Leather Order Made Service</h3>
            <p>
                ARCANAベースモデルをもとに、お客様だけのオーダーメイドレザーウェアを製作します。
                素材・サイズ・カスタム内容まで、職人と一緒に決めていきましょう。
            </p>
            <a href="/order" class="btn btn-outline">詳しく見る</a>
        </div>
    </div>

    <div class="the-end-service">
        <div class="the-end-service-img">
            <img src="/images/the-end.jpg" alt="Leather Repair">
        </div>
        <div class="the-end-service-body">
            <p class="label">THE END</p>
            <h3>Leather Repair Service</h3>
            <p>
                大切なレザーアイテムのリペア・リメイクを承ります。
                ファスナー交換、ステッチ補修、カラーリング、フルリペアまで幅広く対応。
                まずはお気軽にご相談ください。
            </p>
            <a href="/repair" class="btn btn-outline">詳しく見る</a>
        </div>
    </div>

    <div class="the-end-service">
        <div class="the-end-service-img">
            <img src="/images/the-end.jpg" alt="Used Clothing">
        </div>
        <div class="the-end-service-body">
            <p class="label">THE END</p>
            <h3>Used Clothing Sales</h3>
            <p>
                国内外のこだわりの古着を取り扱っています。
                ヴィンテージからレギュラーまでジャンルを選ばないアイテムを取り揃え。
                オンラインショップ(BASE)でも購入いただけます。
            </p>
            <a href="https://theend0304.base.shop/" target="_blank" rel="noopener" class="btn btn-outline">オンラインショップへ</a>
        </div>
    </div>

</div>

{{-- Access --}}
<section class="the-end-access">
    <div class="container">
        <div>
            <div class="access-info">
                <h3>アクセス</h3>
                <dl>
                    <dt>店名</dt>
                    <dd>THE END（ジエンド）</dd>
                    <dt>住所</dt>
                    <dd>大阪府大阪市東成区東小橋２丁目２−１６</dd>
                    <dt>最寄駅</dt>
                    <dd>大阪メトロ長堀鶴見緑地線・大阪メトロ今里筋線「玉造駅」</dd>
                    <dt>TEL</dt>
                    <dd>06-6971-5005</dd>
                    <dt>営業時間</dt>
                    <dd>月・金・土・日 12:00〜19:00</dd>
                    <dt>Instagram</dt>
                    <dd><a href="https://www.instagram.com/the_end_tamatsukuri" target="_blank" rel="noopener">@the_end_tamatsukuri</a></dd>
                </dl>
                <a href="https://www.instagram.com/the_end_tamatsukuri" target="_blank" rel="noopener" class="btn btn-outline-dark">Instagramで最新情報を見る</a>
            </div>
        </div>
        <div class="access-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.5!2d135.53!3d34.67!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzTCsDQwJzEyLjAiTiAxMzXCsDMxJzQ4LjAiRQ!5e0!3m2!1sja!2sjp!4v1234567890"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="THE END Map">
            </iframe>
        </div>
    </div>
</section>

{{-- YouTube --}}
@if(count($snippets) > 0)
<section style="background:#1a1a1a;padding:80px 0;">
    <div class="container">
        <div class="section-heading center" style="margin-bottom:40px;">
            <h2 style="color:#fff;font-size:28px;font-weight:700;letter-spacing:0.08em;">YouTube</h2>
            <div class="gold-bar"></div>
        </div>
        <div class="youtube-grid">
            @foreach($snippets as $movie)
            <div class="youtube-item">
                <iframe src="https://www.youtube.com/embed/{{ $movie->videoId }}"
                    title="{{ $movie->title }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            @endforeach
        </div>
        <div class="text-center" style="margin-top:40px;">
            <a href="https://www.youtube.com/@THE_END" target="_blank" rel="noopener" class="btn btn-outline">YouTubeチャンネルを見る</a>
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="section-cta">
    <div class="container">
        <h2>お問い合わせ</h2>
        <p>レザーオーダー・リペア・その他のご相談はこちら</p>
        <a href="/contact" class="btn btn-outline">Contact</a>
    </div>
</section>

@endsection
