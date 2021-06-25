{{--@extends('user.master')--}}
<div id="app">
    <social-login token="{{$data['access_token']}}" user="{{$data['user']}}" base_url="{{ URL::to('/') }}"></social-login>
</div>
<script src="{{ asset('js/app.js')}}"></script>
