/*Sorting Function*/
$('.product-item').isotope({
    itemSelector: '.item',
    layoutMode: 'fitRows'
});
$('.product-menu ul li').click(function(){
    $('.product-menu ul li').removeClass('active');
    $(this).addClass('active');

    var selector = $(this).attr('data-filter');
    $('.product-item').isotope({
        filter: selector
    });
    return false;
});