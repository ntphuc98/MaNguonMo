<?php 
	require_once('./header.php');
 ?>
<?php
	require_once('../controller/c_products.php');
	$sql = 'SECLECT * FROM productShoe WHERE 1=1 ';
	$c_Product = new C_Products();
	$gender = $c_Product->loadGenderProducts();
	$types = $c_Product->loadTypeProducts();

	if(isset($_POST['gender']) && $_POST['gender']!=0 ){
		echo $_POST['gender'];
	}
	if(isset($_POST['types']) && $_POST['types']!=0){
		echo $_POST['types'];
	}
	if(isset($_POST['cost']) && $_POST['cost']!=0){
		echo $_POST['cost'];
	}

	$data = $c_Product->loadProducts();
 ?>
	<!--content-->
	<div class="content">    
		<div class="content-grids">
			<h2 align="center"><b>Sản Phẩm</b></h2>
			<br>
				<div class="row">
					<div class="col-md-10 col-md-offset-2">
						<form class="form-inline" action="" method="POST">
							<div class="form-group">
								<label for="gender">Giày Nam:</label>
							    <select class="form-control" name="gender" id="gender">
							     	<option value="0"> --- </option>
							     	<?php
							     		if($gender != 0 ){
							     			foreach ($gender as $i) {
							     				?>
							     				<option value="<?=$i['id']?>"><?=$i['name']?></option>
							     				<?php
							     			}
							     		}
							     	?> 
							    </select>
							</div>
							<div class="form-group">
								<label for="types">Giày Nữ:</label>
							    <select class="form-control" name="types" id="types">
							     	<option value="0"> --- </option>
							     	<?php
							     		if($types != 0 ){
							     			foreach ($types as $i) {
							     				?>
							     				<option value="<?=$i['id']?>"><?=$i['name']?></option>
							     				<?php
							     			}
							     		}
							     	?>
							    </select>
							</div>
							<div class="form-group">
								<label for="cost">Giá:</label>
							    <select class="form-control" name="cost" id="cost">
							    	<option value="0"> --- </option>
							     	<option value="1">Thấp - Cao</option>
							        <option value="2">Cao - Thấp</option>
							    </select>
							</div>
							<button type="submit" class="btn btn-default">Tìm kiếm</button>
						</form>
					</div>
				</div>
			<div class="product-top">
				<!-- start-product -->
				<div class="row">
				<?php 
					foreach ($data as $row) {
						?>
							<div class="col-md-3 grid-product-in">	
								<div class=" product-grid">	
									<a href="./single.php?id=<?=$row['id']?>"><img class="img-responsive " src="../images/<?=$row['img']?>" alt="<?=$row['name']?>" style="height: 214px;width: 234px;"></a>		
									<div class="shoe-in">
										<h6><a href="./single.php?id=<?=$row['id']?>"><?=(ucwords($row['name']))?></a></h6>
										<label><?=$row['cost']?> đ</label>
										<a href="./single.php?id=<?=$row['id']?>" class="store">Xem chi tiết</a>
									</div>

									<b class="plus-on">+</b>
								</div>	
							</div>

						<?php
					}


				 ?>
				<!-- end product -->
				
					
				</div>
					<div class="clearfix"> </div>
			</div>
			<!-- product-top -->
			<div class="clearfix"> </div>
		</div>
		<!-- content-grids -->
	</div>
	<!-- content -->
<?php 
	require_once('./footer.php');
 ?>