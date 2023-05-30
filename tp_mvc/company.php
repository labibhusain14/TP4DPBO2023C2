<?php
include_once("models/Template.class.php"); // Memasukkan file kelas Template
include_once("models/DB.class.php"); // Memasukkan file kelas DB
include_once("controllers/Company.controller.php"); // Memasukkan file kelas CompanyController

$company = new CompanyController(); // Membuat objek CompanyController

if (isset($_POST['add'])) { // Jika tombol 'add' pada form diklik
  $company->add($_POST); // Panggil metode 'add' pada objek CompanyController dengan data form sebagai argumen
} else if (!empty($_GET['add_company'])) { // Jika parameter 'add_company' tidak kosong
  $company->companyForm(); // Panggil metode 'companyForm' pada objek CompanyController
} else if (!empty($_GET['id_hapus'])) { // Jika parameter 'id_hapus' tidak kosong
  $id = $_GET['id_hapus']; // Mendapatkan nilai 'id' dari parameter GET
  $company->delete($id); // Panggil metode 'delete' pada objek CompanyController dengan 'id' sebagai argumen
} else if (!empty($_GET['id_edit'])) { // Jika parameter 'id_edit' tidak kosong
  $id = $_GET['id_edit']; // Mendapatkan nilai 'id' dari parameter GET
  $company->companyUpdate($id); // Panggil metode 'companyUpdate' pada objek CompanyController dengan 'id' sebagai argumen
} else { // Jika tidak ada kondisi yang terpenuhi
  $company->index(); // Panggil metode 'index' pada objek CompanyController
}

if (isset($_POST['update'])) { // Jika tombol 'update' pada form diklik
  $id = $_GET['id_edit']; // Mendapatkan nilai 'id' dari parameter GET
  $company->edit($id, $_POST); // Panggil metode 'edit' pada objek CompanyController dengan 'id' dan data form sebagai argumen
}
