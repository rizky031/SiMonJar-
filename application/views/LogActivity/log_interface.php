<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

  <div class="content-wrapper mt-5">
<div class="content-header">
    <div class="container-fuild">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Log Activity</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                <div class="input-daterange">
                  <div class="col">
                  <input type="text" name="start_date" id="start_date" class="form-control" />
                  </div>
                </div>
                <!-- <div class="col-md-3">
                    <input type="button" name="search" id="search" value="Sort" class="btn btn-info" />
                </div>-->
                </div>
                <br/>
                <table id="example1" class="table table-striped">
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
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-alert">
                    Alert Notification
                  </button>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-alert" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Alert Message</h4>
            </div>
            <div class="modal-body">
            <form method="POST">
              <div class="form-group">
                    <label for="user">User</label>
                    <select class="custom-select rounded-0" name="user" id="user" required>
                    <?php foreach ($user as $data) { ?>
                      <option><?= $data['name']; ?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                <label for="alert-message">Message</label>
                  <select class="custom-select rounded-0" name="alert-message" id="alert-message" required>
                    <?php foreach ($log as $data) { ?>
                      <option>
                        (<?= $data['time']; ?>)(<?= $data['topics']; ?>) : <?= $data['message']; ?>
                      </option>
                      <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                    <label for="comment">Comment</label>
                    <input type="text" name="comment" class="form-control" autocomplete="off" id="comment">
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light" id="send">Send</button>
              </div>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?= require ('db_alert.php'); ?>

<script>
  $(document).ready(function () {
     var oTable = $('#example1').dataTable();
		 // Filter to 'Webkit' and get all data for
		 oTable.fnFilter('error');
		 var data = oTable._('tr', {"search": "applied"});
		 
		 // Do something with the data
		 alert( data.length+" error from activity" );
  });
</script>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });

 fetch_data('no');

 function fetch_data(is_date_search, start_date='', end_date='')
 {
  var dataTable = $('#order_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "order" : [],
   "ajax" : {
    url:"fetch.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }

 $('#search').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='')
  {
   $('#order_data').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else
  {
   alert("Both Date is Required");
  }
 }); 
 
});
</script>
