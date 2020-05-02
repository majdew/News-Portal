$(document).ready(function () {
	$('#search').keyup(function () {
		let searchText = $(this).val();

		$.ajax({
			url: './../../services/search/searchunapprovednews.php',
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
