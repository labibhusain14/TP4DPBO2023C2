<?php
include_once("connection.php");
include_once("models/Tim.class.php");
include_once("views/Tim.view.php");

class TimController
{
    private $tim;

    function __construct()
    {
        $this->tim = new Tim(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    }

    public function index()
    {
        // Membuka koneksi ke database
        $this->tim->open();

        // Mengambil data tim
        $this->tim->getTim();

        // Membuat array untuk menyimpan data tim
        $data = array(
            'tim' => array(),
        );

        // Memasukkan setiap baris hasil query ke dalam array
        while ($row = $this->tim->getResult()) {
            array_push($data['tim'], $row);
        }

        // Menutup koneksi database
        $this->tim->close();

        // Memanggil view TimView untuk menampilkan data tim
        $view = new TimView();
        $view->render($data);
    }

    public function TimForm()
    {
        // Membuka koneksi ke database
        $this->tim->open();

        // Mengambil data tim
        $this->tim->getTim();

        // Membuat array untuk menyimpan data tim
        $data = array(
            'tim' => array(),
        );

        // Memasukkan setiap baris hasil query ke dalam array
        while ($row = $this->tim->getResult()) {
            array_push($data['tim'], $row);
        }

        // Menutup koneksi database
        $this->tim->close();

        // Memanggil view TimView untuk menampilkan form tambah tim
        $view = new TimView();
        $view->formAdd($data);
    }

    public function TimUpdate($id)
    {
        // Membuka koneksi ke database
        $this->tim->open();

        // Mengambil data tim
        $this->tim->getTim();

        // Mengambil data tim dengan ID tertentu
        $this->tim->getTimJoin($id);

        // Membuat array untuk menyimpan data tim
        $data = array(
            'tim' => array(),
        );

        // Memasukkan setiap baris hasil query ke dalam array
        while ($row = $this->tim->getResult()) {
            array_push($data['tim'], $row);
        }

        // Menutup koneksi database
        $this->tim->close();

        // Memanggil view TimView untuk menampilkan form update tim
        $view = new TimView();
        $view->formUpdate($data);
    }

    function add($data)
    {
        // Membuka koneksi ke database
        $this->tim->open();

        // Menambahkan tim baru
        $this->tim->add($data);

        // Menutup koneksi database
        $this->tim->close();

        // Mengarahkan pengguna ke halaman tim.php setelah penambahan berhasil
        header("location:tim.php");
    }

    function edit($id, $data)
    {
        // Membuka koneksi ke database
        $this->tim->open();

        // Mengedit data tim dengan ID tertentu
        $this->tim->updateTim($id, $data);

        // Menutup koneksi database
        $this->tim->close();

        // Mengarahkan pengguna ke halaman tim.php setelah pengeditan berhasil
        header("location:tim.php");
    }

    function delete($id)
    {
        // Membuka koneksi ke database
        $this->tim->open();

        // Menghapus data tim dengan ID tertentu
        $this->tim->delete($id);

        // Menutup koneksi database
        $this->tim->close();

        // Mengarahkan pengguna ke halaman tim.php setelah penghapusan berhasil
        header("location:tim.php");
    }
}
