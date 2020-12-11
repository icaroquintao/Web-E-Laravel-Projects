<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }
?>
<meta charset="utf-8">
  <title>LOGIN - BETA</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Entrar</h5>
            <form action="verify.php" method="POST">
              <div class="form-label-group">
                <input type="email" name="email"  class="form-control" placeholder="Email" required autofocus>
                <label for="inputEmail">Email</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" class="form-control" placeholder="Senha" required>
                <label for="inputPassword">Senha</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Lembrar senha</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="login">Entrar</button>
              <a class="d-block text-center mt-2 small" href="betasignup.php">Não possui uma conta? Cadastrar</a>
              <hr class="my-4">
              <a class="btn btn-lg btn-google btn-block disabled" type="submit"  href="#"><i class="fab fa-google mr-2"></i> Entrar com Google</a>
              <a class="btn btn-lg btn-facebook btn-block disabled" type="submit" href="#"><i class="fab fa-facebook-f mr-2"></i> Entrar com Facebook</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'includes/scripts.php' ?>
</body>