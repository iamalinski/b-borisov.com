<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17979324056"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-17979324056');
    </script>

    <!-- Event snippet for Показване на страница conversion page -->
    <script>
        gtag('event', 'conversion', {'send_to': 'AW-17979324056/J8FvCPH5iYIcEJjtmv1C'});
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сватбен фотограф | Кръщенета, балове и събития</title>
    @vite(['resources/js/app.js', 'resources/scss/app.scss'])

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollSmoother.min.js"></script>

    <meta name="og:image" content="{{ asset('images/app/og.jpg') }}">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/app/favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/app/favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/app/favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/app/favicons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/app/favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/app/favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/app/favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/app/favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/app/favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('images/app/favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/app/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/app/favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/app/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/app/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('images/app/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <link rel="canonical" href="{{ URL::to('/') }}" />

    <meta name="title" content="Сватбен фотограф | Кръщенета, балове и събития">
    <meta name="description"
        content="Професионален фотограф от Велико Търново за сватби, кръщенета, балове и събития. Емоционални кадри, които остават завинаги.">

    @php
        $jsonLd = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Organization',
                    '@id' => 'https://b-borisov.com',
                    'name' => 'Борис Борисов Photography',
                    'url' => 'https://b-borisov.com',
                    'logo' => 'https://b-borisov.com/images/app/header-brand.svg',
                    'description' => 'Професионален фотограф за сватби, кръщенета, корпоративни събития и фотосесии.',
                    'email' => 'photography.borisov@gmail.com',
                    'telephone' => '+359883375611',
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => 'https://b-borisov.com/#website',
                    'url' => 'https://b-borisov.com',
                    'name' => 'Борис Борисов Photography',
                    'publisher' => ['@id' => 'https://b-borisov.com'],
                ],
                [
                    '@type' => 'Service',
                    '@id' => 'https://b-borisov.com',
                    'serviceType' => 'Wedding Photography',
                    'name' => 'Сватбен ден',
                    'description' =>
                        'Пълно заснемане на сватбения ден, обработка на всички кадри, фотосесия на младоженците, дигитална галерия и електронен носител.',
                    'provider' => ['@id' => 'https://b-borisov.com'],
                    'areaServed' => ['@type' => 'Country', 'name' => 'Bulgaria'],
                    'offers' => [['@type' => 'Offer', 'price' => '500', 'priceCurrency' => 'EUR']],
                ],
                [
                    '@type' => 'Service',
                    '@id' => 'https://b-borisov.com',
                    'serviceType' => 'Baptism Photography',
                    'name' => 'Свето Кръщение',
                    'description' =>
                        'Заснемане на ритуала и празненството, обработка на всички кадри, дигитална галерия и електронен носител.',
                    'provider' => ['@id' => 'https://b-borisov.com'],
                    'areaServed' => ['@type' => 'Country', 'name' => 'Bulgaria'],
                    'offers' => [['@type' => 'Offer', 'price' => '200', 'priceCurrency' => 'EUR']],
                ],
            ],
        ];
    @endphp
    <script type="application/ld+json">
        {!! json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
</head>

<body>
    <div class="loading-overlay" id="loading-overlay">
        <div class="brand">
            <img src="{{ asset('images/app/loading-brand.svg') }}" alt="Boris Borisov Photography">
            <div>
                <span>
                    Boris Borisov
                </span>
                Photography
            </div>
        </div>
    </div>
    <div class="menu-overlay" aria-hidden="true">
        <div class="header">
            <a href="{{ route('home') }}" class="brand">
                <picture>
                    <source media="(max-width: 760px)" srcset="{{ asset('images/app/menu-brand-mobile.svg') }}">
                    <img src="{{ asset('images/app/header-brand-new.svg') }}" alt="Boris Borisov Photography">
                </picture>
            </a>
            <button type="button" class="close-menu" aria-label="Затвори менюто">
                <img src="{{ asset('images/home/icons/menu-close.svg') }}" alt="">
            </button>
        </div>
        <nav class="main">
            <ul>
                <li><a href="#home-stories">Услуги</a></li>
                <li><a href="#home-gallery">Портфолио</a></li>
                <li><a href="#home-services">Пакети</a></li>
                <li><a href="#home-about">За мен</a></li>
            </ul>
        </nav>
        <div class="footer">
            <img src="{{ asset('images/app/footer-bb.svg') }}" alt="Boris Borisov" class="bb">
            <b>ЗАПАЗИ</b>
            <p>своя снимачен ден</p>
            <ul>
                <li>
                    <a href="tel:+359883375611" title="Обадете се">+359 883 375 611</a>
                </li>
                <li>
                    <a href="mailto:photography.borisov@gmail.com" title="Изпратете имейл">photography.borisov@gmail.com</a>
                </li>
            </ul>
            <p class="copy"><strong>© {{ date('Y') }} Борис Борисов</strong>. Всички права запазени.</p>
        </div>
    </div>
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <header>
                <a href="{{ route('home') }}" class="brand">
                    <img src="{{ asset('images/app/header-brand-new.svg') }}" alt="Boris Borisov Photography">
                </a>
                <a href="tel:+359883375611" class="call">
                    <img src="{{ asset('images/app/phone.svg') }}" alt="Call">
                </a>
                <div class="menu">
                    <img src="{{ asset('images/home/icons/menu.svg') }}" alt="Menu">
                </div>
            </header>
            <main>
                <div class="hero-wrapper">
                    <section id="home-hero">
                        <h1>
                            <span class="name">Борис Борисов</span>
                            <strong>Фотограф</strong>
                        </h1>
                        <ul>
                            <li><img src="{{ asset('images/home/hero/hero-1.png') }}" alt="Сватбена двойка"></li>
                            <li><img src="{{ asset('images/home/hero/hero-2.png') }}" alt="Булка на залез"></li>
                            <li><img src="{{ asset('images/home/hero/hero-3.png') }}" alt="Младоженци под воала"></li>
                            <li><img src="{{ asset('images/home/hero/hero-4.png') }}" alt="Фотосесия с чадър"></li>
                            <li><img src="{{ asset('images/home/hero/hero-5.png') }}" alt="Портрет в зелена рокля"></li>
                        </ul>
                    </section>
                    <section id="home-marquee" aria-label="Заснемани събития">
                        <div class="track">
                            <ul>
                                <li>
                                    <img src="{{ asset('images/home/icons/marquee-graduation.svg') }}" alt="">
                                    <span>Абитуриентски<br />балове</span>
                                </li>
                                <li>
                                    <img src="{{ asset('images/home/icons/marquee-microphone.svg') }}" alt="">
                                    <span>концерти<br />и фестивали</span>
                                </li>
                                <li>
                                    <img src="{{ asset('images/home/icons/marquee-cheers.svg') }}" alt="">
                                    <span>корпоративни<br />събития</span>
                                </li>
                                <li>
                                    <img src="{{ asset('images/home/icons/marquee-cake.svg') }}" alt="">
                                    <span>рождени<br />дни</span>
                                </li>
                                <li>
                                    <img src="{{ asset('images/home/icons/marquee-studio-light.svg') }}" alt="">
                                    <span>художествени<br />фотосесии</span>
                                </li>
                                <li>
                                    <img src="{{ asset('images/home/icons/marquee-rings.svg') }}" alt="">
                                    <span>сватбени<br />тържества</span>
                                </li>
                                <li>
                                    <img src="{{ asset('images/home/icons/marquee-church.svg') }}" alt="">
                                    <span>свето<br />кръщение</span>
                                </li>
                                <li>
                                    <img src="{{ asset('images/home/icons/marquee-conference.svg') }}" alt="">
                                    <span>изложения и<br />конференции</span>
                                </li>
                                <li>
                                    <img src="{{ asset('images/home/icons/marquee-party.svg') }}" alt="">
                                    <span>детски<br />партита</span>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
                <section id="home-quote">
                    <p>
                        всяка фотография<br />разказва <em class="accent">историята</em><br />такава, каквато се
                        случва–<br />истинска, <em>жива,<br />непринудена</em>
                    </p>
                    <p>
                        <em class="accent">...в собствен стил</em>
                    </p>
                    <img src="{{ asset('images/home/icons/line-quote.svg') }}" alt="" class="line">
                </section>
                <section id="home-stories">
                    <span class="script">ucmopuu b kagpu</span>
                    <img src="{{ asset('images/home/icons/line-stories.svg') }}" alt="" class="line">
                    <h2><span class="light">всичко,</span> <em>което си струва</em><br /><span class="light">да
                            бъде</span> <em>запомнено</em></h2>
                    <p class="lead">
                        От вълнението преди голямото „Да“ до първите семейни празници. Запазете всеки специален за
                        Вас момент
                    </p>
                    <ul>
                        <li>
                            <div class="icon">
                                <img src="{{ asset('images/home/icons/story-wedding.svg') }}" alt="">
                            </div>
                            <b>Сватбено тържество</b>
                            <p>
                                <span>Сватбеният ден - от подготовката до</span>
                                <span>последните емоции на празника</span>
                            </p>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="{{ asset('images/home/icons/story-photoshoot.svg') }}" alt="">
                            </div>
                            <b>Фотосесия</b>
                            <p>
                                <span>Индивидуални и групови фотосесии,</span>
                                <span>съобразени с вашите предпочитания</span>
                            </p>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="{{ asset('images/home/icons/story-scroll.svg') }}" alt="">
                            </div>
                            <b>Свето Кръщение</b>
                            <p>
                                <span>Фотография на кръщенето, семейни</span>
                                <span>снимки и празничните моменти</span>
                            </p>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="{{ asset('images/home/icons/story-cheers.svg') }}" alt="">
                            </div>
                            <b>Вашето събитие</b>
                            <p>
                                <span>Корпоративни събития, рождени дни и</span>
                                <span>други специални поводи</span>
                            </p>
                        </li>
                    </ul>
                </section>
                <section id="home-gallery">
                    @php
                        // Display heights (px) of each photo at 484px width – keeps the masonry stable while images lazy-load
                        $galleryColumns = [
                            1 => [721, 323, 324, 727, 659, 323, 323],
                            2 => [323, 611, 323, 659, 323, 659, 323],
                            3 => [727, 324, 727, 323, 659, 611],
                        ];
                    @endphp
                    <div class="row">
                        @foreach ($galleryColumns as $col => $heights)
                            <ul class="col">
                                @foreach ($heights as $i => $height)
                                    <li><img src="{{ asset('images/home/gallery/c' . $col . '-' . ($i + 1) . '.jpg') }}"
                                            width="484" height="{{ $height }}" alt="Борис Борисов – портфолио"
                                            loading="lazy"></li>
                                @endforeach
                            </ul>
                        @endforeach
                    </div>
                </section>
                <section id="home-services">
                    <span class="script">nakemu</span>
                    <img src="{{ asset('images/home/icons/line-packages.svg') }}" alt="" class="line">
                    <h2><em>начина,</em> <span class="light">по който помните</span><br /><em>важният ден</em></h2>
                    <p class="lead">
                        Всеки празник е различен, затова и фотографското преживяване трябва да бъде съобразено с
                        него. Разгледайте предложенията и открийте своето.
                    </p>
                    <ul class="services">
                        <li class="expanded">
                            <div class="head">
                                <b>Сватбен ден</b>
                                <span class="slash">/</span>
                                <p>
                                    Професионално заснемане на сватбени тържества, улавящо най-красивите моменти и
                                    емоции от вашия специален ден
                                </p>
                                <span class="toggle">
                                    <img src="{{ asset('images/home/icons/service-arrow.svg') }}" alt="">
                                </span>
                            </div>
                            <div class="body">
                                <div class="packages">
                                    <div class="package">
                                        <div class="paper">
                                            <strong>Стандарт</strong>
                                            <ul>
                                                <li class="short">8 снимачни часа</li>
                                                <li>Пълен документален разказ на деня</li>
                                                <li>600+ кадъра</li>
                                                <li>Обработка на всички кадри</li>
                                                <li>Фотосесия на младоженците по <span>време на сватбения ден</span></li>
                                                <li>Художествена обработка на <span>кадрите от фотосесията</span></li>
                                                <li>Сет от подбрани снимки до 14 дни <span>след събитието</span></li>
                                                <li>Дигитална галерия + електронен <span>носител (флаш памет)</span></li>
                                                <li>До 45 дни срок за получаване</li>
                                            </ul>
                                            <b class="price">500 €</b>
                                        </div>
                                    </div>
                                    <div class="package premium">
                                        <div class="paper">
                                            <img src="{{ asset('images/home/icons/premium.svg') }}" alt=""
                                                class="badge">
                                            <strong>Премиум</strong>
                                            <ul>
                                                <li class="short">10 снимачни часа</li>
                                                <li>Пълен документален разказ на деня</li>
                                                <li>800+ кадъра</li>
                                                <li>Обработка на всички кадри</li>
                                                <li>Фотосесия на младоженците по <span>време на сватбения ден</span></li>
                                                <li>Художествена обработка на <span>кадрите от фотосесията</span></li>
                                                <li>Сет от подбрани снимки до 14 дни <span>след събитието</span></li>
                                                <li>Дигитална галерия + луксозна <span>кутия с електронен носител (флаш
                                                        памет)</span></li>
                                                <li>Фотоалбум с 30 избрани фотографии <span>във формат 15х20 см на премиум
                                                        хартия</span></li>
                                                <li>До 30 дни срок за получаване</li>
                                            </ul>
                                            <b class="price">700 €</b>
                                        </div>
                                    </div>
                                </div>
                                <ul class="extras">
                                    <li>Сватбена фотосесия в различен ден — 150 €</li>
                                    <li>Овъртайм — 80 €/час</li>
                                    <li>Експресно изпращане на снимките (за 10 дни) — 200 €</li>
                                    <li>Изготвяне на индивидуален пакет</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="head">
                                <b>Свето Кръщение</b>
                                <span class="slash">/</span>
                                <p>
                                    Професионално заснемане на кръщенета, съхраняващо спомените от този специален
                                    семеен празник
                                </p>
                                <span class="toggle">
                                    <img src="{{ asset('images/home/icons/service-arrow.svg') }}" alt="">
                                </span>
                            </div>
                            <div class="body">
                                {{-- TODO: content pending from the client – placeholder uses the previous baptism packages --}}
                                <div class="packages">
                                    <div class="package">
                                        <div class="paper">
                                            <strong>Ритуал</strong>
                                            <ul>
                                                <li class="short">200+ кадъра</li>
                                                <li>Заснемане на ритуала</li>
                                                <li>Снимки с гостите</li>
                                                <li>Обработка на всички кадри</li>
                                                <li>Сет от подбрани снимки до 7 дни <span>след събитието</span></li>
                                                <li>Дигитална галерия + електронен <span>носител (флаш памет)</span></li>
                                                <li>До 14 дни срок за получаване</li>
                                            </ul>
                                            <b class="price">200 €</b>
                                        </div>
                                    </div>
                                    <div class="package premium">
                                        <div class="paper">
                                            <img src="{{ asset('images/home/icons/premium.svg') }}" alt=""
                                                class="badge">
                                            <strong>Разширен</strong>
                                            <ul>
                                                <li class="short">4 снимачни часа</li>
                                                <li>400+ кадъра</li>
                                                <li>Заснемане на ритуала</li>
                                                <li>Заснемане на празненство</li>
                                                <li>Обработка на всички кадри</li>
                                                <li>Сет от подбрани снимки до 7 дни <span>след събитието</span></li>
                                                <li>Дигитална галерия + електронен <span>носител (флаш памет)</span></li>
                                                <li>До 20 дни срок за получаване</li>
                                            </ul>
                                            <b class="price">350 €</b>
                                        </div>
                                    </div>
                                </div>
                                <ul class="extras">
                                    <li>Овъртайм — 80 €/час</li>
                                    <li>Експресно изпращане на снимките (за 10 дни) — 200 €</li>
                                    <li>Луксозен фотоалбум с 30 избрани кадъра 15х20 см — 70 €</li>
                                    <li>Изготвяне на индивидуален пакет</li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </section>
                <section id="home-about">
                    <div class="container">
                        <div class="text">
                            <span class="script"><small>3</small>a men</span>
                            <h2><span class="light">моят</span> <em>почерк</em> <span class="light">във всяка</span>
                                <em>история</em></h2>
                            <p>
                                В работата си се стремя да съчетавам добра композиция, светлина и внимание към
                                детайла, без да губя усещането за истинския момент. Предпочитам естествените емоции и
                                спонтанните кадри пред излишно режисираните пози. Всеки повод има своя атмосфера и
                                характер, затова подхождам индивидуално към всяка история. Целта ми е снимките да
                                отразяват не само как е изглеждал денят, но и какво го е направило специален. Така
                                създавам кадри, към които ще можете да се връщате с удоволствие и след години.
                            </p>
                        </div>
                        <div class="picture">
                            <div class="frame">
                                <img src="{{ asset('images/home/about/photo.jpg') }}" alt="Борис Борисов – фотограф">
                            </div>
                            <img src="{{ asset('images/home/about/signature.png') }}" alt="Борисов" class="signature">
                        </div>
                    </div>
                </section>
                <section id="home-reviews" aria-label="Отзиви от клиенти">
                    <div class="track">
                        <ul>
                            <li>
                                <div class="stars">
                                    @foreach (range(1, 5) as $i)
                                        <img src="{{ asset('images/home/icons/star.svg') }}" alt="">
                                    @endforeach
                                </div>
                                <p>
                                    Изключително съм доволен от професионалната фотосесия за нашата сватба! Фотографът беше
                                    невероятен професионалист – внимателен към всеки детайл, с усет към емоциите и
                                    атмосферата на деня. Успя да улови най-красивите и искрени моменти по естествен и
                                    артистичен начин. Комуникацията беше лесна и приятна, а крайният резултат надмина
                                    очакванията ни. Силно препоръчвам на всеки, който иска спомените от сватбата му да бъдат
                                    запазени по перфектен начин!
                                </p>
                                <span class="name">Илиян Алински</span>
                            </li>
                            <li>
                                <div class="stars">
                                    @foreach (range(1, 5) as $i)
                                        <img src="{{ asset('images/home/icons/star.svg') }}" alt="">
                                    @endforeach
                                </div>
                                <p>
                                    Изключително доволни сме от работата! Снимките станаха прекрасни - естествени,
                                    емоционални и с внимание към всеки детайл. Фотографът беше много позитивен, предразположи
                                    ни и успя да улови най-красивите моменти. Препоръчваме с две ръце!
                                </p>
                                <span class="name">Анна-Мария Димитрова</span>
                            </li>
                            <li>
                                <div class="stars">
                                    @foreach (range(1, 5) as $i)
                                        <img src="{{ asset('images/home/icons/star.svg') }}" alt="">
                                    @endforeach
                                </div>
                                <p>
                                    Много сме доволни от резултатите! Всяка снимка се получи уникална, атмосферна и
                                    красива. Преди фотосесията фотографът уточни всеки детайл, включително какво искаме за
                                    снимките и какъв стил искаме. Специални благодарности за търпението, вниманието към
                                    детайлите и способността да създадете комфортна атмосфера. Беше удоволствие да работим с
                                    вас. Определено ще се свържем с вас отново и ще ви препоръчаме на нашите приятели!
                                </p>
                                <span class="name">Катя Волохова</span>
                            </li>
                        </ul>
                    </div>
                
                </section>
            </main>
            <footer>
                <div class="wrapper">
                    <img src="{{ asset('images/app/footer-bb.svg') }}" alt="Boris Borisov" class="bb">
                    <b>ЗАПАЗИ</b>
                    <p>своя снимачен ден</p>
                    <img src="{{ asset('images/home/icons/line-footer.svg') }}" alt="" class="line">
                    <ul class="contacts">
                        <li>
                            <a href="tel:+359883375611" title="Обадете се" class="phone">
                                +359 883 375 611
                            </a>
                        </li>
                        <li>
                            <a href="mailto:photography.borisov@gmail.com" title="Изпратете имейл">
                                photography.borisov@gmail.com
                            </a>
                        </li>
                    </ul>
                    <ul class="seals">
                        <li>
                            <img src="{{ asset('images/home/icons/seal-signature.svg') }}" alt="">
                            <span>авторски<br />стил</span>
                        </li>
                        <li>
                            <img src="{{ asset('images/home/icons/seal-ribbon.svg') }}" alt="">
                            <span>коректно<br />отразяване</span>
                        </li>
                        <li>
                            <img src="{{ asset('images/home/icons/seal-camera.svg') }}" alt="">
                            <span>персонален<br />подход</span>
                        </li>
                    </ul>
                    <h2><span>БОРИС</span><span>БОРИСОВ</span></h2>
                    <div class="bottom">
                        <div class="left">
                            <span>Авторски права</span>
                        </div>
                        <div class="right">
                            © {{ date('Y') }} Борис Борисов
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="services-popup-overlay" id="author-rights-popup-overlay">
        <div class="services-popup">
            <div class="services-popup-header">
                <h3>Авторски права</h3>
                <div class="services-popup-close" id="author-rights-popup-close">
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="services-popup-body">
                <p>
                    Всички материали заснети по време на събитията са със запазени авторски права. Кадрите могат да се
                    използват за реклама и портфолио както в електронен вариант, така и в печатни издания.
                </p>
            </div>
        </div>
    </div>
    <script>
        gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

        var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // === Smooth scrolling ===
        var smoother = ScrollSmoother.create({
            wrapper: '#smooth-wrapper',
            content: '#smooth-content',
            smooth: prefersReducedMotion ? 0 : 1.2,
            smoothTouch: false,
            effects: true
        });

        function lockScroll() {
            smoother.paused(true);
        }

        function unlockScroll() {
            smoother.paused(false);
        }

        // Wraps every character of the element's text nodes in a span, keeping the inner markup (em, span, br...)
        function splitTextToChars(element) {
            var walker = document.createTreeWalker(element, NodeFilter.SHOW_TEXT);
            var textNodes = [];
            while (walker.nextNode()) {
                textNodes.push(walker.currentNode);
            }

            textNodes.forEach(function(node) {
                var text = node.textContent.replace(/\s+/g, ' ');
                if (!text.trim()) {
                    return;
                }
                var fragment = document.createDocumentFragment();
                text.split(/(\s)/).forEach(function(part) {
                    if (!part) return;
                    if (part === ' ') {
                        fragment.appendChild(document.createTextNode(' '));
                        return;
                    }
                    // Keep words together so lines never break inside a word
                    var word = document.createElement('span');
                    word.className = 'word';
                    part.split('').forEach(function(char) {
                        var span = document.createElement('span');
                        span.className = 'char';
                        span.textContent = char;
                        word.appendChild(span);
                    });
                    fragment.appendChild(word);
                });
                node.parentNode.replaceChild(fragment, node);
            });

            return element.querySelectorAll('.char');
        }

        // One reusable timeline per text: entering plays it, leaving back rewinds the same timeline
        // (faster, so the reset is quick but still smooth). It is never recreated, so re-entering
        // mid-animation simply continues from where it is – no stacked/doubled tweens.
        function createCharsReveal(charElements, duration, delay) {
            return gsap.timeline({
                paused: true
            }).fromTo(charElements, {
                opacity: 0,
                y: 20
            }, {
                opacity: 1,
                y: 0,
                duration: 0.3,
                stagger: duration / charElements.length,
                ease: 'power2.out',
                immediateRender: true
            }, delay || 0);
        }

        // === Presets (run immediately, before the loading overlay hides) ===

        var heroTitleLines = document.querySelectorAll('#home-hero h1 > *');
        var heroListItems = document.querySelectorAll('#home-hero ul li');
        gsap.set(heroTitleLines, {
            opacity: 0,
            y: 40
        });
        gsap.set(heroListItems, {
            opacity: 0
        });

        // Section titles and the quote reveal letter by letter
        var h2Data = [];
        document.querySelectorAll('main section h2, #home-quote p').forEach(function(el) {
            var isQuote = !!el.closest('#home-quote');
            h2Data.push({
                trigger: isQuote ? '#home-quote' : el,
                start: isQuote ? 'top 55%' : 'top 85%',
                duration: isQuote ? 1.8 : 1,
                delay: isQuote && el.previousElementSibling ? 1.6 : 0,
                chars: splitTextToChars(el)
            });
        });
        h2Data.forEach(function(data) {
            data.reveal = createCharsReveal(data.chars, data.duration, data.delay);
        });

        // === Endless loops (marquee bar + reviews) ===
        // Clones the list until it covers the viewport twice and moves it with the GSAP ticker.
        //  - followScroll: direction follows the scroll, speed grows with scroll velocity and the track leans (skew)
        //  - hoverSpeed: speed factor while hovered/touched (0 = stops), eased in and out for a soft feel
        function createLoop(section, options) {
            var track = section.querySelector('.track');
            var source = track.querySelector('ul');
            var groupWidth = 0;
            var x = options.startX || 0;
            var direction = 1;
            var baseSpeed = prefersReducedMotion ? options.speed * 0.25 : options.speed; // px per second
            var boost = 0;
            var hoverFactor = 1;
            var hoverTarget = 1;
            var skewSetter = gsap.quickSetter(track, 'skewX', 'deg');
            var xSetter = gsap.quickSetter(track, 'x', 'px');
            var isVisible = true;

            function build() {
                track.querySelectorAll('ul[aria-hidden]').forEach(function(clone) {
                    clone.remove();
                });
                groupWidth = source.offsetWidth;
                var copies = Math.max(1, Math.ceil((window.innerWidth * 2) / groupWidth));
                for (var i = 0; i < copies; i++) {
                    var clone = source.cloneNode(true);
                    clone.setAttribute('aria-hidden', 'true');
                    track.appendChild(clone);
                }
                x = gsap.utils.wrap(-groupWidth, 0, x);
            }

            build();

            var lastWidth = window.innerWidth;
            var resizeTimer;
            window.addEventListener('resize', function() {
                if (window.innerWidth === lastWidth) return; // ignore mobile URL-bar height changes
                lastWidth = window.innerWidth;
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(build, 150);
            });

            function hold() {
                hoverTarget = options.hoverSpeed;
            }

            function release() {
                hoverTarget = 1;
            }
            track.addEventListener('mouseenter', hold);
            track.addEventListener('mouseleave', release);
            track.addEventListener('touchstart', hold, {
                passive: true
            });
            track.addEventListener('touchend', function() {
                setTimeout(release, 1200);
            });

            ScrollTrigger.create({
                trigger: section,
                start: 'top bottom',
                end: 'bottom top',
                onToggle: function(self) {
                    isVisible = self.isActive;
                }
            });

            gsap.ticker.add(function(time, deltaTime) {
                if (!isVisible || !groupWidth) return;

                var velocity = options.followScroll ? smoother.getVelocity() : 0;
                if (options.followScroll && Math.abs(velocity) > 5) {
                    direction = velocity > 0 ? 1 : -1;
                }
                var targetBoost = prefersReducedMotion ? 0 : Math.min(Math.abs(velocity) / 300, 8);
                boost += (targetBoost - boost) * 0.08;
                hoverFactor += (hoverTarget - hoverFactor) * 0.05;

                var dt = Math.min(deltaTime, 50) / 1000;
                x -= direction * baseSpeed * (1 + boost) * hoverFactor * dt;
                x = gsap.utils.wrap(-groupWidth, 0, x);
                xSetter(x);

                if (options.followScroll && !prefersReducedMotion) {
                    skewSetter(gsap.utils.clamp(-8, 8, -velocity / 400) * (boost > 0.05 ? 1 : 0));
                }
            });
        }

        createLoop(document.querySelector('#home-marquee'), {
            speed: 60,
            startX: -17,
            followScroll: true,
            hoverSpeed: 0.25
        });

        createLoop(document.querySelector('#home-reviews'), {
            speed: 45,
            startX: -10,
            followScroll: false,
            hoverSpeed: 0
        });

        // === The hero stays put while the page slides over it ===
        function heroPin(extra) {
            return Object.assign({
                trigger: '#home-hero',
                start: 'top top',
                end: 'bottom top',
                pinSpacing: false
            }, extra);
        }
        // The hero slowly recedes under the incoming content (driven by the same pin trigger,
        // a separate trigger would be offset by the pin's duration)
        var heroRecede = gsap.timeline({
                paused: true
            })
            .to('#home-hero > *', {
                scale: 0.92,
                opacity: 0.25,
                ease: 'none'
            }, 0)
            .to('header', {
                autoAlpha: 0, // also hidden for clicks once faded out
                ease: 'none'
            }, 0);

        ScrollTrigger.create(heroPin({
            pin: '#home-hero',
            scrub: true,
            animation: prefersReducedMotion ? null : heroRecede
        }));
        ScrollTrigger.create(heroPin({
            pin: 'header'
        }));

        // === Services accordion ===
        document.querySelectorAll('#home-services ul.services > li').forEach(function(item) {
            var head = item.querySelector('.head');
            var body = item.querySelector('.body');

            head.addEventListener('click', function() {
                var isExpanded = item.classList.contains('expanded');

                if (isExpanded) {
                    gsap.fromTo(body, {
                        height: body.offsetHeight
                    }, {
                        height: 0,
                        duration: 0.6,
                        ease: 'power3.inOut',
                        onComplete: function() {
                            item.classList.remove('expanded');
                            gsap.set(body, {
                                clearProps: 'height'
                            });
                            ScrollTrigger.refresh();
                        }
                    });
                    return;
                }

                item.classList.add('expanded');
                var packages = body.querySelectorAll('.package');
                var extras = body.querySelectorAll('.extras li');

                gsap.timeline({
                        onComplete: function() {
                            ScrollTrigger.refresh();
                        }
                    })
                    .from(body, {
                        height: 0,
                        duration: 0.7,
                        ease: 'power3.out',
                        clearProps: 'height'
                    })
                    .fromTo(packages, {
                        opacity: 0,
                        y: 40,
                        rotateX: -8,
                        transformPerspective: 1200
                    }, {
                        opacity: 1,
                        y: 0,
                        rotateX: 0,
                        transformPerspective: 1200,
                        duration: 0.7,
                        stagger: 0.15,
                        ease: 'power2.out',
                        clearProps: 'transform,opacity'
                    }, '-=0.45')
                    .from(extras, {
                        opacity: 0,
                        y: 12,
                        duration: 0.4,
                        stagger: 0.06,
                        ease: 'power2.out',
                        clearProps: 'transform,opacity'
                    }, '-=0.35');
            });
        });

        // === Menu overlay ===
        var menuBtn = document.querySelector('header .menu');
        var menuOverlay = document.querySelector('.menu-overlay');
        var closeMenuBtn = document.querySelector('.menu-overlay .close-menu');
        var menuLinks = document.querySelectorAll('.menu-overlay .main ul li a');
        var menuItems = document.querySelectorAll('.menu-overlay .main ul li');
        var menuFooterItems = document.querySelectorAll('.menu-overlay .footer > *');
        var menuIsOpen = false;

        function openMenu() {
            if (menuIsOpen) return;
            menuIsOpen = true;
            menuOverlay.classList.add('active');
            menuOverlay.setAttribute('aria-hidden', 'false');
            lockScroll();
            gsap.timeline()
                .fromTo(menuItems, {
                    opacity: 0,
                    y: 40
                }, {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                    stagger: 0.09,
                    ease: 'power3.out',
                    delay: 0.15
                })
                .fromTo(menuFooterItems, {
                    opacity: 0,
                    y: 20
                }, {
                    opacity: 1,
                    y: 0,
                    duration: 0.7,
                    stagger: 0.05,
                    ease: 'power2.out'
                }, '-=0.6');
        }

        function closeMenu(onClosed) {
            if (!menuIsOpen) return;
            menuIsOpen = false;
            gsap.to([menuItems, menuFooterItems], {
                opacity: 0,
                y: -15,
                duration: 0.3,
                stagger: 0.02,
                ease: 'power2.in',
                onComplete: function() {
                    menuOverlay.classList.remove('active');
                    menuOverlay.setAttribute('aria-hidden', 'true');
                    unlockScroll();
                    if (onClosed) onClosed();
                }
            });
        }

        menuBtn.addEventListener('click', openMenu);
        closeMenuBtn.addEventListener('click', function() {
            closeMenu();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeMenu();
        });

        menuLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                var target = document.querySelector(link.getAttribute('href'));
                closeMenu(function() {
                    if (target) smoother.scrollTo(target, true, 'top top');
                });
            });
        });

        // === Author rights popup ===
        var authorRightsPopupOverlay = document.getElementById('author-rights-popup-overlay');
        var authorRightsPopupClose = document.getElementById('author-rights-popup-close');
        var authorRightsPopup = authorRightsPopupOverlay.querySelector('.services-popup');

        function openAuthorRightsPopup() {
            authorRightsPopupOverlay.classList.add('active');
            lockScroll();
            gsap.fromTo(authorRightsPopup, {
                opacity: 0,
                y: 40
            }, {
                opacity: 1,
                y: 0,
                duration: 0.5,
                ease: 'power2.out'
            });
        }

        function closeAuthorRightsPopup() {
            gsap.to(authorRightsPopup, {
                opacity: 0,
                y: 30,
                duration: 0.3,
                ease: 'power2.in',
                onComplete: function() {
                    authorRightsPopupOverlay.classList.remove('active');
                    unlockScroll();
                }
            });
        }

        authorRightsPopupClose.addEventListener('click', function(e) {
            e.stopPropagation();
            closeAuthorRightsPopup();
        });
        authorRightsPopupOverlay.addEventListener('click', function(e) {
            if (e.target === authorRightsPopupOverlay) {
                closeAuthorRightsPopup();
            }
        });
        document.querySelector('footer .bottom .left span').addEventListener('click', openAuthorRightsPopup);

        // === Animation triggers (run after the loading overlay hides) ===

        function initAnimations() {
            // Hero title + photos fan-out from the centre
            var heroTl = gsap.timeline();
            heroTl.to(heroTitleLines, {
                    opacity: 1,
                    y: 0,
                    duration: 1,
                    stagger: 0.15,
                    ease: 'power3.out'
                })
                .fromTo(heroListItems[2], {
                    opacity: 0,
                    y: 40,
                    scale: 0.95
                }, {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.8,
                    ease: 'power2.out'
                }, '-=0.5')
                .fromTo([heroListItems[1], heroListItems[3]], {
                    opacity: 0,
                    x: function(i) {
                        return i === 0 ? 160 : -160;
                    }
                }, {
                    opacity: 1,
                    x: 0,
                    duration: 0.9,
                    ease: 'power3.out'
                }, '-=0.5')
                .fromTo([heroListItems[0], heroListItems[4]], {
                    opacity: 0,
                    x: function(i) {
                        return i === 0 ? 260 : -260;
                    }
                }, {
                    opacity: 1,
                    x: 0,
                    duration: 0.9,
                    ease: 'power3.out'
                }, '-=0.7');

            // Section titles – char by char
            h2Data.forEach(function(data) {
                ScrollTrigger.create({
                    trigger: data.trigger,
                    start: data.start,
                    onEnter: function() {
                        data.reveal.timeScale(1).play();
                    },
                    onLeaveBack: function() {
                        data.reveal.timeScale(3).reverse();
                    }
                });
            });

            // Fade-up blocks
            gsap.utils.toArray('.script, .line, .lead, #home-about .text p, #home-about .picture, footer .wrapper > *:not(h2)')
                .forEach(function(el) {
                    gsap.from(el, {
                        opacity: 0,
                        y: 30,
                        duration: 1,
                        ease: 'power2.out',
                        scrollTrigger: {
                            trigger: el,
                            start: 'top 90%',
                            toggleActions: 'play none none reverse'
                        }
                    });
                });

            // Story cards
            gsap.from('#home-stories > ul > li', {
                opacity: 0,
                y: 40,
                duration: 0.8,
                stagger: 0.15,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: '#home-stories > ul',
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            });

            // Gallery items
            gsap.utils.toArray('#home-gallery .row ul.col li').forEach(function(item) {
                gsap.from(item, {
                    opacity: 0,
                    y: 40,
                    duration: 1,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: item,
                        start: 'top 90%',
                        toggleActions: 'play none none reverse'
                    }
                });
            });

            // Reviews
            gsap.from('#home-reviews .track', {
                opacity: 0,
                y: 40,
                duration: 1.2,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: '#home-reviews',
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            });

            // Footer name
            gsap.from('footer h2 span', {
                opacity: 0,
                yPercent: 30,
                duration: 1.2,
                stagger: 0.15,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: 'footer h2',
                    start: 'top 95%',
                    toggleActions: 'play none none reverse'
                }
            });
        }

        // Loading overlay
        const loadingOverlay = document.getElementById('loading-overlay');
        const loadStart = Date.now();

        window.addEventListener('load', function() {
            const elapsed = Date.now() - loadStart;
            const remaining = Math.max(0, 2000 - elapsed);

            ScrollTrigger.refresh();

            setTimeout(function() {
                gsap.to(loadingOverlay, {
                    opacity: 0,
                    duration: 0.8,
                    ease: 'power3.inOut',
                    onComplete: function() {
                        loadingOverlay.remove();
                        initAnimations();
                    }
                });
            }, remaining);
        });
    </script>

</body>

</html>
