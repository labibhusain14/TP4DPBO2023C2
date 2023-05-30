<?php

class Company extends DB
{
    function getCompany()
    {
        // Query untuk memilih semua data dari tabel company
        $query = "SELECT * FROM company";
        return $this->execute($query);
    }

    function getCompanyJoin($id)
    {
        // Query untuk memilih data dari tabel company dimana id cocok dengan id yang diberikan
        $query = "SELECT * FROM company WHERE id_company=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];

        // Query untuk memasukkan baris baru ke tabel company
        $query = "INSERT INTO `company`(`name_company`) VALUES ('$name')";

        // Menjalankan query
        return $this->execute($query);
    }

    function delete($id)
    {
        // Query untuk menghapus data dari tabel company berdasarkan id
        $query = "DELETE FROM company WHERE id_company = '$id'";

        // Menjalankan query
        return $this->execute($query);
    }

    function updateCompany($id, $data)
    {
        $name = $data['name'];

        // Query untuk mengupdate data di tabel company dengan mengambil nilai yang sudah ada berdasarkan id
        $query = "UPDATE `company` SET `name_company` ='$name' WHERE id_company ='$id'";

        // Menjalankan query update dengan mengambil nilai yang sudah ada berdasarkan id
        return $this->execute($query);
    }
}
