<tr data-index="{{ $index }}">
    <td>{!! Form::text('csos['.$index.'][ocloud_a]', old('csos['.$index.'][ocloud_a]', isset($field) ? $field->ocloud_a: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::number('csos['.$index.'][ocp_a]', old('csos['.$index.'][ocp_a]', isset($field) ? $field->ocp_a: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('csos['.$index.'][ocloud_b]', old('csos['.$index.'][ocloud_b]', isset($field) ? $field->ocloud_b: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('csos['.$index.'][ocp_b]', old('csos['.$index.'][ocp_b]', isset($field) ? $field->ocp_b: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>