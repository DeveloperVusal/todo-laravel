@extends('layouts.contents')

@section('page-content')
    @include('pages.Home.temp')

    <div class="modal-backdrop fade d-none" onclick="closeModal()"></div>
@endsection