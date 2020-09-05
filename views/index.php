<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Library</title>
  </head>
  <body>
    

  <div class="header">
      <img src="img/1.jpg" alt="">
  </div>

      <div class="container">
          <div class="register my-2 ">
            
            <?php if(isset($edit) && isset($book_edit) && is_object($book_edit)): ?>
            
              <h1 class="text-center shadow p-5">Editar Libro <?= $book_edit->name ?></h1>
              
              <?php $url_action = base_url."book/save&id=".$book_edit->id; ?>

              <?php else: ?> 
                <div class="container shadow p-5 mr-15">
                  <h2 class="text-center ">Registrar un Libro</h2>
                </div>
              
              <?php $url_action = base_url."book/save"; ?>

            <?php endif; ?>

              <div class="row">
                <div class="col-md-8">
                    
                    <hr>
                    <form action="<?=$url_action?>" method="post" class="form-group shadow p-3" enctype="multipart/form-data">
                      <label for="name"><b>Nombre del Libro</b></label>
                      <input type="text" name="name" value="<?= isset($book_edit) && is_object($book_edit) ? $book_edit->name : '';?>" class="form-control">

                      <label for="author"><b>Autor del Libro</b> </label>
                      <input type="text" name="author" value="<?= isset($book_edit) && is_object($book_edit) ? $book_edit->author : '';?>" class="form-control">

                      <label for="description"><b>Descripción del Libro</b> </label>
                      <textarea name="description" cols="30" rows="10" class="form-control"><?= isset($book_edit) && is_object($book_edit) ? $book_edit->description : '';?></textarea>

                      <label for="year"><b>Año de Publicación</b></label>
                      <input type="text" name="year" class="form-control" value="<?= isset($book_edit) && is_object($book_edit) ? $book_edit->year : '';?>">

                      <label for="imagen"><b>Imagen</b></label>

                      <input type="file" name="imagen" class="form-control">

                      <input type="submit" value="Guardar" class="btn btn-info btn-block mt-5">
                    </form>
                </div>

                <?php if(isset($book_edit)) : ?>
                  <div class="col-md-4">
                      <div class="container p-4">
                        <h2 class="text-center">Portada del Libro</h2>
                      </div>
                    
                        <?php if(isset($book_edit) && is_object($book_edit) && !empty($book_edit->imagen)): ?>
                          <img src="<?=base_url?>uploads/images/<?=$book_edit->imagen?>" class="img-fluid rounded-lg book-product"/> 
                        <?php endif; ?>

                        <a href="<?= base_url ?>" class="btn btn-success btn-lg mt-2">Cancelar Edición</a>
                    
                  </div>
              
            </div>
              <?php endif; ?>
          </div>

      </div>                     
        <?php if(!isset($book_edit)): ?>
          <div class="display">

            <h2 class="text-center my-10 shadow p-3">Lista de Libros Registrados</h2>

              <?php if(isset($_SESSION['book']) && $_SESSION['book'] == 'complete' ): ?>
                <div class="alert alert-success" role="alert">
                  Libro Registrado
                </div>
              <?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
                <div class="alert alert-danger" role="alert">
                  Fallo Al Registrar Libro
                </div>  
          </div>

      </div>

          <?php endif; ?>

      <?php Utils::deleteSession('producto'); ?>

          <table class="table table-bordered table-hover">

            <thead>
              <tr>
                <th class="text-center">Nombre del Libro</th>
                <th class="text-center">Autor del Libro</th>
                <th class="text-center">Descripcion</th>
                <th class="text-center">Año de Publicación</th>
                <th class="text-center">Portada</th>
                <th class="text-center">Acción</th>
              </tr>
            </thead>

              <?php while($book = $books->fetch_object()): $desc = $book->description; ?>
              <tbody>
                <tr>
                  <td class="text-center" ><b> <?= $book->name ?></b></td>
                  <td class="text-center" ><strong><?= $book->author ?></strong> </td>
                  <td class="text-center"><em><?= substr($desc, 0, 100); ?>....</em> </td>
                  <td class="text-center" "><?= $book->year ?></td>
                  <td class="text-center" >
                        <?php if($book->imagen != null) : ?>
                            <img src="<?=base_url?>uploads/images/<?= $book->imagen ?>" alt="Book" class="img-fluid book-table rounded-lg">
                        <?php else: ?>
                          <p>Libro sin Imagen</p>
                        <?php endif; ?>  
                  </td>
                  <td class="text-center" >  
                    <a href="<?=base_url?>book/edit&id=<?=$book->id?>" class="btn btn-warning btn-lg">Editar</a>
                    <a class="btn btn-danger btn-lg mt-1" data-toggle="modal" data-target="#deleteModal"">Eliminar</a>
                  </td>
                </tr>
              </tbody>
                          
              <div class="modal fade" id="deleteModal" tabindex="-1"  aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal">Seguro Desea Eliminar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Seguro Desea Eliminar El Libro
                  </div>
                  <div class="modal-footer">
                  <a href="<?=base_url?>book/delete&id=<?=$book->id?>" class="btn btn-primary btn-lg">Eliminar</a>
                    
                  </div>
                </div>
              </div>
            </div>

          

          </div>  
              
           <?php endwhile; ?>
          </table>
      

    </div>
  <?php endif; ?>
       
  <footer class="footer text-center">
    <p>Diseñado por &copy Cesar Pandares</p> 
  </footer>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>