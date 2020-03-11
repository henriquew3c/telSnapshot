<html lang="en">
    <head>        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="Honorio Henrique">
        <link rel="icon" href="inc/favicon.ico">

        <title>Tel Snapshot - Sistema de Registro Funcional</title>

        <!-- Bootstrap core CSS -->
        <link href="inc/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="inc/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

        <!-- Select 2 css-->
        <link href="inc/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

        <!-- JAVASCRIPT -->

        <script src="inc/select2/vendor/jquery-2.1.0.js"></script>
        <script src="inc/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="inc/bootstrap-select/dist/js/i18n/defaults-pt_BR.min.js"></script>

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="inc/js/ie-emulation-modes-warning.js"></script>
        <script src="inc/bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="webcam.js"></script>

        <?php
        session_start();

        function retira_acentos($texto) {
            $array1 = array("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
                , "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç", " ");
            $array2 = array("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u",
                "u", "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "O", "U", "U", "U", "U", "_");
            return str_replace($array1, $array2, $texto);
        }
        if (isset($_POST["send"])) {
            
            if (!isset($_SESSION["fotografia"])) {
                ?>
                    <script language="javascript">
                        alert("ERRO: Fotografia não encontrada!\n\ \n\ Por favor, informe todos os campos antes de continuar.");
                    </script><?php   
            } else {
                if (!isset($_POST["matricula"]) || $_POST["matricula"] == "") { ?>
                        <script language="javascript">
                            alert("ERRO: Matricula não informada!\n\ \n\ Por favor, informe todos os campos antes de continuar.");
                        </script><?php
                            //deleta foto temporaria
                            unlink("images/tmp/" . $_SESSION["fotografia"] . ".jpg");
                } else {
                    //$nome = retira_acentos(htmlspecialchars($_POST['nome']));
                    //$newname = $matricula . "_" . $nome;
                    $newname = $_POST['matricula'];

                    //renomenando o arquivo
                    rename("images/tmp/" . $_SESSION["fotografia"] . ".jpg", "images/tmp/" . $newname . ".jpg");

                    switch (htmlspecialchars($_POST['categoria'])) {
                        case 1:
                            copy("images/tmp/" . $newname . ".jpg", "images/abs/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 2:
                            copy("images/tmp/" . $newname . ".jpg", "images/adm/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 3:
                            copy("images/tmp/" . $newname . ".jpg", "images/coordenacao/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 4:
                            copy("images/tmp/" . $newname . ".jpg", "images/dp/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 5:
                            copy("images/tmp/" . $newname . ".jpg", "images/financeiro/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 6:
                            copy("images/tmp/" . $newname . ".jpg", "images/gerencia_operacional/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 7:
                            copy("images/tmp/" . $newname . ".jpg", "images/monitoria/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 8:
                            copy("images/tmp/" . $newname . ".jpg", "images/operacao/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 9:
                            copy("images/tmp/" . $newname . ".jpg", "images/planejamento/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 10:
                            copy("images/tmp/" . $newname . ".jpg", "images/qualidade/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 11:
                            copy("images/tmp/" . $newname . ".jpg", "images/recepcao/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 12:
                            copy("images/tmp/" . $newname . ".jpg", "images/rh/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 13:
                            copy("images/tmp/" . $newname . ".jpg", "images/sesmt/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 14:
                            copy("images/tmp/" . $newname . ".jpg", "images/smo/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 15:
                            copy("images/tmp/" . $newname . ".jpg", "images/supervisao/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                        case 16:
                            copy("images/tmp/" . $newname . ".jpg", "images/ti/" . $newname . ".jpg");
                            unlink("images/tmp/" . $newname . ".jpg");
                            break;
                    }
                    unset($_SESSION["fotografia"]);
                    ?>
                    <script language="javascript">
                        alert("Arquivo salvo com sucesso!");
                    </script>
                    <?php
                }
            }
        }
        ?>
    </head>

    <body style="background-image: url('inc/background.jpg'); -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
        <!--<body>-->    
        <div class="container">
            <div class="header clearfix" style="margin-top: 20px;">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation" class="active"><a href="index.php">Inicio</a></li>
                    </ul>
                </nav>
                <img src="inc/logo-white.png" style="float: left">
                <!--<h3>&nbsp;TEL SNAPSHOT</h3>-->
            </div>
            <br/>
            <div class="form-group" style="margin-left: 190px; float: left;">
                <script language="JavaScript">
                    document.write(webcam.get_html(620, 420));
                </script>
            </div>
            <div class="form-group">
                <div id="div-capturar" name="div-capturar" class="col-sm-offset-2 col-sm-10">
                    <form>
                        <button id="settings" type="button" class="btn btn-primary btn-sm" onClick="webcam.configure()">
                            <i class="glyphicon glyphicon-cog"></i> Configurar
                        </button>
                        &nbsp;&nbsp;
                        <button id="take-pictures" type="button" class="btn btn-primary btn-sm" onClick="take_snapshot()">
                            <i class="glyphicon glyphicon-camera"></i> Capturar Foto
                        </button>
                    </form>
                </div>
            </div>

            <div id="upload_results" style="width: 300px; float: right; height: 30px; margin-top: -38px; margin-right: 400px;"></div>

            <form class="form-horizontal" role="form"  action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Nome:</label>
                    <div class="col-sm-5">
                        <input type="text" name="nome" class="form-control" id="nome" disabled="disabled">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="matricula">Matricula:</label>
                    <div class="col-sm-5">
                        <input type="matricula" class="form-control" id="matricula" name="matricula">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="site">Categoria:</label>
                    <select name="categoria" id="categoria" class="col-sm-5 selectpicker show-tick" data-live-search="true">
                        <option data-subtext="ABS" value="1">Absenteísmo</option>
                        <option data-subtext="" value="2">Administrativo</option>
                        <option data-subtext="COORDINSS" value="3">Coordenação</option>
                        <option data-subtext="" value="4">Departamento Pessoal</option>
                        <option data-subtext="" value="5">Financeiro</option>
                        <option data-subtext="" value="6">Gerencia Operacional</option>
                        <option data-subtext="" value="7">Monitoria</option>
                        <option data-subtext="OPINSS" value="8">Operação</option>
                        <option data-subtext="" value="9">Planejamento</option>
                        <option data-subtext="" value="10">Qualidade</option>
                        <option data-subtext="" value="11">Recepção</option>
                        <option data-subtext="" value="12">Recursos Humanos</option>
                        <option data-subtext="Serviço Esp. em Engenharia de Segurança e Medicina do Trabalho" value="13">SESMT</option>
                        <option data-subtext="Serviço Médico Ocupacional" value="14">SMO</option>
                        <option data-subtext="SUPINSS" value="15">Supervisão</option>
                        <option data-subtext="" value="16">Tecnologia da Informação</option>
                    </select>
                </div>
                <div class="form-group" class="col-sm-offset-2 col-sm-10">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="send" id="send" class="btn btn-primary btn-sm">
                            <i class="glyphicon glyphicon-save"></i> Salvar dados
                        </button>
                    </div>
                </div>
            </form>
            <br/>
            <footer class="footer">
                <p>&copy; Desenvolvido por Honorio Henrique, Analista Operacional de TI PMW TO, Palmas - TO 2016 <br/> Telefone: 63 3026-0465 | Email: suporteto@teltelematica.com.br</p>
            </footer>

        </div> <!-- /container -->
        <!-- /container -->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="inc/js/ie10-viewport-bug-workaround.js"></script>
    </body>

    <script language="JavaScript">
                            webcam.set_api_url('test.php');
                            webcam.set_quality(90); // JPEG quality (1 - 100)
                            webcam.set_shutter_sound(true); // play shutter click sound
                            webcam.set_hook('onComplete', 'my_completion_handler');

                            function take_snapshot() {
                                // take snapshot and upload to server
                                webcam.snap();
                                document.getElementById('upload_results').style.display = "block";
                                document.getElementById('settings').disabled = "true";
                                document.getElementById('take-pictures').disabled = "true";
                                document.getElementById('upload_results').innerHTML = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Imagem capturada!';

                            }

                            function my_completion_handler(msg) {
                                // extract URL out of PHP output
                                if (msg.match(/(http\:\/\/\S+)/)) {
                                    // show JPEG image in page
                                    document.getElementById('upload_results').innerHTML = '<span class="glyphicon glyphicon-saved" aria-hidden="true"></span> Upload Successful!';
                                    // reset camera for another shot
                                    webcam.reset();
                                } else {
                                    alert("PHP Error: " + msg);
                                }
                            }


    </script>

</html>