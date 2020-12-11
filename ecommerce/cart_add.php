<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);

	$id = $_POST['id'];
	$quantity = $_POST['quantity'];

	if(isset($_SESSION['user'])){
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND product_id=:product_id");
		$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id]);
		$row = $stmt->fetch();
		if($row['numrows'] < 1){
			try{
				$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
				$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id, 'quantity'=>$quantity]);
				$output['message'] = '
				
				<div class="alert alert-success" role="alert">
  Porduto Adicionado ao Carrinho
</div>
				';
				
			}
			catch(PDOException $e){
				$output['error'] = true;
				$output['message'] = $e->getMessage();
			}
		}
		else{
			$output['error'] = true;
			$output['message'] = '
			<div class="alert alert-warning" role="alert">
  Esse produto já foi adicionado ao seu carrinho! Caso queira adicionar mais unidades entre no seu carrinho
</div>
			';
		}
	}
	else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		$exist = array();

		foreach($_SESSION['cart'] as $row){
			array_push($exist, $row['productid']);
		}

		if(in_array($id, $exist)){
			$output['error'] = true;
			$output['message'] = '
			<div class="alert alert-warning" role="alert">
  Esse produto já foi adicionado ao seu carrinho! Caso queira adicionar mais unidades entre no seu carrinho
</div>
			';
		}
		else{
			$data['productid'] = $id;
			$data['quantity'] = $quantity;

			if(array_push($_SESSION['cart'], $data)){
				$output['message'] = '
				<div class="alert alert-success" role="alert">
  Porduto Adicionado ao Carrinho
</div>
				';
			}
			else{
				$output['error'] = true;
				$output['message'] = 'Cannot add item to cart
				<div class="alert alert-dark" role="alert">
  Não foi possível adicionar o produto! Tente novamente
</div>
				
				';
			}
		}

	}

	$pdo->close();
	echo json_encode($output);

?>