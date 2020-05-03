$(document).ready(function () {
	$('#search').keyup(function () {
		let searchText = $(this).val();

		$.ajax({
			url: './../../services/search/searchcategories.php',
			method: 'post',
			data: {
				query: searchText,
			},
			success: function (response) {
				$('#content').html(response);
			},
		});
	});

	$('.getEditId').click(function () {
		tr = $(this).closest('tr');
		console.log('clicked');
		let data = tr
			.children('td')
			.map(function () {
				return $(this).text();
			})
			.get();
	
		$('#idEditInput').val(data[0]);
		$('#oldname').val(data[2]);
	});
});
