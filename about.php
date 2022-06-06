<?php
require('connection.php');
session_start();
$cv_id = '';
$firstname = '';
$lastname = '';
$image = '';
$designation = '';
$address = '';
$city = '';
$email = '';
$phone = '';
$summary = '';
$facebook = '';

if (isset($_POST['submit']) && isset($_SESSION['id']) && $_SESSION['id'] != null) {
    $user_id = $_SESSION['id'];
    $cv_id = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $image = mysqli_real_escape_string($con, $_POST['image']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $summary = mysqli_real_escape_string($con, $_POST['summary']);
    $facebook = mysqli_real_escape_string($con, $_POST['facebook']);

    $imagePath = null;
    if (isset($_FILES["image"])) {
        $filename = $_FILES['image']['name'];
        $imagePath =  file_get_contents($_FILES["image"]["tmp_name"]);
        $data = base64_encode($imagePath);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $base64_str = 'data:image/' . $ext . ';base64,' . $data;
        // Display the output 
        $imagePath =  $base64_str;
    }




    $insertCV = "INSERT INTO cv(user_id) VALUES('$user_id')";
    if (mysqli_query($con, $insertCV)) {
        $cv_id = mysqli_insert_id($con);
        $insert = "INSERT INTO about(firstname,lastname,designation,address,city, cv_id, email, phone, summary, image ) 
        VALUES('" . $firstname . "','" . $lastname . "','" . $designation . "',
        '" . $address . "','" . $city . "','" . $cv_id . "','" . $email . "','" . $phone . "',
        '" . $summary . "','" . $imagePath . "')";
        if (mysqli_query($con, $insert)) {

            $insertSocial = "INSERT INTO social(website, link, cv_id) VALUES('Facebook', '" . $facebook . "', '" . $cv_id . "' )";
            mysqli_query($con, $insertSocial);
            header('location:achievement.php?cv_id='.$cv_id);
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($con);
        }
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($con);
    }
    mysqli_close($conn);
}

include('layout/header.php');

?>
<main class="profile-bg">
    <section class="profile-section">
        <div class="container text-center">
            <div class="profile-section-title font-italian text-left">Welcome on About Section</div>

            <div class="profile-section-content">
                <form id="profile-form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="submit" value="submit" />
                    <div class="field-item">
                        <div class="profile-form-elem">
                            <label for="" class="font-overlock">First Name</label>
                            <input name="firstname" type="text" required class="profile-form-control bg-grey">
                        </div>
                    </div>
                    <div class="field-item">
                        <div class="profile-form-elem">
                            <label for="" class="font-overlock">Last Name</label>
                            <input name="lastname" type="text" required class="profile-form-control bg-grey">
                        </div>
                    </div>
                    <div class="field-item">
                        <div class="profile-form-elem">
                            <label for="" class="font-overlock">CV Image</label>
                            <input name="image" type="file" required class="profile-form-control bg-grey">
                        </div>
                    </div>
                    <div class="field-item">
                        <div class="profile-form-elem">
                            <label for="" class="font-overlock">Designation</label>
                            <input name="designation" type="text" required class="profile-form-control bg-grey">
                        </div>
                    </div>
                    <div class="field-item">
                        <div class="profile-form-elem">
                            <label for="" class="font-overlock">Address</label>
                            <input name="address" type="text" required class="profile-form-control bg-grey">
                        </div>
                    </div>
                    <div class="field-item">
                        <div class="profile-form-elem">
                            <label for="" class="font-overlock">City</label>
                            <input name="city" type="text" required class="profile-form-control bg-grey">
                        </div>
                    </div>
                    <div class="field-item">
                        <div class="profile-form-elem">
                            <label for="" class="font-overlock">Email</label>
                            <input name="email" type="email" required class="profile-form-control bg-grey">
                        </div>
                    </div>
                    <div class="field-item">
                        <div class="profile-form-elem">
                            <label for="" class="font-overlock">Phone</label>
                            <input name="phone" type="text" required class="profile-form-control bg-grey">
                        </div>
                    </div>
                    <div class="field-item">
                        <div class="profile-form-elem">
                            <label for="" class="font-overlock">Summary</label>
                            <textarea class="profile-form-control bg-grey" name="summary" rows="4" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="field-item">
                        <div class="profile-form-elem">
                            <label for="" class="font-overlock">Facebook</label>
                            <input name="facebook" type="text" required class="profile-form-control bg-grey">
                        </div>
                    </div>

                    <div class="profile-btns flex flex-c">
                        <a href="profile.html" id="btn-prev" class="bg-blue">Previous</a>
                        <button type="submit" id="btn-next" class="bg-grey">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php
include('layout/footer.php');
?>