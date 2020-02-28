$(document).ready(function(){
    //Мобильное меню
    let mobFlag = false;
    $('#burger').on('click', () => {
        if(!mobFlag){
            $('#mob-menu').show(200);
            mobFlag = true;
        } else if(mobFlag){
            $('#mob-menu').hide(200);
            mobFlag = false;
        }
    });
    //Кнопка наверх
    $(window).scroll(function(){

        var scrollTop = $(document).scrollTop();

        if(scrollTop > 100){

            $('.up').css({
                display: 'flex'
            }).show(300);

        } else if(scrollTop == 0){

            $('.up').hide(300);
        }

    });
    $('.up').on('click', function(){
        $('html, body').animate({scrollTop: $(".header").offset().top}, 300);
    });
});