var swiper = new Swiper(".mySwiper", {
    effect: "cube",
    grabCursor: true,
    loop:true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 20,
        shadowScale: 0.94,
    },
    pagination: {
        el: ".swiper-pagination",
    },
});
