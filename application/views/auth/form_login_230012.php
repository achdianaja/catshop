<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>
    <h1>CATSHOP 230012</h1>
    <h3>LOGIN PAGE</h3>
    <hr>
        <form action="" method="post">
        <div style="color: red;"><?= validation_errors() ?></div>
       <?= $this->session->flashdata('msg') ?>
            <table>
                <tr>
                    <td><label for="username_230012">USERNAME</label></td>
                    <td><input type="text" id="username_230012" name="username_230012" ></td>
                </tr>
                <tr>
                    <td><label for="password_230012">PASSWORD</label></td>
                    <td><input type="password" id="password_230012" name="password_230012" ></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Login" name="login">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
