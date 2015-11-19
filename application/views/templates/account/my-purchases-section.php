<!-- Single button -->
<div class="form-group">
<!-- 	<div class="dropdown"> -->
<!-- 		<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> -->
<!-- 			estado de compras <span class="caret"></span> -->
<!-- 		</button> -->
<!-- 		<ul class="dropdown-menu" role="menu"> -->
<!-- 			<li><a href="#">Action</a></li> -->
<!-- 			<li><a href="#">Another action</a></li> -->
<!-- 			<li><a href="#">Something else here</a></li> -->
<!-- 			<li class="divider"></li> -->
<!-- 			<li><a href="#">Separated link</a></li> -->
<!-- 		</ul> -->
<!-- 	</div> -->
	<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading">Description de tus compras</div>
	<div class="panel-body">
		<p>En esta sección podrás ver todos los detalles de cada una de tus compras.</p>
	</div>
	<?php if ( isset($orders) ):?>
      <!-- Table -->
	<div class="table-responsive">
		<table class="table  table-condensed">
			<thead>
				<tr>
					<th>Fecha de la compra</th>
					<th>Productos</th>
                    <th>Costo de envío</th>
					<th>Valor</th>	
				</tr>
			</thead>
			<tbody>
			
				<?php foreach ( $orders as $order ):?>
					<tr>
						<td><?= $order->send_date?></td>
						<td>
							<?php foreach ( $order->products as $product ):?>
								<a href="<?= base_url() . 'product/search_product/' . str_replace(' ', '_', $product->name) ?>"><?=$product->name?></a>
							<?php endforeach;?>
						</td>
                        <td><?= '$' . number_format($order->shipping_charge)?></td>
						<td><?= '$' . number_format(bcsub($order->value, $order->shipping_charge))?></td>
					</tr>
				<?php endforeach;?>
			
			</tbody>
		</table>
	</div>
	<?php else:?>
		<p class="bg-warning">Sin compras</p>			
	<?php endif;?>
</div>
    

