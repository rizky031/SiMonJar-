<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/adminlte.min.css">
</head>
<body class="login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>SiMonJar</b>Web</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?= base_url('Auth/login') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="ip" class="form-control" placeholder="IP Address">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-globe"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="user" class="form-control" placeholder="User">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<div class="content-header">
            <div class="card">
              <div class="card-body table-responsive p-0" style="height: 150px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>User</th>
                      <th>Alert Message</th>
                      <th>Comment</th>
                    </tr>
                  </thead>
                  <tbody id="tbody1">
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
</div>

<script type="module">
  var tbody = document.getElementById('tbody1');

  function AddItemToTable(user,message,comment){
    let trow = document.createElement("tr");
    let td1 = document.createElement("td");
    let td2 = document.createElement("td");
    let td3 = document.createElement("td");

    td1.innerHTML= user;
    td2.innerHTML= message;
    td3.innerHTML= comment;

    trow.appendChild(td1);
    trow.appendChild(td2);
    trow.appendChild(td3);

    tbody.appendChild(trow);
  }

  function AddAllItemsToTable(Notifikasi){
    tbody.innerHTML="";
    Notifikasi.forEach(element => {
        AddItemToTable(element.User, element.Message, element.Comment);
    });
  }

  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-app.js";
  import { getDatabase, ref, child, onValue, get} from "https://www.gstatic.com/firebasejs/9.8.2/firebase-database.js";
  
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
  

  function GetAllDataOnce(){
    const dbRef = ref(db);

    get(child(dbRef, "notifikasi"))
    .then((snapshot)=>{
      var notif =[];

      snapshot.forEach(childSnapshot => {
          notif.push(childSnapshot.val());
      });

      AddAllItemsToTable(notif);
    });
  }

  window.onload = GetAllDataOnce;
</script>

<!-- jQuery -->
<script src="<?= base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template/') ?>dist/js/adminlte.min.js"></script>
</body>
</html>
