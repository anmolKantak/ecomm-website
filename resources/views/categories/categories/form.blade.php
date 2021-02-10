<div class="form-group {{ $errors->has('category_name') ? 'has-error' : ''}}">
    <label for="category_name" class="control-label">{{ 'Category Name' }}</label>
    <input class="form-control" name="category_name" type="text" id="category_name" value="{{ isset($category->category_name) ? $category->category_name : ''}}" required>
    {!! $errors->first('category_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
    <label for="parent_id" class="control-label">{{ 'Category Level' }}</label>
    <select name="parent_id">
    <option value="0">Select Main Category</option>
    @foreach($levels as $val)
    <option value="{{ $val->parent_id }}" @if( $val -> parent_id == $categoryDetails ->parent_id)
     selected @endif>{{ $val->category_name }}</option>

    @endforeach

    </select>
  
    {!! $errors->first('category_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{ (isset($category) && 1 == $category->status) ? 'checked' : '' }}> Active</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" @if (isset($category)) {{ (0 == $category->status) ? 'checked' : '' }} @else {{ 'checked' }} @endif> Inactive</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
