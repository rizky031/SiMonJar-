<script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-app.js";
        import { getDatabase, ref, set} from "https://www.gstatic.com/firebasejs/9.8.2/firebase-database.js";
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

        var user = document.getElementById("user");
        var message = document.getElementById("alert-message");
        var comment = document.getElementById("comment");
        var submit = document.getElementById("send");

        function writeAlert(){
          set(ref(db, "notifikasi/" +user.value),{
            User: user.value,
            Message: message.value,
            Comment: comment.value
        })
        .then(()=>{
                    alert("success");
                })
                .catch((error)=>{
                    alert("unsuccess, error"+error);
                });
        }
        submit.addEventListener('click',writeAlert);
</script>