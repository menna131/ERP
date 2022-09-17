<div>
    @if (session()->has('message'))
        @if (session()->has('message.success'))
            <div class="alert alert-success">{{ session()->get('message.success') }}</div>
        @endif
        @if (session()->has('message.error'))
            <div class="alert alert-danger">{{ session()->get('message.error') }}</div>
        @endif
    @endif
</div>
