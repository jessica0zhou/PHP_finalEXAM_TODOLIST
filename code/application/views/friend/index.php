<div class="home">
    <div class="ui container content">
        <div class="ui stackable grid">
            <div class="sixteen wide column">
                <div class="ui segment" style="min-height: 40rem;">
                    <div class="ui stackable two column grid">
                        <div class="column">
                            <div class="ui mini form">
                            <?php echo form_open('find'); ?>
                            <!-- <form method="get" action="http://www.todo.link/project" class="ui mini form"> -->
                                <div class="ui action left icon input">
                                    <input name="name" value="" type="text" placeholder="朋友姓名">
                                    <button type="submit" class="mini ui teal button">搜索</button>
                                </div>
                            <!-- </form> -->
                            <?php echo form_close(); ?>
                            </div>
                        </div>
                        <!-- <div class="middle aligned column">
                            <a href="<?php echo base_url(); ?>apply" class="mini ui right floated teal button">
                                <i class="plus icon"></i>
                                好友申请
                            </a>
                        </div> -->

                        <div class="ui container">
                            <table class="ui selectable celled table">
                                <thead>
                                    <tr>
                                        <th>序号</th>
                                        <th>姓名</th>
                                        <th>邮箱</th>
                                        <!-- <th>状态</th> -->
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($friends as $key=>  $post) : ?>
                                    <tr id="t<?php echo $post['id']; ?>">
                                        <td> <?php echo $key+1; ?></td>
                                        <td> <?php echo $post['name']; ?></td>
                                        <td> <?php echo $post['email']; ?></td>
                                        <!-- <td> <?php echo $post['status'] > 0 ? '已同意' : '申请中'; ?></td> -->
                                        <td> 
                                            <?php if( !$post['status'] || empty($post['status'])) { ?>
                                            <a href="javascript:addfriend(<?php echo $post['id']; ?>)">好友申请</a>/
                                            <?php }else{?>
                                            <a href="javascript:deletefriend(<?php echo $post['id']; ?>)">删除好友</a>
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

