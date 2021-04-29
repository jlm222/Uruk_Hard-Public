'use strict';

const durin = document.querySelector('.secret__img-durin');
const secret = document.querySelector('#secret__panel');

const cursor = function () {
    if (secret) durin.classList.add('cursor');
};

cursor();

durin.addEventListener('click', function (e) {
    secret.classList.toggle('hidden');
    durin.classList.toggle('durin-light');
});
