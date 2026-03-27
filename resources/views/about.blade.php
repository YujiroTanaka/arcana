@extends('layouts.app')

@section('title', 'ARCANAについて | ARCANA THE END')
@section('description', 'ARCANAブランドについて。大阪玉造のレザーオーダー・リペア専門店THE ENDが手がけるオリジナルレザーブランド。')

@section('content')

{{-- Hero --}}
<section class="about-hero">
    <div class="container">
        <div class="about-intro">
            <div class="about-intro-text">
                <h2>ABOUT ARCANA</h2>
                <h3>たった一着にこだわる、<br>ARCANAレザー</h3>
                <p>
                    ARCANAは、大阪・玉造に拠点を置くTHE ENDが手がけるオリジナルレザーブランドです。<br><br>
                    日本国内の野生鹿革を使用し、傷や銃痕、銀面剥げなど一般的に「欠陥」とされる部分こそを
                    デザインの一部として昇華させた、唯一無二のレザーウェアを製作しています。<br><br>
                    一着一着が手作業で作られ、世界に同じものは存在しません。
                    「子どもの次の代まで着続けられる最高の嗜好品」をコンセプトに、
                    縫製・生地・付属品・リペア・リメイク、全てに徹底的にこだわります。
                </p>
            </div>
            <div>
                <img src="/images/make_a_story.jpg" alt="ARCANA leather" style="width:100%;">
            </div>
        </div>
    </div>
</section>

{{-- Brand Story --}}
<section class="about-story">
    <div class="about-story-inner">
        <div class="section-heading" style="margin-bottom:48px;">
            <h2 style="color:rgba(255,255,255,0.45);font-size:11px;font-weight:600;letter-spacing:0.2em;text-transform:uppercase;">BRAND STORY</h2>
            <h3 style="color:#fff;font-size:22px;font-weight:700;margin-top:8px;">ARCANAが生まれた背景</h3>
            <div class="gold-bar"></div>
        </div>

        <div class="about-story-item">
            <div>
                <img src="/images/banner-images/ayakashi.jpg" alt="ARCANA story" style="width:100%;">
            </div>
            <div class="about-story-text">
                <h3>野生の鹿革という素材</h3>
                <p>
                    ARCANAが使用するのは、日本国内の害獣駆除によって得られた野生の鹿革。
                    通常は廃棄されるような傷や銃痕がある革も、私たちにとっては唯一無二の模様。
                    その革が持つ「生きた証」をそのままデザインとして取り込んでいます。
                </p>
            </div>
        </div>

        <div class="about-story-item reverse">
            <div>
                <img src="/images/banner-images/abyspey.jpg" alt="ARCANA craft" style="width:100%;">
            </div>
            <div class="about-story-text">
                <h3>職人の手技と最高の縫製</h3>
                <p>
                    量産ではなく、一着一着に向き合う職人の手仕事。
                    縫製・生地・付属品の全てにおいて妥協なく選び抜かれた素材と技術で、
                    着込むほどに味が出る本物のレザーウェアを生み出しています。
                </p>
            </div>
        </div>

        <div class="about-story-item">
            <div>
                <img src="/images/banner-images/sunpachi.jpg" alt="ARCANA repair" style="width:100%;">
            </div>
            <div class="about-story-text">
                <h3>次の世代へ受け継ぐリペア</h3>
                <p>
                    ARCANAのレザーウェアは、リペア・リメイクを前提に設計されています。
                    破れても、傷んでも、また蘇らせることができる。
                    「子どもの次の代まで着続けられる」—それが最高の嗜好品の条件です。
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Price / Value --}}
<section style="background:#0d0d0d;padding:80px 0;">
    <div class="container">
        <div class="section-heading center" style="margin-bottom:48px;">
            <h2 style="color:#fff;font-size:26px;font-weight:700;">ARCANAの価値</h2>
            <div class="gold-bar"></div>
        </div>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:32px;">
            <div class="price-highlight">
                <div class="price-num">¥100,000〜</div>
                <div class="price-label">レザーオーダー（ベースモデル）</div>
            </div>
            <div class="price-highlight">
                <div class="price-num">¥16,000〜</div>
                <div class="price-label">レザーリペア（部位により異なる）</div>
            </div>
            <div class="price-highlight">
                <div class="price-num">¥20,000〜</div>
                <div class="price-label">リメイク・カスタム</div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="section-cta">
    <div class="container">
        <h2>ご相談・お問い合わせ</h2>
        <p>オーダーやリペアについて、まずはお気軽にご相談ください</p>
        <a href="/contact" class="btn btn-outline">お問い合わせはこちら</a>
    </div>
</section>

@endsection
