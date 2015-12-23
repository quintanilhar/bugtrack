@extends('layouts.layout')

@section('head.title', 'Adicionar - Bugs')
@section('title', 'Adicionar Bug')

@section('content')
<div class="box box-primary">
@include('common.errors')
<form role="form" method="post" action="{{ url('/bugs/save') }}">
    <div class="box-body">
        <div class="form-group">
            <label for="priority">Prioridade</label>
            <select name="priority" class="form-control">
                @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="title">
        </div>
        <div class="form-group">
            <textarea name="description" class="form-control" rows="6" placeholder="Bug description..."></textarea>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="iniciativa">Product Category</label>
                <select name="product_category" class="form-control">
                    <option name=""></option>
                    @foreach ($productCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label for="product">Product</label>
                <select name="product" class="form-control">
                    <option name=""></option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-category="{{ $product->category_id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">Cadastrar!</button>
    </div>
</form>
</div>
@endsection
