Fancybox.bind("[data-fancybox]", {
    wheel: "slide"
});

/* MOBILE MENU
---------------------------------------------------- */
function mobileMenu() {
    const header = document.querySelector('.header');
    const btnNav = document.querySelector('.btn-nav');

    btnNav.onclick = function(e) {
        e.preventDefault();
        header.classList.toggle('nav-active');
        document.body.classList.toggle('hidden');
    }

    if (location.href.indexOf('portfolio') != -1) {
        document.querySelector('nav li:first-child').classList.add('current-menu-item');
    }
}

mobileMenu();

/* GALLERY BEFORE AFTER
---------------------------------------------------- */
function galleryBeforeAfter() {
	const gallery = document.querySelectorAll('.gallery');
    console.log('gallery update');
	gallery.forEach(gallery => {
		const galleryResize = gallery.querySelector('.gallery-resize');
		const range = gallery.querySelector('input');

        galleryResize.style.width = 5 + "%";

		range.onchange = function(e) {
			galleryResize.style.width = this.value + "%";
		}

		range.oninput = function(e) {
			galleryResize.style.width = this.value + "%";
		}
	});
	
}

if (document.querySelector('.gallery') != null) galleryBeforeAfter();

/* ANIMATION LOTTIE
---------------------------------------------------- */
const playerContainers = document.querySelectorAll(".hoverEffects");

playerContainers.forEach(container => {
    const player = container.querySelector("lottie-player");
    player.seek(150);

    if (player.dataset.icon == 'icon_2') {
        player.seek(60);
    }

    container.addEventListener("mouseover", () => {
        const player = container.querySelector("lottie-player");  

        if (container.classList.contains('playning')) return false;
        container.classList.add('playning');
        player.seek(0);     
        player.play();   
    });

    player.addEventListener("complete", () => {
        container.classList.remove('playning');
    });
});

/* ANIMATION SCROLL PAGE
---------------------------------------------------- */
function animationScrollPage() {
    var isScrolling = false;
 
    window.addEventListener("scroll", throttleScroll, false);
 
    function throttleScroll(e) {
        if (isScrolling == false) {
            window.requestAnimationFrame(function() {
                scrolling(e);
                isScrolling = false;
            });
        }

        isScrolling = true;
    }
 
    document.addEventListener("DOMContentLoaded", scrolling, false);
 
    let animation = document.querySelectorAll('.an');
 
    function scrolling(e) {
        if (animation.length) {
            for (var i = 0; i < animation.length; i++) {
                if (isPartiallyVisible(animation[i])) {
                    animation[i].classList.add("an-no"); 
                } else {
                    animation[i].classList.remove("an-no"); 
                }
            }
        }
    }
 
    function isPartiallyVisible(el) {
        var elementBoundary = el.getBoundingClientRect();
     
        var top = elementBoundary.top;
        var bottom = elementBoundary.bottom;
        var height = elementBoundary.height;
     
        return ((top + height >= 0) && (height + window.innerHeight >= bottom));
    }
 
    function isFullyVisible(el) {
        var elementBoundary = el.getBoundingClientRect();
     
        var top = elementBoundary.top;
        var bottom = elementBoundary.bottom;
     
        return ((top >= 0) && (bottom <= window.innerHeight));
    }
}

animationScrollPage();

