@extends('panel.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Noticia</h1>
        <div class="section-header-button">
            <a href="{{ url('/panel/create/post') }}" class="btn btn-primary">Añadir Noticia</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Blog</a></div>
            <div class="breadcrumb-item">Noticias</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Noticas</h2>
        <p class="section-lead">
            Puedes administrar todas las noticas, además de editar, borrar y mas.

        </p>

        <div class="row">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link filtro  active" href="#">Todos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link filtro" href="#">Publicados </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link filtro" href="#">Pendiente</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Todas las Noticias</h4>
                    </div>
                    <div class="card-body">

                        <div class="float-right">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="palabraBusqueda"  placeholder="Buscar">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="clearfix mb-3"></div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                            </table>
                        </div>
                        <div class="float-right">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item  disabled" id="minus">
                                        <a class="page-link" href="#" onclick="minusPage()" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>

                                    <li class="page-item " id="plus" " >
                                        <a class=" page-link" href="#" onclick="plusPage()" aria-label="Next">
                                        <span aria-hidden="true" ">&raquo;</span>
                                            <span class=" sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="{{ asset('js/panel/page/features-posts.js') }}"></script>

<script>
    var _token = $('meta[name="csrf-token"]').attr('content');
var page = 1;
$(document).ready(function () {
        getPosts(page)
    });

    var filtro = 'Todos';

    var palabra = $('#palabraBusqueda').val();

    function plusPage(){
        page = page+1;
       if (page > 1) {
        $('#minus').removeClass('disabled')
        getPosts(page);
        
       }
        
    }
    function minusPage(){
       
        if (page > 1) {
        page = page-1 
        $('#minus').removeClass('disabled')
        getPosts(page)
        
        } 
        
        if(page ==1){
            $('#minus').addClass('disabled')
        }
    }

    $('#palabraBusqueda').change(function (e) { 
        e.preventDefault();
        getPosts(page)
    });

    function getPosts(page){
        
        if (document.getElementById('palabraBusqueda').value.length  >=1) {
            
        var data ={
            _token:_token,
            palabra:document.getElementById('palabraBusqueda').value,
            filtro: filtro
            }

        }else if(document.getElementById('palabraBusqueda').value.length  < 1){
            var data ={
                _token:_token,
             filtro: filtro,
            }


        }
        console.log(data)
       
    $.ajax({
        type: "POST",
        url: "/panel/blog/getPosts?page="+page,
        data: data,
        dataType: false,
        success: function (response) {
            console.log(page)
            showRows(response)
        }
    });


    }
    function showRows(datas){
        $('.table').empty();
        
        let fragment = document.createDocumentFragment();

        let tr_header = document.createElement('tr');
        tr_header.classList.add('table-header')
        let titulo = document.createElement('th')
        titulo.textContent = "Titulo"
        let categoria = document.createElement('th')
        categoria.textContent = 'Categoria'
        let autor = document.createElement('th')
        autor.textContent = 'Autor'
        let fecha = document.createElement('th')
        fecha.textContent = 'Fecha'
        let estado = document.createElement('th')
        estado.textContent = 'Estado'
        
        tr_header.append(titulo)
        tr_header.append(categoria)
        tr_header.append(autor)
        tr_header.append(fecha)
        tr_header.append(estado)

        fragment.append(tr_header);

        for (const data of datas.data) {
        let tr = document.createElement('tr');
        let bullet = document.createElement('div')
        bullet.classList.add('bullet');

        let bullet1 = document.createElement('div')
        bullet1.classList.add('bullet');

        let titulo = document.createElement('td');
        titulo.textContent = data.titulo;
        let div_titulo = document.createElement('div');
        div_titulo.classList.add('table-links');
        let a_titulo_1 = document.createElement('a');
        a_titulo_1.textContent = 'Ver';
        a_titulo_1.href = '#'
        let a_titulo_2 = document.createElement('a');
        a_titulo_2.textContent = 'Editar';
        a_titulo_2.href = '#'
        let a_titulo_3 = document.createElement('a');
        a_titulo_3.classList.add('text-danger');
        a_titulo_3.href = '#'
        a_titulo_3.textContent = 'Eliminar';

        div_titulo.append(a_titulo_1)
        div_titulo.append(bullet)
        div_titulo.append(a_titulo_2)
        div_titulo.append(bullet1)
        div_titulo.append(a_titulo_3)
        titulo.append(div_titulo);


        let categoria = document.createElement('td');
        let a_categoria = document.createElement('a');
        a_categoria.textContent = data.categoria;
        categoria.append(a_categoria);



        let autor = document.createElement('td');
        let a_autor_1 = document.createElement('a');
        let div_autor = document.createElement('div');
        div_autor.textContent = data.autor;
        a_autor_1.append(div_autor);
        autor.append(a_autor_1);

        let creacion = document.createElement('td');
        creacion.textContent = data.created_at
        

        let status = document.createElement('td');
        let div_status = document.createElement('div');
        
        if (data.estado == 'Publico') {
            div_status.classList.add('badge','badge-primary');
            div_status.textContent = data.estado
        }else{
            div_status.classList.add('badge','badge-warning');
            div_status.textContent = data.estado

        }
        status.append(div_status)

            tr.append(titulo)
            tr.append(categoria)
            tr.append(autor)
            tr.append(creacion)
            tr.append(status)





            fragment.append(tr)
   
        }
       $('.table').append(fragment);
        

    }
    $('.filtro').click(function (e) { 
        $('.active').removeClass('active');
        this.classList.add('active')
        filtro = this.textContent;
        getPosts(page)
    });

</script>
@endsection