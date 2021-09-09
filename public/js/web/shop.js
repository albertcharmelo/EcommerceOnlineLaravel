let filterPrice = $('.filter-price');

filterPrice.on('click',function(){
console.log($(this).attr('data-filter-price'));
filtrarPrecio($(this).attr('data-filter-price'));
$(this).addClass('filter-link-active');


})

function resetCategory(){
    $('#allCategory').click();
}

function filtrarPrecio(value){
    let data = {
    _token: $('meta[name="csrf-token"]').attr('content'),
    filter:value
    }
    
    $.post("/shop/filterProduct", data,function (resp) {
            console.log(resp)
            resetCategory()
    });



}



