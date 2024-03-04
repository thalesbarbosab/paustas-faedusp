@extends('errors::illustrated-layout')

@section('title', __('validation.generic.403_error'))
@section('code', '403')
@section('message')
    @lang('validation.generic.403_error_body')
@stop
