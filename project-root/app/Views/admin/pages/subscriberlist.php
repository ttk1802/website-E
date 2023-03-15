<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
              
                <!-- Modal -->
                <?php
                                            foreach($subs as $sub){
                                            ?>
                <form action="" method="">
                    <div class="modal fade" id="remove_user-<?=$sub['id']?>" tabindex="-1" role="dialog"
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
                                    <input type="hidden" value="<?=$sub['id']?>">
                                    <a href="<?=base_url();?>/admin/subscriber/del/<?=$sub['id']?>" type="submit"
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
                            <!-- <div class="card-header">
                                <strong class="card-title">Thông tin tài khoản</strong>
                            </div> -->
                            <!-- <div class="card-body">
                                <form action="<?=base_url();?>/admin/user/atc_add" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="fisrtname">Họ đệm</label>
                                            <input type="text" class="form-control" id="fisrtname" name="fname">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lastname">Tên</label>
                                            <input type="text" class="form-control" id="lastname" name="lname">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="pw">Password</label>
                                            <input type="password" class="form-control" id="pw" name="pw">
                                        </div>

                                        <div class="form-group col-md-6 ">
                                            <label for="phone">Điện thoại</label>
                                            <input type="text" class="form-control" id="phone" placeholder=""
                                                name="phone">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="role">Quyền</label>
                                            <select name="role" id="role" class="form-control" required>

                                                <option value="ADMIN" id='1'>ADMIN</option>
                                                <option selected value="USER" id='2'>USER</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                                </form>
                            </div> -->
                             <!-- /. card-body -->
                        </div> <!-- /. card -->
                    </div> <!-- /. col -->
                </div>
                 <!-- /. end-section -->
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
                                <strong class="card-title">Danh sách theo dõi</strong>
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>#</th>
                                            <th>Email</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($subs as $sub){
                                            ?>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <!-- <label class="custom-control-label"></label> -->
                                                </div>
                                            </td>
                                            <td> <?php echo $sub["id"]; ?></td>
                                            <td> <?php echo $sub["email"]; ?></td>
                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                   
                                                    <a type="button" data-toggle="modal"
                                                        data-target="#remove_user-<?=$sub['id']?>"
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