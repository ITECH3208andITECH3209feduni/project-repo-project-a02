<?php
require('connection.php');
session_start();

if (!$_SESSION['id'] || $_SESSION['id'] == null) {
    header('location:profile.php');
}

include('getDatabaseCV.php');
if (isset($_POST['submit']) && isset($_SESSION['id']) && $_SESSION['id'] != null) {
    $user_id = $_SESSION['id'];
    $cv_id = $user_id;

    include('about.php');

    include('achievement.php');

    include('experience.php');


    include('education.php');

    include('project.php');
    include('skill.php');



    header('location:cvBuilder2.php');
    mysqli_close($conn);
}

// var_dump($_POST['achive']);

include('layout/header.php');

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');
</style>

<main class="profile-bg">
    <section class="profile-section">
        <div class="container">
            <div class="profile-section-content non_print_area">
                <form id="profile-form" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="submit" value="submit" />
                    <!-- single section -->
                    <div class="sc-title text-center text-uppercase my-4">Welcome on about section</div>
                    <div class="section-separator mb-5">
                        <div class="row">
                            <div class="col-lg-6 pe-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">First Name</label>
                                    <div class="col-sm-9">
                                        <input name="firstname" value="<?php echo $about['firstname'];  ?>" type="text" required class="form-control" id="firstname" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 ps-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Last Name</label>
                                    <div class="col-sm-9">
                                        <input name="lastname" value="<?php echo $about['lastname'];  ?>" type="text" required class="form-control" id="lastname" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 pe-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">CV Image</label>
                                    <div class="col-sm-9">
                                        <input name="image" value="<?php echo $about['image'];  ?>" type="file" class="form-control" id="image" onchange="previewImage();">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 ps-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Designation</label>
                                    <div class="col-sm-9">
                                        <input name="designation" value="<?php echo $about['designation'];  ?>" type="text" required class="form-control" id="designation" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 pe-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Address</label>
                                    <div class="col-sm-9">
                                        <input name="address" value="<?php echo $about['address'];  ?>" type="text" required class="form-control" id="address" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 ps-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">City</label>
                                    <div class="col-sm-9">
                                        <input name="city" value="<?php echo $about['city'];  ?>" type="text" required class="form-control" id="city" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 pe-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Email</label>
                                    <div class="col-sm-9">
                                        <input name="email" value="<?php echo $about['email'];  ?>" type="email" required class="form-control" id="email" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 ps-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Phone</label>
                                    <div class="col-sm-9">
                                        <input name="phone" value="<?php echo $about['phone'];  ?>" type="text" required class="form-control" id="phone" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 pe-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Summary</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="summary" min="50" max="75" rows="4" cols="50" style="resize: none" id="summary" onblur="generateCV()"><?php echo $about['summary'];  ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 pe-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Facebook</label>
                                    <div class="col-sm-9">
                                        <input value="<?php echo $social['link'];  ?>" name="facebook" type="text" required class="form-control" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="profile-btns flex flex-c">
                            <a href="profile.html" id="btn-prev" class="btn-prev">Previous</a>
                            <button type="submit" id="btn-next" class="btn-next">Next</button>
                        </div> -->
                    </div>
                    <!-- end of single section -->

                    <!-- single section  -->
                    <div class="sc-title text-center text-uppercase my-4">Enter Your Achievements</div>
                    <div class="section-separator mb-5 repeater">
                        <div class="repeater" data-repeater-list="achive">
                            <?php


                            while ($row = mysqli_fetch_array($achievement)) {
                            ?>
                                <div class="mb-4" data-repeater-item>
                                    <div class="row">
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="col-lg-6 pe-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Title</label>
                                                        <div class="col-sm-9">
                                                            <input name="title" value="<?php echo $row['title']; ?>" type="text" required class="form-control achieve_title" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 ps-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="description" required class="form-control achieve_description" rows="4" onblur="generateCV()"><?php echo $row['description']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 ps-0">
                                            <button data-repeater-delete type="button" value="Delete" class="btn btn-danger repeater-remove-btn">
                                                <i class=" fas fa-regular fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                        <button type="button" data-repeater-create value="Add" class="btn btn-primary repeater-add-btn">
                            <span class="me-2">Add More</span>
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <!-- end of single section -->

                    <!-- single section  -->
                    <div class="sc-title text-center text-uppercase my-4">Enter Your Experience</div>
                    <div class="section-separator mb-5 repeater">
                        <div class="repeater" data-repeater-list="exp">
                            <?php
                            while ($row = mysqli_fetch_array($experience)) {

                            ?>
                                <div class="repeat-item mb-4" data-repeater-item>
                                    <div class="row">
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="col-lg-6 pe-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Job Title</label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['job_title']; ?>" name="job_title" type="text" required class="form-control exp_jobtitle" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 ps-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Company / Orgs</label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['organization']; ?>" name="organization" type="text" required class="form-control exp_organization" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 pe-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Location</label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['location']; ?>" name="location" type="text" required class="form-control exp_location" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 ps-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Start Date</label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['start_date']; ?>" name="start_date" type="date" required class="form-control exp_startdate" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 pe-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">End Date</label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['end_date']; ?>" name="end_date" type="date" required class="form-control exp_enddate" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 ps-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="description" required class="form-control exp_description" rows="4" cols="50" onblur="generateCV()"><?php echo $row['description']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 ps-0">
                                            <button data-repeater-delete type="button" value="Delete" class="btn btn-danger repeater-remove-btn"><i class=" fas fa-regular fa-minus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <button type="button" data-repeater-create value="Add" class="btn btn-primary repeater-add-btn">
                            <span class="me-2">Add More</span>
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <!-- end of single section -->

                    <!-- single section  -->
                    <div class="sc-title text-center text-uppercase my-4">Enter Your Education</div>
                    <div class="section-separator mb-5 repeater">
                        <div class="repeater" data-repeater-list="edu">
                            <?php
                            while ($row = mysqli_fetch_array($education)) {


                            ?>
                                <div class="repeat-item mb-4" data-repeater-item>
                                    <div class="row">
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="col-lg-6 pe-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">School</label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['school']; ?>" name="school" type="text" required class="form-control edu_school" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 ps-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Degree</label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['degree']; ?>" name="degree" type="text" required class="form-control edu_degree" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 pe-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">City</label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['city']; ?>" name="city" type="text" required class="form-control edu_city" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 ps-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Start Date</label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['startdate']; ?>" name="startdate" type="date" required class="form-control edu_startdate" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 pe-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Graduation Date</label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['graduate_date']; ?>" name="graduate_date" type="date" class="form-control edu_graduationdate" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 ps-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="description" class="form-control edu_description" rows="4" onblur="generateCV()"><?php echo $row['description']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 ps-0">
                                            <button data-repeater-delete type="button" value="Delete" class="btn btn-danger repeater-remove-btn"><i class=" fas fa-regular fa-minus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            <?php

                            }
                            ?>

                        </div>
                        <button type="button" data-repeater-create value="Add" class="btn btn-primary repeater-add-btn">
                            <span class="me-2">Add More</span>
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <!-- end of single section -->

                    <!-- single section  -->
                    <div class="sc-title text-center text-uppercase my-4">Enter Your Project</div>
                    <div class="section-separator mb-5 repeater">
                        <div class="repeater" data-repeater-list="project">
                            <?php
                            while ($row = mysqli_fetch_array($project)) {


                            ?>
                                <div class="repeat-item mb-4" data-repeater-item>
                                    <div class="row">
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="col-lg-6 pe-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">
                                                            Title
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['project_title']; ?>" name="title" type="text" class="form-control proj_title" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 ps-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Project Link</label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['link']; ?>" name="link" type="text" class="form-control proj_link" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 pe-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="description" class="form-control proj_description" rows="4" onblur="generateCV()"><?php echo $row['description']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 ps-0">
                                            <button data-repeater-delete type="button" value="Delete" class="btn btn-danger repeater-remove-btn" onblur="generateCV()"><i class=" fas fa-regular fa-minus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            <?php

                            }
                            ?>
                        </div>
                        <button type="button" data-repeater-create value="Add" class="btn btn-primary repeater-add-btn">
                            <span class="me-2">Add More</span>
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <!-- end of single section -->

                    <!-- single section  -->
                    <div class="sc-title text-center text-uppercase my-4">Enter Your Skill</div>
                    <div class="section-separator mb-5 repeater">
                        <div class="repeater" data-repeater-list="skill">
                            <?php
                            while ($row = mysqli_fetch_array($skill)) {


                            ?>
                                <div class="repeat-item mb-4" data-repeater-item>
                                    <div class="row">
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="col-lg-6 pe-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">
                                                            Skill
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['skill_name']; ?>" name="skill" type="text" class="form-control skill" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 ps-0">
                                            <button data-repeater-delete type="button" value="Delete" class="btn btn-danger repeater-remove-btn"><i class=" fas fa-regular fa-minus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            <?php

                            }
                            ?>
                        </div>
                        <button type="button" data-repeater-create value="Add" class="btn btn-primary repeater-add-btn">
                            <span class="me-2">Add More</span>
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <!-- end of single section -->
                    <div class="mb-5 d-flex justify-content-center">
                        <button type="submit" id="btn-submit" name="submit" class="btn-submit">Save</button>
                    </div>
                </form>
            </div>

            <div class="cv-view-section" id="printarea">
                <div class="page-wrapper cv-pg" id="htmlContent">
                    <div class="container-div">
                        <div class="left_Side">
                            <div class="profileText">
                                <div class="imgBx">
                                    <img class="photo" src="<?php echo $about['image'];  ?>">
                                </div>
                                <br>
                                <h2><?php echo $about['firstname'];  ?> <?php echo $about['lastname'];  ?> <br><span><?php echo $about['designation'];  ?></span> </h2>
                            </div>

                            <div class="contactInfo">
                                <h3 class="title">Contact Info</h3>
                                <ul>
                                    <li>
                                        <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                        <span class="text"><?php echo $about['phone'];  ?></span>
                                    </li>
                                    <li>
                                        <span class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                        <span class="text"><?php echo $about['email'];  ?></span>
                                    </li>
                                    <li>
                                        <span class="icon"><i class="fab fa-facebook-f"></i></span>
                                        <span class="text"><?php echo $social['link'];  ?></span>
                                    </li>
                                    <li>
                                        <span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <span class="text"><?php echo $about['address'];  ?>, <?php echo $about['city'];  ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="contactInfo education">
                                <h3 class="title">Education</h3>
                                <ul>
                                    <?php
                                    while ($row = mysqli_fetch_array($education1)) {


                                    ?>
                                        <li>
                                            <h5><?php echo $row['startdate']; ?> - <?php echo $row['graduate_date']; ?></h5>
                                            <h4><?php echo $row['degree']; ?></h4>
                                            <h4><?php echo $row['school']; ?> / <?php echo $row['city']; ?> </h4>
                                        </li>
                                    <?php

                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="contactInfo language">
                                <h3 class="title">ACHIEVEMENTS</h3>
                                <?php
                                while ($row = mysqli_fetch_array($achievement1)) {


                                ?>
                                    <ul>
                                        <li>
                                            <span class="text"><strong><?php echo $row['title']; ?></strong></span>
                                            <br>
                                            <span><?php echo $row['description']; ?></span>
                                        </li>
                                    </ul>
                                <?php

                                }
                                ?>

                            </div>
                        </div>
                        <div class="right_Side">
                            <div class="about">
                                <h2 class="title2">Profile</h2>
                                <p><?php echo $about['summary'];  ?></p>
                            </div>
                            <div class="about">
                                <h2 class="title2">Experience</h2>

                                <?php
                                while ($row = mysqli_fetch_array($experience1)) {


                                ?>
                                    <div class="box">
                                        <div class="year_company">
                                            <h5><?php echo $row['start_date']; ?> - <?php echo $row['end_date']; ?></h5>
                                            <h5><?php echo $row['organization']; ?> <br><?php echo $row['location']; ?></h5>
                                        </div>
                                        <div class="text">
                                            <h4><?php echo $row['job_title']; ?></h4>
                                            <p><?php echo $row['description']; ?></p>
                                        </div>
                                    </div>
                                <?php

                                }
                                ?>
                            </div>
                            <div class="about">
                                <h2 class="title2">PROJECTS</h2>

                                <?php
                                while ($row = mysqli_fetch_array($project1)) {


                                ?>
                                    <div class="box">
                                        <div class="text">
                                            <h4><?php echo $row['project_title']; ?></h4>
                                            <p><?php echo $row['description']; ?></p>
                                        </div>
                                    </div>
                                <?php

                                }
                                ?>
                            </div>
                            <div class="about interest">
                                <h2 class="title2">Skills</h2>
                                <ul>

                                    <?php
                                    while ($row = mysqli_fetch_array($skill1)) {


                                    ?>
                                        <li><?php echo $row['skill_name']; ?></li>
                                    <?php

                                    }
                                    ?>
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="container flex flex-c">
                <button type="button" class="print-btn" onclick="printCV()"><span><i class="fas fa-print"></i></span>Print CV</button>
            </div>
        </div>
    </section>
</main>

<?php
include('layout/footer.php');
?>