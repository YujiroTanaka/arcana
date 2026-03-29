@extends('layouts.app')

@section('title', 'ARCANAについて | ARCANA THE END')
@section('description', 'ARCANAブランドについて。大阪玉造のレザーオーダー・リペア専門店THE ENDが手がけるオリジナルレザーブランド。')

@section('content')

@include('partials.page_header', ['title' => 'ARCANAについて', 'current' => 'about'])

{{-- Hero --}}
<section class="about-hero">
    <div class="container">
        <div class="about-hero-img">
            <img src="/images/about-hero.jpg" alt="ARCANA">
        </div>
        <div class="about-hero-text">
            <h2>日本の野山で育った野生の鹿を使用した<br>ダメージディアスキンレザーブランド</h2>
            <p>
                ARCANAは、大阪玉造の古着屋THE ENDから生まれたオリジナルブランド<br>
                国内で害獣駆除される鹿革をメインに使用しており、この鹿革の中でもキズやスレや穴などを理由に一般的なアパレルでは使用できず廃棄されている。<br>
                わたしたちはこの野生の生きた証が残る革に魅力や意味を感じスレ、キズを隠す事なくデザインとして落とし込んだアイテムを作っております。<br>
                人間の都合で変わってしまった自然や動物の暮らしを変える事は出来ないが、アパレルの都合だけで廃棄される革の意味を変えるもの作りを心掛けております。<br>
                日本国内で増えすぎて駆除され賞でられるだけの野生鹿。着てるのには無く自然が育んだマテリアルとしてものを作り社会に還元していきます。
            </p>
        </div>
        <div class="about-hero-images">
            <img src="/images/about-leather-1.jpg" alt="ARCANA leather jacket">
            <img src="/images/about-leather-2.jpg" alt="ARCANA leather jacket">
        </div>
    </div>
</section>

{{-- Leather紹介 --}}
<section class="about-leather">
    <div class="about-leather-bg" style="background-image:url('/images/about-leather-bg.jpg');">
        <div class="about-leather-text">
            <h2>唯一無二のダメージディアスキン<br>ARCANA レザーを使用</h2>
            <p>
                ARCANAの鹿革（ディアスキン）とは、野山で生き抜いてきた鹿の生きた証が残った野生の鹿革を使用しています。<br>
                野生のそれぞれの生き様が宿る一枚一枚違った表情で唯一無二の分厚い印象を楽しめます。
            </p>
            <div class="top-basemodel-link-wrap" style="padding:0;margin-top:32px;text-align:left;">
                <a href="/leather" class="top-basemodel-link inverted">
                    <span class="top-basemodel-link-text">詳細を見る</span>
                    <span class="top-basemodel-link-circle"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="about-leather-images">
        <img src="/images/about-leather-3.jpg" alt="ARCANAレザー">
        <img src="/images/about-leather-4.jpg" alt="ARCANAレザー">
        <img src="/images/about-leather-5.jpg" alt="ARCANAレザー">
    </div>
</section>

{{-- Brand Purpose --}}
<section class="about-purpose">
    <div class="container">
        <p class="about-section-label">ブランドパーパス</p>
        <h2 class="about-section-title">ARCANA Brand Purpose</h2>
        <p class="about-section-desc">
            ARCANAが提案する洋服はこれまでの洋服の概念を変えるものです。<br>
            一般的に受け入れられない概念をデザインに変えて、唯一無二の価値を創ることを目的にするARCANAのブランドストーリーを紹介します。
        </p>
        <div class="top-basemodel-link-wrap" style="padding:0;margin-top:32px;text-align:left;">
            <a href="/purpose" class="top-basemodel-link">
                <span class="top-basemodel-link-text">詳細を見る</span>
                <span class="top-basemodel-link-circle"></span>
            </a>
        </div>
    </div>
    <div class="about-purpose-img">
        <img src="/images/about-purpose.jpg" alt="ARCANA Brand Purpose">
    </div>
</section>

{{-- Brand Policy --}}
<section class="about-policy">
    <div class="container" style="text-align:center;">
        <p class="about-section-label">ブランドポリシー</p>
        <h2 class="about-section-title">ARCANA Brand Policy</h2>
        <p class="about-section-desc">ARCANAが大切にする価値観、守るべき方針を紹介します。</p>
    </div>

    <div class="about-policy-item">
        <div class="about-policy-img">
            <img src="/images/about-policy-1.jpg" alt="世界に1点しかないモノ創り">
        </div>
        <div class="about-policy-text">
            <h3>世界に1点しかない<br>モノ創り</h3>
            <p>
                私たちが手がけるアイテムは、自然の痕跡をそのまま生かし、それぞれが異なる表情を持っています。<br><br>
                一つとして同じものがない、この独自性こそがARCANAの誇りです。私たちは、素材そのものの個性を尊重し、その唯一の特徴を最大限に引き出すモノ創りを心がけています。
            </p>
        </div>
    </div>

    <div class="about-policy-item reverse">
        <div class="about-policy-img">
            <img src="/images/about-policy-2.jpg" alt="全ての工程を一気通貫で作製する">
        </div>
        <div class="about-policy-text">
            <h3>全ての工程を<br>一気通貫で作製する</h3>
            <p>
                ARCANAは、製品のすべての工程を一気通貫で行うことで、その品質と独自性を確保しています。タンナーからの仕入れ、なめし加工、染色、後処理、縫製、そして付属品の発注に至るまで、全てのプロセスを私たち自身の手で管理し、徹底的にこだわり抜いています。<br><br>
                この一貫したプロセスによって、素材の持つ魅力を最大限に引き出し、他にはない唯一無二のアイテムを生み出すことが可能となります。私たちは、すべての工程に責任を持つことで、ARCANAが大切にする価値観を製品に反映させています。
            </p>
        </div>
    </div>
</section>

{{-- 一生サポート --}}
<section class="about-support">
    <div class="about-support-inner">
        <div class="about-support-img">
            <img src="/images/about-support.jpg" alt="一生サポート">
        </div>
        <div class="about-support-text">
            <h3>一生サポート</h3>
            <p>
                ARCANAの製品は、一度手にした後もその価値が続くよう、一生サポートをお約束します。私たちは、製品の品質に自信を持ち、お客様が長く愛用できるよう、修理やメンテナンスを含むサポート体制を整えています。<br><br>
                リペアをしながら、時代を超えて孫の代まで受け継がれることを目指しています。時間が経つほどに味わいを増すアイテムを、末永くご愛用いただけるよう、私たちは責任を持ってお手伝いします。
            </p>
        </div>
    </div>
</section>

{{-- メディア掲載実績 --}}
<section class="about-media">
    <div class="container">
        <h2 class="about-media-title">メディア掲載実績</h2>
        <p class="about-media-desc">ARCANAは、革新的なデザインとサステイナビリティへの取り組みが評価され、さまざまなメディアで取り上げられています。</p>
        <div class="about-media-grid">
            <img src="/images/media-logo-1.jpg" alt="メディア掲載">
            <img src="/images/media-logo-2.jpg" alt="メディア掲載">
            <img src="/images/media-logo-1.jpg" alt="メディア掲載">
            <img src="/images/media-logo-1.jpg" alt="メディア掲載">
            <img src="/images/media-logo-2.jpg" alt="メディア掲載">
            <img src="/images/media-logo-1.jpg" alt="メディア掲載">
        </div>
    </div>
</section>

@include('partials.service_links')

@endsection
