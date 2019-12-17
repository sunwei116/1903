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
                            管理员姓名
                        </th>
                        <th>
                            性别
                        </th>
                        
                        

                        <th>
                            年龄
                        </th>

                        <th>
                            联系方式
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
                        <td>{{$v->user_id}}</td>
                        <td>
                            
                                {{$v->user_name}}
                            
                        </td>
                        <td >
                            @if($v->user_sex==1) 男 @else 女 @endif
                        </td>
                        
                        <td>
                            {{$v->user_age}}
                        </td>
                        
                        <td >
                            {{$v->user_phone}}
                        </td>
                        <td class="td-manage">
                            
                            <a title="删除" class="del" href="javascript:;" b_id="{{$v->user_id}}">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>

    <!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
    <!-- <script src="/jq.js"></script> -->
    <script type="text/javascript">
        $('.del').on('click',function(){
            id = $(this).attr('b_id');
            $.ajax({
                url:"user_del",
                data:{id:id},
                dataType:'json',
                type:'GET',
                success:function(res){
                    if(res.ret==1){
                        alert(res.res);
                        location.href="http://www.app.com/admin/user_list";
                    }else{
                        alert(res.res);
                    }
                }
            })
        })
    </script>

@endsection
