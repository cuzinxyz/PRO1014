<?php require_once 'views/admin/partials/header.php' ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
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
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tên nhân viên</th>
                    <th>Ảnh nhân viên</th>
                    <th>Lương</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($values as $key => $value) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $value['name'] ?></td>
                      <td>
                        <img src="./public/images/employee/<?= $value['image'] ?>" alt="" style="width:20%">
                      </td>
                      <td><?= $value['salary'] ?></td>
                      <td><?= $value['status'] == 1 ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-danger'>Inactive</span>" ?></td>
                      <td>
                        <a href="?action=edit_employee&id=<?= $value['id'] ?>" style="margin: 0 20px 0 0; color: green;"><i class="fas fa-edit"></i></a>
                        <!-- <a href="?action=edit_employee&id=<?= $value['id'] ?>"><i class="fas fa-trash" style="color: red;"></i></a> -->
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