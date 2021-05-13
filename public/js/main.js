'use strict';

// Selectors
const durin = document.querySelector('.secret__img-durin');
const durinContainer = document.querySelector('.secret__img-container');
const secretPanel = document.querySelector('#secret__panel');
const secretContainer = document.querySelector('.secret__panel-container');
const secret = document.querySelector('.secret');

// Add pointer if secret panel exists
const cursor = function () {
    if (secretPanel) durin.classList.add('cursor');
};
cursor();

// Reveal Secret Panel
durin.addEventListener('click', function (e) {
    if (!secretPanel) return;
    durin.classList.toggle('durin-dark');
    durin.classList.toggle('durin-light');
    secretContainer.classList.toggle('hidden');
});

// IE object-fit fix
function objectFit(image) {
    if (
        'objectFit' in document.documentElement.style === false &&
        image.currentStyle['object-fit']
    ) {
        image.style.background =
            'url("' +
            image.src +
            '") no-repeat 50%/' +
            image.currentStyle['object-fit'];
        image.src =
            "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='" +
            image.width +
            "' height='" +
            image.height +
            "'%3E%3C/svg%3E";
    }
}

objectFit(secretPanel);

// Intersection Observer / Reveal items

const revealSection = (entries, observer) => {
    entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.remove('hidden__observer');
        observer.unobserve(entry.target);
    });
};

const sectionObserver = new IntersectionObserver(revealSection, {
    root: null,
    threshold: [0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1],
});

sectionObserver.observe(durinContainer);
durinContainer.classList.add('hidden__observer');
