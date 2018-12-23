	<?php require_once("navAdmin.php"); ?>
	<table class="table table-hover">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Khách hàng</th>
				<th scope="col">Tên sản phẩm</th>
				<th scope="col">Size</th>
				<th scope="col">Amount</th>
				<th scope="col">Cost</th>
				<th scope="col">Address</th>
				<th scope="col">Phone</th>
				<th scope="col">Status</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (isset($data) && $data!=false):
				foreach ($data as $row) {
					?>
					<tr >
						<td>
							<a href="../controller/c_adminUsers.php?edit=<?=$row["iduser"]?>"><?=$row["nameuser"]?></a>
						</td>
						<td>
							<a href="../controller/c_detail.php?id=<?=$row["idproduct"]?>"><?=$row["name"]?></a>
						</td>						
						<td>
							<?=$row["size"]?>
						</td>
						<td>
							<?=$row['amount']?>
						</td>
						<td>
							<?=number_format($row["amount"]*$row["cost"])?> đ
						</td>
						<td>
							<?=$row['address']?>
						</td>
						<td>
							<?=$row['phone']?>
						</td>
						<td>
							<?php 
								if($row['status'] == 1){
									echo "<p style='color:#004085;'>Đang xác nhận</p>";
								}
								if($row['status'] == 2){
									echo "<p style='color:#856404;'>Đang giao hàng</p>";
								}
								if($row['status'] == 3){
									echo "<p style='color:#155724;'>Đã giao hàng</p>";
								}
								if($row['status'] == 0){
									echo "<p style='color:#721c24;'>Đã hủy</p>";
								}
							?>
						</td>
						<td>
							<a href="?edit=<?=$row['idorder']?>"><input type="button" value="Edit"></a>
						</td>
					</tr>
				<?php } endif; ?>
			</tbody>
		</table>


