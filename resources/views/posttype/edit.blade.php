@extends('layouts.master')

@section('title','編輯分類')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    編輯分類
                </div>
                <div class="panel-body">
                    <div class="container-fluid" style="padding:0;">
                        <form style="margin-top: 20px" class="form-horizontal" method="POST" action="{{ route('type.update',['type'=>$post_type->id]) }}">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT" />
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">分類名稱</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{ $post_type->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-m btn-primary">儲存</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
