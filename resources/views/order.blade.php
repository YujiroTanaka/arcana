@extends('layouts.app')

@section('title', 'ARCANAオーダー | ARCANA THE END')
@section('description', 'ARCANAのレザーオーダーメイドサービス。日本の野山で育った野生の鹿革を使った唯一無二のレザーオーダーメイド。')

@section('content')

@include('partials.page_header', ['title' => 'ARCANA レザーオーダーメイド', 'current' => 'order'])

{{-- Hero --}}
<section class="order-hero">
    <div class="order-hero-bg" style="background-image:url('/images/order-1.jpg');">
        <div class="order-hero-content">
            <p class="order-hero-sub">Leather Ordermade</p>
            <img src="/images/logo.png" alt="ARCANA" class="order-hero-logo">
            <p class="order-hero-text">日本の野山で育った野生の鹿革を使った<br>唯一無二のレザーオーダーメイドサービス</p>
            <div class="order-hero-scroll">
                <span class="order-hero-scroll-text">SCROLL</span>
                <span class="order-hero-scroll-line"></span>
            </div>
            <a href="/contact" class="order-hero-btn">ARCANAレザーオーダーのご相談はこちら</a>
        </div>
    </div>
</section>

{{-- ARCANA ORDER 特徴3つ --}}
<section class="order-features-section">
    <div class="container">
        <p class="about-section-label" style="text-align:center;">ARCANA ORDER</p>
        <h2 class="order-section-title decorated">ARCANAのオーダーだからこそ叶う、特別な体験</h2>
        <div class="order-features-grid">
            <div class="order-feature-card">
                <div class="order-feature-card-img">
                    <img src="/images/order-2-1.jpg" alt="デザインオーダー">
                </div>
                <h4>①デザインオーダー</h4>
                <p>ベースモデルにないデザインでもオーダー頂けます。お客さまの拘りとアイディアを詰め込んだ世界に一着のアイテムを作成させて頂きます。</p>
            </div>
            <div class="order-feature-card">
                <div class="order-feature-card-img">
                    <img src="/images/order-2-2.jpg" alt="カラーオーダー">
                </div>
                <h4>②カラーオーダー</h4>
                <p>100種類以上のカラー見本からお客さまの希望に合った色で作成頂けます。<br>他にはない拘りのカラーで自分だけの1着を作成させて頂きます。</p>
            </div>
            <div class="order-feature-card">
                <div class="order-feature-card-img">
                    <img src="/images/order-2-3.jpg" alt="裏地/パーツオーダー">
                </div>
                <h4>③裏地/パーツオーダー</h4>
                <p>ボタンなどのパーツをご提案させて頂きます。思い入れのある生地や好みの柄、肌触りなどお気に入りの裏地をご使用頂けます。<br>TALONやCLIX、WALDESなどの本格派ファスナーからお選び頂けます。</p>
            </div>
        </div>
    </div>
</section>

