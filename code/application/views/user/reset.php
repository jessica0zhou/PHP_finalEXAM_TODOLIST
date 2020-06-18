<div class="ui teal borderless inverted menu nav">
    <div class="ui container">
        <div class="ui dropdown item">
            <a href="http://www.todo.link/project//dashboard">
                
            </a>
                        <div class="menu">
                                    <a href="http://www.todo.link/project/87c734e5-7ed7-4421-b47d-01d24cb7c66e/dashboard" class="item">
                        1111
                    </a>
                            </div>
        </div>
        <div class="right menu">
                            <div class="ui dropdown item">
                    <img width="35" class="ui circular  image" src="/assets/images/user.png">
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a href="http://www.todo.link/user/setting" class="item">
                            个人设置
                        </a>
                        <a href="http://www.todo.link/project" class="item">
                            项目列表
                        </a>
                        <a onclick="logout()" class="item">退出登录</a>
                    </div>
                    <form class="logoutform" action="http://www.todo.link/logout" method="POST">
                        <input type="hidden" name="_token" value="BEhfX8619iinMNpIAdaIp9yEvn0pQV921q0bfVW4">
                    </form>
                </div>
                        </div>
    </div>
</div>

<div id="suggest-message-div" style="display: none;" class="ui mini icon positive message">
    <i class="close icon"></i>
    <i class="checkmark icon"></i>
    <div id="suggest-content" class="content">
        <p></p>
    </div>
</div>

    <div class="user">
        <div class="ui container content">
                        <div class="ui stackable grid">
                <div class="sixteen wide column">
                    <div class="ui segment">
                        <div class="ui two column stackable grid">
                            <div class="three wide column" style="min-height: 40rem;">
    <div class="ui vertical menu" style="width: auto;">
        <a href="http://www.todo.link/user/setting"
           class="item ">
            基本资料
        </a>
        <a href="http://www.todo.link/user/password/reset"
           class="item active">
            修改密码
        </a>
    </div>
</div>
                            <div class="thirteen wide column">
                                <div class="ui segment">
                                    <form method="post" class="ui mini loadable form"
                                          action="http://www.todo.link/user/password/reset">
                                        <div class="required field">
                                            <label class="required">原密码</label>
                                            <input type="password" name="old_password" value="">
                                                                                    </div>
                                        <div class="required field">
                                            <label class="required">新密码</label>
                                            <input type="password" name="new_password" value="">
                                                                                    </div>
                                        <div class="required field">
                                            <label class="required">确认密码</label>
                                            <input type="password" name="new_password_confirmation"
                                                   value="">
                                                                                    </div>
                                        <div class="ui basic segment">
                                            <button class="mini ui primary button" type="submit">
                                                提交
                                            </button>
                                        </div>
                                        <input type="hidden" name="_token" value="BEhfX8619iinMNpIAdaIp9yEvn0pQV921q0bfVW4">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="ui tiny modal" id="suggest-modal">
    <div class="header">
        意见建议
    </div>
    <div class="content">
        <form class="ui mini loadable form" id="suggest-form">
            <div class="required field">
                <textarea required id="description" name="description"
                          placeholder="内容"></textarea>
                <div class="ui visible hidden error message suggest-error"></div>
            </div>
        </form>
    </div>
    <div class="actions">
        <div class="ui mini primary button" onclick="postsuggest()">确定</div>
        <div class="ui mini deny button">取消</div>
    </div>
</div>

<div id="fixed-div">
    <div class="ui small vertical basic icon buttons">
        <button class="ui button" id="go-top-button" onclick="goTop()"><i class="chevron up icon"></i></button>
        <button class="ui button" onclick="suggest()"><i class="envelope outline icon"></i></button>
    </div>
</div>
<script src="http://www.todo.link/assets/js/app.js"></script>
<script>
    function suggest() {
        $('#suggest-modal')
            .modal({
                closable: true
            })
            .modal('show')
        ;
    }

    function postsuggest() {
        $('#suggest-form').addClass('loading');
        var data = {
            "description": $('#description').val()
        };

        $.ajax({
            type: "POST",
            url: "http://www.todo.link/user/suggest",
            data: data,
            datatype: "json",
            success: function (data) {
                if (data.code === 1) {
                    $(window).scrollTop(0);
                    $('#suggest-modal').modal('hide');
                    $('#suggest-content').text(data.message);
                    $('#suggest-message-div').show();
                    setTimeout(show, 5000);
                    function show() {
                        $('.message .close').click();
                    }
                } else {
                    $('#suggest-form').removeClass('loading');
                    $('.suggest-error').removeClass('hidden').text(data.message.description)
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("系统异常");
            }
        });
    }
</script>