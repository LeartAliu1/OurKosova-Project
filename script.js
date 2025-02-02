const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

registerLink.addEventListener('click', (e) => {
    e.preventDefault();
    wrapper.classList.add('active');
});

loginLink.addEventListener('click', (e) => {
    e.preventDefault();
    wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', (e) => {
    e.preventDefault();
    wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click', (e) => {
    e.preventDefault();
    wrapper.classList.remove('active-popup');
});


let currentSlide = 0;
const slides = document.querySelector('.slides');
const totalSlides = document.querySelectorAll('.slide').length;

document.querySelector('.next').addEventListener('click', () => {
    currentSlide = (currentSlide + 1) % totalSlides;
    slides.style.transform = `translateX(-${currentSlide * 100}%)`;
});

document.querySelector('.prev').addEventListener('click', () => {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    slides.style.transform = `translateX(-${currentSlide * 100}%)`;

});
function openMap(mapUrl) {
    let mapContainer = document.getElementById('mapContainer');

    if (!mapContainer) {

        mapContainer = document.createElement('div');
        mapContainer.id = 'mapContainer';

        const mapFrame = document.createElement('iframe');

        const closeButton = document.createElement('button');
        closeButton.id = 'closeButton';
        closeButton.textContent = 'x';
        closeButton.onclick = closeMap;
        mapContainer.appendChild(mapFrame);
        mapContainer.appendChild(closeButton);
        document.body.appendChild(mapContainer);
    }
    const mapFrame = document.getElementById('mapFrame');
    mapFrame.src = mapUrl;
    mapContainer.style.display = 'block';
}
function closeMap() {
    const mapContainer = document.getElementById('mapContainer');

    if (mapContainer) {
        mapContainer.style.display = 'none';
        const mapFrame = document.getElementById('mapFrame');
        if (mapFrame) {
            mapFrame.src = '';
        }
    }
}
