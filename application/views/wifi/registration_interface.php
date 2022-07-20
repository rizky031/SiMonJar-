<div class="content-wrapper mt-5">
  <div class="content-header">
  <div class="container-fuild">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Device Information</h3>
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
                  <?php foreach ($identity as $data) { ?>
                  <tr><th>Identity</th><th><?= $data['name']; ?></th></tr>
                  <?php } ?>
                  <?php foreach ($router as $data) { ?>
                  <tr><th>Model</th><th><?= $data['model']; ?></th></tr>
                  <tr><th>Serial</th><th><?= $data['serial-number']; ?></th></tr>
                  <?php } ?>
                  <?php foreach ($resource as $data) { ?>
                  <tr><th>Board Name</th><th><?= $data['board-name']; ?></th></tr>
                  <tr><th>Architecture Name</th><th><?= $data['architecture-name']; ?></th></tr>
                  <tr><th>Version</th><th><?= $data['version']; ?></th></tr>
                  <tr><th>Free Memory</th><th><?= formatBytes($data['free-memory'], 2) ?></th></tr>
                  <tr><th>Total Memory</th><th><?= formatBytes($data['total-memory'], 2) ?></th></tr>    
                  <tr><th>Free HDD</th><th><?= formatBytes($data['free-hdd-space'], 2) ?></th></tr>    
                  <tr><th>Total HDD</th><th><?= formatBytes($data['total-hdd-space'], 2) ?></th></tr>
                  <tr><th>Build Time</th><th><?= $data['build-time']; ?></th></tr>
                  <?php } ?>
                  </tbody>		
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </div>

    <div class="container-fuild">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Device Registration</h3>
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