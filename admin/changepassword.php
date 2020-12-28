<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">               
         <form method="POST" action="changepassword.php">
                
            <table class="form">					
                <tr>
                    <td>
                        <label>Mật khẩu cũ</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter Old Password..."  name="oldpass" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Mật khẩu mới</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="newpass" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Nhập lại mật khẩu</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter Repassword..." name="repass" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>