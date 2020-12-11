
<!doctype html>
<html lang="en">
<head>



  <meta charset="utf-8">
  <title>Home - BETA</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/5ccfefa507.js" crossorigin="anonymous"></script>
  <?php 
  include 'includes/session.php';
  include 'includes/scripts.php';
  ?>
</head>
<body>
  <app-root></app-root>
  </html>

<header class="main-header">
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="" class="navbar-brand"><b>Creative</b>.dev</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
              <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">SOBRE NÓS </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              CATEGORIA 
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" role="menu">
               
                <?php
                
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach($stmt as $row){
                    echo "
                      <a class='dropdown-item' href='betacategory.php?category=".$row['cat_slug']."'>".$row['name']."</a>
                    ";                  
                  }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

              ?>
              </div>

            <li class="nav-item">
              <a class="nav-link" href="#"> </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#"> </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#"> </a>
            </li>
            </li>
            <form method="POST" class="navbar-form " action="betasearch.php">
                <div class="input-group">
                    <input type="text" class="form-control"  name="keyword" placeholder="Buscar produto, marcas.." required>
                    <span class="input-group-btn" id="searchBtn" >
                        <button type="submit" class="btn btn-outline-primary my-2 my-sm-0"><i class="fa fa-search"></i> </button>
                    </span>
                </div>
              </form>
            
          </ul>



   
        



        


    


            
            </li>

      <!-- Navbar Right Menu -->

      
         
            <!-- Menu toggle button -->

              

    


            <?php
            
           
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '



              <div class="btn-group dropleft">
              <a href="#" class="btn btn-success btn-sm dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-shopping-cart"></i>
                <span class="label label-success cart_count"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <h5 class="dropdown-header" disabled>Você tem <span class="cart_count"></span> produto(s) no carrinho</h5>
                <div class="dropdown-divider"></div>
  
                <a class="dropdown-item">
                  <a class="dropdown-item" id="cart_menu"></a>
                
                </a>
                <div class="dropdown-divider"></div>
                <a type="button" class="btn btn-success btn-block" href="betacart_view.php">Ver carrinho</a>
               
                </div>
                </div>

                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
              <img class="mb-3 mt-1" src="'.$image.'" alt="" class="rounded"  height=" 40px " width=" 40px">     
                '.$user['firstname'].' '.$user['lastname'].'
              </button>
              
              <!-- Modal -->
              <div class="modal fade right" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Bem-Vindo, '.$user['firstname'].' '.$user['lastname'].'</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                    <div class="osahan-account-page-left shadow-sm bg-white h-100">
                <div class="border-bottom p-4">
                    <div class="osahan-user text-center">
                        <div class="osahan-user-media">
                            <img class="mb-3 rounded-pill shadow-sm mt-1" src="'.$image.'" alt="gurdeep singh osahan" class="rounded" alt="User Image" height=" 120px " width=" 120px">
                            <div class="osahan-user-media-body">
                                <h6 class="mb-2">'.$user['firstname'].' '.$user['lastname'].'</h6>
                                <p class="mb-1">Membro desde '.date('M. Y', strtotime($user['created_on'])).'</p>
                                <p>'.$user['email'].'</p>
                                <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3"  href="#"><i class="icofont-ui-edit"></i> Alterar meus dados</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <a  class="btn btn-primary" href="betaprofile.php">
                      Perfil
                      </a>
                      <a type="button" class="btn btn-danger" href="logout.php"> Sair </a>
                    </div>
                  </div>
                </div>
              </div>

          
              ';
            }
            else{
              echo "
                
            <a class='nav-item '>

            <a class='nav-link'>
            <div class='btn-group dropleft'>
            <a href='#' class='btn btn-success btn-sm dropdown-toggle' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              <i class='fa fa-shopping-cart'></i>
              <span class='label label-success cart_count'></span>
            </a>
            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
            <h5 class='dropdown-header' disabled>Você tem <span class='cart_count'></span> produto(s) no carrinho</h5>
              <div class='dropdown-divider'></div>

              <a class='dropdown-item'>
                <a class='dropdown-item' id='cart_menu'></a>
              
              </a>
              <div class='dropdown-divider'></div>
              <a type='button' class='btn btn-success btn-block' href='betacart_view.php'>Ver carrinho</a>
              </div>
              </div>
              </a >



          
          <a class='nav-link' href='betalogin.php'><button  class='btn btn-outline-success'>Entrar</button></a>
        
            <a class='nav-link' href='betasignup.php'><button  class='btn btn-outline-primary'>Cadastrar</button></a>
                </a>
              ";
            }
          ?>
       </a>
        </div>
        </div>
      </div>
      </nav>

    
    
    
    
    
    </header>
   
 <!-- Page Content -->
 <div class="container">

<!-- Jumbotron Header -->



<header class="jumbotron my-4">

  <h1 class="display-3">Bem-vindo ao teste da Loja Virtual!</h1>
  <p class="lead">Construido com Bootstrap4 e php.</p>
  <a href="#" class="btn btn-primary btn-lg">Em desenvolvimento!</a>
