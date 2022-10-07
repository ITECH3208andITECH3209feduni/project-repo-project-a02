<?php

session_start();
    include('layout/header.php')
?>

        <div class = "container">
            <div class = "page-navigate">
                <div class = "page-navigate-container flex">
                    <a href = "#" class = "pg-nvg-home-icon">
                        <img src = "assets/images/home-icon.png" alt = "home icon">
                    </a>
                    <a href = "#" class = "pg-nvg-right-arrow-icon">
                        <img src = "assets/images/double-arrow-right.png" alt = "double right arrow icon">
                    </a>
                    <a href = "#" class = "pg-nvg-text text-upper">templates</a>
                </div>
            </div>
        </div>

        <main class="templates-pg">
            <section class = "templates-section">
                <div class = "container py-5">
                    <div class = "pg-title">Check out our Popular Templates</div>
                    <p class = "pg-text">
                        
                    </p>
                </div>

                <div class = "templates-section-content d-flex align-items-center justify-content-center flex-column">
                    <div class = "container template-slider owl-theme owl-carousel">
                        <div class = "templates-content-item">
                            <a href = "#">
                                <img src = "assets/images/template-img-1.png" alt = "cv templates image">
                            </a>
                        </div>
                        <div class = "templates-content-item">
                            <a href= "#">
                                <img src = "assets/images/template-img-2.png" alt = "cv templates image">
                            </a>
                        </div>
                        <div class = "templates-content-item">
                            <a href = "#">
                                <img src = "assets/images/template-img-3.png" alt = "cv templates image">
                            </a>
                        </div>
                        <div class = "templates-content-item">
                            <a href = "#">
                                <img src = "assets/images/template-img-4.png" alt = "cv templates image">
                            </a>
                        </div>
                    </div>
                    <div>
                        <a href = "#" class = "btn btn-dark">See More Templates</a>
                    </div>
                
            </section>
        </main>

<?php
    include('layout/footer.php')
?>