@extends('admin.layout.template')
@section('content')
    @can(ADDUSER)
    <a href="{{ route('users.create') }}" class="btn btn-primary margin-bottom">增加用户</a>
    @endcan
	<div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">用户列表</h3>
        </div>
        @include('admin.share.messages')
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
            	<thead>
            		<th>编号</th>
                    <th>登录名 / 昵称</th>
                    <th>邮箱</th>
                    {{-- <th>角色</th>
                    <th>状态</th>
                    <th>最后一次登录时间</th> --}}
                    <th>操作</th>
            	</thead>
                <tbody>                    
                    @foreach($users as $user)
                    <tr>
                    	<td>{{ $user->id }}</td>
                    	<td>{{ $user->name }}</td>
                    	<td>{{ $user->email }}</td>
                    	<td>
                            @can(DELETEUSER)                    		
                    		<form action="{{ route('users.destroy', $user->id) }}" method="post" style="display:inline">
                    			{{ csrf_field() }}
                    			{{ method_field("DELETE") }}
                    			<button type="submit" class="btn btn-sm btn-danger status-delete-btn">删除</button>
                    		</form>
                            @endcan
                            @can(GRANTUSER)                            
                            <form action="{{ route('users.grant',$user->id) }}" method="get" style="display:inline">
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
        	{!! $users->render() !!}
        </div>
    </div>
@endsection