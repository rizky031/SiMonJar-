<div class="content-wrapper mt-5">
<div class="content-header">
    <div class="container-fuild">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">IP Address</h3>
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
                    <th>Address</th>
                    <th>Network</th>
                    <th>Interface</th>
                    <th>Comment</th>
                    <th>Action</th>
                  </tr>  
                  </thead>		
                  <tbody>
                      <?php foreach ($ip as $data) { ?>
                  <tr>
                  <?php $id = str_replace('*','',$data['.id']) ?>
                      <th><?= $data['address']; ?></th>
                      <th><?= $data['network']; ?></th>
                      <th><?= $data['interface']; ?></th>
                      <th><?= $data['comment']; ?></th>
                      <th><a href="<?= site_url('address/remove/'. $id) ?>"><abbr title="hapus"><i class="fa fa-trash" style="color:red"></i></abbr></a>
                      <a href="<?= site_url('address/update/'. $id) ?>"><abbr title="edit"><i class="fa fa-edit"></i></abbr></a>
                      </th>
                  </tr>
                  <?php } ?>
                  </tbody>
                  
                    <footer>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add-address">
                     Add
                    </button>
                    </footer>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
  </div>
</div>

<!-- .Add Address-body -->
<div class="modal fade" id="modal-add-address" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Add Address</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="<?=site_url('Address/add')?>" method="POST">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="address">IP Address</label>
                    <input type="text" name="address" class="form-control" autocomplete="off" id="address" placeholder="c/: 192.168.1.1/24" required>
                  </div>
                  <div class="form-group">
                    <label for="interface">Interface</label>
                    <select class="custom-select rounded-0" name="interface" id="interface" required>   
                      <option>ether1</option>
                      <option>ether2</option>
                      <option>ether3</option>
                      <option>ether4</option>
                      <option>wlan1</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="comment">Comment</label>
                    <input type="text" name="comment" class="form-control" autocomplete="off" id="comment">
                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light" id="add/update">Add/Update</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
