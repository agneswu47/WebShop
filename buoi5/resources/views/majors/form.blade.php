
<div class="form-group {{ $errors->has('name_major') ? 'has-error' : '' }}">
    <label for="name_major" class="col-md-2 control-label">Name Major</label>
    <div class="col-md-10">
        <input class="form-control" name="name_major" type="text" id="name_major" value="{{ old('name_major', optional($major)->name_major) }}" minlength="1" placeholder="Enter name major here...">
        {!! $errors->first('name_major', '<p class="help-block">:message</p>') !!}
    </div>
</div>

