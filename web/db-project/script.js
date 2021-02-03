function dropedit() {
    $dropdown = document.getElementById('searchBy');

}
function whenwhen(x) {
    if (x == 'strata') {
        document.getElementById('add-sticker').disabled= false;
        console.log(x + "yeah");

    }
    else if (x == 'spectra') {
        document.getElementById('add-sticker').disabled= true;
        console.log(x + "ok");

    }
    else {
        console.log("uh-oh");
    }
}