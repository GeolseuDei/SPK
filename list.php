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
        <!--        SHOW ALL-->
        <?php
        $query = "SELECT datawisata.id AS did, nama as nama, jeniswisata as jeniswisata, alamat as alamat, deskripsi as deskripsi, aksesibilitas as aksesibilitas, kondisi_lingkungan as kondisi_lingkungan, hub_dgn_wisata_lain as hub_dgn_wisata_lain, kondisi_cuaca as kondisi_cuaca, biaya as biaya, jeniswisata.id as jid, jenis as jenis FROM datawisata INNER JOIN jeniswisata on datawisata.jeniswisata=jeniswisata.id";
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
                    <input type="button" style="float: right; margin-right: 20px; margin-bottom: 20px;" value="ADD" class="btn btn-success" onclick="add(<?php echo $row->did; ?>);">
                </div>
                <div class="col-md-1"></div>
            </div>
            <?php
        }
        ?>
    </body>
</html>
