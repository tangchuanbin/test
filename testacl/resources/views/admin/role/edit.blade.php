@extends("admin.layout.template")
@section("content")
<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active">
      <a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a>
    </li>
  </ul>

  <div class="tab-content">
    <form action="{{ route('roles.update',$role->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
      <div class="tab-pane active" id="tab_1">
        <div class="form-group">
          <label>
            角色名
            <small class="text-red">*</small>
            <span class="text-green small"></span>
          </label>
          <input type="text" class="form-control" name="name" autocomplete="off" value="{{ $role->name }}" placeholder="角色(用户组)名"></div>
        <div class="form-group">
          <label>
            角色展示名
            <small class="text-red">*</small>
            <span class="text-green small">展示名可以为中文</span>
          </label>
          <input type="text" class="form-control" name="label" autocomplete="off" value="{{ $role->label }}" placeholder="角色(用户组)展示名"></div>
        <div class="form-group">
          <label>角色描述</label>
          <textarea class="form-control" name="description" cols="45" rows="2" maxlength="200" placeholder="角色(用户组)描述" autocomplete="off">{{ $role->description }}</textarea>
        </div>
        <div class="form-group">
          <label>
            关联权限
            <small class="text-red">*</small>
          </label>
          <div class="input-group">
             @foreach($permissions as $index => $permission)              
                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ ($role->hasPermission($permission->id)===true) ? 'checked':'' }} {{ ($role->id==1) ? 'disabled':'' }}/>

                <label class="choice" for="permissions[]" data-value="{{ $permission->id }}" style="cursor: pointer;">
                  <span class="text-green">{{ $permission->name }}</span>
                  [<span class="text-red">{{ $permission->label }}</span>]
                </label>
            @endforeach
          </div>
        </div>
      </div>
    
    <!-- /.tab-pane -->
    @if($role->id!=1)
      <button type="submit" class="btn btn-primary">修改角色</button>
    @else
      <span>别闹,您已经拥有最高权限,可别瞎改！！</span>
    @endif  
</form>
  </div>
  <!-- /.tab-content -->

</div>
@endsection