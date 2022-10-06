<?php if (mysqli_num_rows($result) > 0) { ?>
    <div class="page-wrapper cv-pg" id="htmlContent">
        <div class="container">
            <section class="page-section pg-sec-one grid">
                <div class="pg-sec-one-l">
                    <h2 class='text-upper text-dark font-lora'><?php echo $about['firstname'];  ?> <?php echo $about['lastname'];  ?></h2>
                    <h5 class="text-upper text-grey"><?php echo $about['designation'];  ?></h5>
                </div>
                <div class="pg-sec-one-r">
                    <img src="<?php echo $about['image'];  ?>" alt="<?php echo $about['firstname'];  ?>" style=" width: 100px; height: 100px; ">
                </div>
            </section>

            <section class="page-section pg-sec-two grid">
                <div class="pg-sec-two-l">
                    <div class="sec-item flex">
                        <span class="sec-item-icon bg-dark text-white flex flex-c">
                            <i class="fas fa-phone"></i>
                        </span>
                        <span class="sec-item-text"><?php echo $about['phone'];  ?></span>
                    </div>
                    <div class="sec-item flex">
                        <span class="sec-item-icon bg-dark text-white flex flex-c">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="sec-item-text"><?php echo $about['email'];  ?></span>
                    </div>
                    <div class="sec-item flex">
                        <span class="sec-item-icon bg-dark text-white flex flex-c">
                            <i class="fas fa-location-dot"></i>
                        </span>
                        <span class="sec-item-text"><?php echo $about['address'];  ?>, <?php echo $about['city'];  ?></span>
                    </div>
                    <div class="sec-item flex">
                        <span class="sec-item-icon bg-dark text-white flex flex-c">
                            <i class="fab fa-facebook"></i>
                        </span>
                        <span class="sec-item-text"><?php echo $social['link'];  ?></span>
                    </div>
                </div>

                <div class="pg-sec-two-r">
                    <div class="sec-title">summary</div>
                    <div class="sec-text"><?php echo $about['summary'];  ?></div>
                </div>
            </section>

            <section class="page-section pg-sec-three grid">
                <div class="pg-sec-two-l">
                    <div class="sec-item">
                        <div class="sec-title">projects</div>

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
                    <div class="sec-item border-bottom">
                        <div class="sec-title">achievements</div>

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

                    <div class="sec-item">
                        <div class="sec-title">skills</div>
                        <ul class="sec-list">
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
                        <?php
                        while ($row = mysqli_fetch_array($education)) {


                        ?>


                            <div class="sec-item-sub">
                                <h4 class="sec-item-sub-title"><?php echo $row['degree']; ?></h4>
                                <p class='sec-text'><?php echo $row['school']; ?> / <?php echo $row['city']; ?> / <?php echo $row['startdate']; ?> - <?php echo $row['graduate_date']; ?></p>
                                <p class='sec-text'><?php echo $row['description']; ?></p>
                            </div>
                        <?php

                        }
                        ?>
                    </div>



                    <div class="sec-item">
                        <div class="sec-title">experience</div>
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
            </section>
        </div>
    </div>
<?php
}
?>