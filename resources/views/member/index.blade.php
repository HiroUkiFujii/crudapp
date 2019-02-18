@extends('layouts.layout')
@section('content')
  <a href="http://127.0.0.1:8000/members/new" class="btn btn-primary btn-sm">新規登録</a>
  <br></br>
<div class="row" style="margin-bottom: 30px;">
  <div class="col-sm-10" style="margin-bottom: 10px;">
    <form method="get" action="" class="form-inline">
      <div class="form-group">
        <input type="text" name="keyword" class="form-control" value="{{$keyword}}" placeholder="検索キーワード">
      </div>
      <input type="submit" value="検索" class="btn btn-info">
    </form>
  </div>
</div>
 <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
  <h1><small>受講生一覧</small></h1>
  </div>
  <table class="table table-striped table-hover">
  <thead>
  <tr>
  <th>No</th>
  <th>name</th>
  <th>email</th>
  <th>tel</th>
  <th>opration</th>
  </tr>
  </thead>
  <tbody>
  @foreach($members as $member)
  <tr>
    <td>{{$member->id}}</td><td>{{$member->name}}</td><td>{{$member->email}}</td><td>{{$member->tel}}</td>
  <td>
  <a href="" class="btn btn-primary btn-sm">詳細</a>
  <a href="edit/{{$member->id}}" class="btn btn-primary btn-sm">編集</a>
  <a href="delete/{{$member->id}}" class="btn btn-danger btn-sm">削除</a>
  </td>
  </tr>
  @endforeach
  </tbody>
  </table>

 <!-- page control -->
 {{--{!! $members->render() !!}--}}
  {!!$members->appends(['keyword'=>$keyword])->render() !!}


@endsection
