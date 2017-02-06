@extends('admin.layout.template')
@section('content')
    <a href="{{ route('permission.create') }}" class="btn btn-primary margin-bottom">增加权限</a>
	<div class="box box-primary">        
        <div class="box-header with-border">
            <h3 class="box-title">权限列表</h3>
        </div>
        @include('admin.share.messages')
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
            	<thead>
            		<th>编号</th>
                    <th>权限名称</th>
                    <th>描述</th>
                    {{-- <th>角色</th>
                    <th>状态</th>
                    <th>最后一次登录时间</th> --}}
                    <th>操作</th>
            	</thead>
                <tbody>
                	{{-- @foreach($roles as $role)                     --}}
	                    {{-- @foreach($role->permissions()->get() as $permission) --}}
	                    {{-- <tr>
	                    	<td>{{ $permission->id }}</td>
	                    	<td>{{ $permission->name }}</td>
	                    	<td>{{ $permission->description }}</td>
	                    	<td>                    		
	                    		<form action="{{ route('permission.destroy', $permission->id) }}" method="post">
	                    			{{ csrf_field() }}
	                    			{{ method_field("DELETE") }}
	                    			<button type="submit" class="btn btn-sm btn-danger status-delete-btn">删除</button>
	                    		</form>
	                    	</td>
	                    </tr>
	                    @endforeach	
                    @endforeach --}}
                    @foreach($permissions as $permission)
	                    <tr>
	                    	<td>{{ $permission->id }}</td>
		                    <td>{{ $permission->name }}</td>
		                    <td>{{ $permission->description }}</td>
		                    <td>
                            @can(DELETEPERMISSION)
                                <form action="{{ route('permission.destroy', $permission->id) }}" method="post">
                                     {{ csrf_field() }}
                                     {{ method_field('DELETE') }}
                                     <button type="submit" class="btn btn-sm btn-danger status-delete-btn">删除</button>
                                </form> 
                            @endcan
                            </td>
		                </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
        <div class="box-footer clearfix">
        	{!! $permissions->render() !!}
        </div>
    </div>
@endsection