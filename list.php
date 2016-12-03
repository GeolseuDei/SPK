<?php
require './connection.php';
session_start();
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
        $countercomment = 0;
        $query = "SELECT datawisata.id AS did, nama as nama, jeniswisata as jeniswisata, alamat as alamat, deskripsi as deskripsi, aksesibilitas as aksesibilitas, kondisi_lingkungan as kondisi_lingkungan, hub_dgn_wisata_lain as hub_dgn_wisata_lain, kondisi_cuaca as kondisi_cuaca, biaya as biaya, jeniswisata.id as jid, jenis as jenis FROM datawisata INNER JOIN jeniswisata on datawisata.jeniswisata=jeniswisata.id";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_object($result)) {
            ?>
            <div class="row" style="margin-top: 10px;">

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

                    <?php if (isset($_SESSION['login'])) { ?>
                        <input type="button" style="float: left; margin-left: 20px; margin-bottom: 20px;" value="COMMENT" class="btn btn-success" onclick="showcomment(<?php echo $countercomment; ?>);">
                    <?php } ?>    
                    <input type="button" style="float: right; margin-right: 20px; margin-bottom: 20px;" value="ADD" class="btn btn-success" onclick="add(<?php echo $row->did; ?>);">

                </div>
                <div class="col-md-1"></div>
            </div>

            <div class="row" style="margin-bottom: 0px; display: none;" id="plccomment<?php echo $countercomment; ?>">
                <div class="col-md-1"></div>
                <div class="col-md-10" style="background-color: yellow;">

                    <input type="hidden" id="did<?php echo $countercomment; ?>" value="<?php echo $row->did; ?>"/>
                    <input type="text" id="txtcomment<?php echo $countercomment; ?>" style="width: 80%; margin-bottom: 10px;"/>
                    <input type="button" style="margin-bottom: 5px; width: 19%;" value="SEND &DoubleRightArrow;" class="btn btn-success" onclick="postcomment(<?php echo $countercomment; ?>);">
                </div>
                <div class="col-md-1"></div>
            </div>

            <div class="container-fluid" style="margin-top: -20px; width: 91%;">
                <br>
                <div id="slidecomment<?php echo $countercomment; ?>" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <textarea style="width: 100%;" readonly="">--Review dan Komentar--</textarea>
                        </div>
                        <?php
                        $query2 = "SELECT * FROM `komen` INNER JOIN datawisata on komen.tempat = datawisata.id where tempat=" . $row->did;
                        $result2 = mysqli_query($conn2, $query2);
                        while ($row2 = mysqli_fetch_object($result2)) {
                            ?>
                            <div class="item">
                                <textarea style="width: 100%;" readonly=""><?php echo $row2->isi; ?></textarea>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#slidecomment<?php echo $countercomment; ?>" role="button" data-slide="prev">
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#slidecomment<?php echo $countercomment; ?>" role="button" data-slide="next">
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <?php
            $countercomment++;
        }
        ?>
    </body>
</html>
