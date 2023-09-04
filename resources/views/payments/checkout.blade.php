@extends('layouts.main')

@include('includes.navbar')
@section('main.content')
    <div class="container">
        <h4 class="mb-3">Детали</h4>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-0">
                    Детали платежа
                </h5>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4 text-muted">
                            ID платежа
                        </div>
                        <div class="col-8">
                            {{$payment->uuid}}
                        </div>


                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4 text-muted">
                            Сумма платежа
                        </div>
                        <div class="col-8 ">
                            {{$payment->amount}}
                            {{$payment->currency_id}}
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4 text-muted">
                            Статус платежа
                        </div>
                        <div class="col-8 text-{{$payment->status->color()}}">
                            {{$payment->status->name()}}
                        </div>
                    </div>
                </li>
            </ul>


            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4 text-muted">
                            Операция
                        </div>
                        <div class="col-8">
                            {{$payment->payable->getPayableName()}}
                        </div>


                    </div>
                </li>
            </ul>
            <div class="card-body">

                <form action="" method="POST">
                    @csrf
                    <p>
                        Выберите способ оплаты
                    </p>
                    <button type="submit" class="btn btn-primary">
                        Перейти к оплате
                    </button>
                </form>
            </div>

        </div>

    </div>

@endsection
