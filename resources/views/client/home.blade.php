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
    </script>

</body>

</html>