</header>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/banner3.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/banner2.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/banner1.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Page Features
<p>
<div class="row text-center">

  <div class="col-lg-3 col-md-6 mb-4">
    <div class="card h-100">
      <img class="card-img-top" src="http://placehold.it/500x325" alt="">
      <div class="card-body">
        <h4 class="card-title">Produto 1</h4>
        <p class="card-text">Descrição.</p>
      </div>
      <div class="card-footer">
      <a href="#" class="btn btn-success btn-sm"><i class="fas fa-shopping-cart"></i></i></a>
        <a href="#" class="btn btn-primary btn-sm">Ver produto </a>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 mb-4">
    <div class="card h-100">
      <img class="card-img-top" src="http://placehold.it/500x325" alt="">
      <div class="card-body">
      <h4 class="card-title">Produto 2</h4>
        <p class="card-text">Descrição.</p>
      </div>
      <div class="card-footer">
      <a href="#" class="btn btn-success btn-sm"><i class="fas fa-shopping-cart"></i></i></a>
        <a href="#" class="btn btn-primary btn-sm">Ver produto </a>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 mb-4">
    <div class="card h-100">
      <img class="card-img-top" src="http://placehold.it/500x325" alt="">
      <div class="card-body">
      <h4 class="card-title">Produto 3</h4>
        <p class="card-text">Descrição.</p>
      </div>
      <div class="card-footer">
        <a href="#" class="btn btn-success btn-sm"><i class="fas fa-shopping-cart"></i></i></a>
        <a href="#" class="btn btn-primary btn-sm">Ver produto </a>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 mb-4">
    <div class="card h-100">
      <img class="card-img-top" src="http://placehold.it/500x325" alt="">
      <div class="card-body">
      <h4 class="card-title">Produto 4</h4>
      <p class="card-text">Descrição.</p>
      </div>
      <div class="card-footer">
      <a href="#" class="btn btn-success btn-sm"><i class="fas fa-shopping-cart"></i></i></a>
        <a href="#" class="btn btn-primary btn-sm">Ver produto </a>
      </div>
    </div>
  </div>
</p>
</div>
 -->

<p></p>
<h3 >Produtos populares hoje:</h3>
<div class="box-body">
<div class="row text-center">
	  		
	  		<?php
	  			$now = date('Y-m-d');
	  			$conn = $pdo->open();

	  			$stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 10");
	  			$stmt->execute(['now'=>$now]);
	  			foreach($stmt as $row){
            echo "
            
            <div class='col-lg-3 col-md-6 mb-4'>
            <div class='card h-100'>
              <img class='card-img-top' src='images/".$row['photo']."' alt=''>
              <div class='card-body'>
              <h5 class='card-title'>".$row['name']."</h5>
            

              <ul class='list-group list-group-flush'>

    <li class='list-group-item'></li>
    <li class='list-group-item'>R$ ".$row['price']."</li>
    
  </ul>
              
              </div>
              <div class='card-footer'>
                <a href='#' class='btn btn-success btn-sm'><i class='fas fa-shopping-cart'></i></i></a>
                <a href='betaproduct.php?product=".$row['slug']."' class='btn btn-primary btn-sm'>Ver produto </a>
              </div>
            </div>
          </div>
         
            
            
            
            
            ";
	  			}

	  			$pdo->close();
	  		?>
	    	
      </div>
      </div>

</div>
<!-- /.container -->
  

</body>

    <!-- Footer -->
    
    <body class="d-flex flex-column">
  <div id="page-content" class="py-4 bg-dark text-light">
    <div class="container text-center">
      <div class="row justify-content-center">
        <div class="col-md-7">
          <h1 class="font-weight-light mt-4 ">Sistema de Ecommerce</h1>
          <p class="lead text-dark-50">Desenvolvido por: <a href="https://www.linkedin.com/in/icaroquintao/">Icaro Quintão</a></p>
          <p class="lead text-dark-50">icaro.quintao@aluno.ufop.edu.br</p>
          <p class="lead text-dark-50">(31) 9 8729 4586</p>
        </div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12">


                      
                                <a class="btn btn-lg " href="https://www.facebook.com/icaroquintao/">
                                    <i class="fab fa-facebook" aria-hidden="true"></i>
                                </a>
                          
                      
                                <a class="btn btn-lg " href="https://twitter.com/icaroquintao">
                                    <i class="fab fa-twitter " aria-hidden="true"></i>
                                </a>
                      
                          
                                <a class="btn btn-lg " href="https://www.instagram.com/icaroquintao/">
                                    <i class="fab fa-instagram " aria-hidden="true"></i>
                                </a>
                         
                           
                                <a class="btn btn-lg "  href="https://www.linkedin.com/in/icaroquintao/">
                                    <i class="fab fa-linkedin" aria-hidden="true"></i>
                                </a>
                      

                                <div class="container text-center">
      <small>Copyright &copy; Creative.dev</small>
    </div>
                  
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>


	<!-- ./Footer -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</html>


</html>
    
   
             