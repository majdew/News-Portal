$(document).ready(function () {

	$('#search').keyup(function () {
		

        let searchText = $(this).val();
        let newId = $('#newId').val();

		$.ajax({
			url: './../../services/search/searchcomments.php',
			method: 'post',
			data: {
                query: searchText,
                id : newId
			},
			success: function (response) {
				$('#content').html(response);
			},
		});
	});
});
