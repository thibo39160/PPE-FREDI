<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>sans titre 1</title>
</head>

<body>
    
    <?PHP 
        if ($_SESSION['Connect']==false) {
            echo '<div id="GlobalConnexion">
                    <form>
                        <div id="textLogin">Login:</div>
                        <div input type="text" name="login" id="login" />
                        <div id="textPassword">Password:</div>
                        <div input type="password" name="password" id="password" />
                        <div input type="submit">
                    </form>   
                </div>';
            
        }
    ?>
</body>

</html>
