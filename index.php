<?php include('layout/header.php')  ?>
<!-- table -->
<section>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body table-responsive">
                <a href="add.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Add Student</a>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NAME</th>
                            <th scope="col">NPM</th>
                            <th scope="col">MAJOR</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('koneksi.php');
                        $students = mysqli_query($conn, "SELECT students.name,students.npm,major.majorName FROM students INNER JOIN major ON students.major_id = major.id");
                        $no = 1;
                        while ($data = mysqli_fetch_array($students)) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $data['name']; ?></td>
                                <td><?= $data['npm']; ?></td>
                                <td><?= $data['majorName']; ?></td>
                                <td><a class="btn btn-sm btn-primary" href="detail.php?npm=<?= $data['npm']; ?>">Details</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- end table -->

<?php include('layout/footer.php')  ?>