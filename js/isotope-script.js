$j = jQuery; 

$j(document).ready(function(){

  var mycontainer = $j('.isocontent');
  mycontainer.imagesLoaded( function(){
 	 mycontainer.isotope({
     	itemSelector: '.isotope-item',
     	});
});

// filter items when filter link is clicked
$j('#isonav a').click(function(){
  var selector = $j(this).attr('data-filter');
  mycontainer.isotope({ filter: selector });
  return false;  
  });
      
});