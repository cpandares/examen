<?php

class Book{
	private $id;
	private $name;
	private $author;
	private $description;
	private $year;
	private $imagen;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getName() {
		return $this->name;
	}

	function getAuthor() {
		return $this->author;
	}

	function getDescription() {
		return $this->description;
	}

	function getYear() {
		return $this->year;
	}

	
	function getImagen() {
		return $this->imagen;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setName($name) {
		$this->name = $this->db->real_escape_string($name);
	}

	function setAuthor($author) {
		$this->author = $this->db->real_escape_string($author);
	}

	function setDescription($description) {
		$this->description = $this->db->real_escape_string($description);
	}

	function setYear($year) {
		$this->year = $year;
	}

	

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}

	public function save(){
		$sql = "INSERT INTO books VALUES(NULL, '{$this->getName()}', '{$this->getAuthor()}', '{$this->getDescription()}', '{$this->getYear()}', '{$this->getImagen()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
    public function getAll(){
		$books = $this->db->query("SELECT * FROM books ORDER BY id DESC");
		return $books;
    }
    

    public function getOne(){
		$book = $this->db->query("SELECT * FROM books WHERE id = {$this->getId()}");
		return $book->fetch_object();
	}
    
    
	public function edit(){
		$sql = "UPDATE books SET name='{$this->getName()}', author='{$this->getAuthor()}', description='{$this->getDescription()}', year={$this->getYear()} ";
		  
		if($this->getImagen() != null){
		  $sql .= ", imagen='{$this->getImagen()}'";
		}
		
		$sql .= " WHERE id={$this->id};";
  
		$save = $this->db->query($sql);
	   
	  
		$result = false;
		if($save){
		  $result = true;
		}
		return $result;
	  }
	
	public function delete(){
		$sql = "DELETE FROM books WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}
	
	
}