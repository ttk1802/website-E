<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <?php
                                            foreach($categories as $category){
                                            ?>
                <form action="<?=base_url();?>/admin/category/act_update" method="post">
                    <div class="modal fade bd-example-modal-lg" id="edit_<?=@$category['MaDM']?>" tabindex="-1"
                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" id=>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="varyModalLabel">Chỉnh sửa tài khoản</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="TenDM">Tên danh mục</label>
                                            <input type="text" class="form-control" id="title-<?=@$category['MaDM']?>"  onkeyup="ChangeToSlug('<?=@$category['MaDM']?>');"  name="TenDM"
                                                value="<?=@$category['TenDM']?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Slug</label>
                                            <input type="text" class="form-control" id="slug-<?=@$category['MaDM']?>" name="slug"
                                                value="<?=@$category['slug']?>">
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" id="id" name="id"
                                        value="<?=@$category['MaDM'];?>">
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
                <?php
                }
                 ?>
                <?php
                                            foreach($categories as $category){
                                            ?>
                <form action="" method="">
                    <div class="modal fade" id="remove_category-<?=$category['MaDM']?>" tabindex="-1" role="dialog"
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
                                    <input type="hidden" value="<?=$category['MaDM']?>">
                                    <a href="<?=base_url();?>/admin/category/del/<?=$category['MaDM']?>" type="submit"
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
                                <strong class="card-title">Thông tin danh mục</strong>
                            </div>
                            <div class="card-body">
                                <form action="<?=base_url();?>/admin/category/atc_add" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="TenDM">Tên dạnh mục</label>
                                            <input type="text" class="form-control" id="title--1"  onkeyup="ChangeToSlug('-1');"  name="TenDM">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="TenDM">Slug</label>
                                            <input type="text" class="form-control" id="slug--1" name="slug">
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
                                <strong class="card-title">Danh sách danh mục</strong>
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>#</th>
                                            <th>Tên danh mục</th>
                                            <th>Slug</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($categories as $category){
                                            ?>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <!-- <label class="custom-control-label"></label> -->
                                                </div>
                                            </td>
                                            <td> <?php echo $category["MaDM"]; ?></td>
                                            <td> <?php echo $category["TenDM"]; ?></td>
                                            <td> <?php echo $category["slug"]; ?></td>
                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a type="button" data-toggle="modal"
                                                        data-target="#edit_<?=$category['MaDM']?>" class="dropdown-item"
                                                        href="">Edit</a>
                                                    <a type="button" data-toggle="modal"
                                                        data-target="#remove_category-<?=$category['MaDM']?>"
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