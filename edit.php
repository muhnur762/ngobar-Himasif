<?php
include('layout/header.php');
include('koneksi.php');
$npm = $_GET['npm'];



$students = mysqli_query($conn, "SELECT * FROM students INNER JOIN major ON students.major_id = major.id WHERE npm='$npm'");
$data = mysqli_fetch_assoc($students);
?>
<!-- table -->
<section>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow w-75 mb-5">
            <div class="card-body">
                <a class="text-secondary icon-link icon-link-hover" href="detail.php?npm=<?= $npm; ?>"><i class="bi bi-arrow-left-short fs-2 text-seccondary"></i></a>
                <h3 class="mb-3 d-inline-block">Edit Student</h3>
                <!-- form -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php

                    ?>
                    <!-- input nama -->
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" required value="<?= $data['name']; ?>">
                        </div>
                    </div>
                    <!-- input npm -->
                    <div class="mb-3 row">
                        <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="npm" name="npm" required value="<?= $data['npm']; ?>" readonly>
                        </div>
                    </div>
                    <!-- input jurusan -->
                    <div class="mb-3 row">
                        <label for="major" class="col-sm-2 col-form-label">Major</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="major">
                                <?php
                                $major = mysqli_query($conn, "SELECT * FROM major");
                                while ($dmajor = mysqli_fetch_assoc($major)) {
                                ?>
                                    <option value="<?= $dmajor['id']; ?>" <?= $dmajor['id'] == $data['major_id'] ? 'selected' : ''; ?>><?= $dmajor['majorName']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- input jenis kelamin -->
                    <div class="mb-3 row">
                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">

                            <select class="form-select" aria-label="Default select example" name="gender">
                                <option value="Male" <?= $data['gender'] == "Male" ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?= $data['gender'] == "Female" ? 'selected' : ''; ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    <!-- input tempat lahir -->
                    <div class="mb-3 row">
                        <label for="pob" class="col-sm-2 col-form-label">Place Of Birth</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pob" name="placeOb" value="<?= $data['placeOb']; ?>" />
                        </div>
                    </div>
                    <!-- input tanggal lahir -->
                    <div class="mb-3 row">
                        <label for="dob" class="col-sm-2 col-form-label">Date Of Birth</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="dob" name="dateOb" value="<?= $data['dateOb']; ?>">
                        </div>
                    </div>
                    <!-- input agama -->
                    <div class="mb-3 row">
                        <label for="religion" class="col-sm-2 col-form-label">Religion</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="religion" name="religion" value="<?= $data['religion']; ?>">
                        </div>
                    </div>
                    <!-- input no telp -->
                    <div class="mb-3 row">
                        <label for="telp" class="col-sm-2 col-form-label">Telephone</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="telp" name="telp" value="<?= $data['telp']; ?>">
                        </div>
                    </div>
                    <!-- input alamat -->
                    <div class="mb-3 row">
                        <label for="address" class="col-sm-2 col-form-label">Adress</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="address" name="address"><?= $data['address']; ?></textarea>
                        </div>
                    </div>
                    <!-- input pp -->
                    <div class="mb-3 row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="image" name="image">
                            <input type="hidden" name="imageLama" value="<?= $data['image']; ?>">
                        </div>
                    </div>
                    <!-- button -->
                    <button type="reset" class="btn btn-danger">Restart</button>
                    <button type="submit" name="update" class="btn btn-success">Update</button>

                </form>
                <!-- end form -->
            </div>
        </div>
    </div>
</section>
<!-- end table -->

<?php include('layout/footer.php')  ?>

<?php
if (isset($_POST['update'])) {
    // inisialisasi
    $name = $_POST['name'];
    $npm = $_POST['npm'];
    $major = $_POST['major'];
    $gender = $_POST['gender'];
    $gender = $_POST['gender'];
    $placeOb = $_POST['placeOb'];
    $dateOb = $_POST['dateOb'];
    $religion = $_POST['religion'];
    $telp = $_POST['telp'];
    $address = $_POST['address'];
    $imageLama = $_POST['imageLama'];
    $imageName = $_FILES['image']['name'];
    $source = $_FILES['image']['tmp_name'];
    $folder = './image/';

    // upload gambar 

    echo " hallo";
    echo $imageName;
    if (empty($imageName)) {
        $sql = "UPDATE students SET `name`='$name',`gender`='$gender',`placeOb`='$placeOb',`dateOb`='$dateOb',`religion`='$religion',`address`='$address',`telp`='$telp',`major_id`='$major'WHERE `npm` ='$npm'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
?>
            <script>
                alert("Success");
                window.open("detail.php?npm=<?= $npm; ?>", "_self");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("gagal");
                window.open("detail.php?npm=<?= $npm; ?>", "_self");
            </script>

        <?php
        }
    } else {
        move_uploaded_file($source, $folder . $imageName);

        if ($imageLama) {
            unlink($folder . $imageLama);
        }

        $sql = "UPDATE students SET `name`='$name',`gender`='$gender',`placeOb`='$placeOb',`dateOb`='$dateOb',`religion`='$religion',`address`='$address',`telp`='$telp',`major_id`='$major', `image`= '$imageName' WHERE `npm` ='$npm'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
        ?>
            <script>
                alert("Success");
                window.open("detail.php?npm=<?= $npm; ?>", "_self");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("gagal");
                window.open("detail.php?npm=<?= $npm; ?>", "_self");
            </script>

<?php
        }
    }
}
?>