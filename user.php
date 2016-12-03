<?php
require 'connection.php';
//require './proseshitungan.php';
session_start();

$counternama = 0;
foreach ($_SESSION['selected'] as $id) {
    $query = "SELECT * FROM datawisata where id=$id";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_object($result)) {
        $nama[$counternama] = $row->nama;
        $counternama++;
    }
}
//unset($_SESSION['hasilakhir']);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>USER</title>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <a href="main.php"><button class="btn btn-warning" style="margin-top: 10px; margin-left: 10px;">&DoubleLeftArrow; BACK</button></a>
        <?php
        foreach ($_SESSION['hasilakhir'] as $x => $x_value) {
            $query = "SELECT * FROM datawisata INNER JOIN jeniswisata on datawisata.jeniswisata=jeniswisata.id WHERE datawisata.id = $x";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_object($result)) {
                ?>
                <div class="row" style="margin-bottom: 20px;margin-top: 10px;">

                    <div class="col-md-1"></div>
                    <div class="col-md-10" style="background-color: yellow;">

                        <div class="row">

                            <div class="col-md-4" style="text-align: center;">
                                <h3><strong><?php echo $row->nama; ?></strong></h3>
                            </div>
                            <div class="col-md-7" style="text-align: right;">
                                <h4><strong><?php echo $row->jenis; ?></strong></h4>
                            </div>
                        </div>
                        <div style="border: 1px solid black; margin-left: 20px; margin-right: 20px; margin-bottom: 10px;">
                            <textarea style="resize: none;width: 100%;" readonly="" ><?php echo $row->deskripsi; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <?php
            }
        }
        ?>

        <div class="container">
            <br>
            <div id="slideperhitungan" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <div class="item active">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Matriks/Kriteria</th>
                                    <th>Akses</th>
                                    <th>Kondisi Lingkungan</th>
                                    <th>Hubungan dengan wisata lain</th>
                                    <th>Kondisi cuaca</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($_SESSION['selected'] as $id) {
                                    $query = "SELECT * FROM datawisata where id = $id";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_object($result)) {
                                        echo "<tr>
                    <td>$row->nama</td>
                    <td>$row->aksesibilitas</td>
                    <td>$row->kondisi_lingkungan</td>
                    <td>$row->hub_dgn_wisata_lain</td>
                    <td>$row->kondisi_cuaca</td>
                    <td>$row->biaya</td>
                </tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="item">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Bobot</th>
                                    <th>Akses</th>
                                    <th>Kondisi Lingkungan</th>
                                    <th>Hubungan dengan wisata lain</th>
                                    <th>Kondisi cuaca</th>
                                    <th>Biaya</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                echo "<tr>
                    <td></td>
                    <td>$_SESSION[akses]</td>
                    <td>$_SESSION[cuaca]</td>
                    <td>$_SESSION[wisatalain]</td>
                    <td>$_SESSION[ling]</td>
                    <td>$_SESSION[biaya]</td>
                    <td>$_SESSION[totalw]</td>
                </tr>";
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="item">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Bobot Normalisasi</th>
                                    <th>Akses</th>
                                    <th>Kondisi Lingkungan</th>
                                    <th>Hubungan dengan wisata lain</th>
                                    <th>Kondisi cuaca</th>
                                    <th>Biaya</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td><?php echo$_SESSION['bobotnormal'][0] ?></td>
                                    <td><?php echo$_SESSION['bobotnormal'][1] ?></td>
                                    <td><?php echo$_SESSION['bobotnormal'][2] ?></td>
                                    <td><?php echo$_SESSION['bobotnormal'][3] ?></td>
                                    <td><?php echo$_SESSION['bobotnormal'][4] ?></td>
                                    <td><?php echo$_SESSION['totalwn'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="item">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tabel Kuadrat</th>
                                    <th>Akses</th>
                                    <th>Kondisi Lingkungan</th>
                                    <th>Hubungan dengan wisata lain</th>
                                    <th>Kondisi cuaca</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counterkuadrat = 0;
                                while ($counterkuadrat != $counternama) {
                                    echo '<tr>';
                                    ?>
                                <td><?php echo $nama[$counterkuadrat]; ?></td>
                                <td><?php
                                    echo $_SESSION["wisatakuadrat" . $counterkuadrat][0];
                                    ;
                                    ?></td>
                                <td><?php
                                    echo $_SESSION["wisatakuadrat" . $counterkuadrat][1];
                                    ;
                                    ?></td>
                                <td><?php
                                    echo $_SESSION["wisatakuadrat" . $counterkuadrat][2];
                                    ;
                                    ?></td>
                                <td><?php
                                    echo $_SESSION["wisatakuadrat" . $counterkuadrat][3];
                                    ;
                                    ?></td>
                                <td><?php
                                    echo $_SESSION["wisatakuadrat" . $counterkuadrat][4];
                                    ;
                                    ?></td>
                                <?php
                                $counterkuadrat++;
                                echo '</tr>';
                            }echo '<tr>';
                            ?>
                            <td>Total</td>
                            <td><?php echo$_SESSION['totalwisatakuadrat'][0] ?></td>
                            <td><?php echo$_SESSION['totalwisatakuadrat'][1] ?></td>
                            <td><?php echo$_SESSION['totalwisatakuadrat'][2] ?></td>
                            <td><?php echo$_SESSION['totalwisatakuadrat'][3] ?></td>
                            <td><?php echo$_SESSION['totalwisatakuadrat'][4] ?></td>
                            <?php
                            echo '</tr>';
                            echo '<tr>';
                            ?>
                            <td>Akar Total</td>
                            <td><?php echo$_SESSION['akartotalwisatakuadrat'][0] ?></td>
                            <td><?php echo$_SESSION['akartotalwisatakuadrat'][1] ?></td>
                            <td><?php echo$_SESSION['akartotalwisatakuadrat'][2] ?></td>
                            <td><?php echo$_SESSION['akartotalwisatakuadrat'][3] ?></td>
                            <td><?php echo$_SESSION['akartotalwisatakuadrat'][4] ?></td>
                            <?php echo '</tr>';
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="item">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Matriks R ij</th>
                                    <th>Akses</th>
                                    <th>Kondisi Lingkungan</th>
                                    <th>Hubungan dengan wisata lain</th>
                                    <th>Kondisi cuaca</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counterrij = 0;
                                while ($counterrij != $counternama) {
                                    echo '<tr>';
                                    ?>
                                <td><?php echo $nama[$counterrij]; ?></td>
                                <td><?php echo $_SESSION["matriksrij" . $counterrij][0] ?></td>
                                <td><?php echo $_SESSION["matriksrij" . $counterrij][1] ?></td>
                                <td><?php echo $_SESSION["matriksrij" . $counterrij][2] ?></td>
                                <td><?php echo $_SESSION["matriksrij" . $counterrij][3] ?></td>
                                <td><?php echo $_SESSION["matriksrij" . $counterrij][4] ?></td>
                                <?php
                                $counterrij++;
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="item">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Matriks V ij</th>
                                    <th>Akses</th>
                                    <th>Kondisi Lingkungan</th>
                                    <th>Hubungan dengan wisata lain</th>
                                    <th>Kondisi cuaca</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $countervij = 0;
                                while ($countervij != $counternama) {
                                    echo '<tr>';
                                    ?>
                                <td><?php echo $nama[$countervij]; ?></td>
                                <td><?php echo $_SESSION["matriksvij" . $countervij][0] ?></td>
                                <td><?php echo $_SESSION["matriksvij" . $countervij][1] ?></td>
                                <td><?php echo $_SESSION["matriksvij" . $countervij][2] ?></td>
                                <td><?php echo $_SESSION["matriksvij" . $countervij][3] ?></td>
                                <td><?php echo $_SESSION["matriksvij" . $countervij][4] ?></td>
                                <?php
                                $countervij++;
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="item">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>A*</th>
                                    <th>Akses</th>
                                    <th>Kondisi Lingkungan</th>
                                    <th>Hubungan dengan wisata lain</th>
                                    <th>Kondisi cuaca</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo "A*"; ?></td>
                                    <td><?php echo $_SESSION['amax'][0] ?></td>
                                    <td><?php echo $_SESSION['amax'][1] ?></td>
                                    <td><?php echo $_SESSION['amax'][2] ?></td>
                                    <td><?php echo $_SESSION['amax'][3] ?></td>
                                    <td><?php echo $_SESSION['amax'][4] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="item">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>A'</th>
                                    <th>Akses</th>
                                    <th>Kondisi Lingkungan</th>
                                    <th>Hubungan dengan wisata lain</th>
                                    <th>Kondisi cuaca</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo "A*"; ?></td>
                                    <td><?php echo $_SESSION['amin'][0] ?></td>
                                    <td><?php echo $_SESSION['amin'][1] ?></td>
                                    <td><?php echo $_SESSION['amin'][2] ?></td>
                                    <td><?php echo $_SESSION['amin'][3] ?></td>
                                    <td><?php echo $_SESSION['amin'][4] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="item">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Matriks maks</th>
                                    <th>Akses</th>
                                    <th>Kondisi Lingkungan</th>
                                    <th>Hubungan dengan wisata lain</th>
                                    <th>Kondisi cuaca</th>
                                    <th>Biaya</th>
                                    <th>Smaks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $countermmaks = 0;
                                while ($countermmaks != $counternama) {
                                    ?>
                                    <tr>
                                        <td><?php echo $nama[$countermmaks]; ?></td>
                                        <td><?php echo $_SESSION["tabelmaks" . $countermmaks][0]; ?></td>
                                        <td><?php echo $_SESSION["tabelmaks" . $countermmaks][1]; ?></td>
                                        <td><?php echo $_SESSION["tabelmaks" . $countermmaks][2]; ?></td>
                                        <td><?php echo $_SESSION["tabelmaks" . $countermmaks][3]; ?></td>
                                        <td><?php echo $_SESSION["tabelmaks" . $countermmaks][4]; ?></td>
                                        <td><?php echo $_SESSION['smaks'][$countermmaks]; ?></td>
                                    </tr>
                                    <?php
                                    $countermmaks++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="item">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Matriks mins</th>
                                    <th>Akses</th>
                                    <th>Kondisi Lingkungan</th>
                                    <th>Hubungan dengan wisata lain</th>
                                    <th>Kondisi cuaca</th>
                                    <th>Biaya</th>
                                    <th>Smins</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $countermmins = 0;
                                while ($countermmins != $counternama) {
                                    ?>
                                    <tr>
                                        <td><?php echo $nama[$countermmins]; ?></td>
                                        <td><?php echo $_SESSION["tabelmin" . $countermmins][0]; ?></td>
                                        <td><?php echo $_SESSION["tabelmin" . $countermmins][1]; ?></td>
                                        <td><?php echo $_SESSION["tabelmin" . $countermmins][2]; ?></td>
                                        <td><?php echo $_SESSION["tabelmin" . $countermmins][3]; ?></td>
                                        <td><?php echo $_SESSION["tabelmin" . $countermmins][4]; ?></td>
                                        <td><?php echo $_SESSION['smins'][$countermmins]; ?></td>
                                    </tr>
                                    <?php
                                    $countermmins++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="item">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Ci*</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($_SESSION['hasilakhir'] as $x => $x_value) {
                                    ?>
                                    <tr>
                                        <?php
                                        $query = "SELECT nama FROM datawisata where id = $x";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_object($result)) {
                                            echo "<td>$row->nama</td>";
                                        }
                                        ?>
                                        <td><?php echo$x_value; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#slideperhitungan" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#slideperhitungan" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container">

            <button class="btn btn-success" style="float: right; margin-top: 10px;" onclick="showall()">SHOW ALL</button>
        </div>
        <div class="container" style="display: none;" id="detail">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Matriks/Kriteria</th>
                        <th>Akses</th>
                        <th>Kondisi Lingkungan</th>
                        <th>Hubungan dengan wisata lain</th>
                        <th>Kondisi cuaca</th>
                        <th>Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION['selected'] as $id) {
                        $query = "SELECT * FROM datawisata where id = $id";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_object($result)) {
                            echo "<tr>
                    <td>$row->nama</td>
                    <td>$row->aksesibilitas</td>
                    <td>$row->kondisi_lingkungan</td>
                    <td>$row->hub_dgn_wisata_lain</td>
                    <td>$row->kondisi_cuaca</td>
                    <td>$row->biaya</td>
                </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Bobot</th>
                        <th>Akses</th>
                        <th>Kondisi Lingkungan</th>
                        <th>Hubungan dengan wisata lain</th>
                        <th>Kondisi cuaca</th>
                        <th>Biaya</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo "<tr>
                    <td></td>
                    <td>$_SESSION[akses]</td>
                    <td>$_SESSION[cuaca]</td>
                    <td>$_SESSION[wisatalain]</td>
                    <td>$_SESSION[ling]</td>
                    <td>$_SESSION[biaya]</td>
                    <td>$_SESSION[totalw]</td>
                </tr>";
                    ?>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Bobot Normalisasi</th>
                        <th>Akses</th>
                        <th>Kondisi Lingkungan</th>
                        <th>Hubungan dengan wisata lain</th>
                        <th>Kondisi cuaca</th>
                        <th>Biaya</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td><?php echo$_SESSION['bobotnormal'][0] ?></td>
                        <td><?php echo$_SESSION['bobotnormal'][1] ?></td>
                        <td><?php echo$_SESSION['bobotnormal'][2] ?></td>
                        <td><?php echo$_SESSION['bobotnormal'][3] ?></td>
                        <td><?php echo$_SESSION['bobotnormal'][4] ?></td>
                        <td><?php echo$_SESSION['totalwn'] ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tabel Kuadrat</th>
                        <th>Akses</th>
                        <th>Kondisi Lingkungan</th>
                        <th>Hubungan dengan wisata lain</th>
                        <th>Kondisi cuaca</th>
                        <th>Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counterkuadrat = 0;
                    while ($counterkuadrat != $counternama) {
                        echo '<tr>';
                        ?>
                    <td><?php echo $nama[$counterkuadrat]; ?></td>
                    <td><?php
                        echo $_SESSION["wisatakuadrat" . $counterkuadrat][0];
                        ;
                        ?></td>
                    <td><?php
                        echo $_SESSION["wisatakuadrat" . $counterkuadrat][1];
                        ;
                        ?></td>
                    <td><?php
                        echo $_SESSION["wisatakuadrat" . $counterkuadrat][2];
                        ;
                        ?></td>
                    <td><?php
                        echo $_SESSION["wisatakuadrat" . $counterkuadrat][3];
                        ;
                        ?></td>
                    <td><?php
                        echo $_SESSION["wisatakuadrat" . $counterkuadrat][4];
                        ;
                        ?></td>
                    <?php
                    $counterkuadrat++;
                    echo '</tr>';
                }echo '<tr>';
                ?>
                <td>Total</td>
                <td><?php echo$_SESSION['totalwisatakuadrat'][0] ?></td>
                <td><?php echo$_SESSION['totalwisatakuadrat'][1] ?></td>
                <td><?php echo$_SESSION['totalwisatakuadrat'][2] ?></td>
                <td><?php echo$_SESSION['totalwisatakuadrat'][3] ?></td>
                <td><?php echo$_SESSION['totalwisatakuadrat'][4] ?></td>
                <?php
                echo '</tr>';
                echo '<tr>';
                ?>
                <td>Akar Total</td>
                <td><?php echo$_SESSION['akartotalwisatakuadrat'][0] ?></td>
                <td><?php echo$_SESSION['akartotalwisatakuadrat'][1] ?></td>
                <td><?php echo$_SESSION['akartotalwisatakuadrat'][2] ?></td>
                <td><?php echo$_SESSION['akartotalwisatakuadrat'][3] ?></td>
                <td><?php echo$_SESSION['akartotalwisatakuadrat'][4] ?></td>
                <?php echo '</tr>';
                ?>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Matriks R ij</th>
                        <th>Akses</th>
                        <th>Kondisi Lingkungan</th>
                        <th>Hubungan dengan wisata lain</th>
                        <th>Kondisi cuaca</th>
                        <th>Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counterrij = 0;
                    while ($counterrij != $counternama) {
                        echo '<tr>';
                        ?>
                    <td><?php echo $nama[$counterrij]; ?></td>
                    <td><?php echo $_SESSION["matriksrij" . $counterrij][0] ?></td>
                    <td><?php echo $_SESSION["matriksrij" . $counterrij][1] ?></td>
                    <td><?php echo $_SESSION["matriksrij" . $counterrij][2] ?></td>
                    <td><?php echo $_SESSION["matriksrij" . $counterrij][3] ?></td>
                    <td><?php echo $_SESSION["matriksrij" . $counterrij][4] ?></td>
                    <?php
                    $counterrij++;
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Matriks V ij</th>
                        <th>Akses</th>
                        <th>Kondisi Lingkungan</th>
                        <th>Hubungan dengan wisata lain</th>
                        <th>Kondisi cuaca</th>
                        <th>Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $countervij = 0;
                    while ($countervij != $counternama) {
                        echo '<tr>';
                        ?>
                    <td><?php echo $nama[$countervij]; ?></td>
                    <td><?php echo $_SESSION["matriksvij" . $countervij][0] ?></td>
                    <td><?php echo $_SESSION["matriksvij" . $countervij][1] ?></td>
                    <td><?php echo $_SESSION["matriksvij" . $countervij][2] ?></td>
                    <td><?php echo $_SESSION["matriksvij" . $countervij][3] ?></td>
                    <td><?php echo $_SESSION["matriksvij" . $countervij][4] ?></td>
                    <?php
                    $countervij++;
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>A*</th>
                        <th>Akses</th>
                        <th>Kondisi Lingkungan</th>
                        <th>Hubungan dengan wisata lain</th>
                        <th>Kondisi cuaca</th>
                        <th>Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo "A*"; ?></td>
                        <td><?php echo $_SESSION['amax'][0] ?></td>
                        <td><?php echo $_SESSION['amax'][1] ?></td>
                        <td><?php echo $_SESSION['amax'][2] ?></td>
                        <td><?php echo $_SESSION['amax'][3] ?></td>
                        <td><?php echo $_SESSION['amax'][4] ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>A'</th>
                        <th>Akses</th>
                        <th>Kondisi Lingkungan</th>
                        <th>Hubungan dengan wisata lain</th>
                        <th>Kondisi cuaca</th>
                        <th>Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo "A*"; ?></td>
                        <td><?php echo $_SESSION['amin'][0] ?></td>
                        <td><?php echo $_SESSION['amin'][1] ?></td>
                        <td><?php echo $_SESSION['amin'][2] ?></td>
                        <td><?php echo $_SESSION['amin'][3] ?></td>
                        <td><?php echo $_SESSION['amin'][4] ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Matriks maks</th>
                        <th>Akses</th>
                        <th>Kondisi Lingkungan</th>
                        <th>Hubungan dengan wisata lain</th>
                        <th>Kondisi cuaca</th>
                        <th>Biaya</th>
                        <th>Smaks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $countermmaks = 0;
                    while ($countermmaks != $counternama) {
                        ?>
                        <tr>
                            <td><?php echo $nama[$countermmaks]; ?></td>
                            <td><?php echo $_SESSION["tabelmaks" . $countermmaks][0]; ?></td>
                            <td><?php echo $_SESSION["tabelmaks" . $countermmaks][1]; ?></td>
                            <td><?php echo $_SESSION["tabelmaks" . $countermmaks][2]; ?></td>
                            <td><?php echo $_SESSION["tabelmaks" . $countermmaks][3]; ?></td>
                            <td><?php echo $_SESSION["tabelmaks" . $countermmaks][4]; ?></td>
                            <td><?php echo $_SESSION['smaks'][$countermmaks]; ?></td>
                        </tr>
                        <?php
                        $countermmaks++;
                    }
                    ?>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Matriks mins</th>
                        <th>Akses</th>
                        <th>Kondisi Lingkungan</th>
                        <th>Hubungan dengan wisata lain</th>
                        <th>Kondisi cuaca</th>
                        <th>Biaya</th>
                        <th>Smins</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $countermmins = 0;
                    while ($countermmins != $counternama) {
                        ?>
                        <tr>
                            <td><?php echo $nama[$countermmins]; ?></td>
                            <td><?php echo $_SESSION["tabelmin" . $countermmins][0]; ?></td>
                            <td><?php echo $_SESSION["tabelmin" . $countermmins][1]; ?></td>
                            <td><?php echo $_SESSION["tabelmin" . $countermmins][2]; ?></td>
                            <td><?php echo $_SESSION["tabelmin" . $countermmins][3]; ?></td>
                            <td><?php echo $_SESSION["tabelmin" . $countermmins][4]; ?></td>
                            <td><?php echo $_SESSION['smins'][$countermmins]; ?></td>
                        </tr>
                        <?php
                        $countermmins++;
                    }
                    ?>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ci*</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION['hasilakhir'] as $x => $x_value) {
                        ?>
                        <tr>
                            <?php
                            $query = "SELECT nama FROM datawisata where id = $x";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_object($result)) {
                                echo "<td>$row->nama</td>";
                            }
                            ?>
                            <td><?php echo$x_value; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script>
        function showall(){
            $("#detail").slideToggle();
        }
        </script>
    </body>
</html>
