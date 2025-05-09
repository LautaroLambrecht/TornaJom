<?php
           if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if ( isset($_POST['id']) && isset($_POST['estrellas']) && isset($_POST['descripcion'])  && isset($_POST['id_usuario'])){
                $modelo->createresenas(($_POST['id']) ,($_POST['estrellas']) ,($_POST['descripcion']),($_POST['id_usuario']));
            }
          }  

        ?>