<div class="content-wrapper mt-5">
<div class="content-header">
<div id="reloadtraffic"></div>
<div class="container-fuild">
        <div class="row">
          <div class="col-12">
            <!-- interactive chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Log Activity Today
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped" style="text-align:center">
                  <thead>
                  <tr>
                    <th>Time</th>
                    <th>Topics</th>
                    <th>Message</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($log as $data) { ?>
                        <tr>
                          <th><?= $data['time']; ?></th>
                          <th><?= $data['topics']; ?></th>
                          <th><?= $data['message']; ?></th>
                        </tr>
                    <?php } ?>
                  </tbody>
                </table>
              <div>
            
              <!-- /.card-body-->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
      </div>

</div>
</div>

<script>
  setInterval("reloadtraffic();", 1000);

  function reloadtraffic(){
    $('#reloadtraffic').load('<?= site_url('Dashboard/resource/') ?>');
  }
</script>