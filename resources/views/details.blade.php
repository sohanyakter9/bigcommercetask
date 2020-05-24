@extends('layouts.app')

@section('title', $customer->first_name . $customer->last_name . "'s Order History")

@section('content')
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th># of Products</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            {{-- Details go here --}}
            @if(is_array($customer->orders))
                @foreach ($customer->orders as $order)
                    <tr>
                        <td>{{ $order->date_created }} </td>
                        <td>{{ $order->items_total }}</td>
                        <td>${{ $order->total_inc_tax }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">Sorry, no records were found</td>
                </tr>
            @endif
            <tr>
                <td colspan="2">LifeTime Value</td>
                <td>${{ $customer->lifeTimeValue }}</td>
            </tr>
        </tbody>
    </table>
@endsection