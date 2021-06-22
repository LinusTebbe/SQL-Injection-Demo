<?php

return '
<form method="post">
    <table>
        <tr>
            <td><label for="email">E-Mail:</label></td>
            <td><input id="email" type="email" name="email" value="' . $_POST['email'] .'"></td>
        </tr>
        <tr>
            <td><label for="password">Password: </label></td>
            <td><input id="password" type="text" name="password" value="' . $_POST['password'] .'"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Login"></td>
        </tr>
    </table>
</form>';