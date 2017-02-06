@extends("admin.layout.template")
@section("content")
<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active">
      <a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a>
    </li>
  </ul>

  <div class="tab-content">
    <form action="{{ route('users.store') }}" method="post">
    {{ csrf_field() }}   
      <div class="tab-pane active" id="tab_1">
        <div class="form-group">
          <label>
            用户名称
            <small class="text-red">默认创建的用户名密码为test</small>
            <span class="text-green small"></span>
          </label>
          <input type="text" class="form-control" name="name" autocomplete="off" value="" placeholder="用户名称">
        </div>
        <div class="form-group">
          <label>
            邮箱
            <small class="text-red">*</small>            
          </label>
          <input type="text" class="form-control" name="email" autocomplete="off" value="" placeholder="权限展示名称">
        </div>         
      </div>
    <button type="submit" class="btn btn-primary">提交</button>
</form>
  </div>
</div>
@endsection