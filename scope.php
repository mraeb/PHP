<html>
    <head>
    </head>
    <body>
        <?php
            $x = 15;
            function add(){
                global $x, $y;
                $y = 10;
                echo 'the sum: ' .($GLOBALS[x]+$y).'<br>';

                print 'The sum using print: ' .($x+$y).'<br>';
            }
            add();

            echo 'x: '.$x.'<br>';
            echo 'y: '.$y;
            
        ?>
    </body>
</html>