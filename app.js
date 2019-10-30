(function($){
    $('.stap2').hede();
    $('domaine').change(function(event){
        var iddomaine = $(this).val();
        $('.stap2').show();
        $('$domaine-'+iddomaine).show().siblings().hide();
    });
})(jQuery);