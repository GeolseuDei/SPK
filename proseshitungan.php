<?php

session_start();
$username = "root";
$password = "";
$server = "localhost";
$dbase = "spk";

$conn = mysqli_connect($server, $username, $password);
$database = mysqli_select_db($conn, $dbase);

unset($_SESSION['hasilakhir']);

//$_SESSION["akses"]=50;
//$_SESSION["cuaca"]=50;
//$_SESSION["wisatalain"]=50;
//$_SESSION["ling"]=50;
//$_SESSION["biaya"]=50;
$_SESSION["akses"] = $_POST["iakses"];
$_SESSION["cuaca"] = $_POST["icuaca"];
$_SESSION["wisatalain"] = $_POST["iwisatalain"];
$_SESSION["ling"] = $_POST["iling"];
$_SESSION["biaya"] = $_POST["ibiaya"];

$_SESSION["totalw"] = $_SESSION["akses"] + $_SESSION["cuaca"] + $_SESSION["wisatalain"] + $_SESSION["ling"] + $_SESSION["biaya"];

$wakses = $_SESSION['akses'];
$wcuaca = $_SESSION['cuaca'];
$wwisatalain = $_SESSION['wisatalain'];
$wling = $_SESSION['ling'];
$wbiaya = $_SESSION['biaya'];

$_SESSION['bobotnormal'][0] = ($wakses / $_SESSION['totalw']) * 100;
$_SESSION['bobotnormal'][1] = ($wling / $_SESSION['totalw']) * 100;
$_SESSION['bobotnormal'][2] = ($wwisatalain / $_SESSION['totalw']) * 100;
$_SESSION['bobotnormal'][3] = ($wcuaca / $_SESSION['totalw']) * 100;
$_SESSION['bobotnormal'][4] = ($wbiaya / $_SESSION['totalw']) * 100;
$_SESSION['totalwn'] = $_SESSION['bobotnormal'][0] + $_SESSION['bobotnormal'][1] + $_SESSION['bobotnormal'][2] + $_SESSION['bobotnormal'][3] + $_SESSION['bobotnormal'][4];

for ($i = 0; $i < 5; $i++) {
    echo "bobot normal : " . $_SESSION['bobotnormal'][$i];
}

$counter = 0;
foreach ($_SESSION['selected'] as $id) {
    $query = "SELECT * FROM datawisata where id = $id";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_object($result)) {
        ${"wisata" . $counter} = array($row->aksesibilitas, $row->kondisi_lingkungan, $row->hub_dgn_wisata_lain, $row->kondisi_cuaca, $row->biaya);
        $counter++;
    }
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
        $_SESSION["wisatakuadrat" . $counter2][$counter21] = $data;
        echo "KUADRAT : " . $_SESSION["wisatakuadrat" . $counter2][$counter21];
        $counter21++;
    }
    $counter2++;
}

$counter3 = 0;
while ($counter3 < 5) {
    $counter31 = 0;
    $data = 0;
    while ($counter31 != $counter) {
        $data+=$_SESSION["wisatakuadrat" . $counter31][$counter3];
        $counter31++;
    }
    $_SESSION['totalwisatakuadrat'][$counter3] = $data;
    echo "total kuadrat : " . $_SESSION['totalwisatakuadrat'][$counter3];
    $counter3++;
}

$counter4 = 0;
while ($counter4 < 5) {
    $_SESSION['akartotalwisatakuadrat'][$counter4] = sqrt($_SESSION['totalwisatakuadrat'][$counter4]);
    echo "akar" . $_SESSION['akartotalwisatakuadrat'][$counter4] . "\n";
    $counter4++;
}

$counter5 = 0;
while ($counter5 < 5) {
    $counter51 = 0;
    while ($counter51 != $counter) {
        $data = ${"wisata" . $counter51}[$counter5] / $_SESSION['akartotalwisatakuadrat'][$counter5];
        $_SESSION["matriksrij" . $counter51][$counter5] = $data;
        echo "tabel r ij :" . $data;
        $counter51++;
    }
    $counter5++;
}

$counter6 = 0;
while ($counter6 < 5) {
    $counter61 = 0;
    while ($counter61 != $counter) {
        $data = $_SESSION["matriksrij" . $counter61][$counter6] * $_SESSION['bobotnormal'][$counter6];
        echo "Matrik VIJ : " . $data;
        $_SESSION["matriksvij" . $counter61][$counter6] = $data;
        $counter61++;
    }
    $counter6++;
}

