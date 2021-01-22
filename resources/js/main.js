$(document).ready(function(){
	$(".navbar-burger").click(function(){
		$(".navbar-burger").toggleClass("is-active");
		$(".navbar-menu").slideToggle("is-active");
	});
});

$(document).ready(function(){
  $(".dropdown .dropdown-trigger").click(function (){
      $('.dropdown').not($(this).parents('.dropdown')).removeClass("is-active");
      var dropdown = $(this).parents('.dropdown');
      dropdown.toggleClass('is-active');
      dropdown.focusout(function() {
          $(this).removeClass('is-active');
      });
  });
})