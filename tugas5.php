<?php
// Koneksi database
$host = "localhost";
$db   = "db_buah";
$user = "root";
$pass = "";
$dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Proses update jika form dikirim
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $warna = $_POST['warna'];

        $sql = "UPDATE buah SET nama_buah = :nama, warna = :warna WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nama' => $nama,
            ':warna' => $warna,
            ':id' => $id
        ]);

        $pesan = ($stmt->rowCount() > 0) 
            ? "Data berhasil diupdate!" 
            : "Data tidak ditemukan / tidak berubah.";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data Buah</title>
</head>
<body>

<h2>Data Buah</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nama Buah</th>
        <th>Warna</th>
    </tr>

    <?php
    $data = $pdo->query("SELECT * FROM buah")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $row) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nama_buah']}</td>
                <td>{$row['warna']}</td>
              </tr>";
    }
    ?>
</table>

<h2>Update Data Buah</h2>

<?php if (isset($pesan)) echo "<p><b>$pesan</b></p>"; ?>

<form method="POST">
    ID: <br>
    <input type="number" name="id" required><br><br>

    Nama Buah: <br>
    <input type="text" name="nama" required><br><br>

    Warna: <br>
    <input type="text" name="warna" required><br><br>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>