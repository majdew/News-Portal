$(document).ready(function () {
	$('#search').keyup(function () {
		let searchText = $(this).val();

		$.ajax({
			url: './../../services/search/searchnews.php',
			method: 'post',
			data: {
				query: searchText,
			},
			success: function (response) {
				$('#content').html(response);
			},
		});
	});
});



