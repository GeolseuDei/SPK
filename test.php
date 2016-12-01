<?php
$username = "root";
$password = "";
$server = "localhost";
$dbase = "spk";

$conn = mysqli_connect($server, $username, $password);
$database = mysqli_select_db($conn, $dbase);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TEST</title>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        $wakses = 50;
        $wcuaca = 50;
        $wwisatalain = 50;
        $wling = 50;
        $wbiaya = 50;
        $totalw = $wakses + $wcuaca + $wwisatalain + $wling + $wbiaya;

        $bobotnormal[0] = ($wakses / $totalw) * 100;
        $bobotnormal[1] = ($wling / $totalw) * 100;
        $bobotnormal[2] = ($wwisatalain / $totalw) * 100;
        $bobotnormal[3] = ($wcuaca / $totalw) * 100;
        $bobotnormal[4] = ($wbiaya / $totalw) * 100;
        $totalwn = $bobotnormal[0] + $bobotnormal[1] + $bobotnormal[2] + $bobotnormal[3] + $bobotnormal[4];

        for ($i = 0; $i < 5; $i++) {
            echo "bobot normal : " . $bobotnormal[$i];
        }
        $query = "SELECT * FROM datawisata";
        $result = mysqli_query($conn, $query);
        $counter = 0;

        //input data ke array
        while ($row = mysqli_fetch_object($result)) {
//            echo $row->aksesibilitas;
            ${"wisata" . $counter} = array($row->aksesibilitas, $row->kondisi_lingkungan, $row->hub_dgn_wisata_lain, $row->kondisi_cuaca, $row->biaya);
            $counter++;
        }


        //hitung tabel 2 = tabel1 kuadrat
        $counter2 = 0;
        while ($counter2 != $counter) {
            echo ${"wisata" . $counter2}[0];
            $counter21 = 0;
            while ($counter21 < 5) {
//                echo $counter21;
                $data = ${"wisata" . $counter2}[$counter21];
                echo 'sebelum kuadrat : ' . $data;
                $data = $data * $data;
                ${"wisatakuadrat" . $counter2}[$counter21] = $data;
                echo "KUADRAT : " . ${"wisatakuadrat" . $counter2}[$counter21];
                $counter21++;
            }
            $counter2++;
        }
        ?>
        <div>asdas</div>
        <?php
        //hitung total dari tabel 2
        $counter3 = 0;
        while ($counter3 < 5) {
            $counter31 = 0;
            $data = 0;
            while ($counter31 != $counter) {
                $data+=${"wisatakuadrat" . $counter31}[$counter3];
                $counter31++;
            }
            $totalwisatakuadrat[$counter3] = $data;
            echo "total kuadrat : " . $totalwisatakuadrat[$counter3];
            $counter3++;
        }
        ?>
        <div>adsadas</div>
        <?php
        //hitung akar tabel 2
        $counter4 = 0;
        while ($counter4 < 5) {
            $akartotalwisatakuadrat[$counter4] = sqrt($totalwisatakuadrat[$counter4]);
            echo "akar" . $akartotalwisatakuadrat[$counter4] . "\n";
            $counter4++;
        }
        ?>
        <div>asdsdsa</div>
        <?php
