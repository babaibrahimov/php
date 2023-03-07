<html>
    <head>
        <title>If Else Php</title>
    </head>
    <body>
        <?php
        
        $name = "Benjamin";
        $old = 35;

        if($name == "Benjamin"){                //if name is "Benjamin": say Welcome.
            echo "Welcome ".$name;
        }else {                                 //if name isn't "Benjamin" : say try again!
            echo "Please try again!";
        }
        

        if($name != "Benjamin"){                // if name isn't "Benjamin" : say try again!
            echo "Please try again!";
        }else {                                 //if name is "Benjamin": say Welcome.         
            echo "Welcome ".$name;
        }

        if($name <> "Benjamin"){                // "<>" = "!="
            echo "Please try again!";
        }else {   
            echo "Welcome ".$name;
        }

        if($old > 30){  //if you are over 30 this code will work
            echo "You are over 30";
        }
        elseif($old = 30){  //if you are  30 this code will work
            echo "You are 30 year old";
        }else { //if you are under 30 this code will work
            echo "You are under 30";
        }

        $username = "babaibrahimovv";
        $password = "baba12345"; //it is not my real password :)))

        if($username == "babaibrahimovv" && $password == "baba12345"){ //&& -> and #if both values ​​are true this code will work
            echo "Welcome ".$username."<br>";
        }else { // if any of the values ​​are not true this code will work
            echo "Username or Password is incorrect";
        }

        if($username == "babaibrahimov" && $password == "baba12345"){ //&& -> and #if both values ​​are true this code will work
            echo "Welcome ".$username;
        }else if($username == "babaibrahimov" || $password == "baba12345"){ //|| -> or #this code works if one of the values ​​is false and one is true
            echo "Username or Password is incorrect";
        }else{  //if every values are wrong this code will work
            echo "Both values are wrong";
        }

        ?>
    </body>
</html>