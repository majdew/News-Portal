$(document).ready(function () {
	$('#search').keyup(function () {
		let searchText = $(this).val();

		if (searchText != '') {
			$.ajax({
				url: './../services/search.php',
				method: 'post',
				data: {
					query: searchText,
				},
				success: function (response) {
					$('#showlist').html(response);
				},
			});
		} else {
			$('#showlist').html(' ');
		}
		$(document).on('click', 'body', function () {
			$('#showlist').html(' ');
		});
	});
});
