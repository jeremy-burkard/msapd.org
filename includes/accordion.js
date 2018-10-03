window.addEvent('domready', function() { 
  var accordion = new Fx.Accordion($$('.newsheadline'),$$('.newscontent'), {
	display: -1,
	alwaysHide: true,
	onActive: function(toggler, element){
		var imgs = toggler.getElementsByTagName("img");
		imgs[0].setAttribute("src", "images/minus-8.png");
	},
	onBackground: function(toggler, element){
		var imgs = toggler.getElementsByTagName("img");
		imgs[0].setAttribute("src", "images/plus-8.png");
	}	
  });
});
