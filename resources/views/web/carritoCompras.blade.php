@extends('welcome')
@section('content')

<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/shop" class="stext-109 cl8 hov-cl1 trans-04">
            tienda
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Carrito de Compras
        </span>
    </div>
</div>
    

<!-- Shoping Cart -->
<div class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Producto</th>
                                <th class="column-2"></th>
                                <th class="column-3">Precio</th>
                                <th class="column-4">Cantidad</th>
                                <th class="column-5">Total</th>
                            </tr>


                            @foreach ($productosCarrito as $producto)
                            <tr class="table_row" data-producto="{{ $producto->id }}">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="{{ $producto->path }}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">{{ $producto->titulo }}</td>
                                <td class="column-3">RD$ {{ $producto->precio }}</td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0" style="width: 58px !important">
                                        <input class="" type="number" readonly name="num-product1" value="{{ $producto->cantidad }}" style="padding-left: 42%;font-size: 18px;">
                                    </div>
                                </td>
                                <td class="column-5">RD$ <span class="totalProducto">{{ $producto->cantidad * $producto->precio }}</span> </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Facturación
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal: 
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2" id="subTotal">
                                $79.65
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Envio:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-111 cl6 p-t-2">
                                El costo del envío variará según su dirección, si posee alguna duda con respecto a esto no dude en contactarnos.
                            </p>
                            
                            <div class="p-t-15">
                                <span class="stext-112 cl8">
                                    Direccion de envio
                                </span>

                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2" name="time" id="provincia">
                                        <option selected disabled>Seleccione su provincia</option>
                                        
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Dirección de Envio">
                                </div>

                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="tel" name="postcode" placeholder="Numero Teléfonico">
                                </div>
                                
                               
                                    
                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2" id="total">
                                
                            </span>
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" id="pagar">
                        Comprar Productos
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')
	<script>
      
        var subtotales;
        var total;
        function calcular(){
            var subtotal = 0;
            $.each($('.totalProducto'), function (indexInArray, valueOfElement) { 
             valueOfElement.textContent
             subtotal = subtotal+ parseFloat(valueOfElement.textContent)
            });
            subtotales = subtotal
            $('#subTotal').text(`RD$ ${subtotal}`)




        }

        function removerDelCarrito(id){
            let data = {
                _token:$('meta[name="csrf-token"]').attr('content'),
                productoId:id
            }
            $.post("/removerDelCarrito", data,function (resp) {
                    
            });


        }

        $(document).ready(function () {
            calcular()
        });
       
        $.ajax({
            type: "POST",
            url: '/cargar/provincias',
            data: '',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                    let fragment = document.createDocumentFragment();
                    for (const provincia of response) {
                        let option = document.createElement('option');
                        option.value = provincia.precio_envio;
                        option.textContent = provincia.provincia;

                        fragment.append(option)
                    }

                    $('#provincia').append(fragment);



            }
        });
        
        $('.how-itemcart1').click(function (e) { 
        e.preventDefault();
        let tr = e.target.parentElement.parentElement
        let id = tr.getAttribute('data-producto')
        tr.parentElement.removeChild(tr)
        removerDelCarrito(id)
        calcular()
      
        
        });
        

        $('#provincia').change(function (e) { 
            e.preventDefault();
            total = subtotales + parseFloat(e.target.value);
            $('#total').text(`RD$ ${subtotales + parseFloat(e.target.value)}`);
        });


        $('#pagar').click(function (e) { 
            e.preventDefault();
            pagarAhora()
        });

        function pagarAhora(){

            let data = {
                _token: $('meta[name="csrf-token"]').attr('content'),
                montoEnvio:$('#provincia').val(),
                total:total

            }
            console.log(data)

            $.ajax({
                type: "POST",
                url: "pagarAhora",
                data: data,
                success: function (response) {
                    PostApi(response);
                }
            });
            
        }

        function PostApi(data){
             
            console.log(data)
            // $.ajax({
                //     type: "POST",
                //     url: "https://espinosatechnology.com/espinosa_api/api/cenllabo/crear_factura?es_api_cenllabo=1&token=AD419C02A85C54DD",
                //     data: data,
                //     success: function (response) {
                        
                //     }
                // });

        }
    </script>
@endsection