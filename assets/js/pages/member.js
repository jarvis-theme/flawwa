define(['jquery'], function(){
	return new function(){
		var self = this;
		self.run = function(){
			// Tab function
			$('#myTab a, #myTab button').click(function (e) {
				e.preventDefault();
				$(this).tab('show');
			});			
		};

	};
});