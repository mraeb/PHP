document.getElementById("form").addEventListener('submit', function(event){
    // event.preventDefault();
    let isvalid = true;
    const fields = [
        {id: uname},
        {id: age},
        {id: mobile},
        {id: email}
    ]

    if(isvalid){
        alert("Form submitted successfully!");
        this.submit();
    }
});

// document.getElementById("delete-btn").addEventListener('click', showConfirmation);

function showConfirmation(){
    const confirmBox = document.getElementById("popup-confirm");
    confirmBox.style.display = "block";
    document.body.classList.add('confirmation-active');
}
function hideConfirmation(){
    const confirmBox = document.getElementById("popup-confirm");
    confirmBox.style.display = "none";
    document.body.classList.remove('confirmation-active');
}