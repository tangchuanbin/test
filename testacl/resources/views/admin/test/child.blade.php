@extends('admin.test.parent')
@section('test')
bbbb
{{-- 用@show会立即显示内容，所以走到这里会立即显示bbbb，然而按照模板的继承规则还会替换父亲视图中的test section 所以bbbb bbbb 显示了两边 --}}
@show
