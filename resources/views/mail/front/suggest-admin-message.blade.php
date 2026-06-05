@extends('layouts.mail')

@section('title')
    {{__('mail.front.suggestAdminMessage.title', ['name' => $name])}}
@endsection

@section('description')
    {{__('mail.front.suggestAdminMessage.description', ['name' => $name])}}
@endsection

@section('button')
    <a href="{{route('admin.message.suggest.show', $messageId)}}"
       class="button button-primary"
       target="_blank" rel="noopener"
       style="box-sizing: border-box;  position: relative; -webkit-text-size-adjust: none; border-radius: 4px; color: #fff; display: inline-block; overflow: hidden; text-decoration: none; background-color: #18181b; border-bottom: 8px solid #18181b; border-left: 18px solid #18181b; border-right: 18px solid #18181b; border-top: 8px solid #18181b; word-break: break-all;">
        {{__('mail.front.suggestAdminMessage.button')}}
    </a>
@endsection

@section('trouble')
    {{__('mail.auth.commons.trouble', ['name' => __('mail.front.suggestAdminMessage.button')])}}
    <span class="break-all"
          style="box-sizing: border-box;  position: relative; word-break: break-all;"><a
            href="{{route('admin.message.suggest.show', $messageId)}}"
            style="box-sizing: border-box;  position: relative; color: #18181b; word-break: break-all;">{{route('admin.message.suggest.show', $messageId)}}</a></span>
@endsection
