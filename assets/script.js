function validateLoginForm() {
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();

    if (username === "" || password === "") {
        alert("Please enter username and password.");
        return false;
    }
    return true;
}

function validateStudentForm() {
    let name = document.getElementById("name").value.trim();
    let rollNo = document.getElementById("roll_no").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let course = document.getElementById("course").value.trim();
    let batch = document.getElementById("batch").value.trim();
    let admissionDate = document.getElementById("admission_date").value.trim();
    let message = document.getElementById("formMessage");

    if (name === "" || rollNo === "" || email === "" || phone === "" || course === "" || batch === "" || admissionDate === "") {
        message.innerHTML = "Please fill all required fields.";
        message.style.color = "red";
        return false;
    }

    if (phone.length !== 10 || isNaN(phone)) {
        message.innerHTML = "Please enter a valid 10 digit phone number.";
        message.style.color = "red";
        return false;
    }

    if (!email.includes("@") || !email.includes(".")) {
        message.innerHTML = "Please enter a valid email address.";
        message.style.color = "red";
        return false;
    }

    return true;
}
