$(document).ready(function () {
    console.log('hi');
    $('#search').keyup(function () {
        console.log('hi');
        let searchText = $(this).val();
        let newId = $('#newId').val();
        console.log(newId);

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
