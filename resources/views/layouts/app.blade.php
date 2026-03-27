<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>@yield('title', 'ARCANA | THE END')</title>
    <meta name="description" content="@yield('description', 'ARCANA - 大阪玉造のレザーオーダー・リペア・古着専門店 THE END が作るオリジナルブランド')">
    <meta name="keywords" content="ARCANA,THE END,大阪,玉造,古着屋,レザー,リペア,オーダー">
    <link rel="shortcut icon" href="/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/arcana.css?{{ date('YmdHis') }}">
    @yield('head')
</head>
<body>

<header id="arcana-header">
    <div class="header-inner">
        <a href="/" class="header-logo"><img src="/images/logo.png" alt="ARCANA"></a>

        <nav class="header-nav">
            <a href="/about" @if(Request::is('about')) class="active" @endif>ARCANAについて</a>
            <a href="/order" @if(Request::is('order')) class="active" @endif>ARCANAオーダー</a>
            <a href="/repair" @if(Request::is('repair')) class="active" @endif>レザーリペア</a>
            <a href="/pickup" @if(Request::is('pickup*')) class="active" @endif>オーダー・リペア事例</a>
            <a href="/the-end" @if(Request::is('the-end')) class="active" @endif>THE ENDについて</a>
            <a href="/pickup" @if(Request::is('pickup*') && !Request::is('pickup')) class="active" @endif>pickup</a>
            <a href="/products" @if(Request::is('products')) class="active" @endif>products</a>
            <a href="https://www.youtube.com/@THE_END" target="_blank" rel="noopener">YouTube</a>
            <a href="/contact" @if(Request::is('contact')) class="active" @endif>お問い合わせ</a>
        </nav>

        <button class="nav-hamburger" id="navHamburger" aria-label="メニュー">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>

<nav class="mobile-nav" id="mobileNav">
    <a href="/about">ARCANAについて</a>
    <a href="/order">ARCANAオーダー</a>
    <a href="/repair">レザーリペア</a>
    <a href="/pickup">オーダー・リペア事例</a>
    <a href="/the-end">THE ENDについて</a>
    <a href="/pickup">pickup</a>
    <a href="/products">products</a>
    <a href="https://www.youtube.com/@THE_END" target="_blank" rel="noopener">YouTube</a>
    <a href="/contact">お問い合わせ</a>
</nav>

<div class="page-body">
    @yield('content')
</div>

<footer id="arcana-footer">
    <div class="footer-inner">
        <div class="footer-col-logo">
            <a href="/" class="footer-logo"><img src="/images/logo.png" alt="ARCANA"></a>
        </div>
        <div class="footer-col-info">
            <p class="footer-shop-name">THE END /ARCANA</p>
            <dl class="footer-info-list">
                <dt>アクセス</dt>
                <dd>〒537-0024<br>大阪府大阪市東成区東小橋２丁目２−１６</dd>
                <dt>営業時間</dt>
                <dd>月・金・土・日　12:00〜19:00</dd>
                <dt>電話番号</dt>
                <dd><a href="tel:0669715005" class="footer-tel">06-6971-5005</a></dd>
            </dl>
        </div>
        <nav class="footer-col-nav">
            <a href="/">TOP</a>
            <a href="/about">ARCANAについて</a>
            <a href="/order">ARCANAオーダー</a>
            <a href="/repair">THE END レザーリペア</a>
            <a href="/the-end">THE END 古着</a>
        </nav>
        <div class="footer-col-nav2">
            <nav>
                <a href="/products">products</a>
                <a href="/pickup">オーダー事例</a>
                <a href="/about">会社情報</a>
                <a href="/contact">プライバシーポリシー</a>
            </nav>
            <div class="footer-social">
                <a href="https://www.instagram.com/the_end_tamatsukuri" target="_blank" rel="noopener" title="Instagram">
                    <i class="fa fa-instagram"></i>
                </a>
                <a href="https://www.youtube.com/@THE_END" target="_blank" rel="noopener" title="YouTube">
                    <i class="fa fa-youtube-play"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<script src="/js/jquery.1.8.3.min.js"></script>
<script>
(function($) {
    // Hamburger menu
    var $hamburger = $('#navHamburger');
    var $mobileNav = $('#mobileNav');

    $hamburger.on('click', function() {
        $(this).toggleClass('open');
        $mobileNav.toggleClass('open');
    });

    // Close mobile nav when link is clicked
    $mobileNav.find('a').on('click', function() {
        $hamburger.removeClass('open');
        $mobileNav.removeClass('open');
    });
})(jQuery);
</script>
@yield('scripts')

</body>
</html>
