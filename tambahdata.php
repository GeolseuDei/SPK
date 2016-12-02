<?php
require './connection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="row" style="margin-top: 20px;">

            <div class="col-md-2" style="text-align: right;">

                Nama :
            </div>
            <div class="col-md-10">

                <input type="text" style="width: 100%;" id="addnama"/>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">

            <div class="col-md-2" style="text-align: right;">

                Alamat :
            </div>
            <div class="col-md-10">

                <input type="text" style="width: 100%;" id="addalamat"/>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">

            <div class="col-md-2" style="text-align: right;">

                Kota :
            </div>
            <div class="col-md-10">

                <select style="width: 100%;" id="addkota">

                    <option value="bali">Bali</option>
                    <option value="surabaya">Surabaya</option>
                    <option value="ntt">NTT</option>
                    <option value="papua">Papua</option>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">

            <div class="col-md-2" style="text-align: right;">

                Kategori :
            </div>
            <div class="col-md-10">

                <select style="width: 100%;" id="addkategori">

                    <?php
                    $query = "SELECT * FROM `jeniswisata`";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_object($result)) {
                        ?>
                        <option value="<?php echo $row->id; ?>"><?php echo $row->jenis; ?></option>
                        <?php } ?>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 20px";>

            <div class="col-md-2" style="text-align: right;">

                Deskripsi :
            </div>
            <div class="col-md-10">

                <textarea rows="5" cols="50" id="adddesk"></textarea>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">

            <div class="col-md-2" style="text-align: right;">

                Aksesibilitas :
            </div>
            <div class="col-md-10">

                <select style="width: 100%;" id="addakses">

                    <option value="25">Sangat Buruk</option>
                    <option value="50">Buruk</option>
                    <option value="75">Bagus</option>
                    <option value="100">Sangat Bagus</option>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">

            <div class="col-md-2" style="text-align: right;">

                Kondisi Lingkungan :
            </div>
            <div class="col-md-10">

                <select style="width: 100%;" id="addling">

                    <option value="25">Sangat Buruk</option>
                    <option value="50">Buruk</option>
                    <option value="75">Bagus</option>
                    <option value="100">Sangat Bagus</option>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">

            <div class="col-md-2" style="text-align: right;">

                Hubungan Dengan Wisata Lain :
            </div>
            <div class="col-md-10">

                <input type="number" style="width: 100%;" id="addhub"/>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">

            <div class="col-md-2" style="text-align: right;">

                Kondisi Cuaca :
            </div>
            <div class="col-md-10">

                <select style="width: 100%;" id="addcuaca">

                    <option value="25">Sangat Buruk</option>
                    <option value="50">Buruk</option>
                    <option value="75">Bagus</option>
                    <option value="100">Sangat Bagus</option>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">

            <div class="col-md-2" style="text-align: right;">

                Biaya :
            </div>
            <div class="col-md-10">

                <input type="number" style="width: 100%;" id="addbiaya"/>
            </div>
        </div>
        <div style="margin-top: 20px;">
            <button type="button" class="btn btn-success" onclick="cek();" style="float: right;">SUBMIT</button>
        </div>
    </body>
</html>
