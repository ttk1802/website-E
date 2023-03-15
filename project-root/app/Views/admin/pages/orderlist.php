<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <?php
                                            foreach($orders as $order){
                                            ?>
                <form action="<?=base_url();?>/admin/order/act_update" method="post">
                    <div class="modal fade bd-example-modal-lg" id="edit_order<?=$order['MaDH']?>" tabindex="-1"
                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="varyModalLabel">Chỉnh sửa đơn hàng</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"> 
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="TenDM">Họ tên</label>
                                            <input type="text" class="form-control" id="TenDM" name="TenDM"
                                                value="<?=@$order['Hoten']?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="TenDM">Địa chỉ</label>
                                            <input type="text" class="form-control" id="TenDM" name="TenDM"
                                                value="<?=@$order['diachi']?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="TenDM">Điện thoại</label>
                                            <input type="text" class="form-control" id="TenDM" name="TenDM"
                                                value="<?=@$order['sdt']?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="TenDM">Trạng thái</label>
                                            <input type="text" class="form-control" id="TenDM" name="TenDM"
                                                value="<?=@$order['status']?>">
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" id="id" name="id"
                                        value="<?=@$order['MaDM'];?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn mb-2 btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <input type="text" value="<?=$order['id']?>">
                                    <a href="<?=base_url();?>/admin/order/del/<?=$order['id']?>" type="submit"
                                        class="btn mb-2 btn-primary">Đồng ý</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                }
                 ?>
                <!-- Modal -->
                <?php
                                            foreach($orders as $order){
                                            ?>
                <form action="<?=base_url();?>/admin/order/del" method="post" onsubmit="return confirm('Xóa thành công')">
                    <div class="modal fade" id="remove_order-<?=$order['MaDH']?>" tabindex="-1" role="dialog"
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
                                    <input type="hidden" name="id" value="<?=$order['id']?>">
                                    <input type="hidden" name="MaDH" value="<?=$order['MaDH']?>">
                                    <button type="submit" class="btn btn-primary">Đồng ý</button>
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
                                <strong class="card-title">Danh sách đơn hàng</strong>
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>#</th>
                                            <th>Họ tên</th>
                                            <th>Địa chỉ</th>
                                            <th>Điện thoại</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($orders as $order){
                                            ?>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <!-- <label class="custom-control-label"></label> -->
                                                </div>
                                            </td>
                                            <td> <?php echo $order["MaDH"]; ?></td>
                                            <td> <?php echo $order["Hoten"]; ?></td>
                                            <td> <?php echo $order["diachi"]; ?></td>
                                            <td> <?php echo $order["sdt"]; ?></td>
                                            <td> <?php 
                                                if($order["status"]==1 || $order["status"]==0){
                                                    echo "Đang chờ xử lý";
                                                }elseif($order["status"]==2){
                                                    echo "Đã giao hàng";
                                                }else{
                                                    echo "Đã hủy";
                                                }?>
                                            </td>
                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a type="button" data-toggle="modal"
                                                        data-target="#edit_order<?=$order['MaDH']?>"
                                                        class="dropdown-item" href="">Edit</a>
                                                    <a class="dropdown-item" href="<?=base_url();?>/admin/order/view/<?=$order['id']?>">View</a>
                                                    <a type="button" data-toggle="modal"
                                                        data-target="#remove_order-<?=$order['MaDH']?>"
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