$counter7 = 0;
while ($counter7 < 4) {
    $counter71 = 0;
    $data = 0;
    while ($counter71 != $counter) {
        if ($_SESSION["matriksvij" . $counter71][$counter7] > $data) {
            $data = $_SESSION["matriksvij" . $counter71][$counter7];
        }
        $_SESSION['amax'][$counter7] = $data;
        $counter71++;
    }
    echo "AMAX : " . $_SESSION['amax'][$counter7];
    $counter7++;
}
$counter71 = 0;
$data = 999999;
while ($counter71 != $counter) {
    if ($_SESSION["matriksvij" . $counter71][4] < $data) {
        $data = $_SESSION["matriksvij" . $counter71][4];
    }
    $_SESSION['amax'][4] = $data;
    $counter71++;
}
echo "AMAX : " . $_SESSION['amax'][4];

$counter8 = 0;
while ($counter8 < 4) {
    $counter81 = 0;
    $data = 9999999999;
    while ($counter81 != $counter) {
        if ($_SESSION["matriksvij" . $counter81][$counter8] < $data) {
            $data = $_SESSION["matriksvij" . $counter81][$counter8];
        }
        $counter81++;
    }
    $_SESSION['amin'][$counter8] = $data;
    echo "AMIN : " . $_SESSION['amin'][$counter8];
    $counter8++;
}
$counter81 = 0;
$data = 0;
while ($counter81 != $counter) {
    if ($_SESSION["matriksvij" . $counter81][4] > $data) {
        $data = $_SESSION["matriksvij" . $counter81][4];
    }
    $counter81++;
}
$_SESSION['amin'][4] = $data;
echo "AMIN : " . $_SESSION['amin'][4];

$counter9 = 0;
while ($counter9 < 5) {
    $counter91 = 0;
    while ($counter91 != $counter) {
        $data = 0;
        $a = $_SESSION["matriksvij" . $counter91][$counter9];
        $data = ($a - $_SESSION['amax'][$counter9]);
        $data = $data * $data;
        $_SESSION["tabelmaks" . $counter91][$counter9] = $data;
        echo "matriks maks : " . $data;
        $counter91++;
    }
    $counter9++;
}

$counter10 = 0;
while ($counter10 < 5) {
    $counter101 = 0;
    while ($counter101 != $counter) {
        $data = 0;
        $a = $_SESSION["matriksvij" . $counter101][$counter10];
        $data = ($a - $_SESSION['amin'][$counter10]);
        $data = $data * $data;
        $_SESSION["tabelmin" . $counter101][$counter10] = $data;
        echo "matriks min : " . $data;
        $counter101++;
    }
    $counter10++;
}

$counter11 = 0;
while ($counter11 != $counter) {
    $counter111 = 0;
    $data = 0;
    while ($counter111 < 5) {
        echo $_SESSION["tabelmaks" . $counter11][$counter111] . "+";
        $data+=$_SESSION["tabelmaks" . $counter11][$counter111];
        $counter111++;
    }
    echo "break";
    $data = sqrt($data);
    echo "jawaban : " . $data;
    $_SESSION['smaks'][$counter11] = $data;
    $counter11++;
}

$counter12 = 0;
while ($counter12 != $counter) {
    $counter121 = 0;
    $data = 0;
    while ($counter121 < 5) {
        $data+=$_SESSION["tabelmin" . $counter12][$counter121];
        $counter121++;
    }
    $data = sqrt($data);
    echo "smins : " . $data;
    $_SESSION['smins'][$counter12] = $data;
    $counter12++;
}
foreach ($_SESSION['selected'] as $id) {
    $query = "SELECT * FROM datawisata where id=$id";
    $result = mysqli_query($conn, $query);
    $counter13 = 0;
    while ($row = mysqli_fetch_object($result)) {
        $data = $_SESSION['smins'][$counter13] / ($_SESSION['smaks'][$counter13] + $_SESSION['smins'][$counter13]);
        echo "FINAL : " . $data;
        $_SESSION['hasilakhir']["$row->id"] = $data;
        $counter13++;
    }
}


arsort($_SESSION['hasilakhir']);
foreach ($_SESSION['hasilakhir'] as $x => $x_value) {
    echo "Nama : " . $x . " Nilai : " . $x_value;
}


//header('Location: user.php');
?>
