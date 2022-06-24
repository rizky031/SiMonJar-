<div class="content-wrapper mt-5">
<div class="content-header">
    <div class="container-fuild">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Registration</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Group</th>
                    <th>Last logged in</th>
                    <th>Comment</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($user as $data) { ?>
                        <tr>
                          <?php $id = str_replace('*','',$data['.id']) ?>
                          <th><?= $data['name']; ?></th>
                          <th><?= $data['group']; ?></th>
                          <th><?= $data['last-logged-in']; ?></th>
                          <th><?= $data['comment']; ?></th>
                          <th>
                            <a href="<?= site_url('Users/remove/'. $id) ?>" onclick="return confirm('Apakah yakin akan menghapus user <?= $data['name']; ?> ?')"><abbr title="hapus"><i class="fa fa-trash" style="color:red"></i></abbr></a>
                            <a href="<?= site_url('Users/update/'. $id) ?>"><abbr title="edit"><i class="fa fa-edit"></i></abbr></a>
                          </th>
                        </tr>
                    <?php } ?>
                  </tbody>
                    <footer>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-adduser">
                     Add User
                    </button>
                    </footer>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
  </div>
</div>

<?= require('db_user.php'); ?>
<!-- add user -->
<div class="modal fade" id="modal-adduser" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="<?=site_url('Users/adduser')?>" method="POST">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="user">Name</label>
                    <input type="text" name="name" class="form-control" autocomplete="off" id="name" required>
                  </div>
                  <div class="form-group">
                  <label for="group">Group</label>
                    <select class="custom-select rounded-0" name="group" id="group" required>
                    <?php foreach ($group as $data) { ?>
                      <option><?= $data['name'] ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm-password" class="form-control" id="confirm-password">
                  </div>
                  <div class="form-group">
                    <label for="comment">Comment</label>
                    <input type="text" name="comment" class="form-control" autocomplete="off" id="comment">
                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light" id="submit">Save</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>
