<?php require_once(DHEAD); ?>

<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
  <!-- Sidebar Start -->
  <?php require_once(DNAV); ?>
  <!--  Sidebar End -->
  <!--  Main wrapper -->
  <div class="body-wrapper">
    <!--  Header Start -->
    <?php require_once(DBAR); ?>
    <!--  Header End -->
    <div class="container-fluid">
      <!--  Row 1 -->
      <?php Flasher::getFlash(); ?>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form class="card-body d-flex" method="get" action="<?=BURL?>/dashboard/user">
              <input type="text" class="form-control grow-1" id="search" name="search" value="<?= (isset($_GET['search'])) ? $_GET['search'] : '' ?>">
              <button type="submit" class="btn btn-primary ms-4">Search</button>
              <a class="btn btn-success ms-4" data-bs-toggle='modal' data-bs-target='#add'>Add</a>
            </form>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($data as $i => $user) { ?>
                    <tr>
                      <th><?= $i+1 ?></th>
                      <th><?= $user['username'] ?></th>
                      <th><?= $user['nama'] ?></th>
                      <th><?= $user['email'] ?></th>
                      <th><?= $user['telepon'] ?></th>
                      <th><?= $user['createdAt'] ?></th>
                      <th>
                        <a class="btn btn-outline-info" href="<?=BURL?>/profile/<?=$user['username']?>">Info</a>
                        <a class="btn btn-outline-danger" href="<?=BURL?>/user/remove/<?=$user['id']?>">Remove</a>
                      </th>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php require_once(DCOPY); ?>
    </div>
  </div>
</div>

<!-- Modals -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="dataLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" action="<?=BURL?>/user/add" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="photoLabel">Data personal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="test" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="test" class="form-control" id="nama" name="nama">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
          <label for="telepon" class="form-label">Telepon</label>
          <input type="test" class="form-control" id="telepon" name="telepon">
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control" rows="5"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancle</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<?php require_once(DFOOT); ?>