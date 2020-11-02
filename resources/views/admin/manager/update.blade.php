<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/admin/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>修改管理员 - 管理员管理 - H-ui.admin v3.1</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>ID：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <p class="input-text" style="border: none!important;">{{$data->id}}</p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>登录名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{$data->username}}" placeholder="登录名" id="username" name="username">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" autocomplete="off" value="{{$data->pwd}}" placeholder="密码" id="password" name="password">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" autocomplete="off" value="{{$data->pwd}}"  placeholder="确认新密码" id="password2" name="password2">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="gender" type="radio" id="gender-1" value="1" @if(in_array('1',explode(',',$data->gender))) checked="checked" @endif>
                    <label for="gender-1">男</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="gender-2" name="gender" value="2" @if(in_array('2',explode(',',$data->gender))) checked="checked" @endif>
                    <label for="gender-2">女</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="gender-3" name="gender" value="3" @if(in_array('3',explode(',',$data->gender))) checked="checked" @endif>
                    <label for="gender-2">保密</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{$data->mobile}}" placeholder="手机" id="mobile" name="mobile">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{$data->email}}" placeholder="邮箱" id="email" name="email">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box" style="width:150px;">
                    <select class="select" name="role_id" size="1">
                        <option value="0" @if(in_array('0',explode(',',$data->role_id))) selected="selected" @endif>作为顶级管理员</option>
                        @foreach($role as $val)
                            <option value="{{$val->id}}" @if(in_array($val->id,explode(',',$data->role_id))) selected="selected" @endif>{{$val->role_name}}</option>
                        @endforeach
                    </select>
			    </span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否已启用：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="status" type="radio" id="status-1" value="1" @if(in_array('1',explode(',',$data->status))) checked="checked" @endif>
                    <label for="status-1">已停用</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="status-2" value="2" name="status" @if(in_array('2',explode(',',$data->status))) checked="checked" @endif>
                    <label for="status-2">已启用</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
        {{csrf_field()}}
    </form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-admin-add").validate({
            rules:{
                username:{
                    required:true,
                    minlength:2,
                    maxlength:20
                },
                password:{
                    required:true,
                    minlength:6,
                    maxlength:6
                },
                password2:{
                    required:true,
                    equalTo: "#password",
                    minlength:6,
                    maxlength:6,
                },
                mobile:{
                    required:true,
                    isPhone:true,
                },
                gender:{
                    required:true,
                },
                email:{
                    required:true,
                    email:true,
                },
                role_id:{
                    required:true,
                },
                status:{
                    required:true,
                },
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "" ,//自己提交给自己不用写URL
                    success: function(data){
                            // 判断修改结果
                            if(data=='1'){
                                layer.msg('修改成功!',{icon:1,time:1000},function () {
                                    var index = parent.layer.getFrameIndex(window.name);
                                    parent.$('.btn-refresh').click();
                                    parent.window.location=parent.window.location;
                                    parent.layer.close(index);
                                });
                            }else{
                                layer.msg('修改失败!',{icon:2,time:1000});
                            }
                    },
                    error: function(XmlHttpRequest, textis_nav, errorThrown){
                        layer.msg('修改失败!',{icon:2,time:1000});
                    }
                });

            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>