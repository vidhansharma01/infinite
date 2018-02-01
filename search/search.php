<?php
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("xyz") or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
    $query = $_GET['query']; 
    $min_length = 3;
        if(strlen($query) >= $min_length)
        {
        $query = htmlspecialchars($query); 
        $query = mysql_real_escape_string($query);
        $raw_results = mysql_query("SELECT * FROM qwe , co , coaching , education  WHERE (`book_author` LIKE '%".$query."%')  OR (`book_name` LIKE '%".$query."%') OR (`book_des` LIKE '%".$query."%') OR (`book_price` LIKE '%".$query."%') ") or die(mysql_error());
            if(mysql_num_rows($raw_results) > 0){ 
             while($results = mysql_fetch_array($raw_results)){
                echo "<p><h3>".$results['book_name']."</h3>".$results['book_des']." ".$results['book_author']." ".$results['book_price']."</p>";
                
            }
             }
        else{ 
            echo "No results";
        }
         
    }
    else{ 
        echo "Minimum length is ".$min_length;
    }
?>
</body>
</html>
             