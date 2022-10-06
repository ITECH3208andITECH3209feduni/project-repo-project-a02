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
