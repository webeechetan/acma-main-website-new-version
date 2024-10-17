<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>Acma</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta name="description" content="">
        <!-- favicon icon -->
        <link rel="shortcut icon" href="images/favicon.png">
        <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        <!-- style sheets and font icons  -->
        <link rel="stylesheet" href="{{ asset('frontend')}}/assets/css/vendors.min.css"/>
        <link rel="stylesheet" href="{{ asset('frontend')}}/assets/css/icon.min.css"/>
        <link rel="stylesheet" href="{{ asset('frontend')}}/assets/css/style.css"/>
        <link rel="stylesheet" href="{{ asset('frontend')}}/assets/css/responsive.min.css"/>
        <link rel="stylesheet" href="{{ asset('frontend')}}/assets/css/custom.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">
    </head>

    <body data-mobile-nav-trigger-alignment="right" data-mobile-nav-style="modern" data-mobile-nav-bg-color="#1d1d1d">
        <!-- start header -->
        <x-frontend.header />
        <!-- end header -->

        <!-- Banner -->
        <section class="top-space-margin lg-border-radius-0px p-0 position-relative" style="background-image: url(assets/images/about_main_banner.jpg)">
            <div class="opacity-medium bg-gradient-green"></div>
            <div class="container">
                <div class="row align-items-center justify-content-center small-screen">
                    <div class="col-lg-8 position-relative text-center page-title-extra-large" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <h1 class="m-auto text-white text-shadow-double-large fw-600">About Us</h1>
                    </div>
                    <div class="down-section text-center" data-anime='{ "translateY": [-50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <a href="#down-section" class="section-link">
                            <div class="text-white">
                                <i class="feather icon-feather-chevron-down icon-very-medium"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner End -->

        <!-- start banner slider -->
        <section id="down-section">
            <div class="container">
                <div class="row align-items-center" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 300, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="col-md-6 text-center pe-md-5">
                        <div class="div position-relative"> 
                            <img src="{{ asset('frontend')}}/assets/images/about_thumb.jpg" class="border-radius-6px" alt="">
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <span class="py-1 px-4 mb-10px text-uppercase text-base-color fs-20 fw-600 border-radius-100px bg-solitude-blue d-inline-block">ACMA</span>
                        <h5 class="fw-600 mt-1 text-blue">The Automotive Component Manufacturers Association of India</h5>
                        <p class="fs-20 fw-600">Over 950 members, is the premier organization representing India’s automotive components manufacturing industry.</p>
                        <p>ACMA's mission is to drive industry growth, job creation, and economic prosperity. Committed to research and development, ACMA ensures that India remains a leader in global automotive components manufacturing.</p>
                        <p>ACMA supports its members through an expanding network, offering valuable resources, industry insights, and collaboration opportunities. The organization is also instrumental in shaping policies and regulations that foster sustainable and inclusive growth.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner slider -->

        <!-- India’s Automotive Sector-->
        <section class="bg-light">
            <div class="container">
                <div class="row align-items-center" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 300, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="col-md-6 sm-mb-30px">
                        <h5 class="fw-100 mb-3 text-blue">India’s Automotive Sector</h5>
                        <h2 class="fw-600 text-blue">A Driving Force in the Country’s Economy</h2>
                        <img src="{{ asset('frontend')}}/assets/images/about_automotive_img.jpg" alt="">
                    </div>
                    <div class="col-md-6 ps-md-5">
                        <p><b>India’s automotive sector is a vital part of its economy, contributing 49% to the country’s manufacturing GDP and 6% to the overall GDP, while supporting over 30 million jobs.</b>The auto industry in the country is valued at over $150 billion.</p>
                        <p class="mb-0">In FY 2023-24, the auto component industry grew to <b>USD 74.1 billion, reflecting a 9.8% increase from USD 69.7 billion the previous fiscal year.</b> Domestic OEM supply rose by 8.9% to USD 62.4 billion, with the electric vehicle (EV) sector contributing 6% to total production. <b>Exports increased by 5.5% to USD 21.2 billion, while imports grew by 3% to USD 20.9 billion,</b> resulting in a trade surplus of USD 300 million. The aftermarket sector also expanded by 10% to 11.45 billion.</p>
                    </div>
                </div>
            </div>
            <div class="border-top mt-4 md-mt-0 sm-border-top-0">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-3 g-0" data-anime='{ "el": "childs", "translateX": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <!-- start process step item -->
                        <div class="col process-step-style-06 last-paragraph-no-margin hover-box sm-mb-50px">
                            <div class="process-step-icon-box position-relative top-minus-14px">
                                <span class="progress-step-separator bg-light-gray w-100 separator-line-1px opacity-1"></span>
                                <div class="step-box d-flex align-items-center justify-content-center bg-white border-radius-100 w-25px h-25px position-relative border border-color-extra-medium-gray box-shadow-large">
                                    <span class="w-7px h-7px bg-green border-radius-100"></span>
                                </div>
                            </div>
                            <div class="w-85 lg-w-75 md-w-100">
                                <span class="d-block fw-600 mb-10px mt-15px fs-18">Auto Component Export Growth in FY 2023-24: Key Statistics</span>
                                <p>Auto component exports grew by <b> 5.5% to USD 21.2 billion in FY 2023-24,</b> with North America accounting for 32% of exports (a 4.5% increase), Europe 33% (a 12% increase), and Asia 24% (stable performance). Key export items include drive transmission and steering, engine components, body and chassis, and suspension and braking systems.</p>
                            </div>
                        </div>
                        <!-- end process step item -->
                        <!-- start process step item -->
                        <div class="col process-step-style-06 last-paragraph-no-margin hover-box sm-mb-50px">
                            <div class="process-step-icon-box position-relative top-minus-14px">
                                <span class="progress-step-separator bg-light-gray w-100 separator-line-1px opacity-1"></span>
                                <div class="step-box d-flex align-items-center justify-content-center bg-white border-radius-100 w-25px h-25px position-relative border border-color-extra-medium-gray box-shadow-large">
                                    <span class="w-7px h-7px bg-green border-radius-100"></span>
                                </div>
                            </div>
                            <div class="w-85 lg-w-75 md-w-100">
                                <span class="d-block fw-600 mb-10px mt-15px fs-18">Auto Component Imports Increase by 3.% to USD 20.9 Billion</span>
                                <p>Imports of auto components rose by <b>3.0% to USD 20.9 billion,</b> with Asia contributing 66%, Europe 26%, and North America 8%. Key imports included engine components, body and chassis, suspension and braking, and drive transmission and steering systems.</p>
                            </div>
                        </div>
                        <!-- end process step item -->
                        <!-- start process step item -->
                        <div class="col process-step-style-06 last-paragraph-no-margin hover-box">
                            <div class="process-step-icon-box position-relative top-minus-14px">
                                <span class="progress-step-separator bg-light-gray w-100 separator-line-1px opacity-1"></span>
                                <div class="step-box d-flex align-items-center justify-content-center bg-white border-radius-100 w-25px h-25px position-relative border border-color-extra-medium-gray box-shadow-large">
                                    <span class="w-7px h-7px bg-green border-radius-100"></span>
                                </div>
                            </div>
                            <div class="w-85 lg-w-75 md-w-100">
                                <span class="d-block fw-600 mb-10px mt-15px fs-18">Rapid Growth and E-commerce Penetration in the Aftermarket Sector</span>
                                <p>The aftermarket sector, valued at <b> USD 11.3 billion,</b> saw growth due to increased vehicle usage and higher demand for used vehicles. This sector is experiencing greater e-commerce penetration and organization, particularly in rural areas.</p>
                            </div>
                        </div>
                        <!-- end process step item --> 
                    </div>
                </div>
            </div>
        </section>

        <!-- Message -->
        <section class="background-position-center background-no-repeat" style="background-image: url('assets/images/map.png')">
            <div class="container">
                <div class="row align-items-end mb-50px" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 300, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="col-md-6 text-blue">
                        <h5 class="fw-100 mb-2">Message from</h5>
                        <h2 class="fw-600 mb-0">The Management</h2>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-md-end">
                            <!-- start slider navigation -->
                            <div class="slider-one-slide-prev-1 swiper-button-prev slider-navigation-style-04 bg-very-light-gray"><i class="fa-solid fa-arrow-left icon-small text-dark-gray"></i></div>
                            <div class="slider-one-slide-next-1 swiper-button-next slider-navigation-style-04 bg-very-light-gray"><i class="fa-solid fa-arrow-right icon-small text-dark-gray"></i></div>
                            <!-- end slider navigation -->
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">  
                    <div class="col-12 position-relative">
                        <div class="swiper testimonials-style-06" data-slider-options='{ "loop": true, "autoplay": { "delay": 40000, "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1", "effect": "fade" } }'>
                            <div class="swiper-wrapper">
                                <!-- start testimonial item -->
                                <div class="swiper-slide">
                                    <div class="row justify-content-center">
                                        <div class="col-md-3 md-mb-30px">
                                            <div class="display-inline-block text-center">
                                                <img alt="" src="{{ asset('frontend')}}/assets/images/vinnie_mehta2.png">
                                                <div class="mt-5">
                                                    <p class="text-dark-green fs-20 fw-600 mb-1">Vinnie Mehta</p>
                                                    <span class="fw-600">Director General, ACMA</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 text-center text-md-start ps-md-5">
                                            <p>Today, the Indian auto component industry is well recognised globally with deep forward and backward linkages with several key segments of the economy.</p>
                                            <p>ACMA’s active involvement in trade promotion, technology up-gradation, quality enhancement and collection and dissemination of information has made it a vital catalyst for the auto component industry’s growth and development. Its other activities include participation in international trade fairs, mounting trade delegations overseas and bringing out publications on various topical subjects related to the automotive industry.</p>
                                            <p>ACMA’s charter is to develop a globally competitive Indian Auto Component Industry and strengthen its role in national economic development as also promote business through international alliances.</p>
                                            <p>With the clarion call to ‘Make in India’ by our Hon’ble Prime Minister, the virtuous cycle of manufacturing is all set to roll. The campaign aspires to bolster domestic manufacturing by facilitating investment, fostering innovation, enhancing skill development, protecting intellectual property and building best in class manufacturing infrastructure in the country.</p>
                                            <div class="accordion" data-inactive-icon="icon-feather-chevron-down">
                                                <!-- start accordion item -->
                                                <div class="accordion-item bg-transparent">
                                                    <div id="accordion-style-02-01" class="accordion-collapse collapse hide" data-bs-parent="#accordion-style-02">
                                                        <div class="accordion-body p-0">
                                                            <p>To help the auto component industry, the government has announced a slew a reforms in the Budget 2015 and the Foreign Trade Policy 2015. Forward looking policy measures such as announcement of introduction of GST, consolidation of various exports schemes, simplification of procedures to help integrate India into the global value chain, improving ease of doing business index through online and e-governance interventions and reducing the transaction costs augur well for the industry.</p>
                                                            <p>To help the auto component industry, the government has announced a slew a reforms in the Budget 2015 and the Foreign Trade Policy 2015. Forward looking policy measures such as announcement of introduction of GST, consolidation of various exports schemes, simplification of procedures to help integrate India into the global value chain, improving ease of doing business index through online and e-governance interventions and reducing the transaction costs augur well for the industry.</p>
                                                            <p>Going forward, we envision of making India into a global export hub because of our inherent strengths of frugal engineering, cost advantages and quality benefits that India can provide to the rest of the world. With this vision in place the auto component industry is all set to be the engine for India’s economic growth.</p>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-header read-more">
                                                        <a href="#" class="d-inline-block" data-bs-toggle="collapse" data-bs-target="#accordion-style-02-01" aria-expanded="false" data-bs-parent="#accordion-style-02">
                                                            <div class="accordion-title mb-0 position-relative text-dark-gray pe-30px"><span class="fw-500 border-bottom border-green">Read More</span><span class="fw-500 border-bottom border-green">Read Less</span></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end accordion item -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end testimonial item -->
                                 <!-- start testimonial item -->
                                <div class="swiper-slide">
                                    <div class="row justify-content-center">
                                        <div class="col-md-3 md-mb-30px">
                                            <div class="display-inline-block text-center">
                                                <img alt="" src="{{ asset('frontend')}}/assets/images/shradha_suri2.png">
                                                <div class="mt-5">
                                                    <p class="text-dark-green fs-20 fw-600 mb-1">Shradha Suri Marwah</p>
                                                    <span class="fw-600">President, ACMA</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 text-center text-md-start ps-md-5">
                                            <p>Over the years the component industry has adapted well to the changes in the policy & regulatory environment and the needs of its customers. To realize their ambition of graduating from being a build to print to one that is art to part, the auto component manufacturers must focus on R&D to help generate IP in India and in the process, create greater returns than the cost of capital to make India an attractive destination for investments.</p>
                                            <p>The automotive industry is an engine of growth for the Indian economy. The auto component industry contributes 2.3% to National GDP, providing direct employment to 1.5 million people.</p>
                                            <p>Aimed at an holistic growth model for the automotive industry, The Automotive Mission Plan (AMP 2026) has set a target of a turnover of USD 200 billion by 2026 for the auto component sector backed with strong exports ranging between USD 70 -80 billion.</p>
                                            <p>ACMA would endeavor to focus on strengthening it’s members' capabilities for new product development, improving quality standards, evolving technology for meeting the evolving emission and safety standards, upgrading people skills to support domestic and global expansion.</p>
                                            <div class="accordion" data-inactive-icon="icon-feather-chevron-down">
                                                <!-- start accordion item -->
                                                <div class="accordion-item bg-transparent">
                                                    <div id="accordion-style-02-02" class="accordion-collapse collapse hide" data-bs-parent="#accordion-style-02">
                                                        <div class="accordion-body p-0">
                                                            <p>The auto-component industry in India is today entering a new phase in terms of global exposure and adoption of technology. The priorities for the future would be to put much greater focus on R&D, to help generate intellectual property in India where world class production quality will be a given. It is important to acknowledge that a transformation is round the corner and we will have to gear up to it.</p>
                                                            <p>This calls for a more collaborative approach between the various stakeholders of the value chain i.e. component manufacturers, OEMs, Machine Tool Suppliers, the Raw Material industry and the Government.</p>
                                                            <p>I am confident that as an industry we will rise to the challenges and with the support of all stakeholders, firmly build on the global-quality manufacturing ethos that we have already established in the last few decades.</p>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-header read-more">
                                                        <a href="#" class="d-inline-block" data-bs-toggle="collapse" data-bs-target="#accordion-style-02-02" aria-expanded="false" data-bs-parent="#accordion-style-02">
                                                            <div class="accordion-title mb-0 position-relative text-dark-gray pe-30px"><span class="fw-500 border-bottom border-green">Read More</span><span class="fw-500 border-bottom border-green">Read Less</span></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end accordion item -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-30px">
                                        

                                    </div>
                                </div>
                                <!-- end testimonial item -->
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </section>

        <!-- start section -->
        <section class="position-relative overflow-hidden pt-0">
            <div class="skrollr-parallax mx-auto pt-10 pb-10 md-pt-12 md-pb-12 border-radius-6px" data-bottom-top="width: 63%" data-center-top="width: 100%;" data-parallax-background-ratio="0.5" style="background-image: url('assets/images/about_big.jpg')">
                <div class="opacity-full bg-dark"></div>
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-10 text-center position-relative parallax-scrolling-style-2">
                            <a href="https://www.youtube.com/watch?v=duxZhzMuEgQ" class="position-relative d-inline-block text-center rounded-circle border border-3 border-color-transparent-white-very-light video-icon-box video-icon-extra-large popup-youtube mb-5">
                                <span>
                                    <span class="video-icon">
                                        <i class="fa-solid fa-play text-white"></i> 
                                    </span>
                                </span>
                            </a>
                            <h4 class="text-white fw-500 mb-0">Driving Growth and Excellence in India’s Automotive Industry Through Trade, Technology, and Quality Initiatives</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-70px">
                <h4 class="fw-600 mb-0 text-center mb-70px">Driving Growth and Excellence in India’s Automotive Industry Through Trade, Technology, and Quality Initiatives</h4>
                <div class="row g-0 counter-style-04 transition-inner-all" data-anime='{ "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="col-md-4 mb-4 mb-md-0 text-center sm-border border-color-extra-medium-gray box-shadow-quadruple-large-hover ps-40px pe-40px lg-ps-30px lg-pe-30px lg-pt-30px pt-30px pb-30px">
                        <div class="mb-20px"><img src="{{ asset('frontend')}}/assets/images/icons/leader.png" alt=""></div>
                        <p class="text-dark-gray fw-500 mb-0">ACMA plays a critical role in advancing India’s automotive industry by promoting trade, enhancing technology, improving quality, and disseminating information. The association participates in international trade fairs, sends trade delegations abroad, and publishes industry materials.</p>                            
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0 text-center sm-border border-start border-color-extra-medium-gray sm-box-shadow-none box-shadow-quadruple-large ps-40px pe-40px lg-ps-30px lg-pe-30px lg-pt-30px pt-30px pb-30px">
                        <div class="mb-20px"><img src="{{ asset('frontend')}}/assets/images/icons/gear.png" alt=""></div>
                        <p class="text-dark-gray fw-500 mb-0">ACMA also contributes to manufacturing excellence through skills training, mentoring programs, and initiatives like 'Asset Turnover Improvement,' 'Uptime Improvement,' 'Zero Defect Quality,' and 'Sustainable Manufacturing.' It is actively involved in various government panels, committees, and councils to influence policies and regulations.</p>                            
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0 text-center sm-border border-start border-color-extra-medium-gray box-shadow-quadruple-large-hover sm-box-shadow-none ps-40px pe-40px lg-ps-30px lg-pe-30px lg-pt-30px pt-30px pb-30px">
                        <div class="mb-20px"><img src="{{ asset('frontend')}}/assets/images/icons/policy.png" alt=""></div>
                        <p class="text-dark-gray fw-500 mb-0">ACMA has signed Memoranda of Understanding (MoUs) with over 30 counterpart organisations in several countries to facilitate information exchange and trade cooperation.</p>                            
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->

        <!-- Footer -->
       <x-frontend.footer />



    <!-- start scroll progress -->
    <div class="scroll-progress d-none d-xxl-block">
    <a href="#" class="scroll-top" aria-label="scroll"><span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span></a></div>
    <!-- end scroll progress -->

    <!-- javascript libraries -->
    <script type="text/javascript" src="{{ asset('frontend')}}/assets/js/jquery.js"></script>
    <script type="text/javascript" src="{{ asset('frontend')}}/assets/js/vendors.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend')}}/assets/js/main.js"></script>
</body>
</html>