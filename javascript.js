/* menu */
myID = document.getElementById("menu");
	var myScrollFunc = function() {
	var y = window.scrollY;
	if (y >= 360) {
	myID.className = "row o-fixed pink"
	} else {
	myID.className = "row o-fixed transparent" }
};
window.addEventListener("scroll", myScrollFunc);

/* imagens */

function displayNextImage() {
              x = (x === images.length - 1) ? 0 : x + 1;
              document.getElementById("img").src = images[x];
          }

          function displayPreviousImage() {
              x = (x <= 0) ? images.length - 1 : x - 1;
              document.getElementById("img").src = images[x];
          }

          function startTimer() {
              setInterval(displayNextImage, 1500);
          }

          var images = [], x = -1;
          images[0] = "/blog/wp-content/uploads/2017/06/18920213_415373625516573_4599602564023401118_n.png";
          images[1] = "/blog/wp-content/uploads/2018/10/junta7.jpg";
          images[2] = "/blog/wp-content/uploads/2018/10/projetoluzeamor.jpg";
          images[3] = "/images/lettore-logo-thumb.jpg";
          images[4] = "/images/auxilium-thumb.jpg";
          images[5] = "/blog/wp-content/uploads/2015/06/womansplaining1-1170x1170.jpg";
          images[6] = "/blog/wp-content/uploads/2017/05/avatar.jpg";

/* menu ativo */

$(function(){
    var url = window.location.pathname, 
        urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
        // now grab every link from the navigation
        $('.o-side-menu a').each(function(){
            // and test its normalized href against the url pathname regexp
            if(urlRegExp.test(this.href.replace(/\/$/,''))){
                $(this).addClass('active');
            }
        });
    });

/* spam negocin */

$(document).ready(
    function() {
        $('.email2').hide()
    }
); 