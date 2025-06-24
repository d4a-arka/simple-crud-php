<?php
include ("config.php");

if(isset($_POST["add"])){
    $nama= $_POST["nama"];
    $umur= $_POST["umur"];

    $sql = "INSERT INTO datasiswa (nama,umur) VALUES ('$nama','$umur')";

    if($conn->query($sql) === TRUE){
        echo "DATA BERHASIL DITAMBAHKAN";
    } else {
        echo "ERROR". $conn->error;
    }

}

$result = $conn->query("SELECT *FROM datasiswa");

if (isset($_GET["delete"])){
    $id= $_GET["delete"];

    $sql = "DELETE FROM datasiswa where id=$id";
    if($conn->query($sql) === TRUE){
        echo "Data Terhapus";
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
    <title>CRUD DASAR</title>
</head>
<body>
    <h1>DAFTAR SISWA RPL 1</h1>
    <hr style="border: 2px solid black;">

    <form action="" method="post">
        <input type="text" placeholder="Nama" name="nama">
        <input type="number" placeholder="Umur" name="umur">
        <button type="submit" name="add">Tambah Data Siswa</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td> <?php echo $row['id']; ?> </td>
                <td> <?php echo $row['nama']; ?> </td>
                <td> <?php echo $row['umur']; ?> </td>
                <td>
                    <a href="update.php?id=<?php echo $row['id'];?>">Edit</a>
                    <a href="index.php?delete=<?php echo $row['id'];?>" name="delete">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>