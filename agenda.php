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
    </head>
    <body>
        <?php
        include'calendarusu/index.php';
        ?>

        <!-- Coloque esta tag onde você desejar que o módulo FAQ apareça. -->
<div id="lhc_faq_embed_container" ></div>

<!-- Coloque esta tag depois da tag do módulo de FAQ do Live Helper -->
<script type="text/javascript">
var LHCFAQOptions = {url:'replace_me_with_dynamic_url',identifier:''};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = '//makinohair.livehelperchat.com/por/faq/embed/(theme)/1';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
    </body>
</html>
