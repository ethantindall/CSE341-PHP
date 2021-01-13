function onClick() {
    alert("Clicked!");
}

/*function changeColor(div) {
    let newColor = document.getElementById("changer").value;
    let displayDiv = document.getElementById(div);
    try {
        displayDiv.style.backgroundColor = newColor;
      } catch (error) {
        alert("Try again");
        console.error(error);
    }
}*/

$(document).ready(function() {
    function changeColor(){
        let displayDiv = $('#drop').val();
        console.log(displayDiv);
        let newColor = document.getElementById("changer").value;
        try {
            $("."+displayDiv).css('background-color', newColor);
        } catch (error) {
            alert("Try again");
            console.error(error);
        }
    }
	$('.colorButton').click(function(){
		changeColor();
    });
    
    function fadeDiv() {
        $('.d3').fadeToggle(500);
    }
    $('.fadeButton').click(function(){
		fadeDiv();
    });
    
});