<?= $this->extend('layout/master.php') ?>

<?= $this->section('content') ?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <?php if(session('failed')) : ?>
                <div class="alert alert-danger">
                    <?= session('failed'); ?>
                </div>
            <?php endif; ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('pegawai/update/'. $pegawai['id']) ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?= $pegawai['nama'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="<?= $pegawai['email'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="<?= $pegawai['alamat'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="number" name="no_telp" class="form-control" id="no_telp" placeholder="08-----" value="<?= $pegawai['no_telp'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="image">Image (JPG/JPEG, Max: 300kb)</label>
                    <div class="input-group">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    <td><img src="<?= "../../uploads/". $pegawai['gambar']; ?>" alt="" width="100" height="100"></td>
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="<?= base_url('pegawai') ?>" class="btn btn-default">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

                  </div>
                  <div class="form-group">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
<?= $this->endSection() ?>