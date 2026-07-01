<?php

// item
$lapangan = ["Matras", "Rumput Sintetis", "Vinyl"];
$harga = [80000, 100000, 120000];

// penyimpanan sementara
$keranjang = [];
$grand_total = 0;


echo "==== MASUKAN NAMA ==== \n";
$nama = readline("Nama: ");

$repeat = true;
while($nama != "" && $repeat == true){
    echo "==== MENU UTAMA ===== \n 1. $lapangan[0] ($harga[0]/jam) \n 2. $lapangan[1] ($harga[1]/jam) \n 3. $lapangan[2] ($harga[2]/jam) \n4. Keluar \n";
    $pilihan = readline("Pilih Tujuan (cnth: 1): ");

    if ($pilihan == 4){
        echo "\nKeluar...\n\n";
        exit;
    }

    if ($pilihan <= 0 || $pilihan > 4 || !is_numeric($pilihan)){
        echo "\nKesalahan input, ulangi....\n\n";
        continue;
    }

    while (true){

        $index = $pilihan - 1;
        echo "\n==== ATUR JAM ====\n";
        echo "Jenis Lapangan: $lapangan[$index] ($harga[$index]/Jam)\n";
        $jam =readline("Berapa jam (ketik 0 untuk kembali): ");
    
        if($jam < 0 || !is_numeric($jam) || $jam > 24){
            echo "\nKesalahan input, ulangi...\n\n";
            continue;
        }else if ($jam == 0){
            echo "\n";
            continue 2;
        }

        break;
    }

    $total = $harga[$index] * $jam;
    $grand_total += $total; 
    $keranjang[] = "$lapangan[$index] ($harga[$index]): $total ($jam Jam)";

    echo "\n==== DETAIL HARGA ====\n";
    echo "# $lapangan[$index] ($harga[$index]/Jam): $total ($jam Jam)\n\n";

    while(true){
        echo "==== AKSI LANJUTAN =====\n";
        echo "1. Tambah Boking Lapangan \n2. Selesai\n";
        $aksi = readline("Aksi (cnth: 1): ");
    
        if ($aksi < 1 || $aksi > 2 || !is_numeric($aksi)){
            echo "\nKesalahan input, ulangi...\n\n";
            continue;
        }

        break;
    }

    if ($aksi == 2){
        break;
    } else {
        echo "\nPilihan Anda: Pesan lagi...\n\n";
        continue;
    }
}

// struk Akhir
echo "\n=========================================";
echo "\n====     NOTA SEWA KICKOFF FUTSAL    ====";
echo "\n=========================================";
echo "\nNama Pelanggan : " . $nama;
echo "\n-----------------------------------------";
echo "\nDetail Pesanan :";

if (count($keranjang) > 0) {
    foreach ($keranjang as $item) {
        echo "\n - " . $item;
    }
} else {
    echo "\n Belum ada menu yang dipesan.";
}

echo "\n-----------------------------------------";
echo "\nTotal yang harus dibayar : Rp" . $grand_total;
echo "\n=========================================";
echo "\nTerimakasih sudah mampir, " . $nama . "!\n\n";

