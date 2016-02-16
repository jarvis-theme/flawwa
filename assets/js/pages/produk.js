define(['jquery','jq_ui','fancybox','flexslider'], function($)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			slider();

			$('.fancybox').fancybox({
				openEffect : 'elastic',
				openSpeed  : 150,
				closeEffect : 'elastic',
				closeSpeed  : 150
			});
		};

		var slider = function(){
			$('.flexslider-produk').flexslider({
				animation: "pause",
				controlNav: "thumbnails",
				directionNav: false
			});

			$('#flexslider').flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: true,
				directionNav: false,
				slideshow: true,
				slideshowSpeed: 5000,
				animationSpeed: 600
			});
		};
	};
});