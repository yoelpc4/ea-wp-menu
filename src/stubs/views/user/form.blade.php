<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('name') ? 'has-warning' : '' }}">
                {!! Form::label('name', 'Name*') !!}
                {!! Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ?
                'form-control-warning' : ''), 'maxlength' => '30', 'required']) !!}
                @if ($errors->has('name'))
                <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('email') ? 'has-warning' : '' }}">
                {!! Form::label('email', 'Email*') !!}
                {!! Form::email('email', null, ['class' => 'form-control ' . ($errors->has('email') ?
                'form-control-warning' : ''), 'maxlength' => '40', 'required']) !!}
                @if ($errors->has('email'))
                <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('sector') ? 'has-warning' : '' }}">
                {!! Form::label('sector', 'Sector*') !!}
                {!! Form::select('sector', ['', 'food_and_beverages' => ['cafe', 'foodtruck'], 
                'mining' => ['gold', 'silver'], 
                'infrastructure' => ['building', 'factory']], 
                null, ['class' => 'form-control select2 ' .
                ($errors->has('sector') ? 'form-control-warning' : ''), 
                'data-placeholder' => '-- Choose a Sector --', 'required']) !!}
                @if ($errors->has('sector'))
                <div class="form-control-feedback">{{ $errors->first('sector') }}</div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('roles') ? 'has-warning' : '' }}">
                {!! Form::label('roles', 'Roles*') !!}
                {!! Form::select('roles', ['hustler' => ['sales', 'marketing'], 
                'hacker' => ['web development', 'mobile apps development'], 
                'hipster' => ['graphic design', 'video creator']], 
                null, ['class' => 'form-control select2 ' .
                ($errors->has('roles') ? 'form-control-warning' : ''), 
                'data-placeholder' => '-- Choose Multiple Roles --', 'multiple', 'required']) !!}
                @if ($errors->has('roles'))
                <div class="form-control-feedback">{{ $errors->first('roles') }}</div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row {{ $errors->has('gender') ? 'has-warning' : '' }}">
                <label>Gender</label>
                <div class="col-12">
                    <div class="custom-control custom-radio">
                        {!! Form::radio('gender', 1, true, ['id' => 'male', 'class' =>
                        'custom-control-input']) !!}
                        {!! Form::label('male', 'Male', ['class' => 'custom-control-label']) !!}
                    </div>
                    <div class="custom-control custom-radio">
                        {!! Form::radio('gender', 2, false, ['id' => 'female', 'class' =>
                        'custom-control-input']) !!}
                        {!! Form::label('female', 'Female', ['class' => 'custom-control-label']) !!}
                    </div>
                </div>
                @if ($errors->has('gender'))
                <div class="form-control-feedback">{{ $errors->first('gender') }}</div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('fields') ? 'has-warning' : '' }}">
                <label>Clothes</label>
                <div class="col-12">
                    <div class="custom-control custom-checkbox">
                        {!! Form::checkbox('fields', 1, true, ['id' => 'business', 'class' =>
                        'custom-control-input']) !!}
                        {!! Form::label('business', 'Business', ['class' => 'custom-control-label']) !!}
                    </div>
                    <div class="custom-control custom-checkbox">
                        {!! Form::checkbox('fields', 2, false, ['id' => 'coding', 'class' =>
                        'custom-control-input']) !!}
                        {!! Form::label('coding', 'Coding', ['class' => 'custom-control-label']) !!}
                    </div>
                    <div class="custom-control custom-checkbox">
                        {!! Form::checkbox('fields', 3, false, ['id' => 'design', 'class' =>
                        'custom-control-input']) !!}
                        {!! Form::label('design', 'Design', ['class' => 'custom-control-label']) !!}
                    </div>
                </div>
                @if ($errors->has('fields'))
                <div class="form-control-feedback">{{ $errors->first('fields') }}</div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group {{ $errors->has('date_of_birth') ? 'has-warning' : '' }}">
                    {!! Form::label('date_of_birth', 'Date of Birth*') !!}
                    {!! Form::text('date_of_birth', null, ['class' => 'form-control datepicker ' .
                    ($errors->has('date_of_birth') ? 'form-control-warning' : ''), 'required']) !!}
                    @if ($errors->has('date_of_birth'))
                    <div class="form-control-feedback">{{ $errors->first('date_of_birth') }}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @component('components.dropzone', [
                'name' => 'user_profile_image',
                'label' => 'Profile Image',
                'hint' => 'Allowed extensions (png, jpg, jpeg, gif, bmp, or svg) | Accept 1 file | Max. file size 10MB |
                Min. image width 200px | Min. image height 200px',
                'removeable' => true,
                'extensions' => '.png,.jpg,.jpeg,.gif,.bmp,.svg',
                'maxFiles' => 1,
                'maxFileSize' => 10,
                'attachments' => [],
                'attachable_type' => 'user',
                'attachable_id' => isset($user) ? $user->id : '',
                'file_attachment' => 'user_profile_image'
            ])
            @endcomponent
        </div>
    </div>
</div>
<hr>
<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-success float-md-right">
                <i class="fa fa-save"></i> {{ $buttonText }}
            </button>
        </div>
    </div>
</div>