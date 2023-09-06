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

            @if($paymentMethods->isEmpty())
                <div class="card-body">
                    <div>Извините, оплата временно недоступна (=</div>
                </div>
            @else
                <div class="card-body">
                    @if($errors->any())
                        <div class="mb-3 text-danger">
                            {{$errors->first()}}
                        </div>
                    @endif
                    <form action="{{route('payments.method',$payment->uuid)}}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="mb-3 mb-md-0">

                                        <select name="method_id" class="form-control">
                                            <option value="" disabled selected>Способ оплаты</option>
                                            @foreach($paymentMethods as $paymentMethod)
                                                <option value="{{$paymentMethod->id}}">{{$paymentMethod->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    Продолжить
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            @endif
        </div>

    </div>

@endsection
