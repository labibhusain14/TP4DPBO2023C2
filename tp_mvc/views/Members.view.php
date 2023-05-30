<?php
class MembersView
{
    public function render($data)
    {
        $no = 1; // Variabel untuk mengatur nomor urut pada tabel
        $dataMembers = null; // Variabel untuk menyimpan data anggota dalam bentuk HTML
        $dataJudul = null; // Variabel untuk menyimpan judul kolom tabel

        // Membuat judul kolom tabel
        $dataJudul .= "                <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>JOINING DATE</th>
        <th>TIM</th>
        <th>PERUSAHAAN</th>
        <th>ACTIONS</th>
    </tr>";

        // Mengolah data anggota menjadi baris-baris tabel
        foreach ($data['members'] as $val) {
            list($id, $name, $email, $phone, $join_date, $tim_id, $company_id) = $val;
            $dataMembers .=       "<tr>
            <th>" . $no++ . "</th>
            <td>" . $name . "</td>
            <td>" . $email . "</td>
            <td>" . $phone . "</td>
            <td>" . $join_date . "</td>
            <td>" . $tim_id . "</td>
            <td>" . $company_id . "</td>
            <td>
                <a href='index.php?id_edit=" . $id .  "' class='btn btn-success'>Edit</a>
                <a href='index.php?id_hapus=" . $id .  "' class='btn btn-danger'>Delete</a>
            </td>
          </tr>
          ";
        }

        // Membuat objek Template untuk halaman utama
        $index = new Template("templates/index.html");

        // Mengganti placeholder pada template dengan data yang sudah diolah
        $index->replace("DATA_TABEL", $dataMembers);
        $index->replace("DATA_PAGE_1", "active");
        $index->replace("DATA_JUDUL", $dataJudul);
        $index->replace("DATA_LINK", "index.php?add_members=1");

        // Menampilkan halaman utama
        $index->write();
    }

    public function formAdd($data)
    {
        $data_tim = "";
        foreach ($data['tim'] as [$id, $nama]) {
            $data_tim .= "<option value='" . $id . "'>" . $nama . "</option>";
        }

        $data_company = "";
        foreach ($data['company'] as [$id, $nama]) {
            $data_company .= "<option value='" . $id . "'>" . $nama . "</option>";
        }

        // Membuat objek Template untuk form penambahan anggota
        $formAdd = new Template("templates/form.html");

        // Mengganti placeholder pada template dengan data yang sudah diolah
        $formAdd->replace("COLOR", "primary");
        $formAdd->replace("FORM", "add");
        $formAdd->replace("DATA_TITLE", "Create New");
        $formAdd->replace("DATA_PAGE_1", "active");
        $formAdd->replace("DATA_TIM", $data_tim);
        $formAdd->replace("DATA_COMPANY", $data_company);

        // Menampilkan form penambahan anggota
        $formAdd->write();
    }

    public function formUpdate($data)
    {
        $data_tim = "";
        $data_company = "";
        $formUpdate = new Template("templates/form.html");

        foreach ($data['members'] as $val) {
            list($id, $name, $email, $phone, $join_date, $tim_id, $company_id) = $val;
            $formUpdate->replace("DATA_NAME", $name);
            $formUpdate->replace("DATA_EMAIL", $email);
            $formUpdate->replace("DATA_PHONE", $phone);
            $formUpdate->replace("DATA_DATE", $join_date);
        }

        foreach ($data['tim'] as $val) {
            list($id, $nama) = $val;
            $selected = ($id == $tim_id) ? "selected" : "";
            $data_tim .= "<option $selected value='$id'>$nama</option>";
        }

        foreach ($data['company'] as $val) {
            list($id, $nama) = $val;
            $selected = ($id == $company_id) ? "selected" : "";
            $data_company .= "<option $selected value='$id'>$nama</option>";
        }

        $formUpdate->replace("COLOR", "warning");
        $formUpdate->replace("FORM", "update");
        $formUpdate->replace("DATA_TITLE", "Update");
        $formUpdate->replace("DATA_PAGE_1", "active");
        $formUpdate->replace("DATA_TIM", $data_tim);
        $formUpdate->replace("DATA_COMPANY", $data_company);

        // Menampilkan form pembaruan anggota
        $formUpdate->write();
    }
}
