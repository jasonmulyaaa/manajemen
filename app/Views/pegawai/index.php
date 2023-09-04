<?= $this->extend('layout/master.php') ?>

<?= $this->section('content') ?>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php 
            if (session()->getFlashdata('status')) {
              echo "<div class='alert alert-success'>".session()->getFlashdata('status')."</div>";
            }
            ?>
            <!-- /.card -->

            <div class="card">
            <a href="<?= base_url('pegawai/create') ?>" class="btn btn-block btn-success">Add</a>
              <div class="card-header">
                <h3 class="card-title">Pegawai Manajemen</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Gambar</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($pegawai as $row): ?>
                  <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['no_telp'] ?></td>
                    <td><img src="<?= "uploads/". $row['gambar']; ?>" alt="" width="100" height="100"></td>
                    <td>
                      <a href="<?= base_url('pegawai/edit/'. $row['id']) ?>" class="btn btn-block btn-warning">Edit</a>
                      <a href="<?= base_url('pegawai/delete/'. $row['id']) ?>" class="btn btn-block btn-danger">Delete</a>
                    </td>                  
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

<?= $this->endSection() ?>
