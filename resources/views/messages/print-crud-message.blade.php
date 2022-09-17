<div>
    @if (session()->has('Success'))
        <div class="alert alert-success"> {{ session()->get('Success') }}</div>
    @elseif (session()->has('Error'))
        <div class="alert alert-danger"> {{ session()->get('Error') }}</div>
    @endif
</div>
