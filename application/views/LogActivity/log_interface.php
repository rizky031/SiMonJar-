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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Time</th>
                    <th>Topics</th>
                    <th>Message</th>
                  </tr>
                  </thead>
                  <tbody>
                  <script type="module">
                    // Import the functions you need from the SDKs you need
                    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-app.js";
                    import { getDatabase, ref, set } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-database.js";
                    // TODO: Add SDKs for Firebase products that you want to use
                    // https://firebase.google.com/docs/web/setup#available-libraries

                    // Your web app's Firebase configuration
                    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
                    const firebaseConfig = {
                        apiKey: "AIzaSyBBpqMvdECr72EI0wDTbqtzArzQ0hJxGxg",
                        authDomain: "monitoringjaringan-6ccec.firebaseapp.com",
                        databaseURL: "https://monitoringjaringan-6ccec-default-rtdb.asia-southeast1.firebasedatabase.app",
                        projectId: "monitoringjaringan-6ccec",
                        storageBucket: "monitoringjaringan-6ccec.appspot.com",
                        messagingSenderId: "746014492599",
                        appId: "1:746014492599:web:f348c8a18bb0372843ca32",
                        measurementId: "G-GJQR6TNRC1"
                    };

                    // Initialize Firebase
                    const app = initializeApp(firebaseConfig);
                    const db = getDatabase();

                    foreach ($log as $data){

                    var time = <?=$data['time'];?>
                    var topics = <?=$data['topics'];?>
                    var message = <?=$data['message'];?>

                    function writeData(){
                            set(ref(db, "Log/"),{
                                Time: time.value,
                                Topics: topics.value,
                                Message: message.value
                            })
                            .then(()=>{
                                alert("success");
                            })
                            .catch((error)=>{
                                alert("unsuccess, error"+error);
                            });
                        }

                        submit.addEventListener('click',writeData);
                    }
                    </script>
                    <?php foreach ($log as $data) { ?>
                        <tr>
                          <th><?= $data['time']; ?></th>
                          <th><?= $data['topics']; ?></th>
                          <th><?= $data['message']; ?></th>
                        </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Time</th>
                    <th>Topics</th>
                    <th>Message</th>
                  </tr>
                  </tfoot>
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