<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script type="text/javascript">
     //主题切换
    $(function() {
        var storage=window.localStorage;
        var theme = storage.getItem('theme');
        // alert(theme);
        if(theme =='dark'){
            $('.button, #menu').removeClass('light');
            $('.button, #menu').addClass('dark');      
        }else{
            $('.button, #menu').removeClass('dark');
            $('.button, #menu').addClass('light');
        }

        $('#dark').on('click',function(){
            $('.button, #menu').removeClass('light');
            $('.button, #menu').addClass('dark');      
            storage.theme = 'dark';
        });

        $('#light').on('click',function(){
            $('.button, #menu').removeClass('dark');
            $('.button, #menu').addClass('light');
            storage.theme = 'light';
        });
  

    });

    function changeStatus(id){
        var status = $('#t'+id).find('button').attr('bc');
        $.ajax({
            type: "POST",
            url: "change",
            async: true,
            data: {id: id, status:status},
            datatype: "json",
            success: function (res) {
                var json = JSON.parse(res);
                var complete;
                if(status == '1'){
                    complete = '进行中';
                    status = '0';
                }else{
                    complete = '已完成';
                    status = '1';
                }
                $('#t'+id).find('button').text(complete);
                $('#t'+id).find('button').attr('bc', status);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("系统异常");
            }
        });
    }

    function suggest() {
        $('#suggest-modal')
            .modal({
                closable: true
            })
            .modal('show')
        ;
    }

    function deltodo (id) {
        var ids = id;
        $.ajax({
            type: "POST",
            url: "delete",
            data: {id: ids},
            datatype: "json",
            success: function (res) {
                console.log(res.code);
                $('#t'+id).remove();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("系统异常");
            }
        });
    }

    function addfriend (id) {
        var ids = id;
        $.ajax({
            type: "POST",
            url: "friendadd",
            data: {id: ids},
            datatype: "json",
            success: function (res) {
                console.log(res.code);
                window.location.href = "/friend";
                // $('#t'+ids).add();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("系统异常");
            }
        });
    }


    function deletefriend (id) {
        var ids = id;
        $.ajax({
            type: "POST",
            url: "delfriend",
            data: {id: ids},
            datatype: "json",
            success: function (res) {
                console.log(res.code);
                $('#t'+id).remove();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("系统异常");
            }
        });
    }


</script>
</body>
</html>