@extends('layouts.app')

@section('title', 'お問い合わせ | ARCANA THE END')
@section('description', 'ARCANAへのお問い合わせ。レザーオーダー・リペア・その他のご相談はこちらから。')

@section('content')

<section class="contact-page">
    <div class="container">

        <div class="contact-page-header sa sa-fade">
            <h1>Contact</h1>
            <div style="width:40px;height:3px;background:#c4a35a;margin:12px auto 0;"></div>
        </div>

        @if(session('contact'))
        <div class="contact-success">
            お問い合わせを送信しました。ありがとうございます。
        </div>
        @endif

        <div class="contact-form-wrap sa sa-up">
            <form method="POST" action="/contact" class="contact-form">
                @csrf
                <input type="text" name="honeypot" style="display:none;" tabindex="-1" autocomplete="off">
                <table>
                    <tr>
                        <th>ご用件</th>
                        <td>
                            <select name="type" required>
                                <option value="">選択してください</option>
                                <option value="リペア" @if(old('type')=='リペア') selected @endif>リペア</option>
                                <option value="リメイク" @if(old('type')=='リメイク') selected @endif>リメイク</option>
                                <option value="オーダー" @if(old('type')=='オーダー') selected @endif>オーダー</option>
                                <option value="その他" @if(old('type')=='その他') selected @endif>その他</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>お名前 <span class="required">必須</span></th>
                        <td>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="例：山田 太郎">
                        </td>
                    </tr>
                    <tr>
                        <th>電話番号（半角）</th>
                        <td>
                            <input type="tel" name="phone" value="{{ old('phone') }}" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}" placeholder="例：090-1234-5678">
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス <span class="required">必須</span></th>
                        <td>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="例：example@email.com">
                        </td>
                    </tr>
                    <tr>
                        <th>お問い合わせ内容 <span class="required">必須</span></th>
                        <td>
                            <textarea name="msg" required placeholder="お問い合わせ内容をご記入ください">{{ old('msg') }}</textarea>
                        </td>
                    </tr>
                </table>

                <p class="contact-form-note">
                    goodbase.jpからのメールを受信できるように迷惑メール設定から解除、<br>
                    もしくは受信設定をして頂く様お願い致します。
                </p>

                <div class="contact-form-submit">
                    <input type="submit" value="送信">
                </div>
            </form>
        </div>

    </div>
</section>

@endsection
