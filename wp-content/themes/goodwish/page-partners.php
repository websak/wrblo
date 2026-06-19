<?php
/*
Template Name: Partners Template
*/

get_header('partners'); 
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
    <style>
        :root {
            --gold: #c39f49;
            --white: #ffffff;
            --purple: #262353;
            --gold-dark: #A8893D;
            --red: #E63946;
            --dark-text: #333333;
            --gray-text: #666666;
            --light-gray: #f5f5f5;
            --border-color: #ddd;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            color: var(--dark-text);
            line-height: 1.6;
        }

        /* Header */
        .hero-header {
            background-color: var(--gold);
            padding: 100px 0;
            margin-bottom: 40px;
        }

        .hero-header h1 {
            color: white !important;
            font-size: 35px;
            font-weight: 700;
            margin: 0;
        }

        /* Thank You Section */
        .thank-you-section {
            padding: 0 0 40px 0;
        }

        .thank-you-section h2 {
            font-size: 22px;
            font-weight: 600;
            color: var(--purple);
            margin-bottom: 5px;
        }

        .thank-you-section .subtitle {
            font-size: 14px;
            color: var(--purple) !important;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .thank-you-section p {
            font-size: 16px;
            color: var(--gray-text);
            margin-bottom: 15px;
        }

        /* Section Titles */
        .section-title {
            text-align: center;
            font-size: 22px;
            font-weight: 600;
            color: var(--dark-text);
            margin-bottom: 25px;
        }

        /* Carousel Container */
        .partner-carousel-section {
            padding: 20px 0 30px 0;
        }

        .carousel-wrapper {
            position: relative;
            /* padding: 0 35px; */
        }

        /* Remove Slick's default bottom margin */
        .slick-slider {
            margin-bottom: 0;
        }

        /* Partner Cards */
        .partner-card {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            transition: all 0.3s ease;
            perspective: 1000px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        }

        .partner-card.has-flip {
            height: 220px;
        }

        .partner-card:hover {
            border-color: var(--gold);
        }

        /* Slick slide inner spacing */
        .partners-slick .slick-slide > div {
            padding: 0 8px;
        }

        .partners-slick .slick-slide .partner-card {
            margin: 0 8px;
        }

        .slick-slide {
            height: auto !important;
        }

        /* Static layout when Slick is not initialised (2 or fewer cards) */
        .partners-slick:not(.slick-initialized) {
            display: flex;
            gap: 20px;
        }

        .partners-slick:not(.slick-initialized) > div {
            flex: 1;
        }

        /* Flip Card Styles */
        .flip-card {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }

        .partner-card:hover .flip-card {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .flip-card-back {
            transform: rotateY(180deg);
            background: white;
            border-radius: 6px;
            overflow-y: auto;
            align-items: flex-start;
            justify-content: flex-start;
        }

        .flip-card-back .card-content {
            font-size: 0.8rem;
            color: var(--gray-text);
            line-height: 1.4;
            text-align: left;
            width: 100%;
            height: 100%;
            overflow-y: auto;
            padding-right: 5px;
        }

        .flip-card-back .card-content::-webkit-scrollbar {
            width: 4px;
        }

        .flip-card-back .card-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 2px;
        }

        .flip-card-back .card-content::-webkit-scrollbar-thumb {
            background: var(--gold);
            border-radius: 2px;
        }

        .flip-card-back .card-content h4 {
            font-size: 18px;
            font-weight: 900;
            color: #262353 !important;
            margin-bottom: 20px;
        }

        .flip-card-back .card-content p {
            margin-bottom: 6px;
            font-size: 13px;
        }

        .flip-card-back .card-content a {
            color: var(--gold);
            text-decoration: none;
            word-break: break-all;
        }

        .flip-card-back .card-content a:hover {
            text-decoration: underline;
        }

        /* A4ID Logo */
        .logo {
            width: 200px;
            position: relative;
        }

        .logo .circle {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #E63946 0%, #C1121F 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .logo .circle::after {
            content: '';
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 12px;
            height: 12px;
            background: var(--white);
            border-radius: 50%;
        }

        .logo .text {
            color: white;
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* Text Logo (for Take One TV) */
        .text-logo {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark-text);
        }

        /* Slick Arrow Overrides */
        .slick-prev,
        .slick-next {
            width: 40px;
            height: 40px;
            z-index: 10;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
        }

        .slick-prev:hover,
        .slick-next:hover,
        .slick-prev:focus,
        .slick-next:focus {
            background: transparent;
        }

        .slick-prev {
            left: -30px;
        }

        .slick-next {
            right: -30px;
        }

        .slick-prev:before,
        .slick-next:before {
            display: none;
        }

        .slick-prev svg,
        .slick-next svg {
            color: rgba(0, 0, 0, 0.4);
            transition: color 0.3s ease;
        }

        .slick-prev:hover svg,
        .slick-next:hover svg {
            color: var(--gold);
        }

        /* Slick Dots */
        .slick-dots {
            bottom: -22px;
        }

        .slick-dots li button:before {
            font-size: 8px;
            color: var(--border-color);
            opacity: 1;
        }

        .slick-dots li.slick-active button:before {
            color: var(--dark-text);
            opacity: 1;
        }

        .slick-dots li button:hover:before {
            color: var(--gold);
        }

        /* Footer */
        .site-footer {
            background: white;
            border-top: 1px solid var(--border-color);
            padding: 40px 0 20px;
            margin-top: 60px;
        }

        .footer-section h5 {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark-text);
            margin-bottom: 15px;
        }

        .footer-section p {
            font-size: 0.75rem;
            color: var(--gray-text);
            line-height: 1.6;
        }

        .footer-section a {
            color: var(--gold);
            text-decoration: none;
            font-size: 0.75rem;
        }

        .footer-section a:hover {
            text-decoration: underline;
        }

        .latest-post-item {
            margin-bottom: 15px;
        }

        .latest-post-item h6 {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--gold);
            margin-bottom: 3px;
        }

        .latest-post-item .date {
            font-size: 0.7rem;
            color: var(--gray-text);
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icons a {
            color: var(--dark-text);
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: var(--gold);
        }

        .footer-bottom {
            border-top: 1px solid var(--border-color);
            padding-top: 20px;
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .footer-links {
            display: flex;
            gap: 20px;
        }

        .footer-links a {
            font-size: 0.75rem;
            color: var(--gray-text);
            text-decoration: none;
        }

        .footer-links a:hover {
            color: var(--gold);
        }

        .copyright {
            font-size: 0.75rem;
            color: var(--gray-text);
        }

        .theme-credit {
            font-size: 0.75rem;
            color: var(--gold);
        }

        /* Responsive */
        @media (max-width: 991px) {
            .partner-card {
                height: 150px;
            }

            /* .logo,
            .logo .circle {
                width: 60px;
                height: 60px;
            } */

            .logo .text {
                font-size: 0.9rem;
            }

            .logo .circle::after {
                width: 10px;
                height: 10px;
            }
        }

        @media (max-width: 767px) {
            .hero-header h1 {
                font-size: 1.5rem;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .footer-links {
                justify-content: center;
            }

            .slick-prev {
                left: 0;
            }

            .slick-next {
                right: 0;
            }
        }
    </style>


  <!-- Header -->
    <header class="hero-header" style="background-image: url('https://wrblo.org/wp-content/uploads/2026/03/partners-banner.jpg'); background-repeat: no-repeat; background-position: center;">
        <div class="container">
            <h1>Our partners</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container">
            <!-- Thank You Section -->
            <section class="thank-you-section">
                <h2>Thank you all</h2>
                <p class="subtitle">for your support, your kindness, your generosity, and your love</p>
                <p>We, the Directors at WRBLO, have dedicated this page to our supporters, sponsors, and donors. We
                    extend our heartfelt appreciation and special thanks to each of you. Your individual efforts, acts
                    of kindness, and the time you have sacrificed in support of our mission are truly commendable.</p>
                <p>Your recognition of the needs of others has inspired and strengthened us, driving us to ensure that
                    your legacies will be remembered for generations.</p>
            </section>

            <!-- Sponsors Section -->
            <section class="partner-carousel-section">
                <h3 class="section-title">Our Sponsors</h3>
                <p class="text-center">Proudly supported by the partners and organisations who believe in our mission and help make it possible.</p>
                <div class="carousel-wrapper">
                    <div class="partners-slick" id="donorsSlick">
                        <div>
                            <div class="partner-card has-flip">
                                <div class="flip-card">
                                    <div class="flip-card-front">
                                        <div class="logo">
                                            <img src="https://wrblo.org/wp-content/uploads/2026/02/Pave-Logistics.jpg">
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="card-content">
                                            <h4>Pave Logistics</h4>
                                            <p>WRBLO is incredibly grateful to Pave for its understanding, advice, and financial support. After eight years, Pave's generosity has kick-started our operations.</p>
                                            <p><a href="https://pavelogistics.co/" target="_blank">www.pavelogistics.co</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="partner-card has-flip">
                                <div class="flip-card">
                                    <div class="flip-card-front">
                                        <div class="logo">
                                            <img src="https://wrblo.org/wp-content/uploads/2026/02/Reserved.jpg">
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="card-content">
                                            <h4>Become a partner with the Coalition of the Giving</h4>
                                            <p>We appreciate your interest in partnering with WRBLO to advance our shared values. Your commitment to empowering African communities through effective and sustainable relief efforts is commendable. Together, we will make a significant impact, driving grassroots economic growth in the most underserved areas and creating a brighter future for everyone. </p>
                                            <p>Please send an email now to <a href="mailto:coalitionofthegiving@wrblo.org">coalitionofthegiving@wrblo.org</a>, or for other<br/> contact options, please <a href="https://wrblo.org/contact-us">click here</a></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                      
                    </div>
                </div>
            </section>

            <!-- Donors Section -->
            <section class="partner-carousel-section">
                <h3 class="section-title">Our Donors</h3>
                <p class="text-center">With heartfelt gratitude to the generous individuals and organisations whose support makes our work possible.</p>
                <div class="carousel-wrapper">
                    <div class="partners-slick" id="sponsorsSlick">
                        <div>
                            <div class="partner-card has-flip">
                                <div class="flip-card">
                                    <div class="flip-card-front">
                                        <div class="logo">
                                            <img src="https://wrblo.org/wp-content/uploads/2026/02/Take-One.jpg">
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="card-content">
                                            <h4>Take One TV</h4>
                                            <p>Karen and Steve produced and directed WRBLO's foundational video. We are incredibly grateful for their generosity and vision in seeing potential when others could not. <a href="https://takeonetv.com" target="_blank">https://takeonetv.com</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="partner-card has-flip">
                                <div class="flip-card">
                                    <div class="flip-card-front">
                                        <div class="logo">
                                            <img src="https://wrblo.org/wp-content/uploads/2026/02/Reserved.jpg">
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="card-content">
                                           <h4>Become a partner with the Coalition of the Giving</h4>
                                            <p>We appreciate your interest in partnering with WRBLO to advance our shared values. Your commitment to empowering African communities through effective and sustainable relief efforts is commendable. Together, we will make a significant impact, driving grassroots economic growth in the most underserved areas and creating a brighter future for everyone.</p>
                                            <p>Please send an email now to <br/><a href="mailto:coalitionofthegiving@wrblo.org">coalitionofthegiving@wrblo.org</a>, or for other contact options, please <a href="https://wrblo.org/contact-us">click here</a></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="partner-card has-flip">
                                <div class="flip-card">
                                    <div class="flip-card-front">
                                        <div class="logo">
                                            <img src="https://wrblo.org/wp-content/uploads/2026/02/Reserved.jpg">
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                                       <div class="card-content">
                                           <h4>Become a partner with the Coalition of the Giving</h4>
                                            <p>We appreciate your interest in partnering with WRBLO to advance our shared values. Your commitment to empowering African communities through effective and sustainable relief efforts is commendable. Together, we will make a significant impact, driving grassroots economic growth in the most underserved areas and creating a brighter future for everyone.</p>
                                            <p>Please send an email now to <br/><a href="mailto:coalitionofthegiving@wrblo.org">coalitionofthegiving@wrblo.org</a>, or for other contact options, please <a href="https://wrblo.org/contact-us">click here</a></a></p>
                                        </div>
                         </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="partner-card has-flip">
                                <div class="flip-card">
                                    <div class="flip-card-front">
                                        <div class="logo">
                                            <img src="https://wrblo.org/wp-content/uploads/2026/02/Reserved.jpg">
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                                                       <div class="card-content">
                                           <h4>Become a partner with the Coalition of the Giving</h4>
                                            <p>We appreciate your interest in partnering with WRBLO to advance our shared values. Your commitment to empowering African communities through effective and sustainable relief efforts is commendable. Together, we will make a significant impact, driving grassroots economic growth in the most underserved areas and creating a brighter future for everyone.</p>
                                            <p>Please send an email now to <br/><a href="mailto:coalitionofthegiving@wrblo.org">coalitionofthegiving@wrblo.org</a>, or for other contact options, please <a href="https://wrblo.org/contact-us">click here</a></a></p>
                                        </div>
         </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="partner-card has-flip">
                                <div class="flip-card">
                                    <div class="flip-card-front">
                                        <div class="logo">
                                            <img src="https://wrblo.org/wp-content/uploads/2026/02/Reserved.jpg">
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                                                            <div class="card-content">
                                           <h4>Become a partner with the Coalition of the Giving</h4>
                                            <p>We appreciate your interest in partnering with WRBLO to advance our shared values. Your commitment to empowering African communities through effective and sustainable relief efforts is commendable. Together, we will make a significant impact, driving grassroots economic growth in the most underserved areas and creating a brighter future for everyone.</p>
                                            <p>Please send an email now to <br/><a href="mailto:coalitionofthegiving@wrblo.org">coalitionofthegiving@wrblo.org</a>, or for other contact options, please <a href="https://wrblo.org/contact-us">click here</a></a></p>
                                        </div>
      </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="partner-card has-flip">
                                <div class="flip-card">
                                    <div class="flip-card-front">
                                        <div class="logo">
                                            <img src="https://wrblo.org/wp-content/uploads/2026/02/Reserved.jpg">
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                                                        <div class="card-content">
                                           <h4>Become a partner with the Coalition of the Giving</h4>
                                            <p>We appreciate your interest in partnering with WRBLO to advance our shared values. Your commitment to empowering African communities through effective and sustainable relief efforts is commendable. Together, we will make a significant impact, driving grassroots economic growth in the most underserved areas and creating a brighter future for everyone.</p>
                                            <p>Please send an email now to <br/><a href="mailto:coalitionofthegiving@wrblo.org">coalitionofthegiving@wrblo.org</a>, or for other contact options, please <a href="https://wrblo.org/contact-us">click here</a></a></p>
                                        </div>
    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Supporters Section -->
            <section class="partner-carousel-section" style="padding-bottom: 70px;">
                <h3 class="section-title">Our Supporters</h3>
                <p class="text-center">Grateful for the incredible supporters who stand with us and help drive our mission forward.</p>
                <div class="carousel-wrapper">
                    <div class="partners-slick" id="supportersSlick">
                        <div>
                            <div class="partner-card has-flip">
                                <div class="flip-card">
                                    <div class="flip-card-front">
                                        <div class="logo">
                                            <img src="https://wrblo.org/wp-content/uploads/2026/02/A41D.jpg">
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="card-content">
                                            <h4>A4ID</h4>
                                            <p>Since 2018, A4ID has facilitated excellent pro bono legal advice. We are grateful to their panel: Latham & Watkins, Mayer Brown, MMAKS (Uganda), Reed Smith, Dechert LLP, Gibson, Dunn & Crutcher LLP, Simmons & Simmons, and Milbank for the incredible legal work they have completed to enable WRBLO's Mission.</p>
                                            <p><a href="https://a4id.org" target="_blank">https://a4id.org</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="partner-card has-flip">
                                <div class="flip-card">
                                    <div class="flip-card-front">
                                        <div class="logo">
                                            <img src="https://wrblo.org/wp-content/uploads/2026/02/Frampton-House.jpg">
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="card-content">
                                            <h4>Frampton House</h4>
                                            <p>We struggled to find an accounting firm that understands the complexity of our cross-border operations. Thank you, Akshaye, for all you do.</p>
                                            <p><a href="https://framptonhouseaccountants.com" target="_blank">https://framptonhouseaccountants.com</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="partner-card has-flip">
                                <div class="flip-card">
                                    <div class="flip-card-front">
                                        <div class="logo" style="width: 250px; position: relative; top: 4px; left: 5px;">
                                            <img src="https://wrblo.org/wp-content/uploads/2026/02/Reach-Volunteering.jpg">
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="card-content">
                                            <h4>Reach Volunteering</h4>
                                            <p>Since 2017, all WRBLO has sourced incredibly talented volunteers, without whom nothing would ever have been achieved. We are so very grateful for their service. <a href="https://reachvolunteering.org.uk" target="_blank">https://reachvolunteering.org.uk</a></p>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            var prevArrow = '<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg></button>';
            var nextArrow = '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg></button>';

            var slickSettings = {
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                prevArrow: prevArrow,
                nextArrow: nextArrow,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            };

            $('.partners-slick').each(function () {
                if ($(this).children().length > 2) {
                    $(this).slick(slickSettings);
                }
            });
        });
    </script>


<?php get_footer(); ?>
