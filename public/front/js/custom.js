// $(document).ajaxStart(function () {
//     // $('#load').addClass('active');
//     $('.egrm-loader').css({
//         'display': 'block',
//         'z-index': 9999,
//         'background-color': '#FFF',
//         'right': 0,
//         'bottom': 0,
//         'top': 0,
//         'left': 0,
//         'position':'fixed',
//     });
// }).ajaxStop(function () {
//     // $('#load').removeClass('active');
//     $('.egrm-loader').css({
//         'display': 'none'
//     });
// });

document.onreadystatechange = function () {
    var state = document.readyState
    if (state == 'complete') {
        $('#load').css({'visibility': 'hidden'});
        // $('#load').removeClass('active');
    }
}

$(document).ready(function () {
    $(".dropdown-toggle").dropdown();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.dropdown-toggle').dropdown();

    $('ul.dropdown-menu li.dropdown-search').on('click', function (event) {
        event.stopPropagation();
    });

    $('#testimonial').owlCarousel({
        loop: false,
        margin: 18,
        merge: true,
        autoplay: false,
        responsive: {
            0: {
                items: 1,

            },
            600: {
                items: 2,

            },
            1000: {
                items: 3,

            }
        }
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() >= 100) {
            $('#header').addClass('fixed-header');
        } else {
            $('#header').removeClass('fixed-header');
        }
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() >= 100) {
            $('#header').addClass('fixed-header');
        } else {
            $('#header').removeClass('fixed-header');
        }
    });


    $(".form").on("change", ".file-upload-field", function () {
        $(this).parent(".file-upload-wrapper").attr("data-text", $(this).val().replace(/.*(\/|\\)/, ''));
    });
});


// Tabs
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

function keyup(e) {
    // console.log("keyCode:",$event.keyCode);
    var target = e.target;
    var current = $(target).data("current");

    if (e.keyCode == 46 || e.keyCode == 8) {
        $("#digit-" + current).focus();
    } else if (e.keyCode >= 96 && e.keyCode < 105) {
        $(':focus').next('input').focus();
    } else if (e.keyCode >= 48 && e.keyCode <= 57) {
        $(':focus').next('input').focus();
    }
}

function onlyNumber(e) {
    // console.log($event.keyCode); //keyCodes value
    //  //keyCodes value
    let keyCode = (e.keyCode ? e.keyCode : e.which);
    if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
        e.preventDefault();
    }

}

function onPaste(e) {
    var pastData = e.clipboardData.getData('text/plain');
    var target = e.target;
    var current = $(target).data("current");
    for (var i = 0; i < pastData.length; i++) {
        if (current < 6) {
            // console.log("current:",current);
            current++;
            $("#digit-" + current).val(pastData.substr(i, 1))
            $("#digit-" + current).focus();
        }
    }
}
function readURLFront(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.image-upload-wrap-front').hide();
      $('.file-upload-image-front').attr('src', e.target.result);
      $('.file-upload-content-front').show();
      $('.image-title-front').html(input.files[0].name);
    };
    reader.readAsDataURL(input.files[0]);
  } else {
    removeUploadFront();
  }
}
function removeUploadFront() {
  $('.file-upload-input-front').replaceWith($('.file-upload-input-front').clone());
  $('.file-upload-content-front').hide();
  $('.image-upload-wrap-front').show();
}
$('.image-upload-wrap-front').bind('dragover', function () {
        $('.image-upload-wrap-front').addClass('image-dropping');
    });
$('.image-upload-wrap-front').bind('dragleave', function () {
    $('.image-upload-wrap-front').removeClass('image-dropping');
});

function readURLBack(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.image-upload-wrap-back').hide();
      $('.file-upload-image-back').attr('src', e.target.result);
      $('.file-upload-content-back').show();
      $('.image-title-back').html(input.files[0].name);
    };
    reader.readAsDataURL(input.files[0]);
  } else {
    removeUploadBack();
  }
}
function removeUploadBack() {
  $('.file-upload-input-back').replaceWith($('.file-upload-input-back').clone());
  $('.file-upload-content-back').hide();
  $('.image-upload-wrap-back').show();
}
$('.image-upload-wrap-back').bind('dragover', function () {
        $('.image-upload-wrap-back').addClass('image-dropping');
    });
$('.image-upload-wrap-back').bind('dragleave', function () {
    $('.image-upload-wrap-back').removeClass('image-dropping');
});

function setCountry(code){
    if(code || code==''){
        var text = jQuery('a[cunt_code="'+code+'"]').html();
        $(".dropdown-box-1 dt a span").html(text);
    }
}
$(document).ready(function() {
    $(".dropdown-box-1 img.flag").addClass("flagvisibility");
    $(".dropdown-box-1 dt a").click(function() {
        $(".dropdown-box-1 dd ul").toggle();
    });
    $(".dropdown-box-1 dd ul li a").click(function() {
        //console.log($(this).html())
        var text = $(this).html();
        $(".dropdown-box-1 dt a span").html(text);
        $(".dropdown-box-1 dd ul").hide();
        $("#result").html("Selected value is: " + getSelectedValue("country-select"));

        calculateTransferAmount();
    });
    function getSelectedValue(id) {
        //console.log(id,$("#" + id).find("dt a span.value").html())
        return $("#" + id).find("dt a span.value").html();
    }
    $(document).bind('click', function(e) {
        var $clicked = $(e.target);
        if (! $clicked.parents().hasClass("dropdown"))
            $(".dropdown-box-1 dd ul").hide();
    });
    $("#flagSwitcher").click(function() {
        $(".dropdown-box-1 img.flag").toggleClass("flagvisibility");
    });
});
function setCountry(code){
    if(code || code==''){
        var text = jQuery('a[cunt_code="'+code+'"]').html();
        $(".dropdown-box-2 dt a span").html(text);
    }
}
$(document).ready(function() {
    $(".dropdown-box-2 img.flag").addClass("flagvisibility");
    $(".dropdown-box-2 dt a").click(function() {
        $(".dropdown-box-2 dd ul").toggle();
    });
    $(".dropdown-box-2 dd ul li a").click(function() {
        //console.log($(this).html())
        var text = $(this).html();
        $(".dropdown-box-2 dt a span").html(text);
        $(".dropdown-box-2 dd ul").hide();
        $("#result").html("Selected value is: " + getSelectedValue("country-select-1"));

        calculateTransferAmount();
    });
    function getSelectedValue(id) {
        //console.log(id,$("#" + id).find("dt a span.value").html())
        return $("#" + id).find("dt a span.value").html();
    }
    $(document).bind('click', function(e) {
        var $clicked = $(e.target);
        if (! $clicked.parents().hasClass("dropdown"))
            $(".dropdown-box-2 dd ul").hide();
    });
    $("#flagSwitcher").click(function() {
        $(".dropdown-box-2 img.flag").toggleClass("flagvisibility");
    });
});
