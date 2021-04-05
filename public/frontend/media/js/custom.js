var loading = 'Загрузка...';
$(window).scroll(function(){
    if(window.innerWidth>765) {
        if($(this).scrollTop()>209){
            $('.sidebar').addClass('fixed-top-custom');
        }
        else if ($(this).scrollTop()<209){
            $('.sidebar').removeClass('fixed-top-custom');
        }
    }
});

$('#country').on('change', function(e){
    var id = e.target.value;
    $.post('/api/v1/region', {country: id}).done(function(data){
        $('#region').html(data);
        $('#region').removeAttr('disabled');
    });
});
$('#region').on('change', function(e){
    var id = e.target.value;
    $.post('/api/v1/city', {region: id}).done(function(data){
        $('#city').html(data);
        $('#city').removeAttr('disabled');
    });
});
$('.regionSearch').on('change', function(e){
    var id = e.target.value;
    $.post('/api/v1/city', {region: id}).done(function(data){
        $('.citySearch').html(data);
        $('.citySearch').removeAttr('disabled');
    });
});
$('#regionAdmin').on('change', function(e){
    var id = e.target.value;
    $.post('/api/v1/city-pars', {region: id}).done(function(data){
        $('#cityAdmin').html(data);
        $('#cityAdmin').removeAttr('disabled');
    });
});

$('.marketcarsModalBrand').on('click', function(e){
    $('.marketcarsModal .modal-body .resultModal').html(loading);
    $.post('/api/v1/brand-auto').done(function(data){
        $('.marketcarsModal .modal-body .resultModal').html(data);
    });
});
$('.marketcarsModalRegion').on('click', function(e){
    $('.marketcarsModal .modal-body .resultModal').html(loading);
    $.post('/api/v1/region-auto').done(function(data){
        $('.marketcarsModal .modal-body .resultModal').html(data);
    });
});
$('.marketcarsModalCity').on('click', function(e){
    $('.marketcarsModal .modal-body .resultModal').html(loading);
    $.post('/api/v1/city-auto').done(function(data){
        $('.marketcarsModal .modal-body .resultModal').html(data);
    });
});

function avatarDown(event){
    var property = document.getElementById('avatarUser').files[0];
    var form_data = new FormData();
    form_data.append("avatarUser",property);
    $.ajax({
        url: '/profile/avatar',
        type: 'POST',
        dataType: 'html',
        data: form_data,
        cache:false,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('.img-avatar').fadeIn(1000, function(){
                $(this).html('<img src="/uploads/user/avatars/'+data+'" class="img-fluid img-thumbnail">');
            });
        },
        error: function (msg) {
            console.log(msg.responseText);
        }
    });
}




tinyMCE.init({
    // General options
    mode : "exact",
    elements: 'body',
    language: 'ru',
    plugins: ["autoresize","media","link","imagetools"],
    default_link_target: "_blank",
    content_css: '/frontend/media/css/tinymce.css',
    body_id: 'new-journal-editor',
    height : "100",
    toolbar1: "insertfile undo | redo | styleselect | bold | italic | alignleft | aligncenter | alignright | alignjustify | bullist | numlist | outdent | indent | media",
    toolbar2: "",
    menubar : false,
    statusbar : false,
    convert_urls: false,
});