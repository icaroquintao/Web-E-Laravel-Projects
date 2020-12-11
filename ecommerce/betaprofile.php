<!doctype html>
<html lang="en">
<head>



  <meta charset="utf-8">
  <title>Perfil - BETA</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/5ccfefa507.js" crossorigin="anonymous"></script>
  <?php 
  include 'includes/session.php';
  include 'includes/scripts.php';
  ?>
  
</head>
<body>
  <app-root></app-root>


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




    <?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
	        					<div class='alert alert-success'>
	        						".$_SESSION['success']."
	        					</div>
	        				";
	        				unset($_SESSION['success']);
	        			}
					?>





<div class="container bootstrap snippet">
    <div class="row">


    


       
    	
    </div>
    <div class="row">

    	<div class="col-sm-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Perfil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Notificações</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Editar dados</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <?php
            
           
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '

             <br>
            <div class="row">
              <div class="col-sm col-lg">
                  
              </div>
              <div class="col-sm col-lg"><a  class="pull-right"><img title="profile image" class="img-circle img-responsive border border-primary" src="'.$image.'" height="240px"></a></div>
              <div class="col-sm col-lg">
                  
              </div>
              
            </div>
            <br>
            <br>
            <br>
              <div class="row">
              <div class="col-sm-3 col-md-2 col-5">
                  <label style="font-weight:bold;">Nome Completo</label>
              </div>
              <div class="col-md-8 col-6">
              '.$user['firstname'].' '.$user['lastname'].'
              </div>
          </div>
          <hr />


          <div class="row">
          <div class="col-sm-3 col-md-2 col-5">
              <label style="font-weight:bold;">Email</label>
          </div>
          <div class="col-md-8 col-6">
          '.$user['email'].'
          </div>
      </div>
      <hr />

          <div class="row">
              <div class="col-sm-3 col-md-2 col-5">
                  <label style="font-weight:bold;">Endereço</label>
              </div>
              <div class="col-md-8 col-6">
              '.$user['address'].'
              </div>
          </div>
          <hr />
          
          
          <div class="row">
              <div class="col-sm-3 col-md-2 col-5">
                  <label style="font-weight:bold;">Telefone</label>
              </div>
              <div class="col-md-8 col-6">
              '.$user['contact_info'].'
              </div>
          </div>
          <hr />
        
         
          <div class="row">
          <div class="col-sm-3 col-md-2 col-5">
              <label style="font-weight:bold;">CPF</label>
          </div>
          <div class="col-md-8 col-6">
          '.$user['cpf'].'
          </div>
      </div>
      <hr />
      <div class="row">
      <div class="col-sm-3 col-md-2 col-5">
          <label style="font-weight:bold;">Data de nascimento</label>
      </div>
      <div class="col-md-8 col-6">
      '.date('d / m / Y', strtotime($user['nascimento'])).'
      </div>
  </div>
  <hr />
  <div class="row">
  <div class="col-sm-3 col-md-2 col-5">
      <label style="font-weight:bold;">Sexo</label>
  </div>
  <div class="col-md-8 col-6">
  '.$user['sexo'].'
  </div>
</div>
<hr />


<div class="row">
<div class="col-sm-3 col-md-2 col-5">
    <label style="font-weight:bold;">Estado civil</label>
</div>
<div class="col-md-8 col-6">
'.$user['estadocivil'].'
</div>
</div>
<hr />
<div class="row">
<div class="col-sm-3 col-md-2 col-5">
    <label style="font-weight:bold;">Membro desde</label>
</div>
<div class="col-md-8 col-6">
'.date('d / m / Y', strtotime($user['created_on'])).'
</div>
</div>
<hr />
<div class="row">
<div class="col-sm-3 col-md-2 col-5">
    <label style="font-weight:bold;">Status</label>
</div>
<div class="col-md-8 col-6">
Conta Ativa <i class="fas fa-check-square" style="color:green"></i>
</div>
</div>
<hr />
          
              ';
            }
            else{
              echo "
                
            
              ";
            }
          ?>
  </div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


  <br>
  <div class="alert alert-primary" role="alert">
Exemplo de notificação tipo 0!
</div>
<div class="alert alert-primary" role="alert">
Exemplo de notificação tipo 0!
</div>
<div class="alert alert-success" role="alert">
  Exemplo de notificação tipo 1!
</div>
<div class="alert alert-danger" role="alert">
Exemplo de notificação tipo 2!
</div>
<div class="alert alert-warning" role="alert">
Exemplo de notificação tipo 3!
</div>

  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab" >
  <br>
  <h4><b>Alterar meus dados</b></h4>
         
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="profile_edit.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Nome</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Sobrenome</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Nova Senha</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                      
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Telefone</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $user['contact_info']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Endereço</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="address" name="address"><?php echo $user['address']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Foto de perfil</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <hr>
                
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Senha atual</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Insira sua senha atual para salvar as mudanças" required>
                    </div>
                </div>
            </div>
            
              
              <button type="submit" class="btn btn-success btn-lg btn-block" name="edit"><i class="fa fa-check-square-o"></i> Confirmar alterações</button>
              </form>
  <br>
  <br>
  <br>
</div>

         
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
    </div><!--/row-->




</body>
  
  <!-- Footer -->
  <footer>
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
  </footer>

	<!-- ./Footer -->



</html>
