@extends("admin.layout.template")
@section("content")
	<div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">角色列表</h3>
        </div>
        @include('admin.share.messages')
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
            	<thead>
            		<th>编号</th>
                    <th>角色名称</th>
                    <th>描述</th>
                    {{-- <th>角色</th>
                    <th>状态</th>
                    <th>最后一次登录时间</th> --}}
                    <th>操作</th>
            	</thead>
                <tbody>                	
                    @foreach($roles as $role)
	                    <tr>
	                    	<td>{{ $role->id }}</td>
		                    <td>{{ $role->name }}</td>
		                    <td>{{ $role->description }}</td>
		                    <td>
                            @can('grant',$role)
		                    	<form action="{{ route('roles.edit', $role->id) }}" method="get">
                    			     {{ csrf_field() }}
                    			     <button type="submit" class="btn btn-sm btn-info status-delete-btn">授权</button>
                    		    </form>
                            @endcan
		                    </td>
		                </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
        <div class="box-footer clearfix">
        	{!! $roles->render() !!}
        </div>
    </div>
@endsection