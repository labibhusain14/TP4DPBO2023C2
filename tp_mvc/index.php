<?php
include_once("models/Template.class.php"); // Memasukkan file kelas Template
include_once("models/DB.class.php"); // Memasukkan file kelas DB
include_once("controllers/Members.controller.php"); // Memasukkan file kelas MembersController

$members = new MembersController(); // Membuat objek MembersController

if (isset($_POST['add'])) { // Jika tombol 'add' pada form diklik
  $members->add($_POST); // Panggil metode 'add' pada objek MembersController dengan data form sebagai argumen
} else if (!empty($_GET['add_members'])) { // Jika parameter 'add_members' tidak kosong
  $members->membersForm(); // Panggil metode 'membersForm' pada objek MembersController
} else if (!empty($_GET['id_hapus'])) { // Jika parameter 'id_hapus' tidak kosong
  $id = $_GET['id_hapus']; // Mendapatkan nilai 'id' dari parameter GET
  $members->delete($id); // Panggil metode 'delete' pada objek MembersController dengan 'id' sebagai argumen
} else if (!empty($_GET['id_edit'])) { // Jika parameter 'id_edit' tidak kosong
  $id = $_GET['id_edit']; // Mendapatkan nilai 'id' dari parameter GET
  $members->membersUpdate($id); // Panggil metode 'membersUpdate' pada objek MembersController dengan 'id' sebagai argumen
} else { // Jika tidak ada kondisi yang terpenuhi
  $members->index(); // Panggil metode 'index' pada objek MembersController
}

if (isset($_POST['update'])) { // Jika tombol 'update' pada form diklik
  $id = $_GET['id_edit']; // Mendapatkan nilai 'id' dari parameter GET
  $members->edit($id, $_POST); // Panggil metode 'edit' pada objek MembersController dengan 'id' dan data form sebagai argumen
}
