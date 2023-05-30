<?php
include_once("models/Template.class.php"); // Memasukkan file kelas Template
include_once("models/DB.class.php"); // Memasukkan file kelas DB
include_once("controllers/Tim.controller.php"); // Memasukkan file kelas TimController

$tim = new TimController(); // Membuat objek TimController

if (isset($_POST['add'])) { // Jika tombol 'add' pada form diklik
  $tim->add($_POST); // Panggil metode 'add' pada objek TimController
} else if (!empty($_GET['add_tim'])) { // Jika parameter 'add_tim' tidak kosong
  $tim->timForm(); // Panggil metode 'timForm' pada objek TimController
} else if (!empty($_GET['id_hapus'])) { // Jika parameter 'id_hapus' tidak kosong
  $id = $_GET['id_hapus']; // Mendapatkan nilai 'id' dari parameter GET
  $tim->delete($id); // Panggil metode 'delete' pada objek TimController dengan 'id' sebagai argumen
} else if (!empty($_GET['id_edit'])) { // Jika parameter 'id_edit' tidak kosong
  $id = $_GET['id_edit']; // Mendapatkan nilai 'id' dari parameter GET
  $tim->timUpdate($id); // Panggil metode 'timUpdate' pada objek TimController dengan 'id' sebagai argumen
} else { // Jika tidak ada kondisi yang terpenuhi
  $tim->index(); // Panggil metode 'index' pada objek TimController
}

if (isset($_POST['update'])) { // Jika tombol 'update' pada form diklik
  $id = $_GET['id_edit']; // Mendapatkan nilai 'id' dari parameter GET
  $tim->edit($id, $_POST); // Panggil metode 'edit' pada objek TimController dengan 'id' dan data form sebagai argumen
}
