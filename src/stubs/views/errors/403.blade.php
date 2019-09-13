@extends('layouts.error')

@section('page', 'Error 403')

@section('code', '403')

@section('title', 'Forbidden')

@section('image', asset('storage/images/svg/403.svg'))

@section('message', "You aren't authorized to accessing this page. Contact the administrator for authorization!")
