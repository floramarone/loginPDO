<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author flora
 */
class cUsuario {

    //put your code here
    public function inserir() {
        if (isset($_POST['salvar'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $pas = $_POST['pas'];

            $pdo = require '../pdo/connection.php';
            $sql = "insert into usuario (nomeUser, email, pas) values (?,?,?)";
            $sth = $pdo->prepare($sql);
            //$sth->execute([$nome,$email,$pas]); esta é a forma mais simples de passar,
            // mas como a pass encriptada fica longa demais, se utiliza da forma abaixo:

            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $email, PDO::PARAM_STR);
            $sth->bindParam(3, $pass, PDO::PARAM_STR);
            $pass = password_hash($pas, PASSWORD_DEFAULT);
            $sth->execute();
            unset($pdo);
            unset($sth);
        }
    }

    public function getUsuarios() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idUser, nomeUser, email from usuario";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        unset($pdo);
        unset($sth);
        return $result;
    }

    // código nao funciona e nem o prof entendeu, solução foi isolar ele em um php file chamado deletarUser.php
    public function deletar() {
        if (isset($_POST['deletar'])) {
            $id = $_POST['idUser'];
      //      var_dump($_POST);
      //      echo '<br>';
       //     var_dump($id);
            $pdo = require_once '../pdo/connection.php';
            $sql = "delete from usuario where idUser = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($pdo);
            unset($sth);
//            header("Refresh: 0");
        }
    }
    
    public function getUsuarioById($id){
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idUser, nomeUser, email from usuario where idUser = ?";
        $sth = $pdo->prepare($sql);
        $sth->execute([$id]);
        $result = $sth->fetchAll();
        unset($pdo);
        unset($sth);
        return $result;
    }
    
    public function updateUser(){
        if(isset($_POST['update'])){
            $id = $_POST['idUser'];
            $nome = $_POST['nomeUser'];
        
            
            $pdo = require_once '../pdo/connection.php';
            $sql = "update usuario set nomeUser = ? where idUser = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($sth);
            unset($pdo);
            header("location:../view/listaUsuarios.php");
        }
    }
    

}
