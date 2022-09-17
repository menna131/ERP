<div class="row">



@forelse ($model_media as $media)
<div class="col-2 ">
    @isset($DeleteSupplierMedia)
    <p wire:click="deleteMedia({{ $media->id }},{{ $model_id }})"
        class="badge badge-danger rounded-circle " style="cursor: pointer;">X</p>
    @endisset

    <img src="{{ asset('images/' . $media->getMediaIcon()) }}" class="w-100" alt="{{ $media->file_name }}">
    <a class="" href="{{ $media->getMediaUrl() }}">{{ $media->file_name }}</a>
</div>
@empty
<div class="col-12 h4">{{ __('translation.suppliers.No Price List') }}</div>

@endforelse






</div>
