<!doctype html>
<html>

<head>
    <title>CodeIgniter Tutorial</title>
</head>

<body>

    <h1><?= esc($title) ?></h1> <!-- $titel untuk tampilan sebelum tampilan utama sebelum dengan judul, 
    dan menampilkan $judul yang di definiskan di controller -->
    
    <!-- esc fungsi global yang disediakan oleh CodeIgniter untuk membantu mencegah serangan XSS -->