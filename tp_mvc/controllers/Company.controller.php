<?php
include_once("connection.php");
include_once("models/Company.class.php");
include_once("views/Company.view.php");

class CompanyController
{
    private $company;

    function __construct()
    {
        $this->company = new Company(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    }

    public function index()
    {
        // Membuka koneksi ke database
        $this->company->open();

        // Mengambil data perusahaan
        $this->company->getCompany();

        // Membuat array untuk menyimpan data perusahaan
        $data = array(
            'company' => array(),
        );

        // Memasukkan setiap baris hasil query ke dalam array
        while ($row = $this->company->getResult()) {
            array_push($data['company'], $row);
        }

        // Menutup koneksi database
        $this->company->close();

        // Memanggil view CompanyView untuk menampilkan data perusahaan
        $view = new CompanyView();
        $view->render($data);
    }

    public function companyForm()
    {
        // Membuka koneksi ke database
        $this->company->open();

        // Mengambil data perusahaan
        $this->company->getCompany();

        // Membuat array untuk menyimpan data perusahaan
        $data = array(
            'company' => array(),
        );

        // Memasukkan setiap baris hasil query ke dalam array
        while ($row = $this->company->getResult()) {
            array_push($data['company'], $row);
        }

        // Menutup koneksi database
        $this->company->close();

        // Memanggil view CompanyView untuk menampilkan form tambah perusahaan
        $view = new CompanyView();
        $view->formAdd($data);
    }

    public function companyUpdate($id)
    {
        // Membuka koneksi ke database
        $this->company->open();

        // Mengambil data perusahaan
        $this->company->getCompany();

        // Mengambil data perusahaan dengan ID tertentu
        $this->company->getCompanyJoin($id);

        // Membuat array untuk menyimpan data perusahaan
        $data = array(
            'company' => array(),
        );

        // Memasukkan setiap baris hasil query ke dalam array
        while ($row = $this->company->getResult()) {
            array_push($data['company'], $row);
        }

        // Menutup koneksi database
        $this->company->close();

        // Memanggil view CompanyView untuk menampilkan form update perusahaan
        $view = new CompanyView();
        $view->formUpdate($data);
    }

    function add($data)
    {
        // Membuka koneksi ke database
        $this->company->open();

        // Menambahkan perusahaan baru
        $this->company->add($data);

        // Menutup koneksi database
        $this->company->close();

        // Mengarahkan pengguna ke halaman company.php setelah penambahan berhasil
        header("location:company.php");
    }

    function edit($id, $data)
    {
        // Membuka koneksi ke database
        $this->company->open();

        // Mengedit data perusahaan dengan ID tertentu
        $this->company->updatecompany($id, $data);

        // Menutup koneksi database
        $this->company->close();

        // Mengarahkan pengguna ke halaman company.php setelah pengeditan berhasil
        header("location:company.php");
    }

    function delete($id)
    {
        // Membuka koneksi ke database
        $this->company->open();

        // Menghapus data perusahaan dengan ID tertentu
        $this->company->delete($id);

        // Menutup koneksi database
        $this->company->close();

        // Mengarahkan pengguna ke halaman company.php setelah penghapusan berhasil
        header("location:company.php");
    }
}
