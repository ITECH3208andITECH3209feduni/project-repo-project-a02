<footer class="footer">
    <div class="container">
        <div class="footer-content ">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="footer-img-links d-flex justify-content-center flex-wrap">
                        <a href="https://employability.life/" class="footer-img-link-item" target="_blank">
                            <img src="assets/images/footer-imgs/footer-img-1.jpg" alt="">
                        </a>
                        <a href="http://educationgroup.co.nz/" class="footer-img-link-item" target="_blank">
                            <img src="assets/images/footer-imgs/footer-img-2.png" alt="">
                        </a>
                        <a href="https://www.bcs.org/deliver-and-teach-qualifications/become-accredited/" class="footer-img-link-item" target="_blank">
                            <img src="assets/images/footer-imgs/footer-img-3.jpg" alt="">
                        </a>
                        <a href="https://www.institutelm.com/" class="footer-img-link-item" target="_blank">
                            <img src="assets/images/footer-imgs/footer-img-4.jpg" alt="">
                        </a>
                        <a href="https://www.digitalcommonwealth.com/" class="footer-img-link-item" target="_blank">
                            <img src="assets/images/footer-imgs/footer-img-5.png" alt="">
                        </a>
                    </div>
                    <div class="footer-content-r-bottom">
                        <p class="px-4">&copy; 20001-2022 Copyright <a href="#" class="fw-bold">cvbuilder.com</a> All rights reserved. Privacy Policy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/repeater/jquery.repeater.js"></script>
<script>
    checkvaliddateexp();
    checkValidDateedu();
    $(document).on('keyup change', '.edudatevalid', function() {
        checkValidDateedu();
    });



    $(document).on('keyup change', '.expdatevalid', function() {
        checkvaliddateexp();
    });


    function checkValidDateedu(){
        var from = $('.edu_startdate').val();
        var to = $('.edu_graduationdate').val();

        if (from != null && to != null) {
            if (Date.parse(from) > Date.parse(to)) {
                $('.edu_startdate').val(' ');
                $('.edu_graduationdate').val(' ');
                alert("Invalid Date Range");
            }
        }
    }

    function checkvaliddateexp(){
        var from = $('.exp_startdate').val();
        var to = $('.exp_enddate').val();

        if (from != null && to != null) {
            if (Date.parse(from) > Date.parse(to)) {
                $('.exp_startdate').val(' ');
                $('.exp_enddate').val(' ');
                alert("Invalid Date Range");
            }
        }
    }

    $("#summary").on('keydown', function(e) {
        var words = $.trim(this.value).length ? this.value.match(/\S+/g).length : 0;
        if (words <= 50) {
            $('#display_count').text(words);
            $('#word_left').text(50 - words)
        } else {
            alert("only 50 word allowed!!");
            if (e.which !== 8) e.preventDefault();
        }
    });



    generateCV();

    function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    $("#profileImage").click(function(e) {
        $("#imageUpload").click();
    });

    function fasterPreview(uploader) {
        if (uploader.files && uploader.files[0]) {
            $('#profileImage').attr('src',
                window.URL.createObjectURL(uploader.files[0]));
        }
    }

    $("#imageUpload").change(function() {
        fasterPreview(this);
    })
</script>
</body>

</html>
