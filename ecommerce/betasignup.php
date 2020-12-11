<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

  if(isset($_SESSION['captcha'])){
    $now = time();
    if($now >= $_SESSION['captcha']){
      unset($_SESSION['captcha']);
    }
  }

?>
<meta charset="utf-8">
  <title>SIGNUP - BETA</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script src="https://kit.fontawesome.com/5ccfefa507.js" crossorigin="anonymous"></script>


<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>



<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>



  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h1 class="card-title text-center">Cadastrar</h1>
            <form action="register.php" method="POST">
            <br>  
            
            <div class="row">
            <div class="col">
              <label for="inputUserame2">Nome</label>
                <input type="text" name="firstname" id="inputUserame2" class="form-control" placeholder="Nome" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required autofocus>
                
              </div>
              

              <div class="col">
              <label for="inputUserame">Sobrenome</label>
                <input type="text" id="inputUserame" name="lastname"class="form-control" placeholder="Sobrenome" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required autofocus>
                
              </div>
               </div>
<br> 

              <div class="form-label-group">
              <label for="inputEmail">Email</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
               
              </div>
              <br> 

              <div class="form-label-group">
              <label for="input">CPF</label>
                <input type="text" id="input" name="cpf"class="form-control" placeholder="Digite com pontos e traços: 999.999.999-99" value="<?php echo (isset($_SESSION['cpf'])) ? $_SESSION['cpf'] : '' ?>"  required autofocus>
                
              </div>
<br> 

              

              <div class="form-label-group">
              <label for="inputUserame8">Endereço</label>
                <input type="text" id="inputUserame8" name="address"class="form-control" placeholder="Endereço" value="<?php echo (isset($_SESSION['address'])) ? $_SESSION['address'] : '' ?>"  required autofocus>
                
              </div>
<br> 
<div class="row">
              <div class="col">
              <label for="inputUserame4">Data de nascimento</label>
                <input type="date" id="inputUserame4" name="nascimento"class="form-control" placeholder="Data de nascimento" value="<?php echo (isset($_SESSION['nascimento'])) ? $_SESSION['nascimento'] : '' ?>"  required autofocus>
                
              </div>

              <div class="col">
              <label for="inputUserame7">Telefone</label>
                <input type="text" id="inputUserame7" name="contact_info"class="form-control" placeholder="Telefone" value="<?php echo (isset($_SESSION['contact_info'])) ? $_SESSION['contact_info'] : '' ?>"  required autofocus>
                
              </div>
              

    </div>
              <br> 


              <div class = "row">
              <div class="col">
              <label for="exampleFormControlSelect1">Sexo</label>
                   <select class="form-control" id="exampleFormControlSelect1" name="sexo" placeholder="Sexo" value="<?php echo (isset($_SESSION['sexo'])) ? $_SESSION['sexo'] : '' ?>"  required autofocus>
      <option selected disabled>Sexo</option>
      <option  required autofocus>Masculino</option>
      <option  required autofocus>Feminino</option>
      <option   required autofocus>Prefiro não declarar</option>

    </select>
              </div>


              <div class="col">
              <label for="exampleFormControlSelect2">Estado civil</label>
                
                <select class="form-control" id="exampleFormControlSelect2" name="estadocivil"class="form-control" placeholder="Estado civil" value="<?php echo (isset($_SESSION['estadocivil'])) ? $_SESSION['estadocivil'] : '' ?>"  required autofocus>
      <option selected disabled>Estado Civil</option>
      <option  required autofocus>Solteiro(a)</option>
      <option  required autofocus>Casado(a)</option>
      <option  required autofocus>Divorciado(a)</option>
      <option  required autofocus>Viúvo(a)</option>
      <option   required autofocus>Prefiro não declarar</option>

    </select>
              </div>

    </div>
              <br> 
              

              
              <hr>
              <br> 
<div class = "row">
              <div class="col">
              <label for="inputPassword">Senha</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Senha" required>
                
              </div>
              

              <div class="col">
              <label for="inputConfirmPassword">Confirmar senha</label>
                <input type="password" id="inputConfirmPassword" name="repassword" class="form-control" placeholder="Confirmar senha" required>
                
              </div>
              </div>
              <br> 
              <br> 
              <?php
            if(!isset($_SESSION['captcha'])){
              echo '
              
                <div class="form-label-group" >
                  <div class="g-recaptcha" data-sitekey="6LevO1IUAAAAAFX5PpmtEoCxwae-I8cCQrbhTfM6"></div>
                </div>
              ';
            }
          ?>
          <br> 
          <br> 
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="signup">Cadastrar</button>
              <a class="d-block text-center mt-2 small" href="betalogin.php">Já tem uma conta? Entrar</a>
              <hr class="my-4">
              
            </form>
            <button class="btn btn-lg btn-google btn-block text-uppercase" ><i class="fab fa-google mr-2"></i> Sign up with Google</button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" ><i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'includes/scripts.php' ?>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</body>