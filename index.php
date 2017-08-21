<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel='shortcut icon' href='imagens/favicon.png' type='image/x-png'/>
        <script type="text/javascript" src="script/script.js"></script>
        <title>Makino Hair</title>
        <style>
            #topoimg{
                opacity: 1.0;
            }
        </style>
    </head>
    <body>
        <div id="corpo">
            <div id="topo">
                <a href="?pagina=home"><img id="topoimg" src="imagens/Makinohair-logoestendida.png" class="img-fluid" alt="Responsive image"></a>

            </div>
            <div id="menu">
                <?php include'menu.php'; ?>
            </div>
            <div id="conteudo"><center>
                   <?php
                    $pg=filter_input(INPUT_GET,'pagina');

                    if(isset($pg)){
                        include $pg.".php";

                    }else{
                        include "home.php";

                    }
                ?>
<script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
po.src = '//makinohair.livehelperchat.com/por/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true/(theme)/1?r='+referrer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
            </div>
            <div id="rodape">
                <?php include'rodape.php'; ?>
            </div>
        </div>
    </body>
</html>
