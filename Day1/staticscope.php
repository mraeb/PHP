<html>
    <head>
    </head>
    <body>
        <?php
            function stati() {
                static $x = 0;
                echo 'X: '.$x.'<br>';
                $x++;
            }
            for($x = 0; $x<=10; $x++){
                stati();
            }      

        ?>
    </body>
</html>