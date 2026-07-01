<?php
$toko_baju = [
    ["nama" => "Kaos Polos Hitam", "harga" => 50000, "stok" => 15],
    ["nama" => "Kemeja Flanel Kotak", "harga" => 120000, "stok" => 4],
    ["nama" => "Jaket Denim Blue", "harga" => 195000, "stok" => 0]
];

$ulang = true;



    echo "=== KATALOG TOKO BAJU CLI ===\n";
    
    foreach ($toko_baju as $baju) {
        echo "Nama  : " . $baju['nama'] . "\n";
        echo "Harga : Rp " . $baju['harga'] . "\n";
        echo "Stok  : " . $baju['stok'] . "\n";
        echo "-----------------------------\n";
    }
    
    $pilih = readline("\nPilih bajunya sob (1-3):");
    
    $pilih -= 1;
    
    if ($toko_baju[$pilih]["stok"] == 0){
        echo "maaf stok produk ini habis. sillahkan pilih produk lain...";
        exit;
    } elseif ($toko_baju[$pilih]["stok"] <= 5 && $toko_baju[$pilih]["stok"] > 0){
        echo "\nStok menipis!\n";
        
    }

    if ($toko_baju[$pilih]["harga"] > 100000){
        $total = 0.9 * $toko_baju[$pilih]["harga"];
        echo "Harga Baju setelah diskon: $total";
    }
    

