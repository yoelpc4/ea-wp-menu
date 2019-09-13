@extends('layouts.error')

@section('page', 'Error 429')

@section('code', '429')

@section('title', 'Too Many Requests')

@section('image', asset('storage/images/svg/500.svg'))

@section('message', "You've made too many requests to our server. Try again later!")
