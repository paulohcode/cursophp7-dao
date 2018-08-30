<?php

class Usuario {

	private $id;
	private $nome;
	private $login;
	private $senha;

	public function getId() {
		return $this->id;
	}

	public function setId($value) {
		$this->id = $value;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($value) {
		$this->nome = $value;
	}

	public function getLogin() {
		return $this->login;
	}

	public function setLogin($value) {
		$this->login = $value;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($value) {
		$this->senha = $value;
	}

	public function loadById($id) {

		$sql = new Sql();

		$result = $sql->select("select * from tb_usuarios where id = :ID", array(

			":ID" => $id,
		));

		if (count($result) > 0) {
			$row = $result[0];

			$this->setId($row['id']);
			$this->setNome($row['nome']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
		}
	}

	//criar função que exibe todos os usuarios da tabela

	public static function getList() {

		$sql = new Sql();

		return $sql->select("select * from tb_usuarios order by id");
	}

	//criar função que exibe  os usuarios da tabela pelo busca
	public static function search($login) {

		$sql = new Sql();

		return $sql->select("select * from tb_usuarios where login like :search  order by login", array(

			':search' => "%" . $login . "%",

		));
	}

	//criar função que valida se o usuario e correto
	public function login($login, $password) {

		$sql = new Sql();

		$result = $sql->select("select * from tb_usuarios where login = :login and senha = :password", array(

			":login" => $login,
			":password" => $password,
		));

		if (count($result) > 0) {
			$row = $result[0];

			$this->setId($row['id']);
			$this->setNome($row['nome']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
		} else {

			throw new Exception("Login ou senha Invalidos");

		}
	}

	public function __toString() {

		return json_encode(array(

			"id" => $this->getId(),
			"nome" => $this->getNome(),
			"login" => $this->getLogin(),
			"senha" => $this->getSenha(),
		));
	}

}

?>