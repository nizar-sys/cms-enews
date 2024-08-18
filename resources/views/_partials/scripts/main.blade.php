<script>
    (function() {
        "use strict";

        /**
         * Apply .scrolled class to the body as the page is scrolled down
         */
        function toggleScrolled() {
            const selectBody = document.querySelector('body');
            const selectHeader = document.querySelector('#header');
            if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains(
                    'sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
            window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
        }

        document.addEventListener('scroll', toggleScrolled);
        window.addEventListener('load', toggleScrolled);

        /**
         * Scroll up sticky header to headers with .scroll-up-sticky class
         */
        let lastScrollTop = 0;
        window.addEventListener('scroll', function() {
            const selectHeader = document.querySelector('#header');
            if (!selectHeader.classList.contains('scroll-up-sticky')) return;

            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop && scrollTop > selectHeader.offsetHeight) {
                selectHeader.style.setProperty('position', 'sticky', 'important');
                selectHeader.style.top = `-${header.offsetHeight + 50}px`;
            } else if (scrollTop > selectHeader.offsetHeight) {
                selectHeader.style.setProperty('position', 'sticky', 'important');
                selectHeader.style.top = "0";
            } else {
                selectHeader.style.removeProperty('top');
                selectHeader.style.removeProperty('position');
            }
            lastScrollTop = scrollTop;
        });

        /**
         * Mobile nav toggle
         */
        const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

        function mobileNavToogle() {
            document.querySelector('body').classList.toggle('mobile-nav-active');
            mobileNavToggleBtn.classList.toggle('bi-list');
            mobileNavToggleBtn.classList.toggle('bi-x');
        }
        mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

        /**
         * Hide mobile nav on same-page/hash links
         */
        document.querySelectorAll('#navmenu a').forEach(navmenu => {
            navmenu.addEventListener('click', () => {
                if (document.querySelector('.mobile-nav-active')) {
                    mobileNavToogle();
                }
            });

        });

        /**
         * Toggle mobile nav dropdowns
         */
        document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
            navmenu.addEventListener('click', function(e) {
                e.preventDefault();
                this.parentNode.classList.toggle('active');
                this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
                e.stopImmediatePropagation();
            });
        });

        /**
         * Preloader
         */
        const preloader = document.querySelector('#preloader');
        if (preloader) {
            window.addEventListener('load', () => {
                preloader.remove();
            });
        }

        /**
         * Scroll top button
         */
        let scrollTop = document.querySelector('.scroll-top');

        function toggleScrollTop() {
            if (scrollTop) {
                window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
            }
        }
        scrollTop.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        window.addEventListener('load', toggleScrollTop);
        document.addEventListener('scroll', toggleScrollTop);

        /**
         * Animation on scroll function and init
         */
        function aosInit() {
            AOS.init({
                duration: 600,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        }
        window.addEventListener('load', aosInit);

        /**
         * Auto generate the carousel indicators
         */
        document.querySelectorAll('.carousel-indicators').forEach((carouselIndicator) => {
            carouselIndicator.closest('.carousel').querySelectorAll('.carousel-item').forEach((carouselItem,
                index) => {
                if (index === 0) {
                    carouselIndicator.innerHTML +=
                        `<li data-bs-target="#${carouselIndicator.closest('.carousel').id}" data-bs-slide-to="${index}" class="active"></li>`;
                } else {
                    carouselIndicator.innerHTML +=
                        `<li data-bs-target="#${carouselIndicator.closest('.carousel').id}" data-bs-slide-to="${index}"></li>`;
                }
            });
        });

        /**
         * Init swiper sliders
         */
        function initSwiper() {
            document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
                let config = JSON.parse(
                    swiperElement.querySelector(".swiper-config").innerHTML.trim()
                );

                if (swiperElement.classList.contains("swiper-tab")) {
                    initSwiperWithCustomPagination(swiperElement, config);
                } else {
                    new Swiper(swiperElement, config);
                }
            });
        }

        window.addEventListener("load", initSwiper);

        /**
         * Initiate glightbox
         */
        const glightbox = GLightbox({
            selector: '.glightbox'
        });

    })();
</script>

