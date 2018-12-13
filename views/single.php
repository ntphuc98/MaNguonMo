<?php 
	require_once('./header.php');
 ?>
 <?php
 	require_once('../controller/c_products.php');

 	if(isset($_GET['id'])){
 		$c_Product = new C_Products();
		$data = $c_Product->loadDetail($_GET['id']);
 	}else{
 		header('location:index.php');
 	}

  ?>
	<div class="container">
		<div class="single">
				<div class="col-md-12 top-in-single">
					<div class="col-md-5 single-top">	
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image img-responsive" src="../images/<?=$data['img']?>" alt="" >
									<img class="etalage_source_image img-responsive" src="../images/<?=$data['img']?>" alt="" >
								</a>
							</li>
						</ul>

					</div>	
					<div class="col-md-7 single-top-in">
						<div class="single-para">
							<h2><?=$data['name']?></h2>
							
							<div class="star">
								<ul>
									<li><i> </i></li>
									<li><i> </i></li>
									<li><i> </i></li>
									<li><i> </i></li>
									<li><i> </i></li>
								</ul>
								<div class="review">
									
								</div>
							<div class="clearfix"> </div>
							</div>
							
								<label  class="add-to"><?=$data['cost']?> đ</label>
							
							<div class="available">
								<ul>
									<li>Size:
										<select>
											<option value="39">39</option>
											<option value="41">41</option>
											<option value="42">42</option>
											<option value="43">43</option>
											<option value="44">44</option>
										</select>
									</li>
								</ul>
							</div>
								<a href="cart?add=<?=$data['id']?>" class="cart ">Thêm vào giỏ hàng</a>
							<div class="row">
								<div class="product-top" id="detail">
									<h3>Thông tin sản phẩm:</h3>
									<p><?=$data['describes']?></p>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
					</div>					
			</div>
			<div class="clearfix"> </div>		
		</div>
	</div>

	<!--zoom../-->
		<script src="../js/jquery.etalage.min.js"></script>
		<script>
			jQuery(document).ready(function($){
				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+ image_anchor+ '"\n(in Etalage instance: "' + instance_id + '")');
					}
				});

			});
		</script>
	<?php 
		require_once('./footer.php');
	 ?>
