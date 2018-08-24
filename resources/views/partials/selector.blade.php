 Form::open(['method' => 'get','id' => 'filter_form'])  
<div class="row">
    <div class="form-group col-md-4">
        <label>Date Range</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="date-range" class="form-control pull-right" value="">
        </div>
    </div>
    <div class="form-group col-md-4">
        <label for="inputWebsite">Website</label>
        {{--  Form::select('website', @$websites,@$search_params['website'], array('placeholder' => 'Select Website', 'class'=>'form-control', 'id' => 'website', 'value'=>@$search_params['website']))  --}}
        <input type="yup" name="">
    </div>
    <div class="form-group col-md-4">
        <label for="view">View</label>
        {{-- Form::select('view', @$views, @$search_params['view'], array('placeholder' => 'Select View', 'class'=>'form-control', 'id' => 'view', 'value'=>@$search_params['view']))   --}}
        <input type="hwody" name="">
    </div>
</div>
 Form::close()  
<hr style="clear:both" />