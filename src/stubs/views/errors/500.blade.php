@extends('layouts.error')

@section('page', 'Error 500')

@section('code', '500')

@section('title', 'Internal Server Error')

@section('image', asset('storage/images/svg/500.svg'))

@section('message', $exception->getMessage() ?? 'An error occurred from our server. Contact the administrator for repairs!')
