<?php include('layout/header.php')  ?>
<!-- table -->
<section>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow w-75">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <a class="text-secondary icon-link icon-link-hover" href="index.php"><i class="bi bi-arrow-left-short fs-2 text-seccondary"></i></a>

                    </div>
                </div>
                <?php
                include('koneksi.php');
                $npm = $_GET['npm'];
                $students = mysqli_query($conn, "SELECT * FROM students INNER JOIN major ON students.major_id = major.id WHERE npm='$npm'");
                while ($data = mysqli_fetch_array($students)) {
                ?>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="image/<?= $data['image']; ?>" class="w-100 img-fluid rounded" alt="Image <?= $data['image']; ?>">
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>:</td>
                                        <td><?= $data['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NPM</td>
                                        <td>:</td>
                                        <td><?= $data['npm']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>:</td>
                                        <td><?= $data['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>place and date of birth</td>
                                        <td>:</td>
                                        <td><?= $data['placeOb'], ", ", $data['dateOb']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Religion</td>
                                        <td>:</td>
                                        <td><?= $data['religion']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Telephone</td>
                                        <td>:</td>
                                        <td><?= $data['telp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Major</td>
                                        <td>:</td>
                                        <td><?= $data['majorName']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td><?= $data['address']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="delete.php?npm=<?= $data['npm']; ?>" class="btn btn-danger" onclick="return confirm('want to delete this data?')">Delete</a>
                            <a href="edit.php?npm=<?= $data['npm']; ?>" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- end table -->

<?php include('layout/footer.php')  ?>