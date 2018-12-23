<?php 
if(isset($data) && $data != false): 
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<div class="card">
					<div class="card-header">
						<h2 align="center">Product Info</h2>
					</div>
					<div class="card-body">
						<form action="" method="POST" >
							<div class="form-group">
								<label for="id">ID: </label>
								<input type="text" class="form-control" name="id" id='id' minlength="6" maxlength="100" value="<?=$data['id']?>" disabled>
							</div>
							<div class="form-group">
								<label for="img">Image: </label>
									<div class="img-detail" >
										<img src="../images/<?=$data['img']?>" alt="<?=$data['name']?>">
								</div>
								<br>
								<input type="text" class="form-control" name="img" id='img' minlength="2" maxlength="100" value="<?=$data['img']?>" required>
							</div>
							<div class="form-group">
								<label for="name">Name: </label>

								<input type="text" class="form-control" name="name" id='name' minlength="6" maxlength="100" value="<?=$data['name']?>" required>
							</div>
							<div class="form-group">
								<label for="gender">Gender: </label>
								<label for="male">Male</label>
								<input type="radio" class="single-bottom" name="gender" id="male" value="Nam">
								<label for="female">Female</label>
								<input type="radio" class="single-bottom" name="gender" id="female" value="Nữ">
							</div>
							<div class="form-group">
								<label for="types">Types: </label>
								<select class="form-control" name="types" id="types" class="form-control">
									<option value="Giày Sneaker">Giày Sneaker</option>
									<option value="Giày Boot">Giày Boot</option>
									<option value="Giày Lười">Giày Lười</option>
									<option value="Giày Cao Gót">Giày Cao Gót</option>
									<option value="Giày Tây">Giày Tây</option>
								</select>
							</div>
							<div class="form-group">
								<label for="cost">Cost: (VND)</label><br/>
								<input type="text" class="form-control" name="cost" id='cost' value="<?=$data['cost']?>" required>
							</div>
							<div class="form-group">
								<label for="describes">Describes: </label>
								<textarea class="form-control" name="describes" id="describes" placeholder="Nhập mô tả" required></textarea>
							</div>
							<div class="form-group">
								<label for="phone">Creation time: </label>
								<?php $dateCr = date_create($data['crtime']);
								$dateCr = date_format($dateCr, ' H:i:s \, d-m-Y');
								echo $dateCr; ?>
							</div>
							<div class="form-group">
								<label for="phone">Update time: </label>
								<?php $dateUp = date_create($data['updateTime']);
								$dateUp = date_format($dateUp, ' H:i:s \, d-m-Y');
								echo $dateUp; ?>
							</div>
							<div class="form-group">
								<button type="submit" name="update" class="btn btn-success">Update</button>
								<button type="submit" name="delete" class="btn btn-danger">Delete</button>
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
									if(strcmp($data['gender'], 'Nam') == 0){
										echo "<script>$('#male').attr('checked', true);
										$('#female').attr('checked', false);</script>";
									}elseif(strcmp($data['gender'], 'Nữ') == 0){
										echo "<script>$('#male').attr('checked', false);
										$('#female').attr('checked', true);</script>";
									}
									echo "<script>$('#describes').val('".$data['describes']."')</script>"; 
									echo '<script type="text/javascript">
												$(document).ready(function() {
													$("#types option[value=\''.$data['types'].'\']").attr("selected", "selected");
												});
											</script>';
	?>
	<?php 
endif; 
?>
<script type="text/javascript">
	$(document).ready(function() {
		document.title = 'Quản trị Products';
	});
</script>