<script>
    $(document).ready(function() {
        // Set the countdown target date (example: December 31, 2024 23:59:59)
        const targetDate = new Date('2024-12-31T23:59:59Z').getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const timeDiff = targetDate - now;

            if (timeDiff <= 0) {
                // Time's up
                $('#year').text('0');
                $('#month').text('0');
                $('#days').text('0');
                $('#hour').text('0');
                $('#minute').text('0');
                $('#second').text('0');
                clearInterval(intervalId);
                return;
            }

            const years = Math.floor(timeDiff / (1000 * 60 * 60 * 24 * 365));
            const months = Math.floor(timeDiff % (1000 * 60 * 60 * 24 * 365) / (1000 * 60 * 60 * 24 * 30));
            const days = Math.floor(timeDiff % (1000 * 60 * 60 * 24 * 30) / (1000 * 60 * 60 * 24));
            const hours = Math.floor(timeDiff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            const minutes = Math.floor(timeDiff % (1000 * 60 * 60) / (1000 * 60));
            const seconds = Math.floor(timeDiff % (1000 * 60) / 1000);

            $('#year').text(years);
            $('#month').text(months);
            $('#days').text(days);
            $('#hour').text(hours);
            $('#minute').text(minutes);
            $('#second').text(seconds);
        }

        // Update countdown every second
        const intervalId = setInterval(updateCountdown, 1000);

        // Initial call to display countdown immediately
        updateCountdown();
    });
</script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            let query = $(this).val();
            if (query.length >= 3) {
                $.ajax({
                    url: "{{ route('api.search') }}",
                    type: 'GET',
                    data: {
                        search: query
                    },
                    success: function(response) {
                        let resultsContainer = $('#resultsContainer');
                        resultsContainer.empty();
                        if (response.length > 0) {
                            $('#searchResults').removeClass('d-none');
                            response.forEach(item => {
                                let resultHtml = `<a class="col-md-12 mb-3" ${item.isFile ? 'target="_blank"' : ''} href="${item.detail}">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">${item.type}</h5>
                                                <p class="card-text">${item.title}</p>
                                            </div>
                                        </div>
                                    </a>`;
                                resultsContainer.append(resultHtml);
                            });
                        } else {
                            $('#searchResults').addClass('d-none');
                        }
                    }
                });
            } else {
                $('#searchResults').addClass('d-none');
            }
        });
    });

    document.querySelectorAll('.navbar-nav .nav-link, .navbar-nav .dropdown-item').forEach(link => {
        link.addEventListener('mouseover', function() {
            this.style.color = 'white';
            item.style.backgroundColor = 'red'
        });
        link.addEventListener('mouseout', function() {
            this.style.color = '';
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.nav-link');
        const subMenuItems = document.querySelectorAll('.dropdown-item');

        menuItems.forEach(function(item) {
            item.addEventListener('mouseover', function() {
                item.style.backgroundColor =
                    'rgba(63, 162, 246, 0.7)'; // Warna background dengan opacity 0.7
            });
            item.addEventListener('mouseout', function() {
                item.style.backgroundColor = 'transparent'; // Kembali ke background transparan
            });
        });

        subMenuItems.forEach(function(subItem) {
            subItem.addEventListener('mouseover', function() {
                subItem.style.backgroundColor =
                    'rgba(63, 162, 246, 0.7)'; // Warna background dengan opacity 0.7
            });
            subItem.addEventListener('mouseout', function() {
                subItem.style.backgroundColor =
                    'transparent'; // Kembali ke background transparan
            });
        });
    });


    $(document).ready(function() {
        $('.slick-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            arrows: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var modalElement = document.getElementById('serviceModal');
        var modal = new bootstrap.Modal(modalElement);
        var modalTitle = modalElement.querySelector('.modal-title');
        var modalBody = modalElement.querySelector('.modal-body');

        modalElement.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var title = button.getAttribute('data-service-title');
            var description = button.getAttribute('data-service-description');
            var image = button.getAttribute('data-service-image');

            modalTitle.textContent = title;
            modalBody.innerHTML = `
                <img src="${image}" alt="${title}" class="img-fluid mb-3">
                <p>${description}</p>
            `;
        });

        modalElement.addEventListener('hidden.bs.modal', function() {
            document.body.classList.remove('modal-open');

            var modalBackdrop = document.querySelector('.modal-backdrop');
            if (modalBackdrop) {
                modalBackdrop.parentNode.removeChild(modalBackdrop);
            }
        });
    });

    function toggleReplyForm(commentId) {
        const replyForm = document.getElementById(`reply-form-${commentId}`);
        if (replyForm.style.display === "none") {
            replyForm.style.display = "block";
        } else {
            replyForm.style.display = "none";
        }
    }
</script>
