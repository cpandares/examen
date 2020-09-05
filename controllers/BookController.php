<?php

require_once 'models/book.php';

class BookController  {

    public function index(){
		$book = new Book();
		$books = $book->getAll();
	
		// renderizar vista
		require_once 'views/index.php';
	}


    public function save(){

	  
		if(isset($_POST)){
			$name = isset($_POST['name']) ? $_POST['name'] : false;
			$author = isset($_POST['author']) ? $_POST['author'] : false;
			$descripcion = isset($_POST['description']) ? $_POST['description'] : false;
			$year = isset($_POST['year']) ? $_POST['year'] : false;
			
			
			if($name && $author && $descripcion && $year ){
				$book = new Book();
				$book->setName($name);
				$book->setAuthor($author);
				$book->setDescription($descripcion);
				$book->setYear($year);
			
				
				// Guardar la imagen
				if(isset($_FILES['imagen'])){
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

						if(!is_dir('uploads/images')){
							mkdir('uploads/images', 0777, true);
						}

						$book->setImagen($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
					}
				}
				
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$book->setId($id);
					
					$save = $book->edit();
				}else{
					$save = $book->save();
				}
				
				if($save){
					$_SESSION['book'] = 'complete';
				}else{
					$_SESSION['book'] = 'failed';
				}
			}else{
				$_SESSION['book'] = 'failed';
			}
		}else{
			$_SESSION['book'] = 'failed';
		}
		header('Location:'.base_url);
	}


	public function edit(){
       
        if(isset($_GET['id'])){
        $id = $_GET['id'];
        $edit = true;
			$book = new Book();
			$oneBook = new Book();
			$books = $oneBook->getAll();
            $book->setId($id);
            $book_edit = $book->getOne();
            
			require_once 'views/index.php';
                              
        }else{
            header("Location:".base_url);  
        }

	}
	
	public function delete(){
     
        if(isset($_GET['id'])){
            $id = $_GET['id'];
			$book = new Book();
            $book->setId($id);
            $book_edit = $book->delete();

            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
       header("Location:".base_url);     
    }
}