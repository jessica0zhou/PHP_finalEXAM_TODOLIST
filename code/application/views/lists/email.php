<div class="project">
    <div class="ui container content">
        <div class="ui stackable grid">
            <div class="sixteen wide column">
                <div class="ui segment" style="">
                    <div class="ui mini loadable form">
                        <?php echo form_open('email'); ?>  
                        <!-- <form method="post" action="<?php echo base_url(); ?>/project" class="ui mini loadable form"> -->
                            <div class="required field">
                                <label>收件人</label>
                                <input type="email" name="toemail" value="" placeholder="收件人" required autofocus>
                            </div>
                            <div class="field">
                                <label>标题</label>
                                <input type="text" name="subject" value="" placeholder="标题" required autofocus>
                            </div>
                            <div class="field">
                                <label>内容</label>
                                <textarea name="content" placeholder="内容" required autofocus></textarea>
                            </div>
                            <div class="ui basic segment">
                                <button class="mini ui primary button" type="submit">
                                    提交
                                </button>
                                <a href="<?php echo base_url(); ?>home" class="mini ui primary button">
                                    取消
                                </a>
                            </div>
                        <!-- </form> -->
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


