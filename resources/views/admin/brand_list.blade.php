@extends('admin.layouts.common')
@section('content')

            <table class="layui-table">
                <thead>
                    <tr>
                        <!-- <th>
                            <input type="checkbox" name="" class="all" value="">
                        </th> -->
                        <th>
                            ID
                        </th>
                        <th>
                            品牌名称
                        </th>
                        <th>
                            内容介绍
                        </th>
                        
                        <th>
                            状态
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $k=>$v)
                    <tr>
                       <!--  <td>
                            <input type="checkbox" b_id="{{$v->brand_id}}"  name="">
                        </td> -->
                        <td>{{$v->brand_id}}</td>
                        <td>
                            
                                {{$v->brand_name}}
                            
                        </td>/
                        <td >
                            {{$v->brand_desc}}
                        </td>
                        
                        <td class="td-status">
                            <span class="layui-btn layui-btn-normal layui-btn-mini">
                                @if($v->is_show==1) 显示 @else 不显示 @endif
                            </span>
                        </td>
                        <td class="td-manage">
                            
                            <a title="编辑" href="{{url('admin/brand_upd')}}?id={{$v->brand_id}}" class="upd" > 
                        
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            
                            <a title="删除" class="del" href="javascript:;" b_id="{{$v->brand_id}}">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            {{ $data->links() }}
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>

    <!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
    <!-- <script src="/jq.js"></script> -->
    <script>
        $('.del').on('click',function(){
            var _this=$(this);
            var brand_id=_this.attr("b_id");
            $.ajax({
                url:"brand_del",
                data:{brand_id:brand_id},
                dataType:'json',
                type:'GET',
                success:function(res){
                    if(res.ret){
                        alert(res.res);
                        location.href="http://www.app.com/admin/brand_list";
                    }else{
                        alert(res.res);
                    }
                }
            })
        })


       
    </script>
@endsection
