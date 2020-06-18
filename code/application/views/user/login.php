    <div class="column">
        <!-- <form class="ui form" id="login-form" method="post" action=""> -->
            <div class="ui form">
            <?php echo form_open('login'); ?>
            <div class="ui segment main-content">
                <div class="ui grid">
                    <div class="ten wide column">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="envelope icon"></i>
                                <input type="text" name="username" class="form-control" placeholder="用户名" required autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="password" class="form-control" placeholder="密码" required autofocus>
                            </div>
                        </div>
                        <!-- <div onclick="formSubmit()" class="ui fluid teal button">
                            登 录
                        </div> -->
                        <button type="submit" class="ui fluid teal button">登 录</button>
                        <!-- <div class="ui right aligned basic segment forget-segment">
                            <a style="color:#00b5ad" href="/password/reset">
                                忘记密码?
                            </a>
                        </div> -->
                    </div>
                    <div class="six wide column segment">
                        <div class="ui basic segment register-segment">
                            <a href="<?php echo base_url(); ?>register" style="color:#00b5ad;">
                                注册账号<i class="chevron right icon"></i>
                            </a>
                        </div>
                        <div class="ui divider"></div>
                        <div class="ui vertical divider divider-or">or</div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_token" value="">
        <!-- </form> -->
        <?php echo form_close(); ?>
        </div>
    </div>

