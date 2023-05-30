<?php
class Tim extends DB
{
    function getTim()
    {
        // Query untuk memilih semua data dari tabel tim
        $query = "SELECT * FROM tim";
        return $this->execute($query);
    }

    function getTimJoin($id)
    {
        // Query untuk memilih data dari tabel tim dimana id_tim cocok dengan id yang diberikan
        $query = "SELECT * FROM tim WHERE id_tim=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];

        // Query untuk menambahkan tim baru ke tabel tim
        $query = "INSERT INTO `tim`(`nama_tim`) VALUES ('$name')";

        // Mengeksekusi query untuk menambahkan tim baru ke database
        return $this->execute($query);
    }

    function delete($id)
    {
        // Query untuk menghapus tim dari tabel tim berdasarkan id_tim
        $query = "DELETE FROM tim WHERE id_tim = '$id'";

        // Mengeksekusi query untuk menghapus tim berdasarkan ID
        return $this->execute($query);
    }

    function updateTim($id, $data)
    {
        $name = $data['name'];

        // Query untuk memperbarui nama tim di tabel tim berdasarkan id_tim
        $query = "UPDATE `tim` SET `nama_tim` ='$name' WHERE id_tim ='$id'";

        // Mengeksekusi query untuk memperbarui nama tim berdasarkan ID
        return $this->execute($query);
    }
}
