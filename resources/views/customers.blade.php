@extends('layouts.main')
@section('title', 'CRM')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>Find <b>{{$customers->total()}}</b> Page <b>{{$customers->currentPage()}}/ {{$customers->lastPage()}}</b>
        </div>
        <div class="card-body">
            <div class="table-responsive mb-3">
                @foreach($customers as $customer)
                    @include('layouts.customer',['customer'=>$customer])
                @endforeach
            </div>
            <div class="float-left">
                {!! $customers->links('layouts.paginate'); !!}
            </div>
        </div>
    </div>
@stop

