$(document).ready(function() {
  	$('.wizard-card').bootstrapWizard({onTabShow: function(tab, navigation, index) {
		var $total = navigation.find('li').length;
		var $current = index+1;
		var $percent = ($current/$total) * 100;
		$('.wizard-card').find('.bar').css({width:$percent+'%'});
	}});
	$('.wizard-card .finish').click(function() {
		alert('Finished!, Starting over!');
		$('.wizard-card').find("a[href*='tab1']").trigger('click');
	});
});