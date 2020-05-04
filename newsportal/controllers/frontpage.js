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

	$('#showall').click(function () {
		let newId = $('#newIdComment').val();
		console.log(newId)
		console.log('clicked');
		$.ajax({
			url: './../services/loadallcomments.php',
			method: 'post',
			data: {
				id : newId
			},
			success: function (response) {
				console.log(response);
				$('#showcomments').html(response);
			},
		});
	});
});
