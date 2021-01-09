<!DOCTYPE html>
<html>
    <head>
        <title>Freetuts.net - Form liên hệ</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        // Code PHP xử lý validate
        $error = array();
        $data = array();
        if (!empty($_POST['contact_action']))
        {
            // Lấy dữ liệu
            $data['fullname'] = isset($_POST['fullname']) ? $_POST['fullname'] : '';
            $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
            $data['content'] = isset($_POST['content']) ? $_POST['content'] : '';
 
            // Kiểm tra định dạng dữ liệu
            // Kiểm tra định dạng email
            function is_email($str) {
                return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
            }
            if (empty($data['fullname'])){
                $error['fullname'] = 'Bạn chưa nhập tên';
            }
 
            if (empty($data['email'])){
                $error['email'] = 'Bạn chưa email';
            }
            else if (!is_email($data['email'])){
                $error['email'] = 'Email không đúng định dạng';
            }
 
            if (empty($data['content'])){
                $error['content'] = 'Bạn chưa nhập nội dung';
            }
 
            // Lưu dữ liệu
            if (!$error){
                echo 'Dữ liệu có thể lưu trữ';
                // Code lưu dữ liệu tại đây
                // ...
            }
            else{
                echo 'Dữ liệu bị lỗi, không thể lưu trữ';
            }
        }
        ?>
        <h1>freetuts.net - contact form</h1>
        <form method="post" action="test.php">
            <table cellspacing="0" cellpadding="5">
                <tr>
                    <td>Tên của bạn</td>
                    <td>
                        <input type="text" name="fullname" id="fullname" value="<?php echo isset($data['fullname']) ? $data['fullname'] : ''; ?>"/>
                        <?php echo isset($error['fullname']) ? $error['fullname'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td>Email của bạn</td>
                    <td>
                        <input type="text" name="email" id="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>"/>
                        <?php echo isset($error['email']) ? $error['email'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td>Nội dung liên hệ</td>
                    <td>
                        <textarea id="content" name="content"><?php echo isset($data['content']) ? $data['content'] : ''; ?></textarea>
                        <?php echo isset($error['content']) ? $error['content'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="contact_action" value="Gửi liên hệ"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>