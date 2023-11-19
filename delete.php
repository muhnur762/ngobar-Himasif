<?php
$npm = $_GET['npm'];
include('koneksi.php');
$sql = "DELETE FROM students WHERE npm ='$npm'";
$query = mysqli_query($conn, $sql);

if ($query) {
?>
    <script>
        alert("success deleted!");
        window.open("index.php", "_self");
    </script>
<?php
}
?>
<script>
    alert("Fail deleted!");
    window.open("index.php", "_self");
</script>