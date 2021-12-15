<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        //inicializando a sessão
        session_start() ;
        
        //renova todas as variáveis da sessão
        $_SESSION = array();
        
        //destruir sessão
        session_destroy();
        
        //redirecionar para tela de login
        header("Location: ../view/login.php");
        exit;
    

