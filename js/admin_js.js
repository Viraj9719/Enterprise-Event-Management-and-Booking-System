
// Eye toggle
const eyeBtn = document.getElementById('eyeBtn');
const pwdInput = document.getElementById('password');
const eyeIcon = document.getElementById('eyeIcon');

const openEye = `<path stroke-linecap="round" stroke-linejoin="round"
        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
      <circle cx="12" cy="12" r="3" stroke-linecap="round"/>`;
const closedEye = `<path stroke-linecap="round" stroke-linejoin="round"
        d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94"/>
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19"/>
      <line x1="1" y1="1" x2="23" y2="23" stroke-linecap="round"/>`;

eyeBtn.addEventListener('click', () => {
    const isHidden = pwdInput.type === 'password';
    pwdInput.type = isHidden ? 'text' : 'password';
    eyeIcon.innerHTML = isHidden ? closedEye : openEye;
});

// Input icon color sync with parent sibling trick
document.querySelectorAll('.form-control').forEach(input => {
    input.addEventListener('focus', () => {
        const icon = input.previousElementSibling;
        if (icon && icon.classList.contains('input-icon')) {
            icon.style.color = 'var(--accent)';
        }
    });
    input.addEventListener('blur', () => {
        const icon = input.previousElementSibling;
        if (icon && icon.classList.contains('input-icon')) {
            icon.style.color = 'var(--muted)';
        }
    });
});

function signin(){
    var username = document.getElementById("username");
    var pw = document.getElementById("password");
    var rm = document.getElementById("rememberMe");

    var form = new FormData();
    form.append("e", username.value);
    form.append("p", pw.value);
    form.append("r", rm.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {

            var response = request.responseText;

            if (response == "success") {

                window.location = "admin_pannel.php";

                document.getElementById("username").value = "";
                document.getElementById("password").value = "";
                document.getElementById("rememberMe").checked = false;

            } else {

                document.getElementById("username").value = "";
                document.getElementById("password").value = "";
                document.getElementById("rememberMe").checked = false;

                Swal.fire({
                    title: "OOOPS...",
                    text: response,
                    icon: "error"
                });
            }
        }
    }

    request.open("POST", "controller/adminSignInProcess.php", true);
    request.send(form);
}