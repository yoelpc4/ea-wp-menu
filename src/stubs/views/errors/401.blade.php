@extends('layouts.error')

@section('page', 'Error 401')

@section('code', '401')

@section('title', 'Unauthorized')

@section('image', asset('storage/images/svg/403.svg'))

@section('message', "You don't have credential to accessing this page. Please authenticate in advance!")
