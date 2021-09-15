let filterPrice = $('.filter-price');
let filterOrder = $('.filter-order');

filterPrice.on('click',function(){
    console.log($(this).attr('data-filter-price'));
    filtrarPrecio($(this).attr('data-filter-price'));
    let x = document.getElementsByClassName('filter-link-active')[0]
    x.classList.remove('filter-link-active')
    $(this).addClass('filter-link-active');
    // $('.filter-link-active').removeClass('filter-link-active');
})

filterOrder.on('click',function(){
    
    let x = document.getElementsByClassName('filter-link-order-active')[0]
    x.classList.remove('filter-link-order-active')
    $(this).addClass('filter-link-order-active');
    // $('.filter-link-active').removeClass('filter-link-active');
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



