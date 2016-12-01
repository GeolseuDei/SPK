<?php
require 'connection.php';
session_start();
$_SESSION["akses"]=50;
$_SESSION["cuaca"]=50;
$_SESSION["wisatalain"]=50;
$_SESSION["ling"]=50;
$_SESSION["biaya"]=50;
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

        <div class="row">

            <div class="col-md-3">
                <button type="button" class="btn btn-success" data-dismiss="modal">INDONESIA</button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-success" data-dismiss="modal">SEKITAR</button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-success" data-dismiss="modal">TAMBAH</button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-success" data-dismiss="modal">CARI</button>
            </div>
        </div>
        <div>

            <div class="row">

                <div class="col-md-2" style="text-align: right;">

                    Nama :
                </div>
                <div class="col-md-9">

                    <input type="text" style="width: 100%;"/>
                </div>
            </div>
            <div class="row">

                <div class="col-md-2" style="text-align: right;">

                    Alamat :
                </div>
                <div class="col-md-9">

                    <input type="text" style="width: 100%;"/>
                </div>
            </div>
            <div class="row">

                <div class="col-md-2" style="text-align: right;">

                    Kota :
                </div>
                <div class="col-md-9">

                    <select>

                        <option value="a">a</option>
                        <option value="a">a</option>
                        <option value="a">a</option>
                        <option value="a">a</option>
                    </select>
                </div>
            </div>
            <div class="row">

                <div class="col-md-2" style="text-align: right;">

                    Kategori :
                </div>
                <div class="col-md-9">

                    <select>

                        <option value="a">a</option>
                        <option value="a">a</option>
                        <option value="a">a</option>
                        <option value="a">a</option>
                    </select>
                </div>
            </div>
            <div class="row">

                <div class="col-md-2" style="text-align: right;">

                    Deskripsi :
                </div>
                <div class="col-md-9">

                    <textarea rows="5" cols="50"></textarea>
                </div>
            </div>
            <div class="row">

                <div class="col-md-2" style="text-align: right;">

                    Ranking :
                </div>
                <div class="col-md-9">

                    <select>

                        <option value="a">a</option>
                        <option value="a">a</option>
                        <option value="a">a</option>
                        <option value="a">a</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-1"></div>
            <div class="col-md-10" style="background-color: yellow;">

                <div class="row">

                    <div class="col-md-4" style="text-align: center;">
                        NAMA WISATA
                    </div>
                    <div class="col-md-4" style="text-align: center;">
                        JENIS WISATA
                    </div>
                    <div class="col-md-4" style="text-align: center;">
                        RATING
                    </div>
                </div>
                <div>
                    DESKRIPSI
                </div>
                <button type="button" class="btn btn-success" data-dismiss="modal">TULIS KOMEN</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">VIEW KOMEN</button>
            </div>
            <div class="col-md-1"></div>
        </div>

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
                $query = "SELECT * FROM datawisata";
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
                </tr>";
                ?>
            </tbody>
        </table>
    </body>
</html>
