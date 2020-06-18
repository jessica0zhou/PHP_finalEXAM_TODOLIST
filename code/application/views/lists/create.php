<div class="project">
    <div class="ui container content">
        <div class="ui stackable grid">
            <div class="sixteen wide column">
                <div class="ui segment" style="">
                    <div class="ui mini loadable form">
                        <?php echo form_open('create'); ?>  
                        <!-- <form method="post" action="<?php echo base_url(); ?>/project" class="ui mini loadable form"> -->
                            <div class="required field">
                                <label>名称</label>
                                <input type="text" name="name" value="" placeholder="名称" required autofocus>
                            </div>
                            <div class="required field">
                                <label>待办</label>
                                <textarea name="todo" placeholder="待办" required autofocus></textarea>
                            </div>
                            <div class="ui basic segment">
                                <button class="mini ui primary button" type="submit">
                                    提交
                                </button>
                                <a href="<?php echo base_url(); ?>home" class="mini ui primary button">
                                    取消
                                </a>
                            </div>
                            <input type="hidden" name="_id" value="">
                        <!-- </form> -->
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


