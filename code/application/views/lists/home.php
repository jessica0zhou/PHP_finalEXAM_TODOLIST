<div class="home">
    <div class="ui container content">
        <div class="ui stackable grid">
            <div class="sixteen wide column">
                <div class="ui segment" style="min-height: 40rem;" id="todolist">
                    <div class="ui stackable two column grid">
                        <div class="column">
                            <div class="ui mini form">
                            <?php echo form_open('search'); ?>
                            <!-- <form method="get" action="http://www.todo.link/project" class="ui mini form"> -->
                                <div class="ui action left icon input">
                                    <label>状态：</label>
                                    <select name="complete" value="">
                                        <option value="">所有</option>
                                        <option value="1">已完成</option>
                                        <option value="0">进行中</option>
                                    </select>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" class="mini ui teal button">搜索</button>
                                </div>
                            <!-- </form> -->
                            <?php echo form_close(); ?>
                            </div>
                        </div>
                        <div class="middle aligned column">
                             <!-- <a href="<?php echo base_url(); ?>del" class="mini ui right floated teal button">
                                <i class="plus icon"></i>
                                删除已办
                            </a> -->
                            <a href="<?php echo base_url(); ?>create" class="mini ui right floated teal button">
                                <i class="plus icon"></i>
                                新建待办
                            </a>
                        </div>

                        <div class="ui container" >
                            <table class="ui selectable celled table">
                                <thead>
                                    <tr>
                                        <th>序号</th>
                                        <th>名称</th>
                                        <th>待办</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($todos as $key=>  $post) : ?>
                                    <tr id="t<?php echo $post['id']; ?>">
                                        <td> <?php echo $key+1; ?></td>
                                        <td> <?php echo $post['name']; ?></td>
                                        <td> <?php echo $post['todo']; ?></td>
                                        <td>
                                            <?php 
                                                if($post['complete'] > 0){
                                                    $complete = '已完成';
                                                    $color = 'blue';
                                                }else{
                                                    $complete = '进行中';
                                                    $color = 'green';
                                                }
                                            ?>
                                            <button class="ui <?php echo $color;?> button" onclick="changeStatus('<?php echo $post['id']; ?>')"  bc="<?php echo $post['complete'];?>"><?php echo $complete;?></button>
                                        </td>
                                        <td><a href="<?php echo base_url(); ?>edit/<?php echo $post['id']; ?>">编辑</a>/<a href="javascript:deltodo(<?php echo $post['id']; ?>)">删除</a>/<a href="<?php echo base_url(); ?>email/<?php echo $post['id']; ?>">分享</a></td>
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

