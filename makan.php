<?php

$makanan = ["Nasi uduk", "Nasi Goreng", "Nasi Bakar"];
$harga = [10000, 12000, 11000];

echo "== Masukin nama == \n";
$nama = readline("Nama: ");

// Siapin keranjang kosong di luar
$keranjang = []; 
$grand_total = 0;

$repeat = true;

while ($repeat == true && $nama != "") {

    // 1. TAMPILIN MENU UTAMA
    echo "\n==== MENU UTAMA ====\nHalo $nama, Selamat datang di Warung Suka Kita!\n";
    echo " 1. $makanan[0] (Rp $harga[0])\n 2. $makanan[1] (Rp $harga[1])\n 3. $makanan[2] (Rp $harga[2])\n 4. Selesai & Cetak Struk\n";
    $pilihan = readline("Silahkan dipilih menunya (1-4): ");

    // 2. JIKA USER MAU KELUAR / SELESAI
    if ($pilihan == 4) {
        break; 
    }

    // 3. VALIDASI INPUT SALAH
    if ($pilihan < 1 || $pilihan > 4 || !is_numeric($pilihan)) {
        echo "Pilihan ngaco, Bro! Silahkan ulangi.\n";
        continue; // Balik ke menu utama
    }

    // 4. INPUT PORSI
    $index = $pilihan - 1;
    echo "\nMenu yang dipilih: $makanan[$index]\n";
    $porsi = readline("Mau beli berapa porsi? ");

    if ($porsi <= 0 || !is_numeric($porsi)) {
        echo "Porsi ga valid! Pembatalan menu.\n";
        continue;
    }

    $subtotal = $porsi * $harga[$index];

    // 5. MASUKIN KEDALAM STRUKTUR DATA KERANJANG
    // Formatnya: "Nama Makanan (X porsi) = Rp Y"
    $keranjang[] = "$makanan[$index] ($porsi porsi) = Rp $subtotal";
    $grand_total += $subtotal;

    echo "\nBerhasil menambahkan $porsi porsi $makanan[$index] ke keranjang.\n";
    
    // 6. TANYA MAU TAMBAH MENU LAGI APA ENGGAK
    echo "\nMau tambah menu makanan yang lain? (ya/tidak): ";
    $tanya = strtolower(readline());
    if ($tanya != "ya" && $tanya != "iya" && $tanya != "y") {
        $repeat = false;
    }
}

// 7. CETAK STRUK AKHIR (DI LUAR WHILE)
echo "\n==========================================";
echo "\n====          NOTA PEMBAYARAN         ====";
echo "\n==========================================";
echo "\nNama Pelanggan : " . $nama;
echo "\n------------------------------------------";
echo "\nDetail Pesanan :";

if (count($keranjang) > 0) {
    foreach ($keranjang as $item) {
        echo "\n - " . $item;
    }
} else {
    echo "\n Belum ada menu yang dipesan.";
}

echo "\n------------------------------------------";
echo "\nTotal yang harus dibayar : Rp" . $grand_total;
echo "\n==========================================";
echo "\nTerimakasih sudah mampir, " . $nama . "!\n\n";