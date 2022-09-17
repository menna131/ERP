{{-- button For Test --}}
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Open Modal
</button> --}}
<!-- modal start -->
<div class="modal fade modal-dialog-scrollable " id="exampleModalLong" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog  {{ $modalSize }}" role="document">
        <div class="modal-content modal-content-mode">
            <div class="modal-body" id="modal-body">
                {{-- {!! $modalBody !!} --}}
                {{-- @yield('body') --}}
            </div>
            <div class="modal-footer" >
                <div class="modal-action" id="modal-action">
                </div>
            </div>

        </div>
    </div>
</div>
<!-- modal end -->
{{-- Include For Test --}}
{{-- @include('layouts.includes.modal',
        ['modalSize'=>"modal-lg",
        'modalTitleColor'=>"",
        'modalTitle'=>"first modal",
        ]) --}}
