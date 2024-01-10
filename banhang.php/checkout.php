<?php
	session_start();
	require_once('db/dbhelper.php');
	require_once('utils/utility.php');
	include_once('layouts/header.php');
	require_once('api/form-checkout.php');
 
	$cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}

?>
<!-- body -->
<form method="post">
<div class="container">
	<div class="row">
    <div class="col-md-6">
    <h3>Thong tin nguoi nhan</h3>

    <div class="form-group">
            <label for="Fullname">Fullname:</label>
            <input type="text" class="form-control" name="fullname" placeholder="Ho Va Ten" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Nhập email" required>
        </div>
        <div class="form-group">
            <label for="Address">Dia chi:</label>
            <input type="text" class="form-control" name="address" placeholder="Nhập mật dia chi" required>
        </div>
        <div class="form-group">
            <label for="pwd"> So dien thoai:</label>
            <input type="text" class="form-control" name="phone_number" placeholder="Nhập so dien thoai" required>
        </div>
    </div>

		<div class="col-md-6">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Thumbnail</th>
					<th>Title</th>
					<th>Num</th>
					<th>Price   </th>
					<th>Total</th>
                    
	
				</tr>
			</thead>
			<tbody>
<?php
	$count = 0;
	$total = 0;
	foreach ($cart as $item) {
		$total += $item['num']*$item['price'];
		echo '
			<tr>
				<td>'.(++$count).'</td>
				<td><img src="'.$item['thumbnail'].'" style="height: 100px"/></td>
				<td>'.$item['title'].'</td>
				<td>'.$item['num'].'</td>
				<td>'.number_format($item['price'], 0, ',', '.').'</td>
				<td>'.number_format($item['num']*$item['price'], 0, ',', '.').'</td>
				';
	}
?>
			</tbody>
		</table>
		<p style="font-size: 30px; color: red">
			Total: <?=number_format($total, 0, ',', '.')?>
		</p>
		<button class="btn btn-success" style="width: 100%; font-size: 32px;">SUBMIT</button>
	</div>
</div>
</div>
</form>

<?php
	include_once('layouts/footer.php');
?>