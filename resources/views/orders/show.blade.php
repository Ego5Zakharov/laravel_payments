@extends('layouts.main')

@include('includes.navbar')
@section('main.content')
    <div class="container">
        <h4 class="mb-3">Мои заказы</h4>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-0">
                    Детали заказа
                </h5>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4 text-muted">
                            ID заказа
                        </div>
                        <div class="col-8">
                            {{$order->uuid}}
                        </div>


                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4 text-muted">
                            Сумма заказа
                        </div>
                        <div class="col-8 ">
                            {{$order->amount}}
                            {{$order->currency_id}}
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4 text-muted">
                            Статус заказа
                        </div>
                        <div class="col-8 text-{{$order->status->color()}}">
                            {{$order->status->name()}}
                        </div>
                    </div>
                </li>
            </ul>

            <div class="card-body">

                <form action="{{route('orders.payment',$order->uuid)}}" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-primary">
                        Перейти к оплате
                    </button>
                </form>
            </div>

        </div>

    </div>

@endsection
