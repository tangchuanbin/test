@extends("admin.layout.template")
@section("content")
<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active">
      <a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a>
    </li>
  </ul>

  <div class="tab-content">
    <form action="{{ route('users.update.grant',$user->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
      <div class="tab-pane active" id="tab_1">
        <div class="form-group">
          
          <div class="input-group">
             @foreach($roles as $index => $role)              
                <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ ($user->hasRole($role->id)===true) ? 'checked':'' }} />

                <label class="choice" for="roles[]" data-value="{{ $role->id }}" style="cursor: pointer;">
                  <span class="text-green">{{ $role->name }}</span>
                  [<span class="text-red">{{ $role->label }}</span>]
                </label>
            @endforeach
          </div>
        </div>
      </div>
    
    <button type="submit" class="btn btn-primary">授权</button>
</form>
  </div>
  <!-- /.tab-content -->

</div>
@endsection