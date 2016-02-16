define(['jquery','noty'], function($)
{
	return new function(){
		var self = this;
		self.run = function(){
			searchForm();
		};

		var searchForm = function(){
			$('.search').on('click', function() {
				if ($('.search-column').hasClass('active')) {
					$('.search-column').hide().removeClass('active');
				}else{
					$('.search-column').show().addClass('active');
					$('#target').focus();
				}
				return false;
			});

			$('#target').blur(function () {
				$('.search-column').hide().removeClass('active');
			});

			$('.btn-search').on('click', function(){
				if ($('.mobilenav-search').hasClass('active')) {
					$('.mobilenav-search').hide().removeClass('active');
				}else{
					$('.btn-nav').addClass('collapsed');
					$('.nav-collapse').removeClass('in collapse');
					$('.nav-collapse').css('height', '0');
					$('.nav-collapse').addClass('collapse');

					$('.mobilenav-search').show().addClass('active');
					$('#target-mobile').focus();
					return $('.mobile-dropdown').trigger('close-mobile-nav');
				}
				return false;
			});

			$('#target-mobile').blur(function () {
				$('.mobilenav-search').hide().removeClass('active');
			});
		}
	}
});