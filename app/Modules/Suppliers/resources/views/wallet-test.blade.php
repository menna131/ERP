<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('material/css/bootstrap/4.3.1/css/bootstrap.min.css')}}"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-dark h1"> Wallet Transactions </div>
            <div class="col-12 text-center text-dark h3"> Current Balance: {{$balance}} </div>
            <div class="col-12 text-center text-dark h5">
                @if (session()->has('message'))
                    @isset(Session()->get('message')['success'])
                   <div class="alert alert-success">{!! session()->get('message')['success'] !!}</div>
                    @endisset
                    @isset(Session()->get('message')['error'])
                    <div class="alert alert-danger">{!! session()->get('message')['error'] !!}</div>
                    @endisset
                @endif
            </div>

            <div class="col-4">
                <h1>deposite</h1>
                <form action="{{ route('deposite') }}" method="post">
                    @csrf
                    <input type="text" name="amount" id="" class="form-control" placeholder="Amount">
                    <button class="btn btn-dark btn-small"> deposite </button>
                </form>
            </div>
            <div class="col-4">
                <h1>withdraw</h1>
                <form action="{{ route('withdraw') }}" method="post">
                    <input type="text" name="amount" id="" class="form-control" placeholder="Amount">
                    @csrf
                    <button class="btn btn-dark btn-small"> withdraw </button>
                </form>
            </div>
            <div class="col-4">
                <h1>debit</h1>
                <form action="{{ route('debit') }}" method="post">
                    @csrf
                    <input type="text" name="amount" id="" class="form-control" placeholder="Amount">
                    <button class="btn btn-dark btn-small"> debit </button>
                </form>
            </div>
            <div class="col-6">
                <h1>paymentOut</h1>
                <form action="{{ route('paymentOut') }}" method="post">
                    @csrf
                    <input type="text" name="amount" id="" class="form-control" placeholder="Amount">
                    <button class="btn btn-dark btn-small"> paymentOut </button>
                </form>
            </div>
            <div class="col-6">
                <h1>paymentIn</h1>
                <form action="{{ route('paymentIn') }}" method="post">
                    @csrf
                    <input type="text" name="amount" id="" class="form-control" placeholder="Amount">
                    <button class="btn btn-dark btn-small"> paymentIn </button>
                </form>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <th>id</th>
                        <th>supplier_wallet_id</th>
                        <th>reason</th>
                        <th>transaction_status</th>
                        <th>amount</th>
                        <th>created_at</th>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $column => $transaction)
                        <tr>
                            <td>{{$transaction->id}}</td>
                          <td>{{$transaction->supplier_wallet_id}}</td>
                            <td>{{$transaction->reason}}</td>
                            <td>{{$transaction->transaction_status}}</td>
                            <td>{{$transaction->amount}}</td>
                            <td>{{$transaction->created_at}}</td>
                       </tr>

                   @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url('material/js/code.jquery.com/jquery-3.3.1.slim.min.js') }}"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="{{ url('material/js/ajax/libs/popper.js/1.14.7/umd/popper.min.js') }}"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{ url('material/js/bootstrap/4.3.1/js/bootstrap.min.js') }}"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
