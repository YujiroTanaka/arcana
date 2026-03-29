{{-- ページヘッダー + タブナビゲーション --}}
<section class="page-header">
    <div class="container">
        <h1 class="page-header-title">{{ $title }}</h1>
        <div class="page-header-tabs">
            <a href="/about" class="page-header-tab {{ $current === 'about' ? 'active' : '' }}">ARCANAについて</a>
            <a href="/leather" class="page-header-tab {{ $current === 'leather' ? 'active' : '' }}">ARCANAレザー</a>
            <a href="/purpose" class="page-header-tab {{ $current === 'purpose' ? 'active' : '' }}">ARCANAパーパス</a>
            <a href="/order" class="page-header-tab {{ $current === 'order' ? 'active' : '' }}">ARCANAオーダー</a>
        </div>
    </div>
</section>
