@extends('adminlte::page')
@section('js')
    @component('components.cms.message')@endcomponent
    @component('components.cms.sanatize')@endcomponent
    @component('components.cms.plugins')@endcomponent
    @yield('custom-js')
@endsection
