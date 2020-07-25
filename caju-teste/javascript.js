/* EFEITO BACKGROUND DO HEADER */
/* outubro 2018 */

$(document).on("mousemove", function(event){

	var $mouseX = event.pageX,
	$mouseY = event.pageY;

$('.c-himage').css("margin-top", - ($mouseY * 0.05) + 'px');
$('.c-himage').css("margin-right", -($mouseX * 0.05) + 'px');

});


/* EFEITO DO CALL TO ACTION */
/* outubro 2018 */
			
myID = document.getElementById("myID");

	var myScrollFunc = function() {
	var y = window.scrollY;
	if (y >= 1030) {
	myID.className = "bottomMenu show"
	} else {
	myID.className = "bottomMenu hide" }

};

window.addEventListener("scroll", myScrollFunc);

/* MODAL */
/* outubro 2018 */

$('#myModal').on('shown.bs.modal', function () {
$('#myInput').trigger('focus')
})
