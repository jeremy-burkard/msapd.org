/* Add the mouseenter and mouseleave events (easier and more flexible to add them here than on each menu item */
window.addEvent('domready', function() { 
	$('menu').getElements('a').addEvents({
		'mouseenter': function(){Transition(this,'.menuhover');},
		'mouseleave': function(){Transition(this,'.menunormal');}
	});
});

/* This is the function that actually does the morphing */
function Transition(obj, newclass) {
	obj=$(obj);
	obj=obj.set('morph', {
		duration: 500,
		transition: Fx.Transitions.Quad.easeInOut
	});
	obj.morph(newclass);
}
