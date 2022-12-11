<?php require_once 'views/admin/partials/header.php' ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách dịch vụ</h1>
        </div>
        <div class="col-sm-6">
          <div class="float-sm-right">
            <a href="/?action=addservice">
              <button type="button" class="btn btn-block btn-primary btn-sm">Thêm dịch vụ</button>
            </a>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tên dịch vụ</th>
                    <th>Giá dịch vụ</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($values_service as $key => $value) : ?>
                    <tr>
                      <td><?= $count += 1 ?></td>
                      <td><?= $value['name'] ?></td>
                      <td><?= number_format($value['price'], 0, '', ',');  ?> &#8363;</td>
                      <td><?= $value['status'] == 1 ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-danger'>Inactive</span>" ?></td>
                      <!--  -->
                      <td>
                        <a href="?action=edit_service&id=<?= $value['id'] ?>"><i class="fas fa-edit"></i>Update</a>
                        <!-- <a href="">Delete</a> -->
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  <?php foreach ($values_comboes as $key => $value) : ?>
                    <tr>
                      <td><?= $count += 1 ?></td>
                      <td><?= $value['comboname'] ?> <span style="color:red">(Combo)</span></td>
                      <td><?= number_format($value['tongtien'], 0, '', ',') ?> &#8363;</td>
                      <td><?= $value['trangthaicombo'] == 1 ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-danger'>Inactive</span>" ?></td>
                      <!--  -->
                      <td>
                        <a href="?action=edit_combo&id=<?= $value['id'] ?>"><i class="fas fa-edit"></i>Update</a>
                        <!-- <a href="">Delete</a> -->
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php require_once 'views/admin/partials/footer.php' ?>