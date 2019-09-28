/*Sorting Function*/
$('.clothing-item').isotope({
    itemSelector: '.item',
    layoutMode: 'fitRows'
});
$('.clothing-menu ul li').click(function(){
    $('.clothing-menu ul li').removeClass('active');
    $(this).addClass('active');

    var selector = $(this).attr('data-filter');
    $('.clothing-item').isotope({
        filter: selector
    });
    return false;
});