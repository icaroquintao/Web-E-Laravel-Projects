<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$cpf = $_POST['cpf'];
		$nascimento = $_POST['nascimento'];
		$sexo = $_POST['sexo'];
		$estadocivil = $_POST['estadocivil'];
		$address = $_POST['address'];
		$contact_info = $_POST['contact_info'];

		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;

		if(!isset($_SESSION['captcha'])){
			require('recaptcha/src/autoload.php');		
			$recaptcha = new \ReCaptcha\ReCaptcha('6LevO1IUAAAAAFCCiOHERRXjh3VrHa5oywciMKcw', new \ReCaptcha\RequestMethod\SocketPost());
			$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
			
		
		  		$_SESSION['captcha'] = time() + (10*60);
		  	

		}

		if($password != $repassword || strlen($password) < 6){
			$_SESSION['error'] = '
			<div class="alert alert-danger" role="alert">
			A senha não confere ou é muito curta!
</div>
			';
			header('location: betasignup.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = '<div class="alert alert-danger" role="alert">
				O email informado já possui cadastro em nosso sistema!
	</div>';
				header('location: betasignup.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{
					$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, activate_code, created_on, cpf, nascimento, sexo, estadocivil, contact_info, address) VALUES (:email, :password, :firstname, :lastname, :code, :now, :cpf, :nascimento, :sexo, :estadocivil, :contact_info, :address)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'code'=>$code, 'now'=>$now, 'cpf'=>$cpf, 'nascimento'=>$nascimento, 'sexo'=>$sexo, 'estadocivil'=>$estadocivil, 'contact_info'=>$contact_info, 'address'=>$address]);
					$userid = $conn->lastInsertId();

					$message = "
						<h2>Muito obrigado por se cadastrar em nosso sistema!</h2>
						<p>Detalhes da sua conta:</p>
						<p>Email: ".$email."</p>
						<p>Senha: ".$_POST['password']."</p>
						<p>Clique no link abaixo para ativar sua conta:</p>
						<a href='http://localhost/ecommerce/activate.php?code=".$code."&user=".$userid."'>Ativar minha conta</a>
					";

					//Load phpmailer
		    		require 'vendor/autoload.php';

		    		$mail = new PHPMailer(true);                             
				    try {
				        //Server settings
				        $mail->isSMTP();                                     
				        $mail->Host = 'smtp.gmail.com';                      
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'creative.dev.systems@gmail.com';     
				        $mail->Password = 'icaro789';                    
				        $mail->SMTPOptions = array(
				            'ssl' => array(
				            'verify_peer' => false,
				            'verify_peer_name' => false,
				            'allow_self_signed' => true
				            )
				        );                         
				        $mail->SMTPSecure = 'ssl';                           
				        $mail->Port = 465;                                   

				        $mail->setFrom('creative.dev.systems@gmail.com');
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('creative.dev.systems@gmail.com');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'Creative.dev Cadastro de novo Usuario';
				        $mail->Body    = $message;

				        $mail->send();

				        unset($_SESSION['firstname']);
				        unset($_SESSION['lastname']);
				        unset($_SESSION['email']);

						$_SESSION['success'] = '
						<div class="alert alert-success" role="alert">
						Conta criada com sucesso! Enviamos um email para você, por favor ative sua conta
</div>
						';
				        header('location: betasignup.php');

				    } 
				    catch (Exception $e) {
				        $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
				        header('location: betasignup.php');
				    }


				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
	}

?>