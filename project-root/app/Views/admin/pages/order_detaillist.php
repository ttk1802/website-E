<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">             
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <!-- <div class="card-header">
                                <strong class="card-title">Thông tin đơn hàng</strong>
                            </div> -->
                            <!-- <div class="card-body">
                                <form action="<?=base_url();?>/admin/order/atc_add" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="fisrtname">Họ tên</label>
                                            <input type="text" class="form-control" id="fisrtname" name="fname">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lastname">Địa chỉ</label>
                                            <input type="text" class="form-control" id="lastname" name="lname">
                                        </div>

                                        <div class="form-group col-md-6 ">
                                            <label for="phone">Điện thoại</label>
                                            <input type="text" class="form-control" id="phone" placeholder="">
                                        </div>

                                        <div class="form-group col-md-6 ">
                                            <label for="phone">Trạng thái</label>
                                            <input type="text" class="form-control" id="phone" placeholder=""
                                                name="phone">
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                                </form>
                            </div>  -->
                            <!-- /. card-body -->
                        </div> <!-- /. card -->
                    </div> <!-- /. col -->
                </div> <!-- /. end-section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Chi tiết đơn hàng</strong>
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables table2excel" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>#</th>
                                            <th>Tên hàng</th>
                                            <th>Hình ảnh</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $i = 1;
                                            foreach($orderdetails as $orderdetail){
                                            ?>
                                        <tr>
                                            <td>
                                                <label> <?=$i++?> </label>
                                                <!-- </div> -->
                                            </td>
                                            <td> <?php echo $orderdetail["MaDH"]; ?></td>
                                            <td> <?php echo $orderdetail["TenMH"]; ?></td>
                                            <td>
                                                <img src="frontend/images/cart/<?php echo $orderdetail['HinhAnh'] ?>"
                                                    alt="">
                                            </td>
                                            <td> <?php echo $orderdetail["Giaban"]; ?></td>
                                            <td> <?php echo $orderdetail["SL"]; ?></td>
                                            <td> <?php echo $orderdetail["Giaban"] * $orderdetail["SL"] ; ?></td>
                                        </tr>
                                        <?php
                                            }      
                                            ?>
                                        <tr class="noExl">
                                            <td>
                                                <select id="xuly" class="form-control">
                                                    <?php
                                                   if ($orderdetail['status'] == 0):
                                                    ?>
                                                    <option selected id="<?=$orderdetail['id']?>" value="0">----Hãy xử
                                                        lý đơn hàng----</option>
                                                    <option id="<?=$orderdetail['id']?>" value="1">Đang chờ xử lý
                                                    </option>
                                                    <option id="<?=$orderdetail['id']?>" value="2">Đã giao hàng</option>
                                                    <option id="<?=$orderdetail['id']?>" value="3">Đã hủy</option>
                                                    <?php
                                                   endif;
                                                   ?>
                                                    <?php
                                                   if ($orderdetail['status'] == 1):
                                                    ?>
                                                    <option id="<?=$orderdetail['id']?>" value="0">----Hãy xử lý đơn
                                                        hàng----</option>
                                                    <option selected id="<?=$orderdetail['id']?>" value="1">Đang chờ xử
                                                        lý</option>
                                                    <option id="<?=$orderdetail['id']?>" value="2">Đã giao hàng</option>
                                                    <option id="<?=$orderdetail['id']?>" value="3">Đã hủy</option>
                                                    <?php
                                                   endif;
                                                   ?>
                                                    <?php
                                                   if ($orderdetail['status'] == 2):
                                                    ?>
                                                    <option id="<?=$orderdetail['id']?>" value="0">----Hãy xử lý đơn
                                                        hàng----</option>
                                                    <option id="<?=$orderdetail['id']?>" value="1">Đang chờ xử lý
                                                    </option>
                                                    <option selected id="<?=$orderdetail['id']?>" value="2">Đã giao hàng
                                                    </option>
                                                    <option id="<?=$orderdetail['id']?>" value="3">Đã hủy</option>
                                                    <?php
                                                   endif;
                                                   ?>
                                                    <?php
                                                   if ($orderdetail['status'] == 3):
                                                    ?>
                                                    <option id="<?=$orderdetail['id']?>" value="0">----Hãy xử lý đơn
                                                        hàng----</option>
                                                    <option id="<?=$orderdetail['id']?>" value="1">Đang chờ xử lý
                                                    </option>
                                                    <option id="<?=$orderdetail['id']?>" value="2">Đã giao hàng</option>
                                                    <option selected id="<?=$orderdetail['id']?>" value="3">Đã hủy
                                                    </option>
                                                    <?php
                                                   endif;
                                                   ?>

                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <button onclick="exportXlm()"
                                        class="btnExport btn mb-2 btn-outline-success">Export</button>
                                </table>

                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div>
            <!-- .col-12 -->

        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->