{{-- ARCANA leather order とは + 3つのポイント --}}
<section class="order-about-section" style="background-image:url('/images/order-3.jpg');">
    <div class="order-about-card">
        <h2>ARCANA LEATHER<br>ORDERとは</h2>
        <p>
            日本国内で害獣駆除された鹿革を使用し、他にはない特別なレザーアイテムをオーダーメイドで提供するサービスです。自然が刻んだ本物の傷や風合いを活かした、唯一無二の素材を使い、個性豊かなプロダクトを生み出します。<br>
            なめし加工から後加工に至るまで、全ての工程で豊富な選択肢をご用意。<br>
            革の色合いや質感、デザインの細部に至るまで、お客様のこだわりやライフスタイルを反映させることが可能です。ARCANAの職人が手掛けるレザー製品は、まさに一生物として、長く愛されるアイテムに仕上がります。
        </p>
    </div>
    <div class="order-points-grid">
        <div class="order-points-item">
            <div class="order-points-img">
                <img src="/images/order-4-1.jpg" alt="唯一無二のディアスキン">
            </div>
            <div class="order-points-item-heading">
                <span class="order-points-num">01</span>
                <h4>唯一無二のディアスキン<br>ARCANAレザーを使用</h4>
            </div>
            <p>鹿革は"レザーのカシミヤ"と呼ばれるほどポテンシャルの高いレザーで高級な素材として扱われています。その中でもARCANAの鹿革は日本の野山で育った野生の鹿を使用しております。<br>その為、生前に負った擦りキズやその治癒跡があります。 しかし、鹿革には牛や馬では表現出来ない肌に吸い付くような独特の柔らかさがあります。野生のそれぞれ異なるシボやキズを隠す事なく一枚一枚違った表情で唯一無二の"自分だけの革"としてお楽しみください。</p>
            <a href="/leather" class="order-points-more">MORE <span class="order-points-more-arrow"></span></a>
        </div>
        <div class="order-points-item">
            <div class="order-points-img">
                <img src="/images/order-4-2.jpg" alt="全ての工程を一気通貫で作製する">
            </div>
            <div class="order-points-item-heading">
                <span class="order-points-num">02</span>
                <h4>全ての工程を<br>一気通貫で作製する</h4>
            </div>
            <p>一般的なオーダーメイドでは、受付、裁断、縫製、仕上げなど各分野で様々な人が関わり1着が作成されていますが、ARCANAでは受付から仕上げまで1人で全てを完成させる為、お客さまの顔や思い、拘りを感じ取りながら1着を作成しています。<br>故に、ARCANAレザー特有の野生の証を出来るだけお客さまの求めるデザインに落とし込み拘りや思いを細かな箇所まで作り込むことができます。</p>
        </div>
        <div class="order-points-item">
            <div class="order-points-img">
                <img src="/images/order-4-3.jpg" alt="孫の代まで受け継ぐ一生サポート">
            </div>
            <div class="order-points-item-heading">
                <span class="order-points-num">03</span>
                <h4>孫の代まで受け継ぐ<br>一生サポート</h4>
            </div>
            <p>ARCANAの製品は、一度手にした後もその価値が続くよう、一生サポートをお約束します。私たちは、製品の品質に自信を持ち、お客様が長く愛用できるよう、修理やメンテナンスを含むサポート体制を整えています。<br>リペアをしながら、時代を超えて孫の代まで受け継がれることを目指しています。時間が経つほどに味わいを増すアイテムを、末永くご愛用いただけるよう、私たちは責任を持ってお手伝いします。</p>
        </div>
    </div>
</section>

{{-- ARCANA LEATHER base model --}}
<section class="order-basemodel">
    <div class="container">
        <p class="about-section-label order-label-line">アルカナレザーのオーダーベースモデル</p>
        <h2 class="order-section-title">ARCANA LEATHER BASE MODEL</h2>
    </div>
    @if(count($baseModels) > 0)
    <div class="order-swiper-wrap">
        <div class="swiper order-swiper" id="basemodel-swiper">
            <div class="swiper-wrapper">
                @foreach($baseModels as $model)
                <div class="swiper-slide">
                    <div class="order-basemodel-card">
                        <div class="order-basemodel-card-img">
                            <img src="{{ $model->image }}" alt="{{ $model->title }}">
                        </div>
                        <div class="order-basemodel-card-info">
                            <span class="order-basemodel-card-name">{{ $model->title }}</span>
                            <span class="order-basemodel-card-price">¥{{ number_format($model->price) }}〜</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="order-swiper-nav">
                <button class="order-swiper-prev" id="basemodel-prev"></button>
                <div class="swiper-pagination" id="basemodel-pagination"></div>
                <button class="order-swiper-next" id="basemodel-next"></button>
            </div>
        </div>
    </div>
    <div style="text-align:center;margin-top:32px;">
        <a href="/products" class="order-viewmore-btn">VIEW MORE</a>
    </div>
    @endif
</section>

{{-- ORDER EXAMPLES --}}
<section class="order-examples">
    <div class="container">
        <p class="about-section-label order-label-line">オーダー事例と価格</p>
        <h2 class="order-section-title">ORDER EXAMPLES</h2>
    </div>
    @if(count($orderExamples) > 0)
    <div class="order-swiper-wrap">
        <div class="swiper order-swiper" id="examples-swiper">
            <div class="swiper-wrapper">
                @foreach($orderExamples as $example)
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
                <button class="order-swiper-prev" id="examples-prev"></button>
                <div class="swiper-pagination" id="examples-pagination"></div>
                <button class="order-swiper-next" id="examples-next"></button>
            </div>
        </div>
    </div>
    <div style="text-align:center;margin-top:32px;">
        <a href="/products" class="order-viewmore-btn">VIEW MORE</a>
    </div>
    @endif
</section>

