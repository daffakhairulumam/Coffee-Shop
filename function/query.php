<?php

require_once('../../config/database.php');

function saveUser()
{
    $Daffa_conn = connection();

    $Daffa_id = $_POST['id_user'];
    $Daffa_user = $_POST['username'];
    $Daffa_pass = md5($_POST['password']);
    $Daffa_nama = $_POST['nama_user'];
    $Daffa_hak = $_POST['hak'];
    $Daffa_telp = $_POST['telepon'];
    $Daffa_alamat = $_POST['alamat'];

    $Daffa_query = "INSERT INTO tuser (id_user, username, password, nama_user, hak, telepon, alamat) VALUES ('$Daffa_id', '$Daffa_user', '$Daffa_pass', '$Daffa_nama', '$Daffa_hak', '$Daffa_telp', '$Daffa_alamat')";
    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function updateUser($Daffa_data, $Daffa_idUser)
{
    $Daffa_conn = connection();

    $Daffa_user = $Daffa_data['username'];
    $Daffa_pass = md5($Daffa_data['password']);
    $Daffa_nama = $Daffa_data['nama_user'];
    $Daffa_hak = $Daffa_data['hak'];
    $Daffa_telp = $Daffa_data['telepon'];
    $Daffa_alamat = $Daffa_data['alamat'];

    $Daffa_query = "UPDATE tuser SET username = '$Daffa_user', password = '$Daffa_pass', nama_user = '$Daffa_nama', hak = '$Daffa_hak', telepon = '$Daffa_telp', alamat = '$Daffa_alamat' WHERE id_user = '$Daffa_idUser'";
    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function deleteUser($Daffa_idUser)
{
    $Daffa_conn = connection();

    $Daffa_query = "DELETE FROM tuser WHERE id_user = '$Daffa_idUser'";
    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function saveCategory($Daffa_data)
{
    $Daffa_conn = connection();
    $Daffa_kodeKategori = $Daffa_data['kode_kategori'];
    $Daffa_namaKategori = $Daffa_data['nama_kategori'];

    $Daffa_query = "INSERT INTO tkategori (kode_kategori, nama_kategori) VALUES ('$Daffa_kodeKategori', '$Daffa_namaKategori')";
    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function updateCategory($Daffa_data)
{
    $Daffa_conn = connection();
    $Daffa_id = $Daffa_data['id'];
    $Daffa_kodeKategori = $Daffa_data['kode_kategori'];
    $Daffa_namaKategori = $Daffa_data['nama_kategori'];

    $Daffa_query = "UPDATE tkategori SET kode_kategori = '$Daffa_kodeKategori', nama_kategori = '$Daffa_namaKategori' WHERE id = '$Daffa_id'";
    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function deleteCategory($Daffa_id)
{
    $Daffa_conn = connection();

    $Daffa_query = "DELETE FROM tkategori WHERE id = '$Daffa_id'";
    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function saveMeja()
{
    $Daffa_conn = connection();

    $Daffa_idMeja = $_POST['id_meja'];
    $Daffa_nomorMeja = $_POST['nomor_meja'];
    $Daffa_keterangan = $_POST['keterangan'];
    $Daffa_status = $_POST['status'];

    $Daffa_query = "INSERT INTO t_meja (id_meja, nomor_meja, keterangan, status) VALUES ('$Daffa_idMeja', '$Daffa_nomorMeja', '$Daffa_keterangan', '$Daffa_status')";

    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function updateMeja()
{
    $Daffa_conn = connection();

    $Daffa_idMeja = $_POST['id_meja'];
    $Daffa_nomorMeja = $_POST['nomor_meja'];
    $Daffa_keterangan = $_POST['keterangan'];
    $Daffa_status = $_POST['status'];

    $Daffa_query = "UPDATE t_meja SET nomor_meja = '$Daffa_nomorMeja', keterangan = '$Daffa_keterangan', status = '$Daffa_status' WHERE id_meja = '$Daffa_idMeja'";

    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function UpdateMejaa()
{
    $Daffa_conn = connection();

    $Daffa_idMeja = $_POST['id_meja'];
    $Daffa_status = $_POST['status'];

    $Daffa_query = "UPDATE t_meja SET status = '$Daffa_status' WHERE id_meja = '$Daffa_idMeja'";

    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function deleteMeja($Daffa_id)
{
    $Daffa_conn = connection();

    $Daffa_query = "DELETE FROM t_meja WHERE id_meja = '$Daffa_id'";

    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function saveMenu($Daffa_data)
{
    $Daffa_conn = connection();

    $Daffa_kodeMenu = $_POST['kode_menu'];
    $Daffa_gambar = $Daffa_data['gambar'];
    $Daffa_namaMenu = $_POST['nama_menu'];
    $Daffa_idKategori = $_POST['id_kategori'];
    $Daffa_deskripsi = $_POST['deskripsi'];
    $Daffa_stock = $_POST['stock'];
    $Daffa_harga = $_POST['harga'];

    $Daffa_query = "INSERT INTO t_menu (kode_menu, gambar, nama_menu, id_kategori, deskripsi, stock, harga) VALUES ('$Daffa_kodeMenu', '$Daffa_gambar', '$Daffa_namaMenu', '$Daffa_idKategori', '$Daffa_deskripsi', '$Daffa_stock', '$Daffa_harga')";
    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function updateMenu($Daffa_data, $Daffa_idMenu)
{
    $Daffa_conn = connection();

    $Daffa_kodeMenu = $_POST['kode_menu'];
    $Daffa_gambar = $Daffa_data['gambar'];
    $Daffa_namaMenu = $_POST['nama_menu'];
    $Daffa_idKategori = $_POST['id_kategori'];
    $Daffa_deskripsi = $_POST['deskripsi'];
    $Daffa_stock = $_POST['stock'];
    $Daffa_harga = $_POST['harga'];

    $Daffa_query = "UPDATE t_menu SET kode_menu = '$Daffa_kodeMenu', gambar = '$Daffa_gambar', nama_menu = '$Daffa_namaMenu', id_kategori = '$Daffa_idKategori', deskripsi = '$Daffa_deskripsi', stock = '$Daffa_stock', harga = '$Daffa_harga' WHERE id_menu = '$Daffa_idMenu'";
    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function deleteMenu($Daffa_id)
{
    $Daffa_conn = connection();

    $Daffa_query = "DELETE FROM t_menu WHERE id_menu = '$Daffa_id'";
    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function saveKeranjang($Daffa_data)
{
    $Daffa_conn = connection();

    $Daffa_idTransaksi = $Daffa_data['id_transaksi'];
    $Daffa_kodeMenu = $Daffa_data['kode_menu'];

    $Daffa_queryMenu = "SELECT * FROM t_menu WHERE kode_menu = '$Daffa_kodeMenu'";
    $Daffa_resultMenu = mysqli_query($Daffa_conn, $Daffa_queryMenu);

    $Daffa_menu = mysqli_fetch_array($Daffa_resultMenu);
    $Daffa_harga = $Daffa_menu['harga'];

    $Daffa_keranjang = "SELECT * FROM tkeranjang WHERE kode_menu = '$Daffa_kodeMenu' AND id_transaksi = '$Daffa_idTransaksi'";
    $Daffa_resultKeranjang = mysqli_query($Daffa_conn, $Daffa_keranjang);
    $Daffa_dataKeranjang = mysqli_fetch_array($Daffa_resultKeranjang);

    if ($Daffa_dataKeranjang) {
        if ($Daffa_menu['stock'] <= 0) {
            return false;
        } else {
            $Daffa_query = "UPDATE tkeranjang SET qty = qty + 1, total = total + $Daffa_harga WHERE id_transaksi = '$Daffa_idTransaksi' AND kode_menu = '$Daffa_kodeMenu'";
            $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

            $Daffa_queryUpdateMenu = "UPDATE t_menu SET stock = stock - 1 WHERE kode_menu = '$Daffa_kodeMenu'";
            $Daffa_resultUpdateMenu = mysqli_query($Daffa_conn, $Daffa_queryUpdateMenu);
        }
    } else {
        if ($Daffa_menu['stock'] <= 0) {
            return false;
        } else {
            $Daffa_query = "INSERT INTO tkeranjang (id_transaksi, kode_menu, qty, total) VALUES ('$Daffa_idTransaksi', '$Daffa_kodeMenu', 1, '$Daffa_harga')";
            $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

            $Daffa_queryUpdate = "UPDATE t_menu SET stock = stock - 1 WHERE kode_menu = '$Daffa_kodeMenu'";
            $Daffa_resultUpdate = mysqli_query($Daffa_conn, $Daffa_queryUpdate);
        }
    }

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function updateKeranjang($Daffa_data)
{
    $Daffa_conn = connection();

    $Daffa_id = $Daffa_data['id'];
    $Daffa_qty = $Daffa_data['qty'];

    $Daffa_query = "SELECT * FROM tkeranjang WHERE id = '$Daffa_id'";
    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);
    $Daffa_dataKeranjang = mysqli_fetch_array($Daffa_result);
    $Daffa_kodeMenu = $Daffa_dataKeranjang['kode_menu'];

    $Daffa_menu = "SELECT * FROM t_menu WHERE kode_menu = '$Daffa_kodeMenu'";
    $Daffa_resultMenu = mysqli_query($Daffa_conn, $Daffa_menu);
    $Daffa_dataMenu = mysqli_fetch_array($Daffa_resultMenu);

    $Daffa_harga = $Daffa_dataMenu['harga'];
    $Daffa_totalQty = $Daffa_dataKeranjang['qty'] + $Daffa_qty;

    if ($Daffa_dataMenu['stock'] < $Daffa_totalQty) {
        return false;
    } else {
        $Daffa_query = "UPDATE tkeranjang SET qty = '$Daffa_totalQty', total = '$Daffa_totalQty' * '$Daffa_harga' WHERE kode_menu = '$Daffa_kodeMenu' AND id = '$Daffa_id'";
        $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

        $Daffa_queryUpdateMenu = "UPDATE t_menu SET stock = stock - $Daffa_qty WHERE kode_menu = '$Daffa_kodeMenu'";
        $Daffa_resultUpdateMenu = mysqli_query($Daffa_conn, $Daffa_queryUpdateMenu);
    }

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function deleteKeranjang($Daffa_id)
{
    $Daffa_conn = connection();

    $Daffa_queryGetKeranjang = "SELECT * FROM tkeranjang WHERE id = '$Daffa_id'";
    $Daffa_resultGetKeranjang = mysqli_query($Daffa_conn, $Daffa_queryGetKeranjang);
    $Daffa_dataKeranjang = mysqli_fetch_array($Daffa_resultGetKeranjang);

    $Daffa_kodeMenu = $Daffa_dataKeranjang['kode_menu'];
    $Daffa_qty = $Daffa_dataKeranjang['qty'];

    $Daffa_queryUpdateMenu = "UPDATE t_menu SET stock = stock + $Daffa_qty WHERE kode_menu = '$Daffa_kodeMenu'";
    $Daffa_resultUpdateMenu = mysqli_query($Daffa_conn, $Daffa_queryUpdateMenu);

    $Daffa_query = "DELETE FROM tkeranjang WHERE id = '$Daffa_id'";
    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function updateStock($Daffa_kodeMenu, $Daffa_qty)
{
    $Daffa_conn = connection();

    $Daffa_query = "UPDATE t_menu SET stock = stock - '$Daffa_qty'  WHERE kode_menu = '$Daffa_kodeMenu'";
    $Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

    if ($Daffa_result) {
        return true;
    } else {
        return false;
    }
}

function saveTransaksi($Daffa_data)
{
    $Daffa_conn = connection();

    $Daffa_idTransaksi = $Daffa_data['id_transaksi'];
    $Daffa_idUser = $Daffa_data['id_user'];
    $Daffa_total = $_POST['total'];
    $Daffa_bayar = $_POST['bayar'];
    $Daffa_jenisPesanan = $_POST['jenis_pesanan'];

    // Dapatkan keranjang terlebih dahulu
    $Daffa_keranjangQuery = "SELECT * FROM tkeranjang WHERE id_transaksi = '$Daffa_idTransaksi'";
    $Daffa_resultKeranjang = mysqli_query($Daffa_conn, $Daffa_keranjangQuery);

    // Periksa jenis pesanan
    if ($Daffa_jenisPesanan == 'Take Away') {
        // Untuk Take Away, kita butuh ID meja dummy dari database
        // Kita bisa menggunakan meja yang tersedia pertama atau membuat meja khusus untuk Take Away
        // Ambil satu meja yang tersedia (ini hanya untuk memenuhi foreign key constraint)
        $Daffa_queryFindMeja = "SELECT id_meja FROM t_meja WHERE status = 'Tersedia' LIMIT 1";
        $Daffa_resultMeja = mysqli_query($Daffa_conn, $Daffa_queryFindMeja);

        if (mysqli_num_rows($Daffa_resultMeja) > 0) {
            $Daffa_meja = mysqli_fetch_assoc($Daffa_resultMeja);
            $Daffa_idMeja = $Daffa_meja['id_meja'];
        } else {
            // Jika tidak ada meja tersedia, gunakan ID meja yang valid dari database
            $Daffa_queryAnyMeja = "SELECT id_meja FROM t_meja LIMIT 1";
            $Daffa_resultAnyMeja = mysqli_query($Daffa_conn, $Daffa_queryAnyMeja);
            $Daffa_anyMeja = mysqli_fetch_assoc($Daffa_resultAnyMeja);
            $Daffa_idMeja = $Daffa_anyMeja['id_meja'];
        }
    } else {
        // Untuk Dine In, gunakan ID meja yang dipilih
        $Daffa_idMeja = $Daffa_data['id_meja'];
    }

    // Insert ke tabel transaksi
    $Daffa_queryTransaksi = "INSERT INTO th_transaksi (id_transaksi, id_meja, id_user, total_bayar, jumlah_bayar, jenis_pesanan, tgl_transaksi) VALUES ('$Daffa_idTransaksi', '$Daffa_idMeja', '$Daffa_idUser', '$Daffa_total', '$Daffa_bayar', '$Daffa_jenisPesanan', now())";
    $Daffa_resultTransaksi = mysqli_query($Daffa_conn, $Daffa_queryTransaksi);

    if (!$Daffa_resultTransaksi) {
        return false;
    }

    $Daffa_allSuccess = true;

    foreach (mysqli_fetch_all($Daffa_resultKeranjang, MYSQLI_ASSOC) as $Daffa_value) {
        $Daffa_idTransaksiDetail = $Daffa_value['id_transaksi'];
        $Daffa_qty = $Daffa_value['qty'];
        $Daffa_kodeMenu = $Daffa_value['kode_menu'];
        $Daffa_subTotal = $Daffa_value['total'];

        $Daffa_checkMenuQuery = "SELECT id_menu, harga FROM t_menu WHERE kode_menu = '$Daffa_kodeMenu'";
        $Daffa_checkMenuResult = mysqli_query($Daffa_conn, $Daffa_checkMenuQuery);

        if (mysqli_num_rows($Daffa_checkMenuResult) > 0) {
            $Daffa_menuData = mysqli_fetch_assoc($Daffa_checkMenuResult);
            $Daffa_idMenu = $Daffa_menuData['id_menu'];
            $Daffa_harga = $Daffa_menuData['harga'];

            $Daffa_queryRiwayat = "INSERT INTO td_transaksi (id_transaksi, id_menu, jumlah, harga, subtotal) VALUES ('$Daffa_idTransaksiDetail', '$Daffa_idMenu', '$Daffa_qty', '$Daffa_harga', '$Daffa_subTotal')";
            $Daffa_resultRiwayat = mysqli_query($Daffa_conn, $Daffa_queryRiwayat);

            if ($Daffa_resultRiwayat) {
                updateStock($Daffa_kodeMenu, $Daffa_qty);
                deleteKeranjang($Daffa_value['id']);
            } else {
                $Daffa_allSuccess = false;
                break;
            }
        } else {
            $Daffa_allSuccess = false;
            break;
        }
    }

    // Hanya update status meja jika pesanan Dine In
    if ($Daffa_allSuccess && $Daffa_jenisPesanan == 'Dine In') {
        $Daffa_updateMejaQuery = "UPDATE t_meja SET status = 'Tidak Tersedia' WHERE id_meja = '$Daffa_idMeja'";
        mysqli_query($Daffa_conn, $Daffa_updateMejaQuery);
    }

    return $Daffa_allSuccess;
}
