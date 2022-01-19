<!doctype html>
<html>
    <body>
    <?php 
        // All users list
        if(isset($view) && $view == 1)  {
            ?>
            <table border='1'>
                <tr>
                    <td>S.no</td>
                    <td>Username</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>&nbsp;</td>
                </tr>
                <?php 
                $sno = 1;
                foreach($response as $val){  
                    echo '<tr>
                        <td>'.$sno.'</td>
                        <td>'.$val['username'].'</td>
                        <td>'.$val['name'].'</td>
                        <td>'.$val['email'].'</td>
                        <td><a href="'.site_url().'/persons/index?edit='.$val['id'].'">Edit</a></td>
                        <td><a href="deletedata?id='.$val['id'].'">Delete</a></td>
                    </tr>';
                    $sno++;
                }
                ?>
            </table>
            <?php
        }

        // Edit user
        if(isset($view) && $view == 2)  {
        ?>
        <form method='post' action=''>
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type='text' name='txt_username' value='<?php echo $response[0]['username']; ?>' ></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type='text' name='txt_name'  value='<?php echo $response[0]['name']; ?>'></td>
                </tr>           
                <tr>
                    <td>Email</td>
                    <td><input type='text' name='txt_email' value='<?php echo $response[0]['email']; ?>' ></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type='submit' name='submit' value='Submit'></td>
                </tr>
            </table>
        </form>
    <?php
        }
    ?>
    </body>
    <script>
function savingdata()
{
   window.location.href = '<?php echo base_url()?>index.php/persons/deletedata';
}
         </script>
</html>