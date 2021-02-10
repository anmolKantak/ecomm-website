<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($page->name) ? $page->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
    <label for="last_name" class="control-label">{{ 'Last Name' }}</label>
    <input class="form-control" name="last_name" type="text" id="last_name" value="{{ isset($page->last_name) ? $page->last_name : ''}}" required>
    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="email" id="email" value="{{ isset($page->email) ? $page->email : ''}}" required>
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Password' }}</label>
    <input class="form-control" name="password" type="password" id="password" required>
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('conf_password') ? 'has-error' : ''}}">
    <label for="conf_password" class="control-label">{{ 'Conf Password' }}</label>
    <input class="form-control" name="conf_password" type="password" id="conf_password" required>
    {!! $errors->first('conf_password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{ (isset($page) && 1 == $page->status) ? 'checked' : '' }}> Active</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" @if (isset($page)) {{ (0 == $page->status) ? 'checked' : '' }} @else {{ 'checked' }} @endif> Inactive</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    <label for="role" class="control-label">{{ 'Role' }}</label>
    <select name="role" class="form-control" id="role" required>
    @foreach (json_decode('{"admin":"Admin", "customer":"Customer","inventory manager":"Inventory Manager","order manager":"Order Manager"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($page->role) && $page->role == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
