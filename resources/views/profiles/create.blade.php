@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Create Profile</h1>
    {!! Form::open(['action' => 'ProfileController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('company_name', 'Company Name')}}
            {{Form::text('company_name', '', ['class' => 'form-control', 'placeholder' => 'thuma\'s store'])}}
        </div>
        <div class="form-group">
            {{Form::label('company_about', 'About')}}
            {{Form::textarea('company_about', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
        <label for="">Cover image</label>
            {{Form::file('comp_cov_img')}}
        </div>

        <div class="form-group">
        <label for="">Profile image</label>
            {{Form::file('comp_pro_img')}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
@endsection