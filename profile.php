<?php
include('layout/header.php');

if (isset($_SESSION['name']) && $_SESSION['name'] != null) {
    $cv_id = $_SESSION['id'];
}else{
    header('location:login.php');
}
?>

<div class="page-navigate">
    <div class="page-navigate-container flex">
        <a href="#" class="pg-nvg-home-icon">
            <img src="assets/images/home-icon.png" alt="home icon">
        </a>
        <a href="#" class="pg-nvg-right-arrow-icon">
            <img src="assets/images/double-arrow-right.png" alt="double right arrow icon">
        </a>
        <a href="#" class="pg-nvg-text text-upper">Profile</a>
    </div>
</div>

<main class="profile-pg">
    <section class="profile-section">
        <div class="container text-center">
            <div class="profile-section-title font-italian text-left">Welcome on Board</div>

            <div class="profile-section-content">
                <form id="profile-form">
                    <div class="profile-tab " style="display: flex;justify-content: center;">
                        <button type="button" class="add-btn" >
                            <img src="assets/images/plus-icon.png" alt="">
                        </button>
                        <span class="profile-item-text font-overlock">Build your fist cv</span>
                    </div>

                    <div class="profile-tab">
                        <div class="profile-form-elem">
                            <label for="" class="font-overlock">What is your full name?</label>
                            <input type="text" required class="profile-form-control bg-grey">
                        </div>
                    </div>

                    <div class="profile-tab">
                        <div class="profile-form-elem">
                            <label for="" class="font-overlock">Qualification</label>
                            <input type="text" required class="profile-form-control bg-grey">
                        </div>
                    </div>

                    <div class="profile-tab flex flex-col">
                        <p class="profile-tab-title">Work Experience</p>
                        <div class="profile-form-elem profile-form-elem-inline grid">
                            <label for="" class="font-overlock">Company Name</label>
                            <input type="text" required class="profile-form-control bg-grey">
                        </div>
                        <div class="profile-form-elem profile-form-elem-inline grid">
                            <label for="" class="font-overlock">Role</label>
                            <input type="text" required class="profile-form-control bg-grey">
                        </div>
                    </div>

                    <div class="profile-tab">
                        <div class="profile-form-elem">
                            <label for="" class="font-overlock">Skills that u acquired</label>
                            <input type="text" required class="profile-form-control bg-grey">
                        </div>
                    </div>

                    <div class="profile-btns flex flex-c">
                    <a href="about.php" id="btn-next" class="bg-grey">Next</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<?php
include('layout/footer.php');
?>