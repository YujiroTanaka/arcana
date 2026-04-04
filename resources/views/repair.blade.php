@extends('layouts.app')

@section('title', 'レザーリペア | ARCANA THE END')
@section('description', 'THE ENDのレザーリペアサービス。お気に入りのレザーアイテムのリペア・リメイクをお任せください。')

@section('content')

{{-- Hero --}}
<section class="repair-hero">
    <div class="repair-hero-bg" style="background-image:url('/images/repair-1.jpg');"></div>
    <div class="repair-hero-content">
        <h1>Leather Repair</h1>
        <p class="sub">
            お気に入りのレザーアイテムだから、<br>
            じっくり相談して丁寧に直してもらいたい
        </p>
        <p class="repair-hero-desc">ARCANA/THE ENDはそんなお客様のために作られたレザーに特化したリペアサービスを行っております。</p>
        <a href="/contact" class="order-hero-btn">レザーリペアのご相談はこちら</a>
    </div>
</section>

{{-- Problems --}}
<section class="repair-problem">
    <div class="repair-problem-inner">
        <h2 class="repair-problem-heading">こんなお悩みはありませんか？</h2>
        <div class="repair-problem-body">
            <div class="repair-circles-area">
                <div class="repair-circle repair-circle-top">
                    <img src="/images/repair-2-red.png" alt="">
                    <div class="repair-circle-text">
                        <p><span class="rc-dot"></span>革ジャンやレザーアイテムのリペアをやってくれる<br><strong>直し屋さんが少ない</strong></p>
                        <p><span class="rc-dot"></span>近くのお直し屋さん何店舗も<br>回ったけど<strong style="display:inline">断られた</strong></p>
                    </div>
                </div>
                <div class="repair-circle repair-circle-bottom-left">
                    <img src="/images/repair-2-blue.png" alt="">
                    <div class="repair-circle-text">
                        <p><span class="rc-dot"></span>細かなニュアンスや<br>アイテムの価値を<br><strong>理解してくれない</strong></p>
                        <p><span class="rc-dot"></span><strong style="display:inline">仕上がりがイマイチ</strong><br>な状態で戻ってきた</p>
                    </div>
                </div>
                <div class="repair-circle repair-circle-bottom-right">
                    <img src="/images/repair-2-yellow.png" alt="">
                    <div class="repair-circle-text">
                        <p><span class="rc-dot"></span>どこまでリペアしたら良いか<br><strong>アドバイスや相談がしたい</strong></p>
                    </div>
                </div>
            </div>
            <div class="repair-problem-right">
                <h3>THE ENDは<br>レザーアイテムリペアの<br>お悩みを解決します</h3>
                <div class="repair-problem-desc">
                    <p>オリジナルブランドARCANAにてレザーアイテムを日々作成している為、レザーアイテムの取り扱い知識や経験をもとにリペアしております。<br>レザー特有の機材や縫製技法を用いて、ステッチの跡や形状を極力オリジナルに近い状態で仕上ることを意識したリペアとなります。</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Features --}}
<section class="repair-features-section">
    <div class="container" style="text-align:center;">
        <p class="repair-features-label">THE END　Leather Repair</p>
        <h2 class="order-section-title decorated">THE END　Leather Repairだからこそ叶う、特別な体験</h2>
    </div>
    <div class="repair-features-grid">
        <div class="repair-feature-card">
            <div class="repair-feature-card-img">
                <img src="/images/repair-3-1.png" alt="レザーアイテムのサイズダウン">
            </div>
            <div class="repair-feature-card-body">
                <h4>レザーアイテムのサイズダウン</h4>
                <p>ご希望のシルエットに合わせたサイズダウン可能です。<br>ステッチ跡・パーツ形状は出来るだけ元に近い状態でお仕上げさせて頂きます。</p>
            </div>
        </div>
        <div class="repair-feature-card">
            <div class="repair-feature-card-img">
                <img src="/images/repair-3-2.png" alt="レザーアイテムのサイズアップ">
            </div>
            <div class="repair-feature-card-body">
                <h4>レザーアイテムのサイズアップ</h4>
                <p>ご希望のサイズ感に合わせたサイズアップ可能です。<br>ベースのレザーに近い風合いの革パーツを入れ込みサイズアップさせて頂きます。</p>
            </div>
        </div>
        <div class="repair-feature-card">
            <div class="repair-feature-card-img">
                <img src="/images/repair-3-3.png" alt="ファスナーやパーツのリペア">
            </div>
            <div class="repair-feature-card-body">
                <h4>ファスナーやパーツのリペア</h4>
                <p>テープ部分が裂けたり、エレメントが破損しているファスナーのリペア・交換可能です。<br>WALDES、TALON、CLIXなど本格派なファスナーの使用も可能です。<br>オリジナルを残したリペアも提案しております。</p>
            </div>
        </div>
    </div>
