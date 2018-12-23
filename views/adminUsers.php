	<table class="table table-hover">
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">UserName</th>
				<th scope="col">Email</th>
				<th scope="col">Sex</th>
				<th scope="col">Birthday</th>
				<th scope="col">Phone</th>
				<th scope="col">Address</th>
				<th scope="col">Verified</th>
				<th scope="col">Role</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (isset($data) && $data!=false):
				foreach ($data as $row) {
					?>
					<tr>
						<td>
							<?=$row["id"]?>
						</td>
						<td>
							<?=$row["name"]?>
						</td>						
						<td>
							<?=$row["username"]?>
						</td>
						<td>
							<?=$row['email']?>
						</td>
						<td>
							<?=$row["sex"]?>
						</td>
						<td>
							<?=$row['birthday']?>
						</td>
						<td>
							<?=$row['phone']?>
						</td>
						<td>
							<?=$row['address']?>
						</td>
						<td>
							<?php 
								
								if($row['verified'] == 1){
									echo "<p style='color:#155724;'>Đã xác nhận</p>";
								}
								if($row['verified'] == 0){
									echo "<p style='color:#721c24;'>Chưa xác nhận</p>";
								}
							?>
						</td>
						<td>
							<?php 
								
								if($row['role'] == 2){
									echo "<p style='color:#155724;'>Khách hàng</p>";
								}
								if($row['role'] == 1){
									echo "<p style='color:#721c24;'>Admin</p>";
								}
							?>
						</td>
						<td>
							<a href="?edit=<?=$row['id']?>"><input type="button" value="Edit"></a>
						</td>
					</tr>
				<?php } endif; ?>
			</tbody>
		</table>



