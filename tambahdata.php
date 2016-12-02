<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

                    <input type="text" style="width: 100%;" id="tmbnama"/>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">

                <div class="col-md-2" style="text-align: right;">

                    Alamat :
                </div>
                <div class="col-md-10">

                    <input type="text" style="width: 100%;"/>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">

                <div class="col-md-2" style="text-align: right;">

                    Kota :
                </div>
                <div class="col-md-10">

                    <select style="width: 100%;">

                        <option value="a">a</option>
                        <option value="a">a</option>
                        <option value="a">a</option>
                        <option value="a">a</option>
                    </select>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">

                <div class="col-md-2" style="text-align: right;">

                    Kategori :
                </div>
                <div class="col-md-10">

                    <select style="width: 100%;">

                        <option value="a">a</option>
                        <option value="a">a</option>
                        <option value="a">a</option>
                        <option value="a">a</option>
                    </select>
                </div>
            </div>
            <div class="row" style="margin-top: 20px";>

                <div class="col-md-2" style="text-align: right;">

                    Deskripsi :
                </div>
                <div class="col-md-10">

                    <textarea rows="5" cols="50"></textarea>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-success" onclick="hitung();" style="float: right;">SUBMIT</button>
            </div>
    </body>
</html>
