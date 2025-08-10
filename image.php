<link rel="stylesheet" href="./assets/css/main.css">
<?php
ob_start();
session_start();
include("admin/inc/config.php");
include("admin/inc/functions.php");
include("admin/inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';

// Getting all language variables into array as global variable
$i = 1;
$statement = $pdo->prepare("SELECT * FROM tbl_language");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	define('LANG_VALUE_' . $i, $row['lang_value']);
	$i++;
}

$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$logo = $row['logo'];
	$shop_name = $row['shopname'];
	$favicon = $row['favicon'];
	$contact_email = $row['contact_email'];
	$contact_phone = $row['contact_phone'];
	$meta_title_home = $row['meta_title_home'];
	$meta_keyword_home = $row['meta_keyword_home'];
	$meta_description_home = $row['meta_description_home'];
	$before_head = $row['before_head'];
	$after_body = $row['after_body'];
}

// Checking the order table and removing the pending transaction that are 24 hours+ old. Very important
$current_date_time = date('Y-m-d H:i:s');
$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Pending'));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$ts1 = strtotime($row['payment_date']);
	$ts2 = strtotime($current_date_time);
	$diff = $ts2 - $ts1;
	$time = $diff / (3600);
	if ($time > 24) {

		// Return back the stock amount
		$statement1 = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
		$statement1->execute(array($row['payment_id']));
		$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result1 as $row1) {
			$statement2 = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
			$statement2->execute(array($row1['product_id']));
			$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result2 as $row2) {
				$p_qty = $row2['p_qty'];
			}
			$final = $p_qty + $row1['quantity'];

			$statement = $pdo->prepare("UPDATE tbl_product SET p_qty=? WHERE p_id=?");
			$statement->execute(array($final, $row1['product_id']));
		}

		// Deleting data from table
		$statement1 = $pdo->prepare("DELETE FROM tbl_order WHERE payment_id=?");
		$statement1->execute(array($row['payment_id']));

		$statement1 = $pdo->prepare("DELETE FROM tbl_payment WHERE id=?");
		$statement1->execute(array($row['id']));
	}
}
?>

<!-- top bar -->
	 <div class="top">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="left">
						<ul>
							<li><i class="fa fa-phone"></i> <?php echo $contact_phone; ?></li>
							<li><i class="fa fa-envelope-o"></i> <?php echo $contact_email; ?></li>
							
						</ul>
					</div>
				</div>
					<div class="right">
						<a href="login.php" class="btn"><i class="fa fa-sign-in"></i> <?php echo LANG_VALUE_9; ?></a>
						<button class="btn"><a href="registration.php"><i class="fa fa-user-plus"></i> <?php echo LANG_VALUE_15; ?></a></button>
						
						<!-- <ul>
							<?php
							$statement = $pdo->prepare("SELECT * FROM tbl_social");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
							?>
								<?php if ($row['social_url'] != '') : ?>
									<li><a href="<?php echo $row['social_url']; ?>"><i class="<?php echo $row['social_icon']; ?>"></i></a></li>
								<?php endif; ?>
							<?php
							}
							?>
						</ul> 

						<!-- <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> <?php echo LANG_VALUE_19; ?> (<img src="./assets/uploads/rupee-indian.png" width="15px"><?php
																																			if (isset($_SESSION['cart_p_id'])) {
																																				$table_total_price = 0;
																																				$i = 0;
																																				foreach ($_SESSION['cart_p_qty'] as $key => $value) {
																																					$i++;
																																					$arr_cart_p_qty[$i] = $value;
																																				}
																																				$i = 0;
																																				foreach ($_SESSION['cart_p_current_price'] as $key => $value) {
																																					$i++;
																																					$arr_cart_p_current_price[$i] = $value;
																																				}
																																				for ($i = 1; $i <= count($arr_cart_p_qty); $i++) {
																																					$row_total_price = $arr_cart_p_current_price[$i] * $arr_cart_p_qty[$i];
																																					$table_total_price = $table_total_price + $row_total_price;
																																				}
																																				echo $table_total_price;
																																			} else {
																																				echo '0.00';
																																			}
																																			?>)</a></li>
						<li><a href="wishlist.php"><image src="./assets/uploads/like.png" width="20"> Wishlist</a></li>
					</ul>
				</div>
				<!-- <div class="col-md-4 search-area">
					<form class="navbar-form navbar-left" role="search" action="search-result.php" method="get">
						<?php $csrf->echoInputField(); ?>
						<div class="form-group">
							<input type="text" class="form-control search-top" placeholder="<?php echo LANG_VALUE_2; ?>" name="search_text" id="input_size">
						</div>
						<button type="submit" class="btn btn-default"><?php echo LANG_VALUE_3; ?></button>
					</form>
				</div> 
					</div> -->
				</div>
			</div>
		</div>
	</div>