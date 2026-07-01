    <?php

    $jenis = ["Kali", "Tambah", "Bagi", "Kurang"];
    $total_menu = count($jenis);
    $ulang = true;

    while ($ulang){
        echo "=== KALKULATOR ===";
        foreach ($jenis as $index => $a){
            echo "\n" . ($index + 1) . ". $a";
        }

        echo "\n0. Keluar";
            
        echo "\nPilih Menu (0 - $total_menu): ";
        $pilih = readline();

        if ($pilih < 0 || $pilih > $total_menu || !is_numeric($pilih) || $pilih == ""){
            echo "\nkesalahan input...\n\n";
            continue;
        } else if ($pilih == 0){
            echo "Terimakasih\nKELUAR...";
            exit;
        }

        echo "\nMasukkan angka pertama: ";
        $a = readline();
        echo "Masukkan angka kedua: ";
        $b = readline();

        $hasil = match ((int)$pilih) {
            1 => $a * $b,
            2 => $a + $b,
            3 => ($b != 0) ? $a / $b : "Error: Gabisa bagi nol!",
            4 => $a - $b,
            default => "Menu ga valid"
        };

        echo "\nHasilnya: $hasil\n\n";

        echo "Klik ENTER untuk lanjut\n";
        $enter = readline();
        

    }