{{-- FLOW --}}
<section class="order-flow-section">
    <div class="container" style="text-align:center;">
        <p class="about-section-label order-label-line">ご利用の流れ</p>
        <h2 class="order-section-title">FLOW</h2>
    </div>
    <div class="order-flow-grid">
        <div class="order-flow-step">
            <div class="order-flow-step-img">
                <img src="/images/order-5-1.jpg" alt="お問合せ/来店予約">
                <span class="order-flow-step-num"><small>STEP</small>01</span>
            </div>
            <div class="order-flow-step-body">
                <h4>お問合せ/来店予約</h4>
                <p>問い合わせフォームよりお気軽にお問い合わせください。<br>スムーズに受付させていただく為、来店予約をお願いしております。</p>
            </div>
        </div>
        <div class="order-flow-step">
            <div class="order-flow-step-img">
                <img src="/images/order-5-2.jpg" alt="デザイン選び">
                <span class="order-flow-step-num"><small>STEP</small>02</span>
            </div>
            <div class="order-flow-step-body">
                <h4>デザイン選び</h4>
                <p>ARCANAベースモデルもしくはお好きなデザインからお選び頂けます。<br>デザイン画像やサンプル持ち込み頂けますと再現性の高いデザインで作成可能です。</p>
            </div>
        </div>
        <div class="order-flow-step">
            <div class="order-flow-step-img">
                <img src="/images/order-5-3.jpg" alt="レザー選び">
                <span class="order-flow-step-num"><small>STEP</small>03</span>
            </div>
            <div class="order-flow-step-body">
                <h4>レザー選び</h4>
                <p>ご希望に合わせ鞣し方法や色合いなどをお選び頂けます。<br>店舗のレザーサンプルで実際に質感や風合いをご確認いただけます。</p>
            </div>
        </div>
        <div class="order-flow-step">
            <div class="order-flow-step-img">
                <img src="/images/order-5-4.jpg" alt="裏地選び">
                <span class="order-flow-step-num"><small>STEP</small>04</span>
            </div>
            <div class="order-flow-step-body">
                <h4>裏地選び</h4>
                <p>
                    ご希望の質感や色合い、柄などをお選び頂けます。<br>
                    店舗の裏地サンプルからお選びいただく、もしくは生地持ち込みも可能です。
                </p>
            </div>
        </div>
        <div class="order-flow-step">
            <div class="order-flow-step-img">
                <img src="/images/order-5-5.jpg" alt="ファスナー・パーツ選び">
                <span class="order-flow-step-num"><small>STEP</small>05</span>
            </div>
            <div class="order-flow-step-body">
                <h4>ファスナー・パーツ選び</h4>
                <p>
                    ご希望に合わせた色合いや形状、大きさなどをお選び頂けます。<br>
                    店舗サンプルにてWALDES、TALON、CLIXなど本格的なファスナーやパーツをご確認頂けます。
                </p>
            </div>
        </div>
        <div class="order-flow-step">
            <div class="order-flow-step-img">
                <img src="/images/order-5-6.jpg" alt="納期について">
                <span class="order-flow-step-num"><small>STEP</small>06</span>
            </div>
            <div class="order-flow-step-body">
                <h4>納期について</h4>
                <p>
                    基本的に3ヶ月〜6ヶ月お時間いただいております。<br>
                    受付の時期やアイテム、素材の在庫状況により変動いたしますのでご相談くださいませ。
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Customer voice --}}
<section class="order-voice">
    <div class="order-voice-bg" style="background-image:url('/images/order-6.jpg');">
        <div class="container">
            <h2 class="order-section-title" style="color:#fff;margin-bottom:20px;">Customer voice</h2>
            <p style="text-align:center;color:rgba(255,255,255,0.7);margin-bottom:72px;">お客様のリアルなお声</p>
            <div class="order-voice-grid">
                <div class="order-voice-card">
                    <p class="order-voice-user">@user-pf8vh2kw6p <span>7 か月前</span></p>
                    <p>マジで何色なん❗<br>ロビンとのセット、、閶絶ものです。<br>素敵すぎる🎶🎶🎶</p>
                    <div class="order-voice-reactions">
                        <span class="order-voice-reaction">👍 1</span>
                        <span class="order-voice-reaction">👎</span>
                        <span class="order-voice-reaction">❤️</span>
                        <span class="order-voice-reaction">返信</span>
                    </div>
                </div>
                <div class="order-voice-card">
                    <p class="order-voice-user">@user-pf8vh2kw6p <span>7 か月前</span></p>
                    <p>マジで何色なん❗<br>ロビンとのセット、、閶絶ものです。<br>素敵すぎる🎶🎶🎶</p>
                    <div class="order-voice-reactions">
                        <span class="order-voice-reaction">👍 1</span>
                        <span class="order-voice-reaction">👎</span>
                        <span class="order-voice-reaction">❤️</span>
                        <span class="order-voice-reaction">返信</span>
                    </div>
                </div>
                <div class="order-voice-card">
                    <p class="order-voice-user">@user-pf8vh2kw6p <span>7 か月前</span></p>
                    <p>マジで何色なん❗<br>ロビンとのセット、、閶絶ものです。<br>素敵すぎる🎶🎶🎶</p>
                    <div class="order-voice-reactions">
                        <span class="order-voice-reaction">👍 1</span>
                        <span class="order-voice-reaction">👎</span>
                        <span class="order-voice-reaction">❤️</span>
                        <span class="order-voice-reaction">返信</span>
                    </div>
                </div>
                <div class="order-voice-card">
                    <p class="order-voice-user">@user-pf8vh2kw6p <span>7 か月前</span></p>
                    <p>マジで何色なん❗<br>ロビンとのセット、、閶絶ものです。<br>素敵すぎる🎶🎶🎶</p>
                    <div class="order-voice-reactions">
                        <span class="order-voice-reaction">👍 1</span>
                        <span class="order-voice-reaction">👎</span>
                        <span class="order-voice-reaction">❤️</span>
                        <span class="order-voice-reaction">返信</span>
                    </div>
                </div>
                <div class="order-voice-card">
                    <p class="order-voice-user">@user-pf8vh2kw6p <span>7 か月前</span></p>
                    <p>マジで何色なん❗<br>ロビンとのセット、、閶絶ものです。<br>素敵すぎる🎶🎶🎶</p>
                    <div class="order-voice-reactions">
                        <span class="order-voice-reaction">👍 1</span>
                        <span class="order-voice-reaction">👎</span>
                        <span class="order-voice-reaction">❤️</span>
                        <span class="order-voice-reaction">返信</span>
                    </div>
                </div>
                <div class="order-voice-card">
                    <p class="order-voice-user">@user-pf8vh2kw6p <span>7 か月前</span></p>
                    <p>マジで何色なん❗<br>ロビンとのセット、、閶絶ものです。<br>素敵すぎる🎶🎶🎶</p>
                    <div class="order-voice-reactions">
                        <span class="order-voice-reaction">👍 1</span>
                        <span class="order-voice-reaction">👎</span>
                        <span class="order-voice-reaction">❤️</span>
                        <span class="order-voice-reaction">返信</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="order-cta">
    <div class="order-cta-bg" style="background-image:url('/images/cta-contact.jpg');">
        <div class="container" style="text-align:center;">
            <h2 class="order-cta-title">ARCANAレザーオーダーのご相談はこちら</h2>
            <p class="order-cta-desc">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。遠方のお客様でもご安心ください。WEBからも受け付けております。</p>
            <a href="/contact" class="order-hero-btn" style="margin:0 auto;">ARCANAレザーオーダーのご相談はこちら</a>
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
    var basemodelSwiper = new Swiper('#basemodel-swiper', {
        slidesPerView: 4,
        spaceBetween: 16,
        pagination: { el: '#basemodel-pagination', clickable: true },
        navigation: { prevEl: '#basemodel-prev', nextEl: '#basemodel-next' },
        breakpoints: {
            0: { slidesPerView: 1.5, spaceBetween: 8 },
            480: { slidesPerView: 2.5, spaceBetween: 12 },
            768: { slidesPerView: 3, spaceBetween: 16 },
            1024: { slidesPerView: 4, spaceBetween: 16 }
        }
    });
    var examplesSwiper = new Swiper('#examples-swiper', {
        slidesPerView: 4,
        spaceBetween: 16,
        pagination: { el: '#examples-pagination', clickable: true },
        navigation: { prevEl: '#examples-prev', nextEl: '#examples-next' },
        breakpoints: {
            0: { slidesPerView: 1.5, spaceBetween: 8 },
            480: { slidesPerView: 2.5, spaceBetween: 12 },
            768: { slidesPerView: 3, spaceBetween: 16 },
            1024: { slidesPerView: 4, spaceBetween: 16 }
        }
    });
});
</script>
@endsection
