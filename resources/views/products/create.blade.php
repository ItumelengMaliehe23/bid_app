@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Create Profile</h1>
    {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('product_name', 'Product Name')}}
            <input class="form-control @error('product_name') is-invalid @enderror" type="text" name="product_name" id="">
            @error('product_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        {{Form::label('product_category', 'Product Category')}}
            <select class="form-control @error('product_category') is-invalid @enderror" name="product_category" id="">
            <option value="">Select Category</option>
                <option value="computers">Computers</option>
                <option value="phones">Smartphones</option>
                <option value="cameras">Cameras</option>
                <option value="speakers">Speakers</option>
            </select>
            @error('product_category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            {{Form::label('product_disc', 'Product Description')}}
            <textarea class="form-control @error('product_disc') is-invalid @enderror" placeholder="description" name="product_disc" id="article-ckeditor" cols="5" rows="7"></textarea>
  
            @error('product_disc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
        <label for="">Product Image</label>
            {{Form::file('product_img_1')}}
            @error('product_img_1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
        <label for="">Product Image</label>
            {{Form::file('product_img_2')}}
        </div>

        <div class="form-group">
            {{Form::label('product_price', 'Product Price')}}
            <input class="form-control" type="number" min="0" name="product_price" id="">
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
@endsection