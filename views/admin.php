<?php 
require_once("header.php");
require_once("../model/m_products.php");
?>
<?php
$m_product = new M_Products();
$data = $m_product->queryProducts();
?>

<dv class="container">
	<div class="row">
		<div class="col-md-9 col-md-offset-3">
			<table class="table table-responsive">
				<thead class="dark">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Types</th>
						<th>Cost</th>
						<th>Images</th>
						<th>Describes</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($data as $row) {
						?>
						<tr>
							<td><?=$row["id"]?></td>
							<td><?=$row["name"]?></td>
							<td><?=$row["gender"]?></td>
							<td><?=$row["types"]?></td>
							<td><?=$row["cost"]?></td>
							<td><?=$row["img"]?></td>
							<td><?=$row["describes"]?></td>
							<td><a href="">Edit</a></td>
							<td><a href="">Delete</a></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>	
		</div>
	</div>
</dv>
<?php
require_once("footer.php");
?>