<?php
session_start();
$_SESSION['selected'] = array();
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

        <!--        BOBOT-->   
        <div class="row" style="background-color: yellow; text-align: center; height: 15%; padding-top: 1%; padding-bottom: 20px;">
            <form action="proseshitungan.php" method="POST">
                <div class="col-md-1" style="text-align: right"> <h4>BOBOT :</h4></div>
                <div class="col-md-2">
                    <span>Akses : </span><input type="text" id="iakses" name="iakses"/>
                </div>
                <div class="col-md-2">
                    <span>Kondisi Lingkungan : </span><input type="text" id="iling" name="iling"/>
                </div>
                <div class="col-md-2">
                    <span>Hub. Dengan Wisata Lain : </span><input type="text" id="iwisatalain" name="iwisatalain"/>
                </div>
                <div class="col-md-2">
                    <span>Kondisi Cuaca : </span><input type="text" id="icuaca" name="icuaca"/>
                </div>
                <div class="col-md-2">
                    <span>Biaya : </span><input type="text" id="ibiaya" name="ibiaya"/>
                </div>
                <div class="col-md-1">
                    <input type="submit" value="APPLY" class="btn btn-success" style="margin-top: 10px; width: 90%; margin-right: 20px;"/>
                </div>
            </form>
        </div>

        <!--        SELECTION-->
        <div class="container-fluid" style="width: 50%; background-color: blue; height: 85%; float: left; overflow: scroll;" id="list"></div>
        <div class="container-fluid" style="width: 50%; background-color: cyan; height: 85%; float: left; overflow: scroll" id="selected"></div>
        <img src="asset/btntambah.png" style="position: absolute; right: 50px; bottom: 30px; width: 7%;"/>
    </body>
    <script>
        function add(i) {
            $("#selected").load("selected.php?id=" + i);
        }
        $("#list").load("list.php");
        $("#selected").load("selected.php");
    </script>
</html>
