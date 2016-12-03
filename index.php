<?php
session_start();
unset($_SESSION['login']);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Landing</title>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color: #78909C">

        <div class="row" style="background-color: white;">

            <div class="col-md-1"></div>
            <div class="col-md-10">

                <h2 style="text-align: center;">Welcome To SPK - Pariwisata</h2>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row" style="margin-top: 15%;">

            <div class="col-md-4"></div>
            <div class="col-md-4">

                <div class="row" style="background-color: white;">

                    <div class="col-md-5" style="background-color: yellow; width: 40%; text-align: center;" data-toggle="modal" data-target="#modallogin">

                        <h6>LOGIN</h6>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5" style="background-color: yellow; width: 40%; text-align: center;" onclick="guest()" >

                        <h6>GUEST</h6>
                    </div>
                    <p style="margin-top: 10px; display: inline-block;">ga punya akun ? segera sign up <a href="#" data-toggle="modal" data-target="#modaldaftar">disini!!</a></p>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>


        <!--        MODAL-->
        <div id="modallogin" class="modal fade" role="dialog">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <form action="login.php" method="POST">

                        <div class="modal-header">

                            <h4 class="modal-title">LOGIN</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-3" style="text-align: right;">

                                    USERNAME :
                                </div>
                                <div class="col-md-9">

                                    <input type="text" style="width: 100%;" name="uname"/>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">

                                <div class="col-md-3" style="text-align: right;">

                                    PASSWORD :
                                </div>
                                <div class="col-md-9">

                                    <input type="password" style="width: 100%;" name="pass"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="LOGIN" class="btn btn-success"/>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">CANCEL</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>

        <div id="modaldaftar" class="modal fade" role="dialog">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <form action="signup.php" method="POST">

                        <div class="modal-header">

                            <h4 class="modal-title">SIGN UP</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-3" style="text-align: right;">

                                    USERNAME :
                                </div>
                                <div class="col-md-9">

                                    <input type="text" style="width: 100%;" name="uname"/>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">

                                <div class="col-md-3" style="text-align: right;">

                                    PASSWORD :
                                </div>
                                <div class="col-md-9">

                                    <input type="password" style="width: 100%;" name="pass"/>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">

                                <div class="col-md-3" style="text-align: right;">

                                    RETYPE PASSWORD :
                                </div>
                                <div class="col-md-9">

                                    <input type="password" style="width: 100%;" name="repass"/>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">

                                <div class="col-md-3" style="text-align: right;">

                                    EMAIL :
                                </div>
                                <div class="col-md-9">

                                    <input type="email" style="width: 100%;" name="email"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="SUBMIT" class="btn btn-success" onclick="daftar();"/>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">CANCEL</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        <script>
            function guest() {
                window.location = "main.php"
            }
        </script>
    </body>
</html>
