@extends('layouts.mail')

@section('title')
    {{__('mail.front.cancel-order.title', ['name' => $code])}}
@endsection

@section('description')
    {{__('mail.front.cancel-order.description')}}
@endsection

@section('button')
    <a href="{{route('front.home')}}"
       class="button button-primary"
       target="_blank" rel="noopener"
       style="box-sizing: border-box;  position: relative; -webkit-text-size-adjust: none; border-radius: 4px; color: #fff; display: inline-block; overflow: hidden; text-decoration: none; background-color: #18181b; border-bottom: 8px solid #18181b; border-left: 18px solid #18181b; border-right: 18px solid #18181b; border-top: 8px solid #18181b; word-break: break-all;">
        {{__('mail.front.cancel-order.button')}}
    </a>
@endsection

@section('trouble')
    {{__('mail.auth.commons.trouble', ['name' => __('mail.front.cancel-order.button')])}}
    <span class="break-all"
          style="box-sizing: border-box;  position: relative; word-break: break-all;"><a
            href="{{route('front.home')}}"
            style="box-sizing: border-box;  position: relative; color: #18181b; word-break: break-all;">{{route('front.home')}}</a></span>
@endsection
