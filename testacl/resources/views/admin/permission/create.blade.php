@extends("admin.layout.template")
@section("content")
<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active">
      <a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a>
    </li>
  </ul>

  <div class="tab-content">
    <form action="{{ route('permission.store') }}" method="post">
    {{ csrf_field() }}
   
      <div class="tab-pane active" id="tab_1">
        <div class="form-group">
          <label>
            权限名称
            <small class="text-red">*</small>
            <span class="text-green small"></span>
          </label>
          <input type="text" class="form-control" name="name" autocomplete="off" value="" placeholder="权限名称"></div>
        <div class="form-group">
          <label>
            权限展示名
            <small class="text-red">*</small>            
          </label>
          <input type="text" class="form-control" name="label" autocomplete="off" value="" placeholder="权限展示名称"></div>
        <div class="form-group">
          <label>权限描述</label>
          <textarea class="form-control" name="description" cols="45" rows="2" maxlength="200" placeholder="权限描述" autocomplete="off"></textarea>
        </div>        
      </div>
    
    <!-- /.tab-pane -->
    <button type="submit" class="btn btn-primary">修改权限</button>
</form>
  </div>
  <!-- /.tab-content -->

</div>
@endsection