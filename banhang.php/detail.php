<?php
	session_start();

	require_once('db/dbhelper.php');
	require_once('utils/utility.php');
	include_once('layouts/header.php');

	$id = getGet('id');
	$product = executeResult("select * from products where id = $id", true);
?>
<!-- body -->
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<img src="<?=$product['thumbnail']?>" style="width: 100%">
		</div>
		<div class="col-md-7">
			<h3><?=$product['title']?></h3>
			<p style="color: red; font-size: 30px;"><?=number_format($product['price'], 0, '', '.')?> vnđ</p>
			<p><?=$product['content']?></p>
            <select class="form-control" style="width: 120px;" id="num">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
			<button class="btn btn-success" onclick="addToCart(<?=$id?>)" style="font-size: 32px; width: 100%; padding: 10px; margin-top: 10px;">Add to cart</button>
		</div>
	</div>
</div>
<script type="text/javascript">
	function addToCart(id) {
		$.post('api/api-product.php', {
			'id': id,
			'action': 'add',
			'num': $('#num').val()
		}, function(data) {
			location.reload()
		})
	}
</script>
<?php
	include_once('layouts/footer.php');
?>