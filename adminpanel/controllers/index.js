$(document).ready(function () {

	$('.getId').click(function () {
		tr = $(this).closest('tr');
		console.log("clicked")
		let id = tr
			.children('td')
			.map(function () {
				return $(this).text();
			})
			.get();
		console.log($('#idInput').val())
		$('#idInput').val(id[0]);
		
	});
});
