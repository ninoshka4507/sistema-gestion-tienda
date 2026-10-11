<?php
require "Funciones/conecta.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$ID = $_POST['ID'];


	$con = conecta();
	$sql = "SELECT id_producto, cantidad FROM pedidos_productos WHERE id_pedido = $ID";
	$res = $con->query($sql);

	while ($row = $res->fetch_assoc()) {
		$id_producto = $row['id_producto'];
		$cantidad = $row['cantidad'];

		// Update the stock in the productos table
		$updateSql = "UPDATE productos SET stock = stock - ? WHERE id = ?";
		$stmt = $con->prepare($updateSql);
		$stmt->bind_param("ii", $cantidad, $id_producto);
		$stmt->execute();

		if ($stmt->affected_rows > 0) {
			echo "Stock for product $id_producto updated successfully.<br>";
		} else {
			echo "Error updating stock for product $id_producto: " . $stmt->error . "<br>";
		}

		$stmt->close();
	}

	// Update the order status (same as before)
	$sql = "UPDATE pedidos SET estado = 1 WHERE id = $ID";
	$result = $con->query($sql);
	}
?>
