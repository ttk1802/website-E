<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <?php
						$session = session();
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
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>

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
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="<?php echo base_url('/Delcart/'.$ses[0] )?>">
                                    <i class="fa fa-times"></i></a>
                            </td>
                            <?php  $total += $_SESSION['cart'][$row['MaMH']] * $row['Giaban'] ;
								
						?>
                        </tr>
                        <?php						
				}		
				?>
                        <tr>
                            <td class="cart_total">
                                <p>Tổng tiền các món hàng:</p>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="cart_total">
                                <p class="cart_total_price">$<?php echo $total ?></p>
                            </td>
                        </tr>
                        <button type="submit" class="btn btn-primary cart " name="submit">
                            <i class="fa fa-edit"></i>
                            Cập nhật
                        </button>
                    </form>
                </tbody>
            </table>
            <?php
								}					
						?>

        </div>
        <?php
						if ($ok != 2) {
							echo " <div style='margin-left: 100px'>
                            <div>Ban không có hàng</div>
                            </div>
                            ";
							?>
        <a class="btn btn-default cart" style="margin-left: 100px" href="<?php echo base_url('/')?>"> Mua Ngay <i
                class="fa fa-shopping-cart"></i>
        </a>
        <?php
						}else{
							$items = $_SESSION['cart'];
							// echo "Ban dang có " . count($items) ." món hàng";
                            echo " <div style='margin-left: 20px'>
                            <div>Ban dang có " . count($items) . " món hàng</div>
                            </div>
                            ";                            
							?>
        <a class="btn btn-default cart" href="<?php echo base_url('/')?>"> Mua Ngay <i
                class="fa fa-shopping-cart"></i></a>
        <a class="btn btn-danger cart" href="<?php echo base_url('/Delcart/0')?>">Xóa giỏ hàng <i
                class=" fa fa-minus-circle"></i></a>
        <a class="btn btn-default cart" href="<?php echo base_url('/Checkout')?>">Đặt hàng <i
                class=" fa fa-check"></i></a>
        <?php
						}
                        ?>

    </div>
</section>
<!--/#cart_items-->

<!-- <section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>$61</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--/#do_action-->