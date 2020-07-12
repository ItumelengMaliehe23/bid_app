@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if($profiles)<a href="/profiles/{{Auth::user()->profiles->id}}/edit" class="btn btn-primary">Edit Profile</a> @else<a href="/profiles/create" class="btn btn-primary">Create Profile</a> @endif<a href="/products/create" class="btn btn-primary">Create Product</a>
                    <h3>Your Products</h3>
                    @if(count($products) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->product_name}}</td>
                                    <td><a href="/products/{{$product->id}}/edit" class="btn btn-default">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['ProductController@destroy', $product->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no products</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