</section>

{{-- Repair Sample --}}
<section class="repair-sample">
    <div class="container" style="text-align:center;">
        <p class="about-section-label order-label-line">リペア事例</p>
        <h2 class="order-section-title">REPAIR SAMPLE</h2>
    </div>
    @if(count($repairExamples) > 0)
    <div class="order-swiper-wrap">
        <div class="swiper order-swiper" id="repair-swiper">
            <div class="swiper-wrapper">
                @foreach($repairExamples as $example)
                <div class="swiper-slide">
                    <div class="order-basemodel-card">
                        <div class="order-basemodel-card-img">
                            <img src="{{ $example->image }}" alt="{{ $example->title }}">
                        </div>
                        <div class="order-basemodel-card-info">
                            <span class="order-basemodel-card-name">{{ $example->title }}</span>
                            <span class="order-basemodel-card-price">¥{{ number_format($example->price) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="order-swiper-nav">
                <button class="order-swiper-prev" id="repair-prev"></button>
                <div class="swiper-pagination" id="repair-pagination"></div>
                <button class="order-swiper-next" id="repair-next"></button>
            </div>
        </div>
    </div>
    <div style="text-align:center;margin-top:32px;">
        <a href="/pickup?category=order_repair" class="order-viewmore-btn">VIEW MORE</a>
    </div>
    @else
    <p style="text-align:center;color:#666;padding:40px 0;">事例を準備中です。</p>
    @endif
</section>

{{-- CTA --}}
<section class="order-cta">
    <div class="order-cta-bg" style="background-image:url('/images/cta-contact.jpg');">
        <div class="container" style="text-align:center;">
            <h2 class="order-cta-title">Leather Repairのご相談はこちら</h2>
            <p class="order-cta-desc">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。遠方のお客様でもご安心ください。WEBからでも受け付けております。</p>
            <a href="/contact" class="order-hero-btn" style="margin:0 auto;">レザーリペアのご相談はこちら</a>
            <div class="order-cta-phone-section">
                <p class="order-cta-phone-label"><span>お電話でのご相談はこちら</span></p>
                <div class="order-cta-phone-box">
                    <p class="order-cta-phone-shop">THE END　玉造</p>
                    <p class="order-cta-phone-number"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 33.136 33.138" class="order-cta-phone-icon"><path d="M1,3.5H1c-.137.183-.266.366-.384.545A4.385,4.385,0,0,0,.123,7.313a.019.019,0,0,0,0,.009c.038.138.081.278.124.416,1.5,4.871,5.356,10.4,10.05,15.1s10.23,8.546,15.1,10.05c.14.045.28.086.418.124l.009,0a4.374,4.374,0,0,0,3.262-.49q.27-.175.544-.382l0,0a12.291,12.291,0,0,0,3.242-3.625l0,0a2.219,2.219,0,0,0-.382-2.62l0,0a31.092,31.092,0,0,0-6.4-4.55c-.083-.048-.163-.094-.244-.137a2.2,2.2,0,0,0-.945-.214,2.231,2.231,0,0,0-1.238.378l-.006-.009c-.76.513-1.665,1.243-2.447,1.785a2.146,2.146,0,0,1-.525.346,2.2,2.2,0,0,1-1.746.057l0,0a2.161,2.161,0,0,1-.482-.264A25.494,25.494,0,0,1,13.7,19.429a25.556,25.556,0,0,1-3.851-4.748,2.2,2.2,0,0,1-.264-.482s0,0,0,0a2.234,2.234,0,0,1-.154-.806,2.2,2.2,0,0,1,.558-1.465c.542-.782,1.27-1.687,1.783-2.447l-.009,0a2.214,2.214,0,0,0,.166-2.183c-.045-.08-.089-.16-.135-.244a31.058,31.058,0,0,0-4.55-6.4l0,0A2.215,2.215,0,0,0,4.626.266l0-.006A12.3,12.3,0,0,0,1,3.5Z" fill="#2e5fa9"/></svg> 06-6971-5005</p>
                    <p class="order-cta-phone-hours">営業時間　月・金・土・日　12:00〜19:00</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('repair-swiper')) {
        new Swiper('#repair-swiper', {
            slidesPerView: 4,
            spaceBetween: 16,
            pagination: { el: '#repair-pagination', clickable: true },
            navigation: { prevEl: '#repair-prev', nextEl: '#repair-next' },
            breakpoints: {
                0: { slidesPerView: 1.5, spaceBetween: 8 },
                480: { slidesPerView: 2.5, spaceBetween: 12 },
                768: { slidesPerView: 3, spaceBetween: 16 },
                1024: { slidesPerView: 4, spaceBetween: 16 }
            }
        });
    }
});
</script>
@endsection