//        menghitung tabel matrix R ij
        $counter5 = 0;
        while ($counter5 < 5) {
            $counter51 = 0;
            while ($counter51 != $counter) {
                $data = ${"wisata" . $counter51}[$counter5] / $akartotalwisatakuadrat[$counter5];
                ${"matriksrij" . $counter51}[$counter5] = $data;
                echo "tabel r ij :" . $data;
                $counter51++;
            }
            $counter5++;
        }
        ?>
        <div>TABEL VIJ</div>
        <?php
        //menghitung tabel v ij
        $counter6 = 0;
        while ($counter6 < 5) {
            $counter61 = 0;
            while ($counter61 != $counter) {
                $data = ${"matriksrij" . $counter61}[$counter6] * $bobotnormal[$counter6];
                echo "Matrik VIJ : " . $data;
                ${"matriksvij" . $counter61}[$counter6] = $data;
                $counter61++;
            }
            $counter6++;
        }
        ?>
        <div>A MAX</div>
        <?php
        $counter7 = 0;
        while ($counter7 < 4) {
            $counter71 = 0;
            $data = 0;
            while ($counter71 != $counter) {
                if (${"matriksvij" . $counter71}[$counter7] > $data) {
                    $data = ${"matriksvij" . $counter71}[$counter7];
                }
                $amax[$counter7] = $data;
                $counter71++;
            }
            echo "AMAX : " . $amax[$counter7];
            $counter7++;
        }
        $counter71 = 0;
        $data = 999999;
        while ($counter71 != $counter) {
            if (${"matriksvij" . $counter71}[4] < $data) {
                $data = ${"matriksvij" . $counter71}[4];
            }
            $amax[4] = $data;
            $counter71++;
        }
        echo "AMAX : " . $amax[4];
        ?>
        <div>A MIN</div>
        <?php
        $counter8 = 0;
        while ($counter8 < 4) {
            $counter81 = 0;
            $data = 9999999999;
            while ($counter81 != $counter) {
                if (${"matriksvij" . $counter81}[$counter8] < $data) {
                    $data = ${"matriksvij" . $counter81}[$counter8];
                }
                $counter81++;
            }
            $amin[$counter8] = $data;
            echo "AMIN : " . $amin[$counter8];
            $counter8++;
        }
        $counter81 = 0;
        $data = 0;
        while ($counter81 != $counter) {
            if (${"matriksvij" . $counter81}[4] > $data) {
                $data = ${"matriksvij" . $counter81}[4];
            }
            $counter81++;
        }
        $amin[4] = $data;
        echo "AMIN : " . $amin[4];
        ?>

        <div>MATRIKS MAX</div>
        <?php
        $counter9 = 0;
        while ($counter9 < 5) {
            $counter91 = 0;
            while ($counter91 != $counter) {
                $data = 0;
                $a = ${"matriksvij" . $counter91}[$counter9];
                $data = ($a - $amax[$counter9]);
                $data = $data * $data;
                ${"tabelmaks" . $counter91}[$counter9] = $data;
                echo "matriks maks : " . $data;
                $counter91++;
            }
            $counter9++;
        }
        ?>
        <div>MATRIKS MIN</div>
        <?php
        $counter10 = 0;
        while ($counter10 < 5) {
            $counter101 = 0;
            while ($counter101 != $counter) {
                $data = 0;
                $a = ${"matriksvij" . $counter101}[$counter10];
                $data = ($a - $amin[$counter10]);
                $data = $data * $data;
                ${"tabelmin" . $counter101}[$counter10] = $data;
                echo "matriks min : " . $data;
                $counter101++;
            }
            $counter10++;
        }
        ?>

        <div>SMAKS</div>
        <?php
        $counter11 = 0;
        while ($counter11 != $counter) {
            $counter111 = 0;
            $data = 0;
            while ($counter111 < 5) {
                echo ${"tabelmaks" . $counter11}[$counter111] . "+";
                $data+=${"tabelmaks" . $counter11}[$counter111];
                $counter111++;
            }
            echo "break";
            $data = sqrt($data);
            echo "jawaban : " . $data;
            $smaks[$counter11] = $data;
            $counter11++;
        }
        ?>
        <div>SMINS</div>
        <?php
        $counter12 = 0;
        while ($counter12 != $counter) {
            $counter121 = 0;
            $data = 0;
            while ($counter121 < 5) {
                $data+=${"tabelmin" . $counter12}[$counter121];
                $counter121++;
            }
            $data = sqrt($data);
            echo "smins : " . $data;
            $smins[$counter12] = $data;
            $counter12++;
        }
        ?>
        <div>FINAL ROUND</div>
        <?php
        $query = "SELECT * FROM datawisata";
        $result = mysqli_query($conn, $query);
        $counter13=0;
        while ($row = mysqli_fetch_object($result)) {
            $data = $smins[$counter13] / ($smaks[$counter13] + $smins[$counter13]);
            echo "FINAL : " . $data;
            $hasilakhir["$row->nama"] = $data;
            $counter13++;
        }
        ?>

        <div>URUTAN</div>
        <?php
        arsort($hasilakhir);
        foreach ($hasilakhir as $x => $x_value){
            echo "Lokasi : ".$x. " Nilai : ".$x_value;
        }
//        $counter14 = 0;
//        while ($counter14 != $counter) {
//            $hasilakhir[$counter14];
//        }
        ?>
    </body>
</html>
