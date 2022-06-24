<div class="content-wrapper mt-5">
<div class="content-header">
    <div class="container-fuild">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DHCP Server</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Interface</th>
                    <th>Lease Time</th>
                    <th>Address Pool</th>
                    <th>Enable</th>
                    <th>Disable</th>
                    <th>Delete</th>
                  </tr>  
                  </thead>		
                  <tbody>
                      <?php foreach ($dhcpserver as $data) { ?>
                  <tr>
                  <?php $id = str_replace('*','',$data['.id']) ?>
                      <th><?= $data['name']; ?></th>
                      <th><?= $data['interface']; ?></th>
                      <th><?= $data['lease-time']; ?></th>
                      <th><?= $data['address-pool']; ?></th>
                      <th><a href="<?= site_url('dhcpserver/enable/'. $id) ?>"><i class="fa fa-check"></i></a></th>
                      <th><a href="<?= site_url('dhcpserver/disable/'. $id) ?>"><i class="fa fa-minus"></i></a></th>
                      <th><a href="<?= site_url('dhcpserver/remove/'. $id) ?>"><abbr title="hapus"><i class="fa fa-trash" style="color:red"></i></abbr></a></th>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <footer>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add-dhcp"  onclick="return confirm('Pastikan Interface Sudah Memiliki IP Address')" role="button">
                     Add
                    </button>
                    </footer>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
  </div>
</div>
<!-- .Add DHCP Server-body -->
<div class="modal fade" id="modal-add-dhcp" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Add DHCP Server</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="<?=site_url('DHCPServer/adddhcp')?>" method="POST">
              <div class="modal-body">
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
                    <label for="lease-time">Lease Time</label>
                    <input type="text" name="lease-time" class="form-control" autocomplete="off" placeholder="00:00:00" id="lease-time" required>
                  </div>
                  <div class="form-group">
                    <label for="address-pool">Address Pool</label>
                    <select class="custom-select rounded-0" name="address-pool" id="address-pool" required>   
                      <option>dhcp_pool1</option>
                      <option>dhcp_pool2</option>
                      <option>dhcp_pool3</option>
                      <option>dhcp_pool4</option>
                      <option>dhcp_pool17</option>
                      <option>static_only</option>
                    </select>
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

<div class="modal fade" id="modal-remove-dhcp" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Remove</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="<?=site_url('DHCPServer/remove')?>" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <label for="numbers">Name</label>
                    <select class="custom-select rounded-0" name="numbers" id="numbers" required>
                    <?php foreach ($dhcpserver as $data) { ?>
                      <option><?= $data['name'] ?></option>
                    <?php } ?>
                    </select>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light" id="remove">Remove</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>