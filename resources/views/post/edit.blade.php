@extends('layouts.master')

@section('title','文章編輯')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    編輯：{{ $post->title }}
                </div>
                <div class="panel-body">
                    <div class="container-fluid" style="padding:0;">
                        <form style="margin-top: 20px" class="form-horizontal" method="POST" action="{{ route('post.update',['id'=>$post->id]) }}">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT" />
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">標題</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="type" class="col-sm-2 control-label">分類</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="type">
                                        @foreach($post_types as $post_type)
                                            <option value="{{ $post_type->id }}" {{ ($post->type==$post_type->id)?"selected='selected'":"" }} >
                                                {{ $post_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="col-sm-2 control-label">內文</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="25" name="content" style="resize: vertical;">{{ $post->content }}</textarea>
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
