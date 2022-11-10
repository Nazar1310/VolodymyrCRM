@extends('layouts.main')
@section('title', 'CRM')
@section('content')
    <p>Search result for: <b>{{$search}}</b></p>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                @foreach($fields as $item)
                    <li class="nav-item">
                        <a class="nav-link {{$item == $field ? 'active':''}}"
                           href="{{route('search',[$item,'q'=>$search])}}">{{$item}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card-body">
            <div class="table-responsive mb-3">
                @foreach($customers as $customer)
                    @include('layouts.customer',['customer'=>$customer])
                @endforeach
            </div>
        </div>
    </div>
@stop

