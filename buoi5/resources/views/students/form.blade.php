
<div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
    <label for="fullname" class="col-md-2 control-label">Fullname</label>
    <div class="col-md-10">
        <input class="form-control" name="fullname" type="text" id="fullname" value="{{ old('fullname', optional($student)->fullname) }}" minlength="1" placeholder="Enter fullname here...">
        {!! $errors->first('fullname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($student)->email) }}" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Birthday') ? 'has-error' : '' }}">
    <label for="Birthday" class="col-md-2 control-label">Birthday</label>
    <div class="col-md-10">
        <input class="form-control" name="Birthday" type="text" id="Birthday" value="{{ old('Birthday', optional($student)->Birthday) }}" minlength="1" placeholder="Enter birthday here...">
        {!! $errors->first('Birthday', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('reg_date') ? 'has-error' : '' }}">
    <label for="reg_date" class="col-md-2 control-label">Reg Date</label>
    <div class="col-md-10">
        <input class="form-control" name="reg_date" type="text" id="reg_date" value="{{ old('reg_date', optional($student)->reg_date) }}" placeholder="Enter reg date here...">
        {!! $errors->first('reg_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('major_id') ? 'has-error' : '' }}">
    <label for="major_id" class="col-md-2 control-label">Major</label>
    <div class="col-md-10">
        <select class="form-control" id="major_id" name="major_id">
        	    <option value="" style="display: none;" {{ old('major_id', optional($student)->major_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select major</option>
        	@foreach ($majors as $key => $major)
			    <option value="{{ $key }}" {{ old('major_id', optional($student)->major_id) == $key ? 'selected' : '' }}>
			    	{{ $major }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('major_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

