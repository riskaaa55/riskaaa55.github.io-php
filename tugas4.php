<?php
// Koneksi database dengan PDO
$host = "localhost";
$db   = "db_buah";
$user = "root";
$pass = "";
$dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 🔹 Tampilkan data buah (SHOW)
    echo "=== DATA BUAH ===\n";

    $data = $pdo->query("SELECT * FROM buah")->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $row) {
        echo "{$row['id']} - {$row['nama_buah']} ({$row['warna']})\n";
    }

    echo "\n=== UPDATE DATA BUAH ===\n";

    // Input dari CLI
    $id = readline("Masukkan ID buah yang ingin diupdate: ");
    $nama = readline("Masukkan nama buah baru: ");
    $warna = readline("Masukkan warna baru: ");

    // Query UPDATE
    $sql = "UPDATE buah SET nama_buah = :nama, warna = :warna WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nama' => $nama,
        ':warna' => $warna,
        ':id' => $id
    ]);

    if ($stmt->rowCount() > 0) {
        echo "Data berhasil diupdate!\n";
    } else {
        echo "Tidak ada data yang diupdate (ID mungkin tidak ditemukan).\n";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}