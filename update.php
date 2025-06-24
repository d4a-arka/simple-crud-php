<?php
include ("config.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $result = $conn->query("SELECT * FROM datasiswa where id=$id");
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];

    $sql = "UPDATE datasiswa SET nama='$nama', umur='$umur' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("location: index.php");
    } else {
        echo "Error". $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
    <h2>Update Data</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>" required>
        <input type="text" name="nama" value="<?php echo $row['nama'];?>" required>
        <input type="number" name="umur" value="<?php echo $row['umur'];?>" required>
        <button type="submit" name="update">Update Data</button>
    </form>
</body>
</html>


<?php $conn->close(); ?>