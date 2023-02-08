<?php
ob_start();
function validate($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    
    return $data;
}


###################################################

function output_msg($status="",$msg="")
{
    if($status=="s")
    {
        ?>
            <div class="alert alert-success" style="text-align:center; font-size:larger;">
                <?php
                   echo $msg;
                ?>
            </div>
        <?php
    }
    elseif($status=="f")
    {
        ?>
            <div class="alert alert-danger" style="text-align:center; font-size:larger;">
    <?php
                    echo $msg;
    ?>
</div>
        <?php
    }
    else
    {
        ?>
            <div class="alert alert-danger" style="text-align:center; font-size:larger;">
    SQL Syntax Error!
</div>
        <?php
    }
}

############################################################

function redirect($sec,$url)
{
    header("refresh:$sec;url=$url");
}

###########################################################

function enc_pass($password)
{
    $password = md5($password);
    $password = substr($password,5,5);
    $password = sha1($password);
    $password = substr($password,0,5);
    
    return $password;
}
###########################################################

function get_page_name()
{
    $path = $_SERVER['PHP_SELF'];
    $slash_pos = strrpos($path,"/");
    $page_name = substr($path,$slash_pos+1);
    
    return $page_name;
}


?>