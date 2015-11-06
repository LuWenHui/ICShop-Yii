+(function() {
	$(document).on('click', '#nav-toggle', function() {
		createCookie('nav-toggle-closed', $('#nav').hasClass('nav-xs') ? 'no' : 'yes');
	});
})();