function check() {
    
    let box = document.getElementById("searchBy").value;

    if (box == 'checked-out') {
        document.getElementById("searchParameter").disabled = true;
    }
    else {
        document.getElementById("searchParameter").disabled = false;

    }
}