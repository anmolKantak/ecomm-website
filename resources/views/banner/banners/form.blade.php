<div class="form-group {{ $errors->has('banner_name') ? 'has-error' : ''}}">
    <label for="banner_name" class="control-label">{{ 'Banner Name' }}</label>
    <input class="form-control" name="banner_name" type="file" id="banner_name" value="{{ isset($banner->banner_name) ? $banner->banner_name : ''}}" required>
    {!! $errors->first('banner_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('width') ? 'has-error' : ''}}">
    <label for="width" class="control-label">{{ 'Width' }}</label>
    <input class="form-control" name="width" type="number" id="width" value="{{ isset($banner->width) ? $banner->width : ''}}" >
    {!! $errors->first('width', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('height') ? 'has-error' : ''}}">
    <label for="height" class="control-label">{{ 'Height' }}</label>
    <input class="form-control" name="height" type="number" id="height" value="{{ isset($banner->height) ? $banner->height : ''}}" >
    {!! $errors->first('height', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($banner->title) ? $banner->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{ (isset($banner) && 1 == $banner->status) ? 'checked' : '' }}> Active</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" @if (isset($banner)) {{ (0 == $banner->status) ? 'checked' : '' }} @else {{ 'checked' }} @endif> Inactive</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