/* SLIDER
------------------------------------ */
function Slider(options) {
    let slider = document.querySelectorAll(options.elem);

    for (let i = 0; i < slider.length; i++) {
        let slideContainer = slider[i].querySelector('.slider-container');
        let track = slider[i].querySelector('.track');
        let slideItem = slider[i].querySelectorAll('.slide-item');

        let next = slider[i].querySelector('.next').addEventListener('click', nextSlid);
        let prev = slider[i].querySelector('.prev').addEventListener('click', prevSlid);

        let dots;
        let countDot = 0;
        let count = slideItem.length;

        let slidesToShow = options.slidesToShow;
        let slidesToScroll = options.slidesToScroll;
        let responsive = options.responsive;
        let interval = null;

        /*  ADD-DOT 
        ------------------------------------------------- */
        function addDots() {
            let slideDots = document.createElement('div');

            for (let i = 0; i < slideItem.length / slidesToScroll; i++) {
                slideContainer.appendChild(slideDots);
                slideDots.classList.add('slide-dots');
                let span = document.createElement('span');
                slideDots.appendChild(span);
            }

            dots = slider[i].querySelectorAll('.slide-dots span');
            dotsAddActive(0);
            dotsClick();
        }

        /*  DOTS-CLICK 
        ------------------------------------------------- */
        function dotsClick() {
            for (let i = 0; i < dots.length; i++) {
                dots[i].onclick = function() {
                    slideSpeed(options.speed);
                    
                    for (let i = 0; i < dots.length; i++) {
                        dotsRemoveActive(i);
                    }

                    dotsAddActive(i);

                    countDot = i;
                    count = slideItem.length + i * slidesToScroll;

                    setTransform();
                }
            }
        }

        function dotsAddActive(index) {
            if (options.dots) dots[index].classList.add('active');
        }

        function dotsRemoveActive(index) {
            if (options.dots) dots[index].classList.remove('active');
        }

        /*  SLIDE-CLONE
        ------------------------------------------------- */
        function slideClone() {
            for (let i = 0; i < slideItem.length; i++) {
                let cloneStart = slideItem[slideItem.length - slideItem.length + i].cloneNode(true);
                cloneStart.classList.add('cloned');
                track.insertBefore(cloneStart, slideItem[0]);
            }

            for (let i = 0; i < slideItem.length; i++) {
                let cloneEnd = slideItem[i].cloneNode(true);
                cloneEnd.classList.add('cloned');
                track.appendChild(cloneEnd);
            }
        }

        slideClone();

        let slideItems = slider[i].querySelectorAll('.slide-item');

        for (let i = 0; i < slideItems.length; i++) {
            slideItems[i].onmousedown = function(e) {
                e.preventDefault();
            }
        }
        
        function swipeSlider() {
            let desc = 0;
            let widthItem = 0;
            let proc = 0;
            let drob = 0;

            /*  SWIPE DESCTOP
            ------------------------------------------------- */
            function swiperDesctop(e) {
                track.addEventListener("mousedown", swipeStart);
                let shiftX = 0;

                function swipeStart(e) {
                    track.removeEventListener("mousedown", swipeStart);
                    widthItem = slideItem[0].clientWidth;
                    proc = widthItem / 3;
                    drob = this.clientWidth / 100;
                    shiftX = e.pageX;

                    track.addEventListener("mouseup", swipeEnd);
                    track.addEventListener("mousemove", swipeMove);
                    track.addEventListener("mouseleave", swipeEnd);

                    setTimeout(function() {
                        track.addEventListener("mousedown", swipeStart);
                    }, options.speed);
                }

                function swipeMove(e) {
                    slideSpeed(0);

                    desc = e.pageX - shiftX;
                    let swipe = count * 100 / -slidesToShow + desc / drob;
                    track.style.transform = 'translate3d(' + swipe + '%,0,0)';
                }

                function swipeEnd(e) {
                    slideSpeed(options.speed);

                    track.style.transform = 'translate3d(' + count * 100 / -slidesToShow + '%,0,0)';

                    if (desc < -proc) {
                        nextSlid();
                        desc = 0;
                    }else if (desc > proc) {
                        prevSlid();
                        desc = 0;
                    }

                    track.removeEventListener("mousemove", swipeMove);
                    track.removeEventListener("mouseleave", swipeEnd);
                    track.removeEventListener("mouseup", swipeEnd);
                };
            }

            swiperDesctop();

            /*  SWIPE MOBILE
            ------------------------------------------------- */
            function swipeMobile() {
                track.addEventListener("touchstart", swipeStart);
                
                let touchX = 0;

                function swipeStart(e) {
                    track.removeEventListener("touchstart", swipeStart);

                    widthItem = slideItem[0].clientWidth;
                    proc = widthItem / 3;
                    drob = this.clientWidth / 100;
                    touchX = e.changedTouches[0].screenX;

                    track.addEventListener("touchend", swipeEnd);
                    track.addEventListener("touchmove", swipeMove);
                    track.addEventListener("touchleave", swipeEnd);

                    setTimeout(function() {
                        track.addEventListener("touchstart", swipeStart);
                    }, options.speed);
                }

                function swipeMove(e) {
                    slideSpeed(0);

                    desc = e.changedTouches[0].screenX - touchX;
                    let swipe = count * 100 / -slidesToShow + desc / drob;                         
                    track.style.transform = 'translate3d(' + swipe + '%,0,0)';
                }

                function swipeEnd(e) {
                    slideSpeed(options.speed);

                    track.style.transform = 'translate3d(' + count * 100 / -slidesToShow + '%,0,0)';

                    if (desc < -proc) {
                        nextSlid();
                        desc = 0;
                    }else if (desc > proc) {
                        prevSlid();
                        desc = 0;
                    }

                    track.removeEventListener("touchmove", swipeMove);
                    track.removeEventListener("touchleave", swipeEnd);
                    track.removeEventListener("touchend", swipeEnd);
                }
            }

            swipeMobile();
        }        

        function setTransform() {
            if (responsive) {
                const allResponsive = responsive.map(item => item.breakpoint);
                const maxResponse = Math.max(...allResponsive);
                const widthWindow = window.innerWidth;

                if (widthWindow < maxResponse) {
                    for (let i = 0; i < allResponsive.length; i++) {
                        if (widthWindow < allResponsive[i] ) {
                            slidesToShow = responsive[i].slidesToShow;
                        }
                    }
                }else if (widthWindow > maxResponse) {
                    slidesToShow = options.slidesToShow;
                }
            }

            for (let i = 0; i < slideItems.length; i++) {
                slideItems[i].style.minWidth = 100 / slidesToShow + '%';
            }
             
            track.style.transform = 'translate3d(-' + count * 100 / slidesToShow + '%,0,0)';
        }

        setTransform();

        /*  SPEED-SLIDE 
        ------------------------------------------------- */
        function slideSpeed(seconds) {
            track.style.cssText = "transition: transform "+ seconds +"ms ease";                 
        }

        /*  CONTROL-POSITION 
        ------------------------------------------------- */
        function controlPosition() {
            setTimeout(function() {
                slideSpeed(0);
                setTransform();
            }, options.speed);
        }

        /*  BTN-DISABLED 
        ------------------------------------------------- */
        function btnDisabled(btn) {
            btn.disabled = true;

            setTimeout(function() {
                btn.disabled = false;
            }, options.speed, btn);
        }
        
        function autoplaySlide() {
            nextSlid();
        }        

        function nextSlid() {                   
            dotsRemoveActive(countDot);
            slideSpeed(options.speed);
            btnDisabled(this);

            countDot ++;
            count = count + slidesToScroll;

            setTransform();

            if (count >= slideItem.length + slideItem.length) {
                countDot = 0;
                count = slideItem.length;

                controlPosition();
            }

            dotsAddActive(countDot);
        }

        function prevSlid() {
            dotsRemoveActive(countDot);
            slideSpeed(options.speed);
            btnDisabled(this);

            countDot --;
            count = count - slidesToScroll;

            setTransform();

            if (count < slideItem.length ) {
                countDot = slideItem.length / slidesToScroll -1;
                count = slideItem.length + slideItem.length - slidesToScroll;

                controlPosition();
            }

            dotsAddActive(countDot);
        }

        function init() {
            if (options.dots) addDots();
            if (options.swipe) swipeSlider();
            if (options.autoplay) {
                interval = setInterval(autoplaySlide, options.autoplaySpeed);

                slider[i].addEventListener('mouseover', () => {
                    clearInterval(interval);
                });

                slider[i].addEventListener('mouseout', () => {
                    interval = setInterval(autoplaySlide, options.autoplaySpeed);
                });
            } 

            window.addEventListener('resize', setTransform);
        }

        init();
    }
}

new Slider({
    elem: '.slider-portfolio',
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    swipe: true,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
        {
            breakpoint: 800,
            slidesToShow: 2,
        },
        {
            breakpoint: 700,
            slidesToShow: 1,
        }
    ]
});

new Slider({
    elem: '.slider',
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    swipe: true,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 3000
});