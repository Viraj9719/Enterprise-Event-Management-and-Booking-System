function changeView() {
    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signup() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");
    var typePW = document.getElementById("typepw");
    var confirmPW = document.getElementById("confirmpw");

    var form = new FormData();
    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("e", email.value);
    form.append("m", mobile.value);
    form.append("g", gender.value);
    form.append("tpw", typePW.value);
    form.append("cpw", confirmPW.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "Operation Success.") {
                // document.getElementById("msg").innerHTML = "Registration Successfull!";
                // document.getElementById("msg").className = "alert alert-success";
                // document.getElementById("msgdiv").className = "offset-lg-4 col-12 col-lg-4 d-block";

                document.getElementById("fname").value = "";
                document.getElementById("lname").value = "";
                document.getElementById("email").value = "";
                document.getElementById("mobile").value = "";
                document.getElementById("gender").value = "Select";
                document.getElementById("typepw").value = "";
                document.getElementById("confirmpw").value = "";

                Swal.fire({
                    title: "HOORAY...",
                    text: "Account has created SUCCESSFULLY.",
                    icon: "success"
                });

                changeView();
            } else {
                // document.getElementById("msg").innerHTML = response;
                // document.getElementById("msgdiv").className = "offset-lg-4 col-12 col-lg-4 d-block";

                document.getElementById("fname").value = "";
                document.getElementById("lname").value = "";
                document.getElementById("email").value = "";
                document.getElementById("mobile").value = "";
                document.getElementById("gender").value = "Select";
                document.getElementById("typepw").value = "";
                document.getElementById("confirmpw").value = "";

                Swal.fire({
                    title: "OOOPS...",
                    text: response,
                    icon: "error"
                });
            }
        }
    }

    request.open("POST", "controller/signUpProcess.php", true);
    request.send(form);
}

function signin() {

    var email = document.getElementById("email2");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("remember");

    var form = new FormData();
    form.append("e", email.value);
    form.append("p", pw.value);
    form.append("r", rm.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {

            var response = request.responseText;

            if (response == "success") {

                window.location = "index.php";

            } else {

                document.getElementById("email2").value = "";
                document.getElementById("pw").value = "";
                document.getElementById("remember").checked = true;

                Swal.fire({
                    title: "OOOPS...",
                    text: response,
                    icon: "error"
                });
            }
        }
    }

    request.open("POST", "controller/signInProcess.php", true);
    request.send(form);

}

var forgotPWModal;

function openFWModal() {
    var modal = document.getElementById("fpMpdal");
    forgotPWModal = new bootstrap.Modal(modal);
    forgotPWModal.show();
}

function fpwVcode() {

    var email = document.getElementById("email3");

    var form = new FormData();
    form.append("e", email.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;
            if (response == "Operation Success.Success") {
                Swal.fire({
                    title: "DONE...",
                    text: "Check your Email to get the Verification code.",
                    icon: "success"
                });

                document.getElementById("vc").disabled = false;
                document.getElementById("np").disabled = false;
                document.getElementById("rtnp").disabled = false;

            } else {
                Swal.fire({
                    title: "OOOPS...",
                    text: response,
                    icon: "error"
                });
            }
        }
    }

    request.open("POST", "controller/sendVcodeProcess.php", true);
    request.send(form);

}

function showPw1() {

    var tf = document.getElementById("np");
    var btn = document.getElementById("npb");

    if (tf.type == "password") {
        tf.type = "text";
        btn.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
    } else {
        tf.type = "password";
        btn.innerHTML = "<i class='bi bi-eye-fill'></i>";
    }

}

function showPw2() {

    var tf = document.getElementById("rtnp");
    var btn = document.getElementById("rtnpb");

    if (tf.type == "password") {
        tf.type = "text";
        btn.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
    } else {
        tf.type = "password";
        btn.innerHTML = "<i class='bi bi-eye-fill'></i>";
    }

}

function resetPw() {

    var vcode = document.getElementById("vc");
    var pw = document.getElementById("np");
    var rtpw = document.getElementById("rtnp");
    var email = document.getElementById("email3");

    var form = new FormData();
    form.append("v", vcode.value);
    form.append("p", pw.value);
    form.append("r", rtpw.value);
    form.append("e", email.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "Operation Success.Password Updated.") {
                Swal.fire({
                    title: "DONE...",
                    text: "Password Updated.",
                    icon: "success"
                });

                forgotPWModal.hide();

            } else {
                Swal.fire({
                    title: "OOOPS...",
                    text: response,
                    icon: "error"
                });
            }
        }
    }

    request.open("POST", "controller/resetPWProcess.php", true);
    request.send(form);

}

