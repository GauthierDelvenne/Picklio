@extends('layouts.mail')

@section('title')
    {{__('mail.front.new-order.title', ['name' => $order->code])}}
@endsection

@section('description')
    {{__('mail.front.new-order.description', ['name' => $order->code])}}
    <p style="font-weight: bold">{{__('front.profil.order.title-detail')}}</p>
    <ul>
        @foreach($orderItems as $orderItem)
            <li>{{__('admin.stocks.forms.quantity.attribute')}}
                : {{ $orderItem->quantity }} - {{$orderItem->product->name}}</li>
        @endforeach
    </ul>
    <p><span
            style="font-weight: bold">{{__('front.order-confirmation.slot')}}: </span>{{\Carbon\Carbon::parse($order->pickup_date)->translatedFormat('l d M,')}} {{\Carbon\Carbon::parse($order->pickupSlot->time)->format('H\hi')}}
    </p>
@endsection

@section('button')
    <a href="{{route('admin.order.show', $order->uuid)}}"
       class="button button-primary"
       target="_blank" rel="noopener"
       style="box-sizing: border-box;  position: relative; -webkit-text-size-adjust: none; border-radius: 4px; color: #fff; display: inline-block; overflow: hidden; text-decoration: none; background-color: #18181b; border-bottom: 8px solid #18181b; border-left: 18px solid #18181b; border-right: 18px solid #18181b; border-top: 8px solid #18181b; word-break: break-all;">
        {{__('mail.front.new-order.button')}}
    </a>
@endsection

@section('trouble')
    {{__('mail.auth.commons.trouble', ['name' => __('mail.front.new-order.button')])}}
    <span class="break-all"
          style="box-sizing: border-box;  position: relative; word-break: break-all;"><a
            href="{{route('admin.order.show', $order->uuid)}}"
            style="box-sizing: border-box;  position: relative; color: #18181b; word-break: break-all;">{{route('admin.order.show', $order->uuid)}}</a></span>
@endsection
