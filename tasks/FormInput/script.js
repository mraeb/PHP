document.getElementById("form").addEventListener('submit', function(event){
    if (!validateForm()) { 
        event.preventDefault(); // stop submission if invalid 
    }
});

// document.getElementById("delete-btn").addEventListener('click', showConfirmation);

function showConfirmation(id){
    const confirmBox = document.getElementById("popup-confirm");
    confirmBox.style.display = "block";
    document.body.classList.add('confirmation-active');
    document.getElementById("confirm-yes").href = "delete.php?id=" + id;
}
function hideConfirmation(){
    const confirmBox = document.getElementById("popup-confirm");
    confirmBox.style.display = "none";
    document.body.classList.remove('confirmation-active');
}


function validateForm() {

    let valid = true;
    
    document.getElementById("nameErr").innerText = "";
    document.getElementById("ageErr").innerText = "";
    document.getElementById("genderErr").innerText = "";
    document.getElementById("mobileErr").innerText = "";
    document.getElementById("emailErr").innerText = "";
    document.getElementById("deptErr").innerText = ""; 
    document.getElementById("termsErr").innerText = "";

    let uname = document.getElementById("uname").value.trim(); 
    let age = document.getElementById("age").value.trim(); 
    let genderMale = document.getElementById("male").checked; 
    let genderFemale = document.getElementById("female").checked; 
    let mobile = document.getElementById("mobile").value.trim(); 
    let email = document.getElementById("email").value.trim();
    let dept = document.getElementById("department").value;
    let terms = document.getElementById("terms").checked;
    
    // Name
    if (uname.length < 3) {
        document.getElementById("nameErr").innerText = "Name must be at least 3 characters.";
        valid = false;
    }
    // Age
    if (!/^\d+$/.test(age) || age < 1 || age > 120) {
        document.getElementById("ageErr").innerText = "Enter a valid age between 1 and 120.";
        valid = false;
    }
    // Gender
    if (!genderMale && !genderFemale) {
        document.getElementById("genderErr").innerText = "Please select gender.";
        valid = false;
    }
    // Mobile
    if (!/^[0-9]{10}$/.test(mobile)) {
        document.getElementById("mobileErr").innerText = "Enter a valid 10-digit mobile number.";
        valid = false;
    }
    // Email
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        document.getElementById("emailErr").innerText = "Invalid email format.";
        valid = false;
    }

    if (dept === "") { 
        document.getElementById("deptErr").innerText = "Please select a department."; 
        valid = false; 
    }

    if (!terms) { 
        document.getElementById("termsErr").innerText = "You must accept the terms."; 
        valid = false; 
    }
    return valid;
}