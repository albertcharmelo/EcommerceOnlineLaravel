let filterPrice = $('.filter-price');
let filterOrder = $('.filter-order');

filterPrice.on('click',function(){
    
   
    
    let x = document.getElementsByClassName('filter-link-active')[0]
    x.classList.remove('filter-link-active')
    $(this).addClass('filter-link-active');
    
})

filterOrder.on('click',function(){
    
    let x = document.getElementsByClassName('filter-link-order-active')[0]
    x.classList.remove('filter-link-order-active')
    $(this).addClass('filter-link-order-active');
    
})

function resetCategory(){
    $('#allCategory').click();
}

// function filtrarPrecio(value){
//     let data = {
//     _token: $('meta[name="csrf-token"]').attr('content'),
//     filter:value
//     }
    
//     $.post("/shop/filterProduct", data,function (resp) {
//             console.log(resp)
//             resetCategory()
//             showProductos(resp)

//     });



// }

function showProductos(data){
    $('#listadoProductos').empty();
    let fragment = document.createDocumentFragment()
    for (const producto of data) {
        let html = `	
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ${producto.boton}">			
        <div class="block2">
            <div class="block2-pic hov-img0">
                <img src="${window.location.protocol}//${window.location.hostname}/${producto.path}" data-producto="${ producto.id }" alt="IMG-PRODUCT">
    
                <a href="#"  class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                    Compra Rápida
                </a>
            </div>
    
            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l ">
                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                        ${producto.titulo }
                    </a>
    
                    <span class="stext-105 cl3">
                        RD$ ${producto.precio}
                    </span>
                </div>
    
                <div class="block2-txt-child2 flex-r p-t-3">
                </div>
            </div>
        </div>
    </div>`

    $('#listadoProductos').append(html)
    document.getElementById('listadoProductos').style.height = 'auto' ;

    }
    
    $('.js-show-modal1').on('click',function(e){
        e.preventDefault();
        $('.js-modal1').addClass('show-modal1');
        let src = e.target.previousElementSibling.src
			let id =e.target.previousElementSibling.getAttribute('data-producto')
			$('#productoID').val(id)
			document.getElementsByClassName('slick-active')[0].childNodes[0].src = src
			document.getElementById('imagenPrincipal').src = src;
			document.getElementsByClassName('mfp-img').src = src;
			document.getElementById('productoCompraID').value = id;
    });


}

$('.js-show-modal1').on('click',function(e){
    e.preventDefault();
    $('.js-modal1').addClass('show-modal1');
});

$('.js-hide-modal1').on('click',function(){
    $('.js-modal1').removeClass('show-modal1');
});



