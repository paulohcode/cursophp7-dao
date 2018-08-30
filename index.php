<?php

require_once "config.php";

//carrega somente um usuario
//$root = new Usuario();
//$root->loadById(1);
//echo $root;

//carrega uma lista de usuario.
//$lista = Usuario::getList();
//echo json_encode($lista);

//carrega uma lista de usuario buscando pelo login
//$search = Usuario::search("a");
//echo json_encode($search);

//carrega um usuario usando o login e a senha
//$usuario = new Usuario();
//$usuario->login("Paulo", "123456");
//echo $usuario;

//insert crirando um novo usuario
//$aluno = new Usuario("Nunes", "Chefe", "123456789");
//$aluno->insert();
//echo $aluno;

$usuario = new Usuario();

$usuario->loadById(8);

$usuario->update("Silva", "silva", "1234524");

echo $usuario;

?>