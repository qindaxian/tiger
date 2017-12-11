<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加日程</title>
</head>
<body>
<center>
<h3>添加日程吧小弟</h3>
    <form action="demo_schedule_add_do" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  

    <input type="hidden" name="u_id" value="<?php echo $u_id; ?>">  
        <table border="1">
            <tr>
                <td>日程内容</td>
                <td>
                    <textarea name="content" style="height: 100px">
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>选择日期</td>
                <td>
                  <input placeholder="请输入日期" name="add_time" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                </td>
            </tr>
            <tr>
                <td>是否提醒</td>
                <td>
                
                <input type="radio" name="status" value="1">是
                <input type="radio"  name="status" value="0">否
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="登陆"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>


<script src="{{ URL::asset('js/js/laydate.js')}}"></script>
      
