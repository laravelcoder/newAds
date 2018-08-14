<tr data-index="{{ $index }}">
    <td>{!! Form::text('csis['.$index.'][ssm]', old('csis['.$index.'][ssm]', isset($field) ? $field->ssm: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('csis['.$index.'][imc]', old('csis['.$index.'][imc]', isset($field) ? $field->imc: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('csis['.$index.'][ip]', old('csis['.$index.'][ip]', isset($field) ? $field->ip: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('csis['.$index.'][pid]', old('csis['.$index.'][pid]', isset($field) ? $field->pid: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>