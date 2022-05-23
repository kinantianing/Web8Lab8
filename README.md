# Web8Lab8

**Nama    : Aning Kinanti** <br>
**NIM     : 312010364** <br>
**Kelas   : TI.20.A2** <br>
**Matkul  : Pemrograman Web** <br>

# Belajar PHP dan Database MySQL
1. Pastikan Xampp sudah terinstall dan server dapat berjalan dengan baik http://127.0.0.1 atau http://localhost
2. Tempatkan file website tempatkan di direktori: \xampp\htdocs\

## A. Database MySQL
### 1. Membuat Database
Akses link http://localhost/phpmyadmin/ lalu akan muncul tampilan seperti dibawah ini : <br>
![Gambar 1](screenshot/1.PNG) <br>

Selanjutnya klik tanda tambah (new) untuk membuat database. <br>
Buat database dengan nama `dblab8` lalu klik create seperti contoh dibawah ini : <br>
![Gambar 2](screenshot/2.PNG) <br>

### 2. Membuat Table
Buka database yang telah dibuat sebelumnya, lalu klik tanda tanda tambah (new) untuk membuat table. <br>
Pilih SQL pada menu bar lalu ketik semua sintaks kemudian pilih go seperti contoh dibawah ini : <br>
![Gambar 3](screenshot/3.PNG) <br>

Maka table yang telah dibuat akan muncul seperti gambar dibawah ini : <br>
![Gambar 4](screenshot/4.PNG) <br>

### 3. Insert Data pada Table
Buka table yang telah dibuat sebelumnya, lalu pilih SQL pada menubar. <br>
Selanjutnya pilih insert, ketik semua sintaks lalu pilih go seperti pada contoh dibawah ini : <br>
![Gambar 5](screenshot/5.PNG) <br>

Maka data yang telah di insert akan muncul pada table seperti gambar dibawah ini : <br>
![Gambar 6](screenshot/6.PNG) <br>

## B. Program CRUD
Buat folder lab8web pada root directory web server (d:\xampp\htdocs) <br>
Kemudian untuk mengakses direktory tersebut pada web server dengan mengakses URL: <br>
http://localhost/lab8web/

### 1. Membuat File Koneksi Database
Buatlah file baru dengan nama `koneksi.php`, lalu isi dengan sintaks seperti contoh dibawah ini : <br>
```
<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "dblab8";

    $conn = mysqli_connect($host, $user, $pass, $db);
    if ($conn == false)
    {
        echo "Koneksi ke server gagal.";
        die();
    }  #else echo "Koneksi berhasil";
?>
```
<br>

Kemudian untuk mengakses hasilnya melalui URL: http://localhost/lab8web/Web8Lab8 <br>
Buka melalui browser untuk menguji koneksi database (untuk menyampilkan pesan 
koneksi berhasil. <br>
![Gambar 7](screenshot/7.PNG) <br>

### 2. Membuat File Index php
Buatlah file baru dengan nama `index.php`, lalu isi dengan sintaks seperti contoh dibawah ini : <br>
```
<?php
    include("koneksi.php");
    // query untuk menampilkan data
    $sql = 'SELECT * FROM data_barang';
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style_index.css" rel="stylesheet" type="text/css" />
    <title>DATA BARANG</title>
</head>
<body>
    <div class="container">
        <h1>DATA BARANG</h1>
        <div>
        <a href="tambah.php">TAMBAH BARANG</a>
        </div>
        <br>
        <div class="main">
            <table>
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Katagori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php if($result): ?>
            <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td><?= $row['id_barang'];?></td>
                <td><img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>" width="100"></td>
                <td><?= $row['nama'];?></td>
                <td><?= $row['kategori'];?></td>
                <td><?= $row['harga_beli'];?></td>
                <td><?= $row['harga_jual'];?></td>
                <td><?= $row['stok'];?></td>
                <td>
                    <a class="ubah" href="ubah.php?id_barang=<?php echo $row['id_barang']; ?>">Ubah</a>
                    <a class="hapus" href="hapus.php?id_barang=<?php echo $row['id_barang']; ?>">Hapus</a>
                </td>
            </tr>
            <?php endwhile; else: ?>
            <tr>
                <td colspan="7">Belum ada data</td>
            </tr>
            <?php endif; ?>
            </table>
        </div>
    </div>
</body>
</html>
```
<br>

Kemudian buatlah file css dengan nama `style_index.css`, untuk membuat tampilan lebih rapih. <br>
Lalu isi dengan sintaks seperti contoh dibawah ini : <br>
```
.container {
    margin: 30px 20px;
    background-color: #f0f0f0;
    font-family: "Times New Roman", Times, serif;
    border-radius: 5px;
    border-collapse: collapse;
}

h1 {
    padding-top: 40px;
    padding-left: 40px;
}

a {
    padding-left: 40px;
}

.main {
    padding-left: 40px;
    padding-top: 20px;
    padding-bottom: 40px;
    padding-right: 40px;
}

table {
    width: 100%;
    border-radius: 5px;
    font-family: "Times New Roman", Times, serif;
    border-collapse: collapse;
}
  
th {
    height: 35px;
    text-align: center;  
    padding-top: 12px;
    padding-bottom: 12px;
    background-color: #5f9ea0;
    color: black;
}

td {
    height: 100px;
    text-align: center;
    border: 1px solid #ddd;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}
tr:hover {background-color: #ddd;}
```
<br>


Kemudian refresh halaman web, maka hasilnya akan menjadi seperti dibawah ini :<br>
![Gambar 8](screenshot/8.PNG) <br>

