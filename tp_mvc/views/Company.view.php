<?php

class CompanyView
{
    public function render($data)
    {
        $no = 1;
        $datacompany = null;
        $dataJudul = null;

        // Membuat judul kolom tabel
        $dataJudul .= "                <tr>
        <th>ID</th>
        <th>DAFTAR PERUSAHAAN</th>
        <th>ACTIONS</th>
    </tr>";

        // Mengisi data perusahaan ke dalam tabel
        foreach ($data['company'] as $val) {
            list($id, $name) = $val;

            // Mengisi baris tabel dengan data perusahaan
            $datacompany .=       "<tr>
            <th>" . $no++ . "</th>
            <td>" . $name . "</td>
            <td>
                <a href='company.php?id_edit=" . $id .  "' class='btn btn-success'>Edit</a>
                <a href='company.php?id_hapus=" . $id .  "' class='btn btn-danger'>Delete</a>
            </td>
          </tr>
          ";
        }

        // Mengganti placeholder pada template dengan data yang telah dibuat
        $index = new Template("templates/index.html");
        $index->replace("DATA_TABEL", $datacompany);
        $index->replace("DATA_PAGE_3", "active");
        $index->replace("DATA_JUDUL", $dataJudul);
        $index->replace("DATA_LINK", "company.php?add_company=1");
        $index->write();
    }

    public function formAdd($data)
    {
        // Mengganti placeholder pada template dengan data yang telah dibuat
        $formAdd = new Template("templates/form2.html");
        $formAdd->replace("COLOR", "primary");
        $formAdd->replace("FORM", "add");
        $formAdd->replace("DATA_TITLE", "Create New");
        $formAdd->replace("DATA_TABLE", "Company");
        $formAdd->replace("DATA_PAGE_3", "active");
        $formAdd->write();
    }

    public function formUpdate($data)
    {
        // Mengganti placeholder pada template dengan data yang telah dibuat
        $formUpdate = new Template("templates/form2.html");

        foreach ($data['company'] as $val) {
            list($id, $name) = $val;
            $formUpdate->replace("DATA_NAME", $name);
        }

        $formUpdate->replace("DATA_PAGE_3", "active");
        $formUpdate->replace("COLOR", "warning");
        $formUpdate->replace("FORM", "update");
        $formUpdate->replace("DATA_TITLE", "Update");
        $formUpdate->replace("DATA_TABLE", "Company");
        $formUpdate->write();
    }
}
