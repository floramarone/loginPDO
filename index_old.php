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
        <h1>Login - Teste de Criptografia</h1>
        <h2>Cripto mais conhecidas: MD5 Sha1</h2>
        <h3>Mas vamos ver outras, como: Sha256, Sha512, base64 e password_hash</h3>
        <h4>Cadastro de Usuário</h4>
        
        <form method="post">
            <input type="text" name="nome" placeholder="Nome aqui.."/>
            <br><br>
            <input type="email" name="email" placeholder="Email aqui.."/>
            <br><br>
            <input type="password" name="pas" placeholder="Senha aqui.."/>
            <br><br>
            <input type="submit" name="salvar" value="Salvar"/>
            <input type="reset" name="limpar" value="Limpar"/>
        </form>
        
        <?php
         if(isset($_POST['salvar'])){
             echo "<br><br>.: Dados do usuário :.";
             echo "<br>Nome: " . $_POST['nome'];
             echo "<br>Email: " . $_POST['email'];
             echo "<br>Senha: " . $_POST['pas'];
             $pas = $_POST['pas'];
             $criptoMD5 = md5($pas);
             $criptoSha256 = hash("sha256", $pas);
             $criptoSha512 = hash("sha512", $pas);
             $criptoBase64 = base64_encode($pas);
             $criptoPassword_hash = password_hash($pas, PASSWORD_DEFAULT);
             
             echo "<br><br><br><br>.: Padrões de Criptografia :.";
             echo "<br> MD5: " . $criptoMD5;
             echo "<br> Sha256: " . $criptoSha256;
             echo "<br> Sha512: " . $criptoSha512;
             echo "<br> Base64: " . $criptoBase64;
             echo "<br> Base64-Decode: " . base64_decode($criptoBase64);
             echo "<br> Password_hash: " . $criptoPassword_hash;
             $pas2 = "admin";
             if(password_verify($pas2, $criptoPassword_hash)){
                 echo "Senha válida!";
             }else{
                 echo "Senha inválida!";
             }
                 
         }
        ?>
    </body>
</html>
