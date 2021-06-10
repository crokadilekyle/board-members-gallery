//fade in
const faders = document.querySelectorAll("figure");
const fadeOptions = {
    threshold: .2,

};

faders.forEach(fader => {
    fader.classList.add('hidden');
});

const appearOnScroll = new IntersectionObserver((entries, appearOnScroll) => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            return;
        } else {
            entry.target.classList.add('fadein');
            entry.target.classList.remove('hidden');
            appearOnScroll.unobserve(entry.target);
        }
    })
}, fadeOptions);

faders.forEach(fader => {
    appearOnScroll.observe(fader);
});