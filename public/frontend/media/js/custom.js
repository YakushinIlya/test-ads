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