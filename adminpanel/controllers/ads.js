$(document).ready(function () {
	$('#search').keyup(function () {
		let searchText = $(this).val();

		$.ajax({
			url: './../../services/search/searchads.php',
			method: 'post',
			data: {
				query: searchText,
			},
			success: function (response) {
				$('#content').html(response);
			},
		});
	});

	$('.modalbtn').click(function () {
		console.log('clicked');
		tr = $(this).closest('tr');
		let adId = tr
			.children('td')
			.map(function () {
				return $(this).text();
			})
			.get();
		console.log(adId);
		$('#inputId').val(adId[0]);
	});

});
