<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <?php
                                            foreach($products as $product){
                                            ?>
                <form action="<?=base_url();?>/admin/product/act_update" method="post" enctype="multipart/form-data">
                    <div class="modal fade bd-example-modal-lg" id="edit_<?=@$product['MaMH'];?>" tabindex="-1"
                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" id=>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="varyModalLabel">Chỉnh sửa sản phẩm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="TenMH">Tên mặt hàng</label>
                                            <input type="text" class="form-control" id="title-<?=@$product['MaMH']?>"
                                                onkeyup="ChangeToSlug('<?=@$product['MaMH']?>');" name="TenMH"
                                                value="<?=@$product['TenMH']?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="GiaBan">Giá bán</label>
                                            <input type="text" class="form-control" id="GiaBan" name="GiaBan"
                                                value="<?=@$product['Giaban']?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="GiaNhap">Giá nhập</label>
                                            <input type="text" class="form-control" id="GiaNhap" name="GiaNhap"
                                                value="<?=@$product['GiaNhap']?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="GKM">Giá khuyến mãi</label>
                                            <input type="text" class="form-control" id="GKM" name="GKM"
                                                value="<?=@$product['GiaKhuyenMai']?>">
                                        </div>

                                        <div class="form-group col-md-3 ">
                                            <label for="slt">SL_Tồn</label>
                                            <input type="text" class="form-control" id="slt" name="slt"
                                                value="<?=@$product['SL_TON']?>">
                                        </div>
                                        <div class="form-group col-md-3 ">
                                            <label for="KT">Kích thước</label>
                                            <input type="text" class="form-control" id="KT" placeholder="" name="KT"
                                                value="<?=@$product['KichThuoc']?>">
                                        </div>
                                        <div class="form-group col-md-3 ">
                                            <label for="MS">Màu sắc</label>
                                            <input type="text" class="form-control" id="MS" placeholder="" name="MS"
                                                value="<?=@$product['MacSac']?>">
                                        </div>
                                        <div class="form-group col-md-3 ">
                                            <label for="DVT">Đơn vị tính</label>
                                            <input type="text" class="form-control" id="DVT" placeholder="" name="DVT"
                                                value="<?=@$product['DVT']?>">
                                        </div>
                                        <div class="form-group col-md-6 ">
                                            <label for="HA">Hình ảnh </label>
                                            <input type="file" class="form-control-file" id="HA" placeholder=""
                                                name="HA" value="<?=@$product['HinhAnh']?>">
                                            <input type="hidden" class="form-control-file" id="HA" placeholder=""
                                                name="HA_old" value="<?=@$product['HinhAnh']?>">
                                            <img style=" width: 150px;"
                                                src="frontend/images/product/<?=@$product['HinhAnh']?>" alt="">
                                        </div>
                                        <div class="form-group col-md-12 ">
                                            <label for="MT">Mô tả</label>
                                            <textarea class="form-control" id="MT" rows="4" name="MT"
                                                value="<?=@$product['MoTa']?>"><?=@$product['MoTa']?></textarea>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="DM">Danh mục</label>
                                            <select name="DM" id="DM" class="form-control" required
                                                value="<?=@$product['MaDM']?>">
                                                <?php
                                            foreach($categories as $category){
                                            ?>
                                                <option value="<?=$category["MaDM"];?>" id='<?=$category["MaDM"];?>'>
                                                    <?=$category["TenDM"];?></option>

                                                <?php
                                            } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 ">
                                            <label for="slug">Slug</label>
                                            <input type="text" class="form-control" id="slug-<?=@$product['MaMH']?>"
                                                placeholder="" name="slugsp" value="<?=@$product['slugsp']?>">
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" id="id" name="id"
                                        value="<?=@$product['MaMH'];?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn mb-2 btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php }?>
                <?php
                                            foreach($products as $product){
                                            ?>
                <form action="" method="">
                    <div class="modal fade" id="remove_product-<?=$product['MaMH']?>" tabindex="-1" role="dialog"
                        aria-labelledby="defaultModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="defaultModalLabel">Cảnh báo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">Bạn thật sự muốn xóa không</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn mb-2 btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <input type="hidden" value="<?=$product['MaMH']?>">
                                    <a href="<?=base_url();?>/admin/product/del/<?=$product['MaMH']?>" type="submit"
                                        class="btn mb-2 btn-primary">Đồng ý</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                                            }
                                            ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Thông tin sảm phẩm</strong>
                            </div>
                            <div class="card-body">
                                <form action="<?=base_url();?>/admin/product/atc_add" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="TenMH">Tên mặt hàng</label>
                                            <input type="text" class="form-control" id="title---1" name="TenMH"
                                                onkeyup="ChangeToSlug('--1');">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="GiaBan">Giá bán</label>
                                            <input type="text" class="form-control" id="GiaBan" name="GiaBan">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="GiaNhap">Giá nhập</label>
                                            <input type="text" class="form-control" id="GiaNhap" name="GiaNhap">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="GKM">Giá khuyến mãi</label>
                                            <input type="text" class="form-control" id="GKM" name="GKM">
                                        </div>

                                        <div class="form-group col-md-3 ">
                                            <label for="slt">SL_Tồn</label>
                                            <input type="text" class="form-control" id="slt" name="slt">
                                        </div>
                                        <div class="form-group col-md-3 ">
                                            <label for="KT">Kích thước</label>
                                            <input type="text" class="form-control" id="KT" placeholder="" name="KT">
                                        </div>
                                        <div class="form-group col-md-3 ">
                                            <label for="MS">Màu sắc</label>
                                            <input type="text" class="form-control" id="MS" placeholder="" name="MS">
                                        </div>
                                        <div class="form-group col-md-3 ">
                                            <label for="DVT">Đơn vị tính</label>
                                            <input type="text" class="form-control" id="DVT" placeholder="" name="DVT">
                                        </div>
                                        <div class="form-group col-md-6 ">
                                            <label for="HA">Hình ảnh</label>
                                            <input type="file" class="form-control-file" id="HA" placeholder=""
                                                name="HA">
                                        </div>

                                        <div class="form-group col-md-12 ">
                                            <label for="MT">Mô tả</label>
                                            <textarea class="form-control" id="MT" rows="4" name="MT"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="DM">Danh mục</label>
                                            <select name="DM" id="DM" class="form-control" required>
                                                <?php
                                            foreach($categories as $category){
                                            ?>
                                                <option value="<?=$category["MaDM"];?>" id='<?=$category["MaDM"];?>'>
                                                    <?=$category["TenDM"];?></option>
                                                <?php
                                            } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 ">
                                            <label for="slug">Slug</label>
                                            <input type="text" class="form-control" id="slug---1" placeholder=""
                                                name="slugsp">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </form>
                            </div> <!-- /. card-body -->
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
                                <strong class="card-title">Danh sách sản phẩm</strong>
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>#</th>
                                            <th>Tên mặt hàng</th>
                                            <th>Giá bán</th>
                                            <th>Số lượng tồn</th>
                                            <th>Hình ảnh</th>
                                            <th>Mô tả</th>
                                            <th>Danh mục</th>
                                            <th>Slug</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($products as $product){
                                            ?>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <!-- <label class="custom-control-label"></label> -->
                                                </div>
                                            </td>
                                            <td> <?php echo $product["MaMH"]; ?></td>
                                            <td> <?php echo $product["TenMH"]; ?></td>
                                            <td> <?php echo $product["Giaban"]; ?></td>
                                            <td> <?php echo $product["SL_TON"]; ?></td>
                                            <td> <img src="frontend/images/cart/<?php echo $product['HinhAnh'] ?>"
                                                    alt=""></td>
                                            <td> <?php echo $product["MoTa"]; ?></td>
                                            <td> <?php echo $product["TenDM"]; ?></td>
                                            <td> <?php echo $product["slugsp"]; ?></td>
                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a type="button" data-toggle="modal"
                                                        data-target="#edit_<?=$product['MaMH']?>" class="dropdown-item"
                                                        href="">Edit</a>
                                                    <a type="button" data-toggle="modal"
                                                        data-target="#remove_product-<?=$product['MaMH']?>"
                                                        class="dropdown-item">Remove</a>
                                                </div>
                                            </td>
                                            <?php
                                            }      
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->