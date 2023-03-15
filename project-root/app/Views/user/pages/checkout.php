<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div>
        <!--/breadcrums-->

        <!-- <div class="step-one">
				<h2 class="heading">Step1</h2>
			</div> -->
        <div class="checkout-options">
            <!-- <h3>User</h3> -->
            <p> Xin chào <?php $session=session(); 
            if(empty($session->get('email'))){
            //   $session->destroy();
              echo "<script> location.assign('". base_url(). "/Login') </script>";
            }
            else{
              echo $session->get('email');
            }
            
           
           
           ?></p>
            <!-- <ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul> -->
        </div>
        <!--/checkout-options-->

        <!-- <div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div> -->
        <!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="bill-to">
                        <p>Thông tin thanh toán</p>
                        <div class="login-form">
                            <form action="<?=base_url('confirm_checkout')?>" method="post" onsubmit="return confirm('Xác nhận đặt hàng')">
								<label for="">Họ tên</label>
                                <input type="text" name="name" placeholder="Họ tên">
								<label for="">Địa chỉ</label>
                                <input type="text" name="ar" placeholder="Địa chỉ">
								<label for="">Số điện thoại</label>
                                <input type="text" name="phone" placeholder="Số điện thoại">
								<label for="">Email</label>
                                <input type="text" name="email" placeholder="Email">
								<label for="">Hình thức thanh toán</label>
                                <select  name="shipping">
                                    <option value="cod">COD</option>
                                    <option value="vnpay">VNPAY</option>
                                </select>
                                <button type="submit" class="btn btn-success  ">Xác nhận thanh toán</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <!-- <td></td> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
						$ok = 1;
						if (isset($_SESSION['cart'])) {
							foreach ($_SESSION['cart'] as $k => $v) {
                                if(isset($k)){
                                    $ok = 2;
                                }
                            }
                        }								
								if ($ok==2) {
						?>
                    <form action="<?php echo base_url('updatecart') ?>" method="post">
                        <?php					
					$total = 0;                    
                    $cart = $_SESSION['cart'];
						foreach($products as $row){                         
                            $ses = array_keys($cart, $_SESSION['cart'][$row['MaMH']]);
                            array_keys($cart, $_SESSION['cart'][$row['MaMH']]);
					?>
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="frontend/images/cart/<?php echo $row['HinhAnh'] ?>" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href=""><?php echo $row['TenMH'] ?></a></h4>
                                <p>Web ID: 1089772</p>
                            </td>
                            <td class="cart_price">
                                <p>$<?php echo $row['Giaban'] ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <div class="buttons_added">
                                        <input class="minus is-form" type="button" value="-">
                                        <input aria-label="quantity" class="input-qty"
                                            max="<?php echo $row['SL_TON'] ?>" min="1" name="qty[<?=$row['MaMH']?>]"
                                            value="<?php echo $_SESSION['cart'][$row['MaMH']] ?>" autocomplete="off"
                                            size="2" type="number">
                                        <input class="plus is-form" type="button" value="+">
                                    </div>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    $<?php echo $row['Giaban']*$_SESSION['cart'][$row['MaMH']] ?></p>
                            </td>
                            <?php  $total += $_SESSION['cart'][$row['MaMH']] * $row['Giaban'] ;
						?>
                        </tr>
                        <?php						
				}		
				?>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td>Total</td>
                                        <td><span>$<?php echo $total ?></span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <?php
								}
						?>
                        <button type="submit" class="btn btn-success cart" name="submit">
                            <i class="fa fa-edit"></i>
                            Cập nhật
                        </button>
                    </form>
                </tbody>
            </table>
        </div>
        <?php
						if ($ok != 2) {
							echo "Ban không có hàng";
							?>
        <a class="btn btn-fefault cart" href="<?php echo base_url('/')?>"> Mua Ngay <i class="fa fa-shopping-cart"></i>
        </a>
        <?php
						}else{
							$items = $_SESSION['cart'];                            
							?>
        <?php
						}
                        ?>

    </div>

</section>
<!--/#cart_items-->