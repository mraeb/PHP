<html>
    <head>
    </head>
    <body>
        <?php
            //using echo function
            echo "Welcome to day1 practice";
            //declaring variables
            $a = 12;
            $b = 12;
            echo "Sum of a and b is: "+($a+$b);
            //data types in php
            var_dump(12);
            var_dump(21.3);
            var_dump("mraeb");
            var_dump(true);
            var_dump(NULL);
            var_dump([a,b,c]);
            echo '<br>';
            //scope global, local
            $x = 10;
            function add(){
                global $x, $y;
                $y = 20;
                echo ($x+$y);
            }
            add();
            echo '<br>';
            //scope static
            // scope is used restricts the auto deletion of a variable after the function execution...
            // but still it considered as a local variable
            function incre(){
                static $z = 0; //static variable
                echo $z.'<br>';
                $z++;
            }

            incre();
            incre();
            incre(); // the static variabe stores the value of last execution...
            //so if we use for loop you know what will happen😁..
            // lets see
            for($i=0;$i<10;$i++){
                incre();
            }
        ?>
    </body>
</html>