function signout() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                window.location.reload();
            }
        }
    }

    request.open("POST", "controller/signOutProcess.php", true);
    request.send();

}

function setImg() {

    var image = document.getElementById("imageUploader");

    image.onchange = function () {

        var file_count = image.files.length;

        if (file_count <= 3) {
            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;
            }
        } else {
            alert(file_count + " files selected. You can upload only 3 or less than 3 files.");
        }
    }

}

function schedule() {

    var name = document.getElementById("ename");
    var start_date = document.getElementById("esdate");
    var end_date = document.getElementById("eedate");
    var location = document.getElementById("elocaton");
    var city = document.getElementById("ecity");
    var type = document.getElementById("etype");
    var start_time = document.getElementById("estart");
    var end_time = document.getElementById("eend");
    var crowd = document.getElementById("ecrowd");
    var environment = document.getElementById("envtype");
    var ticket_price1 = document.getElementById("tprice1");
    var ticket_qty1 = document.getElementById("tqty1");
    var ticket_price2 = document.getElementById("tprice2");
    var ticket_qty2 = document.getElementById("tqty2");
    var ticket_price3 = document.getElementById("tprice3");
    var ticket_qty3 = document.getElementById("tqty3");
    var ticket_price4 = document.getElementById("tprice4");
    var ticket_qty4 = document.getElementById("tqty4");
    var event_desc = document.getElementById("edesc");
    var image = document.getElementById("imageUploader");

    var form = new FormData();
    form.append("name", name.value);
    form.append("start_date", start_date.value);
    form.append("end_date", end_date.value);
    form.append("location", location.value);
    form.append("city", city.value);
    form.append("type", type.value);
    form.append("start_time", start_time.value);
    form.append("end_time", end_time.value);
    form.append("crowd", crowd.value);
    form.append("environment", environment.value);
    form.append("ticket_price1", ticket_price1.value);
    form.append("ticket_qty1", ticket_qty1.value);
    form.append("ticket_price2", ticket_price2.value);
    form.append("ticket_qty2", ticket_qty2.value);
    form.append("ticket_price3", ticket_price3.value);
    form.append("ticket_qty3", ticket_qty3.value);
    form.append("ticket_price4", ticket_price4.value);
    form.append("ticket_qty4", ticket_qty4.value);
    form.append("event_desc", event_desc.value);

    var file_count = image.files.length;

    for (var x = 0; x < file_count; x++) {
        form.append("image" + x, image.files[x]);
    }

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            alert(response);
        }
    }

    request.open("POST", "controller/event_scedule_process.php", true);
    request.send(form);

}

function searchEvent(x) {
    var date = document.getElementById("date");
    var type = document.getElementById("type");
    var environment = document.getElementById("environment");
    var city = document.getElementById("city");

    var form = new FormData();
    form.append("d", date.value);
    form.append("t", type.value);
    form.append("e", environment.value);
    form.append("c", city.value);
    form.append("page", x);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            document.getElementById("dd").innerHTML = response;
        }
    }

    request.open("POST", "controller/searchEventProcess.php", true);
    request.send(form);
}

const starRating = document.querySelector('.star-rating');
const ratingValue = document.getElementById('rating-value');

starRating.addEventListener('change', function (e) {
    ratingValue.textContent = e.target.value;
});

function SendRequestEmail() {
    var fullName = document.getElementById("name");
    var email = document.getElementById("email");
    var mobile = document.getElementById("phone");
    var type = document.getElementById("eventType");
    var date = document.getElementById("eventDate");
    var count = document.getElementById("guestCount");
    var message = document.getElementById("message");
    var otherType = document.getElementById("otherType");

    var form = new FormData();
    form.append("name", fullName.value);
    form.append("mail", email.value);
    form.append("mobile", mobile.value);
    form.append("type", type.value);
    form.append("date", date.value);
    form.append("count", count.value);
    form.append("message", message.value);
    form.append("otherType", otherType.value);

    alert(type.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var response = request.responseText;
            if (response == "Operation Success.Success") {
                alert("Request has been sent. One of our team member will contact you ASAP.");

                document.getElementById("name").value = "";
                document.getElementById("email").value = "";
                document.getElementById("phone").value = "";
                document.getElementById("eventType").selectedIndex = 0;
                document.getElementById("otherType").value = "";
                document.getElementById("eventDate").value = "";
                document.getElementById("guestCount").value = "";
                document.getElementById("message").value = "";

            } else {
                alert(response);
            }
        }
    }

    request.open("POST", "controller/sendrequestEmailProcess.php", true);
    request.send(form);
}

function enableField() {
    var type = document.getElementById("eventType");
    var field = document.getElementById("otherType");

    if (type.value == "00") {
        field.disabled = false;
        field.focus();
    }
}