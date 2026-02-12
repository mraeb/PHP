document.getElementById("form").addEventListener('submit', function(event){
    // event.preventDefault();
    let isvalid = true;
    const fields = [
        {id: uname},
        {id: age},
        {id: mobile},
        {id: email}
    ]
    // fields.forEach(field => {
    //     const input = document.getElementById(field.id);

    //     if(input.value.trim() ===""){
    //         isvalid = true;
    //     }
    // });

    if(isvalid){
        alert("Form submitted successfully!");
        this.submit();
    }
});