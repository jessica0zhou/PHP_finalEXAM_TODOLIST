    <div class="column" style="width: 400px;">
        <div class="ui form">
        <?php echo form_open('register'); ?>    
            <div class="ui segment main-content">
                <div class="ui grid">
                    <div class="column">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="username" value="" placeholder="用户名" required autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="envelope icon"></i>
                                <input type="email" name="email" value="" placeholder="邮箱" required autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="password" value="" placeholder="密码" required autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="password_confirmation" placeholder="确认密码" required autofocus>
                            </div>
                        </div>
                        <button type="submit" class="ui fluid teal button">注 册</button>
                        <div class="ui right aligned basic segment forget-segment">
                            <a style="color:#00b5ad" href="<?php echo base_url(); ?>login">
                                登 录
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_token" value="">
        <!-- </form> -->
        <?php echo form_close(); ?>
        </div>
    </div>