<div class="content-wrapper mt-5">
<div class="content-header">
    <div class="container-fuild">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Wireless Registration</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                  <thead>
                  <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mac Address</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Up Time</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Last IP</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Kecepatan</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Delete</th></tr>
                  </thead>
                  <tbody>
                      <?php foreach ($regist as $data) { ?>
                      <tr>
                      <?php $id = str_replace('*','',$data['.id']) ?>
                      <th><?= $data['mac-address']; ?></th>
                      <th><?= $data['uptime']; ?></th>
                      <th><?= $data['last-ip']; ?></th>
                      <th><?= formatBytes($data['p-throughput'], 2) ?></th>
                      <th><a href="<?= site_url('Registration/remove/'. $id) ?>"><i class="fa fa-trash"></i></a></th>
                       </tr>
                      <?php } ?>
                  </tbody>
                  
                </table>              
              </div>
              <!-- /.card-body -->
            </div>
    </div>
  </div>
</div>
<div class="container-fuild">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Wireless Information</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="" class="table table-bordered table-striped">
                  <tbody>
                  <?php foreach ($wifi as $data) { ?>
                  <tr><th>ID</th><th><?= $data['.id']; ?></th></tr>
                  <tr><th>Name</th><th><?= $data['name']; ?></th></tr>
                  <tr><th>Mac-Address</th><th><?= $data['mac-address']; ?></th></tr>
                  <tr><th>Mode</th><th><?= $data['mode']; ?></th></tr>
                  <tr><th>SSID</th><th><?= $data['ssid']; ?></th></tr>
                  <tr><th>Band</th><th><?= $data['band']; ?></th></tr>    
                  <tr><th>Frequency</th><th><?= $data['frequency']; ?></th></tr>    
                  <tr><th>Security Profile</th><th><?= $data['security-profile']; ?></th></tr>
                  <?php } ?>
                  </tbody>		
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </div>

