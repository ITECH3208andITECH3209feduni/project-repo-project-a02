<?php

require('connection.php');
session_start();
if (isset($_SESSION['expert']) && $_SESSION['expert'] != null) {
} else {
    header('location:expert.php');
}
$booking = mysqli_query($con, " SELECT * FROM  booking");

function returnUserData($user_id, $type, $con)
{
    $query = "SELECT * FROM user WHERE id='$user_id' ";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        return $user[$type];
    }
    return null;
}

if (isset($_GET['status']) && $_GET['status'] == 'logout') {
    $_SESSION['expert'] == null;
    header('location:expert.php');
}

if (isset($_GET['status']) && ($_GET['status'] == 'Approve' || $_GET['status'] == 'Rejected')) {

    $id = $_GET['id'];
    $status = $_GET['status'];
    $sql = "UPDATE booking  SET status = '" . $status . "'  WHERE id = '" . $id . "' ";
    $retval = mysqli_query($con, $sql);
    if (!$retval) {
        array_push($errors, "Could not update data");
    }
    header("Location:request_cv.php?status=Updated data successfully");
}


$errors = array();

if (isset($_POST['cvsubmit'])) {
    $target_file = "";
    if (isset($_FILES["cvfiles"]["name"]) && $_FILES["cvfiles"]["name"] != null) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["cvfiles"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (
            $imageFileType != "pdf"
        ) {
            array_push($errors, "Sorry, only PDF files are allowed.");
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            array_push($errors, "Sorry, your file was not uploaded.");
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["cvfiles"]["tmp_name"], $target_file)) {
                $id = mysqli_real_escape_string($con, $_POST['id']);
                $status = "Delivered";
                $sql = "UPDATE booking  SET status = '" . $status . "', file = '" . $target_file . "'  WHERE id = '" . $id . "' ";
                $retval = mysqli_query($con, $sql);
                if (!$retval) {
                    array_push($errors, "Could not update data");
                }
                header("Location:request_cv.php?status=Updated data successfully");
            } else {
                array_push($errors, "Sorry, there was an error uploading your file.");
            }
        }
    }
   
}



include('layout/header.php');
?>
<main class="request-content">
    <div class="container">
        <?php if (isset($errors) && count($errors) > 0) : ?>
            <?php foreach ($errors as $error) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>

        <?php
        if (isset($_GET['status'])) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo  $_GET['status']; ?>
            </div>

        <?php

        }
        ?>
        <div class="request-list">
            <div class="request-list-title">
                <h3>New Expert Request for CV</h3>
                <a href="request_cv.php?status=logout" class="btn btn-danger">Logout Expert</a>
            </div>

            <div class="request-list-table mb-5 pb-5">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Date </th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($booking)) {
                        ?>
                            <tr>
                                <td><?php echo returnUserData($row['user_id'], 'name', $con); ?></td>
                                <td><?php echo returnUserData($row['user_id'], 'email', $con); ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['remarks']; ?></td>
                                <td>
                                    <?php if ($row['status'] == "Pending") { ?>
                                        <a href="request_cv.php?status=Approve&id=<?php echo $row['id']; ?>" class="btn btn-success">Approve</a>
                                        <a href="request_cv.php?status=Rejected&id=<?php echo $row['id']; ?>" class="btn btn-danger">Reject</a>
                                    <?php } elseif ($row['status'] == "Approve") { ?>
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <input name="id" value="<?php echo $row['id']; ?>" type="hidden">
                                            <input required name="cvfiles" type="file">
                                            <button type="submit" name="cvsubmit" class='btn btn-primary'>Upload Cv</button>
                                        </form>
                                    <?php } elseif ($row['status'] == "Delivered") { ?>
                                        <a target="_blank" href="<?php echo $row['file']; ?>" class="btn btn-primary">view Cv</a>
                                    <?php } else { ?>
                                        <a href="request_cv.php?status=Approve&id=<?php echo $row['id']; ?>" class="btn btn-success">Approve</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php
include('layout/footer.php');
?>