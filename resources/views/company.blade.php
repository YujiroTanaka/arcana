@extends('layouts.app')

@section('title', '会社概要 | ARCANA THE END')
@section('description', 'GOOD BASE株式会社の会社概要。THE END / ARCANAの運営会社情報をご案内いたします。')

@section('content')

<section class="privacy-page">
    <div class="container">
        <h1 class="privacy-title sa sa-fade">会社概要</h1>
        <hr class="privacy-line">
        <p class="privacy-intro">GOOD BASE株式会社は、大阪・玉造を拠点にリペア・リメイクの古着屋「THE END」の運営およびオリジナルレザーブランド「ARCANA」の製作・販売を行っております。</p>

        <div class="company-table-wrap sa sa-up">
            <table class="company-table">
                <tbody>
                    <tr>
                        <th>会社名</th>
                        <td>GOOD BASE株式会社</td>
                    </tr>
                    <tr>
                        <th>代表者</th>
                        <td>山田大輔</td>
                    </tr>
                    <tr>
                        <th>店舗名</th>
                        <td>THE END</td>
                    </tr>
                    <tr>
                        <th>ブランド</th>
                        <td>ARCANA</td>
                    </tr>
                    <tr>
                        <th>所在地</th>
                        <td>〒537-0024<br>大阪府大阪市東成区東小橋2丁目2-16 金沢ビル104</td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td><a href="tel:0669715005">06-6971-5005</a></td>
                    </tr>
                    <tr>
                        <th>営業時間</th>
                        <td>12:00〜19:00</td>
                    </tr>
                    <tr>
                        <th>定休日</th>
                        <td>火・水・木曜日</td>
                    </tr>
                    <tr>
                        <th>古物商許可</th>
                        <td>第622080186228号（大阪府公安委員会許可）</td>
                    </tr>
                    <tr>
                        <th>事業内容</th>
                        <td>
                            レザーオーダーメイド製品の企画・製作・販売<br>
                            洋服のリペア・リメイク<br>
                            古着の仕入れ・販売<br>
                            オンラインショップの運営
                        </td>
                    </tr>
                    <tr>
                        <th>オンラインショップ</th>
                        <td><a href="https://theend0304.base.shop/" target="_blank" rel="noopener">https://theend0304.base.shop/</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="privacy-section" style="margin-top:60px;">
            <h2>アクセス</h2>
            <div class="theend-access-map">
                <iframe
                    src="https://maps.google.com/maps?q=THE+END+ARCANA+大阪府大阪市東成区東小橋2丁目2-16&output=embed&hl=ja&z=17"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="THE END / ARCANA Map">
                </iframe>
            </div>
        </div>
    </div>
</section>

@endsection
