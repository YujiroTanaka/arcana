@extends('layouts.app')

@section('title', 'ARCANA レザー | ARCANA THE END')
@section('description', 'ARCANAが使用する唯一無二のディアスキンレザーについて。野生の鹿革の特徴、なめし加工、染色、後加工の工程を紹介します。')

@section('content')

@include('partials.page_header', ['title' => 'ARCANA レザー', 'current' => 'leather'])

{{-- Hero Image --}}
<section class="leather-hero-img sa sa-fade">
    <img src="/images/leather-1.jpg" alt="ARCANA レザー">
</section>

{{-- Hero Text --}}
<section class="leather-hero-text-section">
    <div class="container">
        <h2 class="sa sa-up">唯一無二のディアスキン ARCANA レザー</h2>
        <p>
            鹿革はレザーのカシミヤと呼ばれるほど柔らしなやかな質感で通気性や吸湿性を兼ね揃えたがフランスの高レザーで高級な素材として親しまれています。<br>
            その中でもARCANAの鹿革は牧畜されている牛などとは違い日本の野山で育った野生の鹿を使用しております。<br>
            その為、生前に負った擦りキズやその治癒跡があります。 しかし、鹿革には牛や馬では表現出来ない肌に吸い付くような独特の柔らかさがあります。<br>
            野生のそれぞれ異なるシボやキズを隠す事なく一枚一枚違った表情で唯一無二の"自分だけの革"としてお楽しみください。
        </p>
    </div>
</section>

{{-- レザー画像2枚 --}}
<section class="leather-images-2col">
    <img src="/images/leather-2-1.jpg" alt="ARCANAレザー">
    <img src="/images/leather-2-2.jpg" alt="ARCANAレザー">
</section>

{{-- Creativity --}}
<section class="leather-section">
    <div class="container">
        <p class="about-section-label">ARCANAレザーの独創性</p>
        <h2 class="about-section-title sa sa-up">creativity</h2>
        <p class="about-section-desc">
            希少な素材、緻密な加工、自由な色合い、そして後加工ーそのすべての工程に妥協のないこだわりを注ぎ込み、<br>
            唯一無二のARCANAレザーが誕生します。
        </p>
    </div>
    <div class="leather-creativity-img sa sa-fade">
        <img src="/images/leather-3.jpg" alt="creativity">
    </div>
</section>

{{-- 本州鹿を使用 --}}
<section class="about-policy" style="padding: 0 0 80px;">
    <div class="about-policy-item reverse sa sa-up">
        <div class="about-policy-img">
            <img src="/images/leather-4-1.jpg" alt="本州鹿を使用">
        </div>
        <div class="about-policy-text text-center text-red">
            <h3>本州鹿を使用</h3>
            <p>
                ARCANAレザーは本州鹿を使用しています。<br>
                一般的に鹿革には、大型で傷の少ない蝦夷鹿が使用されることが多く、本州鹿が選ばれることはほとんどありません。<br>
                本州鹿は蝦夷鹿に比べて個体が小さく、傷やスレが多いため、加工の手間がかかり、相応な技術が必要なことから敬遠されがちです。<br>
                しかし、私たちはこれらの傷やスレを動物が生きた証として捉え、一つ一つ丁寧に手間をかけることで、<br>
                それぞれ異なる表情を持つ唯一無二のディアスキンへと仕上げています。
            </p>
        </div>
    </div>

    <div class="about-policy-item sa sa-up">
        <div class="about-policy-img">
            <img src="/images/leather-4-2.jpg" alt="なめし加工">
        </div>
        <div class="about-policy-text text-center">
            <h3>なめし加工</h3>
            <p>
                熟練のタンナーと一緒に、鞣しや染色、仕上げにまで関わり"ARCANAレザー"を作っております。<br>
                主に2種類の天然素材を用いた環境に配慮した鞣し技法で仕上げております。
            </p>
            <p>
                <strong>【ベジタブルタンニン鞣し】</strong><br>
                程良い厚みで立体感があり使い込みほど味が楽しめる仕上がり。
            </p>
            <p>
                <strong>【白鞣し】</strong><br>
                薄くしなやかで柔軟性がありストレスを感じさせない着心地を楽しめる仕上がり。
            </p>
        </div>
    </div>

    <div class="about-policy-item reverse sa sa-up">
        <div class="about-policy-img">
            <img src="/images/leather-4-3.jpg" alt="革の色">
        </div>
        <div class="about-policy-text text-center">
            <h3>革の色</h3>
            <p>
                PANTONE色見本と独自の色見本100色以上の中で1着からご希望の色味でオーダー可能です。<br>
                主に2種類の染め技法にてカラーオーダー頂けます。
            </p>
            <p>
                <strong>【染色仕上げ】</strong><br>
                淡い色味を得意とし革の表情や質感をナチュラルに表現できます。エイジングも楽しめる仕上がり。
            </p>
            <p>
                <strong>【顔料仕上げ】</strong><br>
                ハッキリとした色味を得意とし、2層で染めることができるので茶芯の様なエイジングを楽しめる仕上がり。
            </p>
        </div>
    </div>

    <div class="about-policy-item sa sa-up">
        <div class="about-policy-img">
            <img src="/images/leather-4-4.jpg" alt="後加工">
        </div>
        <div class="about-policy-text text-center">
            <h3>後加工</h3>
            <p>
                鞣しや染めでは表現できない、最終的な質感の仕上げ加工。<br>
                一般的な鹿革には無い個性や特色を表現することができます。
            </p>
            <p>
                <strong>【ヒート加工】</strong><br>
                鹿革特有のシワをプレスで整えて凸凹のないスムースレザーの様な仕上がり
            </p>
            <p>
                <strong>【絞握り加工】</strong><br>
                2種染め水草の質感の素材を折りシワ感のあるムラのあるコーズドの様な仕上がり
            </p>
            <p>
                <strong>【スパック加工】</strong><br>
                外観を柔り短く起毛させスウェードの様な仕上がり
            </p>
        </div>
    </div>
</section>

@include('partials.service_links')

@endsection
