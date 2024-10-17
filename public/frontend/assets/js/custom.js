$(document).ready(function(){
    gsap.registerPlugin(ScrollTrigger);

    let mm = gsap.matchMedia();

    mm.add("(min-width: 992px)", () => {

        // Home Hero 
        gsap.to('.home-hero-sec', {
            rotate: '-5deg',
            scale: 0.9,
            scrollTrigger: {
                trigger: '.works-sec',
                scrub: 0.3,
                start: '-60% top',
                end: '50% bottom',
                markers: false
            }
        });

        // Work Section
        const home_ani1 = gsap.timeline({
            scrollTrigger: {
                trigger: ".works-sec",
                scrub: 0.5,
                start: "-75% top",
                end: "+=100%",
                markers: false
            }
        });
    
        home_ani1.fromTo(".works-sec",{
            rotate: 15,
            scale: 0.8,
            y: 100
        }, {
            rotate: 0,
            scale: 1,
            y: 0
        });

        const hero_ani2 = gsap.timeline({
            scrollTrigger: {
                trigger: ".works-sec",
                scrub: 1,
                start: "-85% top",
                end: () => `+=${document.querySelector(".home-hero-sec").offsetHeight}`,
                markers: false
            }
        });
    
        hero_ani2.fromTo(".works-slider .swiper-slide",{
            y: 500
        }, {
            y: 0,
            delay: 4,
            duration: 4,
            stagger: 1
        });

        // Services Section
        const hero_ani4 = gsap.timeline({
            scrollTrigger: {
                trigger: ".service-sec",
                scrub: 0.7,
                start: "top 90%",
                end: "top 60%",
                markers: false
            }
        });
    
        hero_ani4.fromTo(".service-sec-wrap",{
            scale: 0.6,
        }, {
            scale: 1
        });

        // What We Do
        const whatWeDO = gsap.timeline({
            scrollTrigger: {
                trigger: ".whatWeDO-sec",
                pin: true,
                scrub: 0.3,
                start: "top top",
                end: "+=120%",
                markers: false
            }
        });

        whatWeDO.to(".whatWeDO_gallery-item-anim1",{
            flex: '7',
            duration: '10'
        });

        whatWeDO.to(".whatWeDO_gallery-item-anim1 .whatWeDO_gallery-item-anim-hover",{
            opacity: '1',
            visibility: 'visible',
            x: '0',
            duration: '20'
        });

        whatWeDO.to(".whatWeDO_gallery-item-anim2",{
            flex: '2',
            duration: '10'
        });

        whatWeDO.to(".whatWeDO_gallery-item-anim2 .whatWeDO_gallery-item-anim-hover",{
            opacity: '1',
            visibility: 'visible',
            x: '0',
            duration: '20'
        });

        // Learning Section
        const learning_sec = gsap.timeline({
            scrollTrigger: {
                trigger: ".learning_sec",
                scrub: 0.7,
                start: "top bottom",
                end: '5% 80%',
                markers: false
            }
        });

        learning_sec.fromTo(".learning_sec",{
            rotate: 15,
            scale: 0.7,
            y: 150
        }, {
            rotate: 0,
            scale: 1,
            y: 0
        });
         
    });

    mm.add("(min-width: 768px)", () => {
         
    });

    mm.add("(min-width: 768px) and (max-width: 991px)", () => {
        // What We Do
        const whatWeDO = gsap.timeline({
            scrollTrigger: {
                trigger: ".whatWeDO-sec",
                pin: true,
                scrub: 0.3,
                start: "top top",
                end: "+=120%",
                markers: false
            }
        });

        whatWeDO.to(".whatWeDO-mob h2",{
            opacity: '0',
            scale: 2,
            duration: '10'
        });

        whatWeDO.to(".whatWeDO-mob-bg",{
            opacity: 0,
            duration: '10'
        }, 0.2);

        whatWeDO.fromTo(".whatWeDO_gallery-item",{
            opacity: 0
        }, {
            opacity: 1,
            duration: '20'
        });

        whatWeDO.to(".whatWeDO_gallery-item-anim1",{
            flex: '3',
            duration: '10'
        });

        whatWeDO.to(".whatWeDO_gallery-top .whatWeDO_gallery-item-anim-heading",{
            x: -25,
            duration: '15'
        });

        whatWeDO.to(".whatWeDO_gallery-item-anim1 .whatWeDO_gallery-item-anim-hover",{
            opacity: '1',
            visibility: 'visible',
            x: '0',
            duration: '20'
        });

        whatWeDO.to(".whatWeDO_gallery-item-anim2",{
            flex: '4',
            duration: '10'
        });

        whatWeDO.to(".whatWeDO_gallery-bot .whatWeDO_gallery-item-anim-heading",{
            x: 25,
            duration: '15'
        });

        whatWeDO.to(".whatWeDO_gallery-item-anim2 .whatWeDO_gallery-item-anim-hover",{
            opacity: '1',
            visibility: 'visible',
            x: '0',
            duration: '20'
        });
    });

    mm.add("(min-width: 320px) and (max-width: 767px)", () => {
        // What We Do
        const whatWeDO = gsap.timeline({
            scrollTrigger: {
                trigger: ".whatWeDO-sec",
                pin: true,
                scrub: 0.2,
                start: "top top",
                end: "+=150%",
                markers: false
            }
        });

        whatWeDO.to(".whatWeDO-mob h2",{
            opacity: '0',
            scale: 2,
            duration: '15'
        });

        whatWeDO.to(".whatWeDO-mob-bg",{
            opacity: 0,
            duration: '15'
        }, 0.2);

        whatWeDO.fromTo(".whatWeDO_gallery-item",{
            opacity: 0
        }, {
            opacity: 1,
            duration: '20'
        });

        whatWeDO.to(".whatWeDO_gallery-item-anim1",{
            flex: '9',
            duration: '10'
        });

        whatWeDO.to(".whatWeDO_gallery-top .whatWeDO_gallery-item-anim-heading",{
            opacity: '0',
            scale: 2,
            duration: '20',
            delay: 3
        });
    
        whatWeDO.to(".whatWeDO_gallery-item-anim1 .whatWeDO_gallery-item-anim-hover",{
            opacity: '1',
            visibility: 'visible',
            x: '0',
            duration: '20'
        });

        whatWeDO.to(".whatWeDO_gallery-item-anim2",{
            flex: '3',
            duration: '10'
        });

        whatWeDO.to(".whatWeDO_gallery-bot .whatWeDO_gallery-item-anim-heading",{
            opacity: '0',
            scale: 1.5,
            duration: '20'
        });
    
        whatWeDO.to(".whatWeDO_gallery-item-anim2 .whatWeDO_gallery-item-anim-hover",{
            opacity: '1',
            visibility: 'visible',
            x: '0',
            duration: '20'
        });
    });

    mm.add("(min-width: 320px)", () => {
        // News Section
        const news_sec = gsap.timeline({
            scrollTrigger: {
                trigger: ".news-sec",
                scrub: 0.7,
                start: "top 90%",
                end: 'bottom top',
                markers: false
            }
        });
    
        news_sec.fromTo(".bee_face",{
            y: 200
        }, {
            y: 0
        });

        // Work Work
        const hero_ani3 = gsap.timeline({
            scrollTrigger: {
                trigger: ".work-marqee",
                scrub: 0.7,
                start: "top bottom",
                end: 'bottom top',
                markers: false
            }
        });
    
        hero_ani3.fromTo(".work-marqee-l",{
            x: -350
        }, {
            x: 0
        });
    
        hero_ani3.fromTo(".work-marqee-r",{
            x: 0
        }, {
            x: -350
        }, "0");
    });


    ScrollTrigger.refresh()

});