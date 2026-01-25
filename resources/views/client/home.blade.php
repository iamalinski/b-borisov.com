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
    </section>
    <script>
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
            const duration = 1.5;
            const stagger = duration / charElements.length;

            gsap.fromTo(charElements, {
                opacity: 0,
                y: 20
            }, {
                opacity: 1,
                y: 0,
                duration: 0.3,
                stagger: stagger,
                ease: "power2.out"
            });
        });
    </script>

</body>

</html>
