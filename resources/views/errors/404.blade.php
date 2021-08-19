@extends('errors::illustrated-layout')
@section('code', '404')
@section('title', __('Devia - Página no encontrada'))
@section('image')
<style>
  .bg-purple-light {
    background-color: #38C0CC;
}
</style>
<div style="background-image: url('{{ asset('assets/img/devian-login.jpg') }}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection
@section('message', __('Estamos trabjando para usted, disponible proximamente.'))