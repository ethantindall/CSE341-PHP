function when(x) {
    if (x == 0) {
        document.getElementById('add-sticker').disabled= false;
        console.log(x + "yeah");
    }
    else if (x == 1) {
        document.getElementById('add-sticker').disabled= true;
        console.log(x + "ok");
    }
    else {
        console.log("uh-oh");
    }
}