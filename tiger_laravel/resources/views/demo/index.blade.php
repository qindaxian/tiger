<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登陆</title>
</head>
<body>
<center>
<h3>登陆吧小弟</h3>
    <form action="demo_login" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  
        <table border="1">
            <tr>
                <td>USER</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>PWD</td>
                <td>
                    <input type="text" name="pwd" >
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