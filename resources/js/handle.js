var url = window.location.href.split('/');
var page = url[3];

$('.menu-desktop .main-menu li').removeClass('active-menu');
if (page === '') {
    $('.menu-desktop .main-menu li').eq(0).addClass('active-menu');
    $('header').removeClass('header-v4');
} else if (page.includes('san-pham')) {
    $('.menu-desktop .main-menu li').eq(1).addClass('active-menu');
} else if (page === 'lien-he') {
    $('.menu-desktop .main-menu li').eq(3).addClass('active-menu');
} else if (page === 'thong-tin') {
    $('.menu-desktop .main-menu li').eq(2).addClass('active-menu');
}

if ($(window).scrollTop() === 0) {
    $('#title-sectiion').css('margin-top', '84px');
}

$(window).on('scroll', function() {
    if ($(window).scrollTop() === 0) {
        $('#title-sectiion').css('margin-top', '84px');
    } else {
        $('#title-sectiion').css('margin-top', '0');
    }
});

$('#footer-shopping').on('click', function() {
    $(location).attr('href', $(this).data('route'));
});

$('#send-message-btn').on('click', function(e) {
    e.preventDefault();
    var email = $('input#message-email-input').val();
    var content = $('textarea#message-content-input').val();
    var emailCase = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if (email.length <= 1 || !emailCase.test(email)) {
        sendMessageInvalid('Vui lòng nhập Email đầy đủ')
    } else if (content.length <= 1) {
        sendMessageInvalid('Vui lòng nhập lời nhắn của bạn')
    } else if (content.length < 6) {
        sendMessageInvalid('Vui lòng không spam')
    } else {
        console.log(apiSendMessageRoute);
        $.ajax({
            url: apiSendMessageRoute,
            method: 'GET',
            data: {
                email: email,
                content: content
            },
            success: () => {
                swal("Cảm ơn lời nhắn của bạn!", "Chúng tôi sẽ phản hồi sớm nhất có thể!", "success");
                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            },
            error: () => {
                sendMessageInvalid('Xảy ra lỗi, vui lòng thử lại sau!');
            }
        });
    }
});

function sendMessageInvalid(message) {
    $('#message-invalid').html(message);
    setTimeout(function () {
        $('#message-invalid').html('');
    }, 3000);
}

if (page.includes('san-pham')) {
    for (let i = 0; i < $('.cate-btn').length; i++) {
        if ($('.cate-btn').eq(i).data('id') == page.split('=')[1]) {
            $('.cate-btn').eq(i).click();
        }
    }
}