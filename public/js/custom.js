$(document).ready(function () {
    $('.product-page__favorites').on('click', function () {
        let imageSrc = $('.product-page-aside__main-img-slider-wrapper li:first img').attr('src');
        let title = $('.product-page__section-title').text();
        let id = $('#reducer_id').val();
        let type = $('#serie').val();

        $.ajax({
            url: "/favorites",
            type: "POST",
            dataType: "html",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify({ picture_url: imageSrc, title: title, id: id, type: type}),
            success: function (result) {
                $('.header__favorites-menu #header__favorites-menu__list').html('');
                $('.header__favorites-menu #header__favorites-menu__list').html(result);

                let favoritesCount = parseInt($('.header__favorites-btn-count').text());
                $('.header__favorites-btn-count').text(favoritesCount + 1);

                getFavoriteItems();
            },
            error: function (err) {
                alert(err)
            }
        });
    });

    $('.header-favorites-modal__form').on('submit', function (e) {
        e.preventDefault();

        sendFavoriteForm();
    });
});

function getFavoriteItems() {
    $.ajax({
        url: "/favorites",
        type: "GET",
        dataType: "html",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        contentType: "application/json; charset=utf-8",
        success: function (result) {
            $('#header__favorites-menu-modal__list').html('');
            $('#header__favorites-menu-modal__list').html(result);
        },
        error: function (err) {
            alert(err)
        }
    });
}

function sendFavoriteForm() {
    $.ajax({
        url: "/favorites/send",
        type: "POST",
        dataType: "json",
        data: JSON.stringify({
            name: $('#headerFavoritesModalName').val(),
            email: $('#headerFavoritesModalEmail').val(),
            comment: $('#headerFavoritesModalTextarea').text()
        }),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        contentType: "application/json; charset=utf-8",
        success: function (result) {
            // $('#header__favorites-menu-modal__list').html('');
            // $('#header__favorites-menu-modal__list').html(result);
        },
        error: function (err) {
            // alert(err)
        }
    });
}
