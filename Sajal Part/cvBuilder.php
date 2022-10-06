// var_dump($_POST['achive']);

include('layout/header.php');

?>
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
                                        <input name="firstname" value="<?php echo $about['firstname']??'';  ?>" type="text" required class="form-control" id="firstname" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 ps-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Last Name</label>
                                    <div class="col-sm-9">
                                        <input name="lastname" value="<?php echo $about['lastname']??'';  ?>" type="text" required class="form-control" id="lastname" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 pe-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">CV Image</label>
                                    <div class="col-sm-9">
                                        <input name="image" required value="<?php echo $about['image']??'';  ?>" type="file" class="form-control" id="image" onchange="previewImage();">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 ps-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Designation</label>
                                    <div class="col-sm-9">
                                        <input name="designation" value="<?php echo $about['designation']??'';  ?>" type="text" required class="form-control" id="designation" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 pe-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Address</label>
                                    <div class="col-sm-9">
                                        <input name="address" value="<?php echo $about['address']??'';  ?>" type="text" required class="form-control" id="address" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 ps-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">City</label>
                                    <div class="col-sm-9">
                                        <input name="city" value="<?php echo $about['city']??'';  ?>" type="text" required class="form-control" id="city" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 pe-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Email</label>
                                    <div class="col-sm-9">
                                        <input name="email" value="<?php echo $about['email']??'';  ?>" type="email" required class="form-control" id="email" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 ps-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Phone</label>
                                    <div class="col-sm-9">
                                        <input name="phone" value="<?php echo $about['phone']??'';  ?>" type="text" required class="form-control" id="phone" onblur="generateCV()">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 pe-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Summary</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="summary" rows="4" cols="50" style="resize: none" id="summary" onblur="generateCV()"><?php echo $about['summary']??'';  ?></textarea>
                                       <div style="font-size: 12px;"> Total word Count : <span id="display_count">0</span> words and <span id="word_left">50</span> words left.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 pe-lg-5">
                                <div class="mb-3 d-flex flex-column flex-sm-row">
                                    <label for="" class="form-label col-sm-3">Facebook Username</label>
                                    <div class="col-sm-9">
                                        <input value="<?php echo $social['link']??'';  ?>" name="facebook" type="text" required class="form-control" onblur="generateCV()">
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
                                                            <input value="<?php echo $row['start_date']; ?>" name="start_date" type="date" required class="expdatevalid form-control exp_startdate" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 pe-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">End Date</label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['end_date']; ?>" name="end_date" type="date" required class="expdatevalid form-control exp_enddate" onblur="generateCV()">
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
                                                            <input value="<?php echo $row['startdate']; ?>" name="startdate" type="date" required class="edudatevalid form-control edu_startdate" onblur="generateCV()">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 pe-lg-5">
                                                    <div class="mb-3 d-flex flex-column flex-sm-row">
                                                        <label for="" class="form-label col-sm-3">Graduation Date</label>
                                                        <div class="col-sm-9">
                                                            <input value="<?php echo $row['graduate_date']; ?>" name="graduate_date" type="date" class="edudatevalid form-control edu_graduationdate" onblur="generateCV()">
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
                    <div class="container">
                        <section class="page-section pg-sec-one grid">
                            <div class="pg-sec-one-l">
                                <h2 class='text-upper text-dark font-lora' id="name_show"></h2>
                                <h5 class="text-upper text-grey" id="designation_show"></h5>
                            </div>
                            <div class="pg-sec-one-r">
                                <img src="<?php echo $about['image'];  ?>" alt="Adam" style=" width: 100px; height: 100px;" id="image_show">
                            </div>
                        </section>
                        <section class="page-section pg-sec-two grid">
                            <div class="pg-sec-two-l">
                                <div class="sec-item flex">
                                    <span class="sec-item-icon bg-dark text-white flex flex-c"><i class="fas fa-phone"></i></span>
                                    <span class="sec-item-text" id="phone_show"><?php echo $about['phone'];  ?></span>
                                </div>
                                <div class="sec-item flex flex-wrap">
                                    <span class="sec-item-icon bg-dark text-white flex flex-c"><i class="fas fa-envelope"></i></span>
                                    <span class="sec-item-text" id="email_show"><?php echo $about['email'];  ?></span>
                                </div>
                                <div class="sec-item flex">
                                    <span class="sec-item-icon bg-dark text-white flex flex-c"><i class="fas fa-map-marker-alt"></i></span>
                                    <span class="sec-item-text" id="address_show"><?php echo $about['address'];  ?>, <?php echo $about['city'];  ?></span>
                                </div>
                                <div class="sec-item flex">
                                    <span class="sec-item-icon bg-dark text-white flex flex-c"><i class="fab fa-facebook-f"></i></span>
                                    <a class="sec-item-text" href="https://www.facebook.com/<?php echo $social['link'];  ?>" id="fb_show"></a>
                                </div>
                            </div>

                            <div class="pg-sec-two-r">
                                <div class="sec-title">summary</div>
                                <div class="sec-text" id="summary_show"><?php echo $about['summary'];  ?></div>
                            </div>
                        </section>
                        <section class="page-section pg-sec-three grid">
                            <div class="pg-sec-two-l">
                                <div class="sec-item">
                                    <div class="sec-title">projects</div>
                                    <div class="projects-list">
                                        <?php
                                        while ($row = mysqli_fetch_array($project)) {


                                        ?>
                                            <div class="sec-item-sub">
                                                <h4 class="sec-item-sub-title"><?php echo $row['project_title']; ?></h4>
                                                <p class='sec-text'><?php echo $row['link']; ?></p>
                                                <p class='sec-text'><?php echo $row['description']; ?></p>
                                            </div>
                                        <?php

                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="sec-item border-bottom">
                                    <div class="sec-title">achievements</div>
                                    <div class="achievements-list">
                                        <?php
                                        while ($row = mysqli_fetch_array($achievement)) {


                                        ?>
                                            <div class="sec-item-sub">
                                                <h4 class="sec-item-sub-title"><?php echo $row['title']; ?></h4>
                                                <p class='sec-text'><?php echo $row['description']; ?></p>
                                            </div>

                                        <?php

                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="sec-item">
                                    <div class="sec-title">skills</div>
                                    <ul class="sec-list skills-list">
                                        <?php
                                        while ($row = mysqli_fetch_array($skill)) {


                                        ?>
                                            <li><?php echo $row['skill_name']; ?></li>

                                        <?php

                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="pg-sec-two-r">
                                <div class="sec-item">
                                    <div class="sec-title">educations</div>
                                    <div class="edu-list">
                                        <?php
                                        while ($row = mysqli_fetch_array($education)) {


                                        ?>


                                            <div class="sec-item-sub">
                                                <h4 class="sec-item-sub-title"><?php echo $row['degree']; ?></h4>
                                                <p class='sec-text'><?php echo $row['school']; ?> / <?php echo $row['city']; ?> / <?php echo $row['startdate']; ?> - <?php echo $row['graduate_date']; ?></p>
                                                <p class='sec-text'>Start Date: <?php echo $row['startdate']; ?>. Graduastion Date: <?php echo $row['graduate_date']; ?></p>
                                                <p class='sec-text'><?php echo $row['description']; ?></p>
                                            </div>
                                        <?php

                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="sec-item">
                                    <div class="sec-title">experience</div>
                                    <div class="experience-list">
                                        <?php
                                        while ($row = mysqli_fetch_array($experience)) {


                                        ?>


                                            <div class="sec-item-sub">
                                                <h4 class="sec-item-sub-title"><?php echo $row['job_title']; ?></h4>
                                                <p class='sec-text'><?php echo $row['organization']; ?> / <?php echo $row['location']; ?> / <?php echo $row['start_date']; ?> - <?php echo $row['end_date']; ?></p>
                                                <p class='sec-text'><?php echo $row['description']; ?></p>
                                            </div>
                                        <?php

                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </section>
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
