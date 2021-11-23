// JS Script to load as last

/**
 * Accordion
 */
$(".accordion-header").click(function () {
    $(this).next('.accordion-content').slideToggle();
    $(this).parent().toggleClass("open");
});

/**
 * Search Form
 */
$(function () {
    $('.search-form-icon:not(.no-action)').click(function () {
        let search_form_outer = $(this).parent();

        if (!search_form_outer.hasClass('active')) {
            search_form_outer.addClass('active');
            $(this).html('<i class="fas fa-times"></i>');
            $('#s').focus();
        } else {
            search_form_outer.removeClass('active');
            $(this).html('<i class="fas fa-search"></i>');
        }
    });
});

/**
 * Menü
 */
$('.mobile-menu .menu-item-has-children > span').append('<span class="next"><i class="fas fa-angle-right"></i></span>');

var navExpand = [].slice.call(document.querySelectorAll('.mobile-menu .menu-item-has-children'));
var backLink = '<li class="menu-item">\n\t<span><a class="nav-link nav-back-link" href="javascript:;">\n\t\t<span class="next"><i class="fas fa-angle-left"></i></span>Zurück\n\t</a></span>\n</li>';

navExpand.forEach(item => {
    if (item.querySelector('.nav-expand-content') !== null) {
        item.querySelector('.nav-expand-content').insertAdjacentHTML('afterbegin', backLink);
    }

    if (item.querySelector('.next') !== null) {
        item.querySelector('.next').addEventListener('click', () => item.classList.add('active'))
    }

    if (item.querySelector('.nav-back-link') !== null) {
        item.querySelector('.nav-back-link').addEventListener('click', () => item.classList.remove('active'));
    }
});

// remove active class from all except first
$('.menu-item-home.active:not(:first)').removeClass("active");
$('.menu-item-home.current_page_item:not(:first)').removeClass("active");

//get first active
$(function () {
    $('.menu-togle').click(function () {
        var elem = $('.current_page_item').first();
        //funktioniert
        if (elem.parent().hasClass('nav-expand-content')) {
            $('.current-menu-parent').find('> span > .next').click();
        }
    });
});

/**
 * Explantion Display/Hide List
 */

$(function () {
    $('.step__abstract .read-more').click(function () {
        console.log('here')
        $('.step__details').hide();
        $('.read-less').hide();
        $('.read-more').show();
        $(this).parent().next('.step__details').show();
        $(this).siblings('.read-less').show();
        $(this).hide();
    })

    $('.step__abstract .read-less').click(function () {
        $(this).parent().next('.step__details').hide();
        $(this).hide();
        $(this).siblings('.read-more').show();
    })

    $('.founder__text .read-more').click(function () {
        console.log('here')
        $(this).siblings('.founder__more').show();
        $(this).siblings('.read-less').show();
        $(this).hide();
    })

    $('.founder__text .read-less').click(function () {
        $(this).siblings('.founder__more').hide();
        $(this).hide();
        $(this).siblings('.read-more').show();
    })

    $(".explanation-step").filter(function (index, element) {
        return (index + 1) % 3 == 1;
    }).addClass("primary");

    $(".explanation-step").filter(function (index, element) {
        return (index + 1) % 3 == 0;
    }).addClass("third");

    var iframes = $('iframe');
    iframes.each(function (index, elem) {
        console.log($(elem))
        console.log(index)
        if ($(elem).length) {
            $(elem).attr('src', $(elem).attr('src') + "&title=0&portrait=0&byline=0");
            return false;
        }
        return true;
    })

    $('.modal-button').click(function () {
        let id = $(this).attr('id');
        let unique = id.match('download-(.+)')[1];
        $('#modal-' + unique).css('display', "block");
        $('#modal-' + unique).addClass('active');
    });

// When the user clicks on <span> (x), close the modal
    $('.close').click(function () {
        $(this).parent().parent().parent().css('display', "none");
        $(this).parent().parent().parent().removeClass('active');
    });

// When the user clicks anywhere outside of the modal, close it
    $(window).click(function (event) {
        if ($('.modal.active').length > 0) {
            $('.modal.active').each(function (index, elem) {
                $(this).removeClass('.active');
            })
        }
    });
});

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

let is_hubspot_user = getCookie('hubspotRegistration').length > 1;

window.addEventListener('message', event => {
    if (event.data.type === 'hsFormCallback' && event.data.eventName === 'onFormSubmitted') {
        setCookie('hubspotRegistration', event.data.id, 365);
        is_hubspot_user = true;
        $('.download-direct').each(function (index, elem){
           $(this).css('display', 'inline-block');
        });
        $('.modal-button').each(function (index, elem){
            $(this).css('display', 'none');
        });
    }
});

