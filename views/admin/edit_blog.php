<?php require_once 'views/admin/partials/header.php'; ?>

<div class="content-wrapper" style="min-height: 1345.6px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sửa bài viết</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Update Blog</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Add Blog</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form action="" method="POST" enctype="multipart/form-data">
              <div class="card-body">

                <div class="tt">
                  <input type="hidden" name="id" value=<?php if (isset($id) && ($id > 0)) echo $id; ?>>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title blog" name="title" value="<?= isset($_GET['id']) ? $blogEdit['title'] : "" ?>">
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Content</label>
                  <textarea class="form-control" rows="5" placeholder="Enter ..." name="content" id="summernote">
                    <?= isset($_GET['id']) ? $blogEdit['content'] : "" ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image blog</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                      <img src="<?= $image ?>" alt="">
                      <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="edit_blog">OK</button>
              </div>
            </form>

          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php require_once 'views/admin/partials/footer.php'; ?>