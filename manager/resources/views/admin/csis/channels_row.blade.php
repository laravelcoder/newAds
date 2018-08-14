<tr data-index="{{ $index }}">
    <td>{!! Form::text('channels['.$index.'][channelid]', old('channels['.$index.'][channelid]', isset($field) ? $field->channelid: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>