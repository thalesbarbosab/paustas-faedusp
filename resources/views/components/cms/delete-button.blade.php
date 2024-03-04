<form action="{{ $route }}" method="post">
    @method('DELETE')
    @csrf
    <a ONCLICK="return confirm('@lang('generic.message.are_you_shure_to_delete')')">
        <button type="submit" class="{{ $button_class ?? 'btn btn-danger btn-xs' }}"><i class="fas fa-trash-alt"></i> {{ $button_name ?? trans('generic.action.remove') }}</button>
    </a>
</form>
