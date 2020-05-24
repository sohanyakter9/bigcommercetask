@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th># of Orders</th>
            </tr>
        </thead>
            <tbody>
                {{-- Details go here --}}
                @if(is_object($customers))
                    @foreach ($customers as $customer)
                        <tr>
                            <td><a href="/customers/{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</a></td>
                            <td>{{ $customer->ordersCount }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">Sorry, no records were found</td>
                    </tr>
                @endif
            </tbody>
    </table>
    {{ $customers->links() }}
@endsection