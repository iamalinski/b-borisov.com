<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boris Borisov Photography</title>
    @vite(['resources/js/app.js', 'resources/scss/app.scss'])

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
</head>

<body>
    <header>
        <a href="{{ route('home') }}" class="brand">
            <img src="{{ asset('images/app/header-brand.svg') }}" alt="Boris Borisov Photography">
            <div>
                <span>
                    Boris Borisov
                </span>
                Photography
            </div>
        </a>
        <div class="menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>
    <section id="home-hero">
        <h1>
            Борис<br /> Борисов<br /> <strong>Фотограф</strong>
        </h1>
        <ul>
            <li><img src="{{ asset('images/home/hero-1.png') }}" alt="Hero 1"></li>
            <li><img src="{{ asset('images/home/hero-2.png') }}" alt="Hero 2"></li>
            <li><img src="{{ asset('images/home/hero-3.png') }}" alt="Hero 3"></li>
            <li><img src="{{ asset('images/home/hero-4.png') }}" alt="Hero 4"></li>
            <li><img src="{{ asset('images/home/hero-5.png') }}" alt="Hero 5"></li>
        </ul>
    </section>
    <section id="home-professional">
        <h2>
            професионално<br /> заснемане
        </h2>
        <ul>
            <li>
                <img src="{{ asset('images/home/icons/professional-1.svg') }}" alt="Professional 1">
                <span>
                    сватба
                </span>
            </li>
            <li>
                <img src="{{ asset('images/home/icons/professional-2.svg') }}" alt="Professional 2">
                <span>
                    вашето<br /> събитие
                </span>
            </li>
            <li>
                <img src="{{ asset('images/home/icons/professional-3.svg') }}" alt="Professional 3">
                <span>
                    кръщене
                </span>
            </li>
        </ul>
        <p>
            “Събитията имат свой ритъм, който не се вижда, а се усеща. Той крие в себе си жестовете, паузите,
            погледите, несъвършените моменти, в които една ситуация разкрива истинския си характер.<br /> Затова
            следвам
            този ритъм внимателно и го превръщам в последователност от
            образи, които говорят без обяснение.”
        </p>
        <div class="author">
            <img src="" alt="">
            <ul>
                <li>
                    <img src="{{ asset('images/home/professional-author-1.svg') }}" alt="Professional Author 1">
                </li>
                <li>
                    <img src="{{ asset('images/home/professional-author-2.svg') }}" alt="Professional Author 2">
                </li>
            </ul>
        </div>
    </section>
    <section id="home-frame">
        <h2>
            Истории в кадър
        </h2>
        <div class="picture">
            <div class="top">

            </div>
            <div class="bottom">
                <p>
                    Подбрани мигове, уловени естествено, които пресъздават атмосферата, емоцията и духа на събитието.
                    Чрез внимание към детайла и неподправени моменти, всяка фотография разказва историята такава,
                    каквато се случва – истинска, жива и непринудена.
                </p>
            </div>
        </div>
    </section>
    <section id="home-gallery">
        <div class="row">
            <ul class="col">
                <li><img src="{{ asset('images/home/gallery-1-1.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-1-2.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-1-3.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-1-4.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-1-5.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-1-6.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-1-7.jpg') }}" alt=""></li>
            </ul>
            <ul class="col">
                <li><img src="{{ asset('images/home/gallery-2-1.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-2-2.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-2-3.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-2-4.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-2-5.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-2-6.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-2-7.jpg') }}" alt=""></li>
            </ul>
            <ul class="col">
                <li><img src="{{ asset('images/home/gallery-3-6.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-3-5.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-3-4.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-3-3.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-3-2.jpg') }}" alt=""></li>
                <li><img src="{{ asset('images/home/gallery-3-1.jpg') }}" alt=""></li>
            </ul>
        </div>
    </section>
    <section id="home-services">
        <h2>
            Услуги и<br /> пакетни предложения
        </h2>
        <ul class="services">
            <li class="expanded base">
                <div class="container">
                    <b>
                        Сватбен ден
                    </b>
                    <div class="body">
                        <ul>
                            <li>
                                <div class="header">
                                    <strong>
                                        Стандарт
                                    </strong>
                                </div>
                                <ul class="main">
                                    <li>
                                        8 снимачни часа
                                    </li>
                                    <li>
                                        Пълен документален разказ на деня
                                    </li>
                                    <li>
                                        600+ кадъра
                                    </li>
                                    <li>
                                        Обработка на всички кадри
                                    </li>
                                    <li>
                                        Фотосесия на младоженците по време на сватбения ден
                                    </li>
                                    <li>
                                        Сет от подбрани снимки до 14 дни след събитието
                                    </li>
                                    <li>
                                        Дигитална галерия + електронен носител (флаш памет)
                                    </li>
                                    <li>
                                        До 45 дни срок за получаване
                                    </li>
                                    <li>
                                        Възможност за удължаване на снимачния ден
                                    </li>
                                </ul>
                                <div class="footer">
                                    <div class="price">
                                        <span>
                                            цена
                                        </span>
                                        <strong>
                                            500 €
                                        </strong>
                                    </div>
                                    <span class="link">
                                        Виж допълнителни услуги
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="header">
                                    <strong>
                                        Премиум
                                    </strong>
                                </div>
                                <ul class="main">
                                    <li>
                                        10 снимачни часа
                                    </li>
                                    <li>
                                        Пълен документален разказ на деня
                                    </li>
                                    <li>
                                        800+ кадъра
                                    </li>
                                    <li>
                                        Фотосесия на младоженците по време на сватбения ден
                                    </li>
                                    <li>
                                        Обработка на всички кадри
                                    </li>
                                    <li>
                                        Сет от подбрани снимки до 14 дни след събитието
                                    </li>
                                    <li>
                                        Дигитална галерия + електронен носител (флаш памет)
                                    </li>
                                    <li>
                                        Фотоалбум с 30 избрани фотографии във формат 15х20 см на премиум хартия
                                    </li>
                                    <li>
                                        До 30 дни срок за получаване
                                    </li>
                                    <li>
                                        Възможност за удължаване на снимачния ден
                                    </li>
                                </ul>
                                <div class="footer">
                                    <div class="price">
                                        <span>
                                            цена
                                        </span>
                                        <strong>
                                            700 €
                                        </strong>
                                    </div>
                                    <span class="link">
                                        Виж допълнителни услуги
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="base">
                <div class="container">
                    <b>
                        Свето Кръщение
                    </b>
                    <div class="body">
                        <ul>
                            <li>
                                <div class="header">
                                    <strong>
                                        Ритуал
                                    </strong>
                                </div>
                                <ul class="main">
                                    <li>
                                        200+ кадъра (Заснемане на ритуала, Снимки с гостите)
                                    </li>
                                    <li>
                                        Обработка на всички кадри
                                    </li>
                                    <li>
                                        Сет от подбрани снимки до 7 дни след събитието
                                    </li>
                                    <li>
                                        Дигитална галерия + електронен носител (флаш памет)
                                    </li>
                                    <li>
                                        До 14 дни срок за получаване
                                    </li>
                                </ul>
                                <div class="footer">
                                    <div class="price">
                                        <span>
                                            цена
                                        </span>
                                        <strong>
                                            200 €
                                        </strong>
                                    </div>
                                    <span class="link">
                                        Виж допълнителни услуги
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="header">
                                    <strong>
                                        Разширен
                                    </strong>
                                </div>
                                <ul class="main">
                                    <li>
                                        4 снимачни часа
                                    </li>
                                    <li>
                                        400+ кадъра
                                    </li>
                                    <li>
                                        Заснемане на ритуала
                                    </li>
                                    <li>
                                        Заснемане на празненство
                                    </li>
                                    <li>
                                        Обработка на всички кадри
                                    </li>
                                    <li>
                                        Сет от подбрани снимки до 7 дни след събитието
                                    </li>
                                    <li>
                                        Дигитална галерия + електронен носител (флаш памет)
                                    </li>
                                    <li>
                                        До 20 дни срок за получаване
                                    </li>
                                    <li>
                                        Възможност за удължаване на снимачния ден
                                    </li>
                                </ul>
                                <div class="footer">
                                    <div class="price">
                                        <span>
                                            цена
                                        </span>
                                        <strong>
                                            350 €
                                        </strong>
                                    </div>
                                    <span class="link">
                                        Виж допълнителни услуги
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <div class="container">
                    <b>
                        Корпоративно събитие
                    </b>
                    <div class="body">
                        <p>
                            Lorem ipsum dolor sit, amet
                        </p>
                        <ul>
                            <li>
                                Ангажираност по Ваш избор (минимум 2 часа) 80€/час
                            </li>
                            <li>
                                Пълен документален разказ на събитието
                            </li>
                            <li>
                                150+ кадъра
                            </li>
                            <li>
                                Обработка на всички кадри
                            </li>
                            <li>
                                Сет от подбрани снимки до няколко часа след събитието
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <div class="container">
                    <b>
                        Фотосесии
                    </b>
                    <div class="body">
                        <p>
                            lorem ipsum dolor sit, amet
                        </p>
                        <ul>
                            <li>
                                Ангажираност по Ваш избор (минимум 2 часа) 80€/час
                            </li>
                            <li>
                                150+ кадъра
                            </li>
                            <li>
                                Обработка на всички кадри
                            </li>
                            <li>
                                Сет от подбрани снимки до 7 дни след събитието
                            </li>
                            <li>
                                Дигитална галерия за сваляне на снимките
                            </li>
                            <li>
                                До 14 дни срок за получаване
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <div class="container">
                    <b>
                        Вашият празник
                    </b>
                    <div class="body">
                        <p>
                            Походящ за балове, рождени дни и др.
                        </p>
                        <ul>
                            <li>
                                Ангажираност по Ваш избор (минимум 2 часа) 80€/час
                            </li>
                            <li>
                                Пълен документален разказ на събитието
                            </li>
                            <li>
                                200+ кадъра
                            </li>
                            <li>
                                Обработка на всички кадри
                            </li>
                            <li>
                                Сет от подбрани снимки до 7 дни след събитието
                            </li>
                            <li>
                                Дигитална галерия за сваляне на снимките
                            </li>
                            <li>
                                До 14 дни срок за получаване
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </section>
    <footer>
        <div class="wrapper">
            <img src="{{ asset('images/app/footer-brand.svg') }}" alt="Boris Borisov Photography">
            <b>
                ЗАПАЗИ
            </b>
            <p>
                своя снимачен ден
            </p>
            <ul>
                <li>
                    <a href="tel:+359883375611" title="Обадете се">
                        +359 883 375 611
                    </a>
                </li>
                <li>
                    <a href="mailto:borisov.photo@gmail.com" title="Изпратете имейл">
                        borisov.photo@gmail.com
                    </a>
                </li>
            </ul>
            <h2>
                БОРИС БОРИСОВ
            </h2>
            <div class="bottom">
                <div class="left">
                    <strong>© {{ date('Y') }} Борис Борисов</strong>. Всички права запазени.
                </div>
                <div class="right">

                </div>
            </div>
        </div>
    </footer>
    <script>
        gsap.registerPlugin(ScrollTrigger);

        const heroUl = document.querySelector('#home-hero ul');
        const heroListItems = heroUl.querySelectorAll('li');

        gsap.set(heroListItems, {
            opacity: 0
        });

        document.addEventListener('DOMContentLoaded', function() {
            const h1 = document.querySelector('#home-hero h1');
            const text = h1.innerHTML;

            // Split text into individual characters, preserving HTML tags
            let chars = '';
            let tempDiv = document.createElement('div');
            tempDiv.innerHTML = text;

            const processNode = (node) => {
                if (node.nodeType === Node.TEXT_NODE) {
                    return node.textContent.split('').map(char => {
                        if (char === ' ' || char === '\n' || char === '\r' || char === '\t') {
                            return '';
                        }
                        return `<span class="char" style="display: inline-block; opacity: 0;">${char}</span>`;
                    }).join('');
                } else if (node.nodeType === Node.ELEMENT_NODE) {
                    if (node.nodeName.toLowerCase() === 'br') {
                        return '<br>';
                    }
                    let inner = '';
                    node.childNodes.forEach(child => {
                        inner += processNode(child);
                    });
                    return `<${node.nodeName.toLowerCase()}>${inner}</${node.nodeName.toLowerCase()}>`;
                }
                return '';
            };

            tempDiv.childNodes.forEach(child => {
                chars += processNode(child);
            });

            // Replace multiple <br> tags with single ones
            chars = chars.replace(/(<br>\s*)+/g, '<br>');

            h1.innerHTML = chars;

            const charElements = h1.querySelectorAll('.char');
            const duration = 2;
            const stagger = duration / charElements.length;

            gsap.fromTo(charElements, {
                opacity: 0,
                y: 20
            }, {
                opacity: 1,
                y: 0,
                duration: 0.3,
                stagger: stagger,
                ease: "power2.out",
                onComplete: initListAnimation
            });
        });

        //

        function initListAnimation() {
            // Set initial states - all items start faded out
            gsap.set(heroListItems, {
                opacity: 0
            });
            gsap.set([heroListItems[0], heroListItems[1]], {
                x: 200
            }); // Items before center
            gsap.set([heroListItems[3], heroListItems[4]], {
                x: -200
            }); // Items after center

            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: '#home-hero ul',
                    start: 'top 50%',
                    toggleActions: 'play none none reverse',
                    onLeaveBack: () => {
                        gsap.to(heroListItems, {
                            opacity: 0,
                            duration: 0.3,
                            ease: "power2.out",
                            onComplete: () => {
                                tl.progress(0);
                            }
                        });
                    }
                }
            });

            // First fade in the 3rd item (center)
            tl.to(heroListItems[2], {
                    opacity: 1,
                    duration: 0.6,
                    ease: "power2.out"
                })
                // Then animate items from center to their positions
                .to([heroListItems[0], heroListItems[1]], {
                    opacity: 1,
                    x: 0,
                    duration: 0.8,
                    stagger: 0.15,
                    ease: "power2.out"
                }, "-=0.2")
                .to([heroListItems[3], heroListItems[4]], {
                    opacity: 1,
                    x: 0,
                    duration: 0.8,
                    stagger: 0.15,
                    ease: "power2.out"
                }, "<");
        }

        //

        // Parallax animation for #home-frame .picture
        const frameTop = document.querySelector('#home-frame .picture');

        gsap.set(frameTop, {
            opacity: 0,
            y: -50
        });

        // Scrub-driven parallax for y only
        gsap.to(frameTop, {
            y: 100,
            ease: "none",
            scrollTrigger: {
                trigger: '#home-frame',
                start: 'top 90%',
                end: 'bottom 20%',
                scrub: 1.5,
            }
        });

        // Scrub-driven fade in so it takes more scrolling to fully appear
        gsap.to(frameTop, {
            opacity: 1,
            ease: "power1.inOut",
            scrollTrigger: {
                trigger: '#home-frame',
                start: 'top 90%',
                end: 'top 20%',
                scrub: 1.5,
                onLeaveBack: () => {
                    gsap.to(frameTop, {
                        opacity: 0,
                        duration: 0.8,
                        ease: "power1.inOut"
                    });
                }
            }
        });

        //

        // Gallery items fade-in one by one
        const galleryItems = document.querySelectorAll('#home-gallery .row ul.col li');

        galleryItems.forEach((item) => {
            gsap.set(item, {
                opacity: 0,
                y: 40
            });

            gsap.to(item, {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: item,
                    start: 'top 70%',
                    toggleActions: 'play none none reverse'
                }
            });
        });

        //

        document.querySelectorAll('#home-services ul.services li').forEach(function(item) {
            item.addEventListener('click', function() {
                if (this.classList.contains('expanded')) {
                    return;
                }

                const expandedItem = document.querySelector('#home-services ul.services li.expanded');
                if (expandedItem) {
                    expandedItem.classList.remove('expanded');
                }
                this.classList.add('expanded');
            });
        });

        //
    </script>

</body>

</html>
