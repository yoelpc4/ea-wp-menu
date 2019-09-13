@extends('layouts.error')

@section('page', 'Error 503')

@section('code', '503')

@section('title', 'Service Not Available')

@section('image', asset('storage/images/svg/503.svg'))

@section('message', 'Server is overloaded or down for maintenance. Try again later!')
