let initialData = $('.table-responsive tbody').html();
function searchData(input, url) {
    let query = input.value;
    if (query.length === 0) {
        $('.table-responsive tbody').html(initialData);
        return;
    }
    if (query.length > 1) {
        $.ajax({
            url: url,
            method: 'GET',
            data: {
                q: query
            },
            dataType: 'json',
            success: function (res) {
                if (res.status == 'success') {
                    $('.table-responsive tbody').html(res.data);
                } else {
                    $('.table-responsive tbody').html('<tr><td colspan="5">No results found.</td></tr>');
                }
            }
        });
    }
}

$(document).ready(function () {
    let searchInput = $('#searchInput');

    searchInput.on('keydown', function (e) {
        if (e.key === 'Backspace' && searchInput.val().length <= 1) {
            $('.table-responsive tbody').html(initialData);
        }
    });
});