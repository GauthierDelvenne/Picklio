@extends('layouts.mail')

@section('title')
    {{__('mail.admin.newProduct.title')}}
@endsection

@section('description')
    {{__('mail.admin.newProduct.description')}}
@endsection

@section('button')
    <a href="{{route('admin.stock.show', $productId)}}"
       class="button button-primary"
       target="_blank" rel="noopener"
       style="box-sizing: border-box;  position: relative; -webkit-text-size-adjust: none; border-radius: 4px; color: #fff; display: inline-block; overflow: hidden; text-decoration: none; background-color: #18181b; border-bottom: 8px solid #18181b; border-left: 18px solid #18181b; border-right: 18px solid #18181b; border-top: 8px solid #18181b; word-break: break-all;">
        {{__('mail.admin.newProduct.button')}}
    </a>
@endsection

@section('trouble')
    {{__('mail.auth.commons.trouble', ['name' => __('mail.admin.newProduct.button')])}}
    <span class="break-all"
          style="box-sizing: border-box;  position: relative; word-break: break-all;"><a
            href="{{route('admin.stock.show', $productId)}}"
            style="box-sizing: border-box;  position: relative; color: #18181b; word-break: break-all;">{{route('admin.stock.show', $productId)}}</a></span>
@endsection
