<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rundle Investments | Sitemap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="/main.css"><link rel="icon" href="images/logoSquare.gif " type="image/gif">
        
    </head>
    <body>
    	<div class="container">
           <?php include $_SERVER['DOCUMENT_ROOT'] . '/' . 'navbar.php'; ?>
           <h2>Sitemap</h2>
           <ul>
           		
           		<hr/>
           		<h4>Main Pages</h4>
           		<hr/>
           		
           		<li><a href="/blog.php">Blog</a></li>
           		<li><a href="/contact.php">Contact/Info Requests</a></li>
              	<li><a href="/">Home</a></li>
                <li><a href="/investments.php">Investments</a></li>
                <li><a href="/productSearch.php">Products</a></li>
                <li><a href="/staff.php">Staff</a></li>
                
                <hr/>
                <h4>Product Pages</h4>
                <hr/>
                
                <?php 
                    $conn=mysqli_connect('localhost','competitor9','zr4V3h','competitor9');
                    
                    $stmt=$conn->prepare("SELECT prod_name, prod_id FROM products WHERE 1=? ORDER BY prod_name ASC");
                    
                    
                    $one=1;
                    $stmt->bind_param('i', $one); //i for int, d for double, s for string, b for blob
                    
                    $stmt->execute();
                    
                    $result=$stmt->get_result();
                    
                    $prod=[];
                    
                    if($result->num_rows > 0){
                        while($row=$result->fetch_assoc()){
                            array_push($prod, $row);
                        }
                    }
                    
                    foreach ($prod as $key => $item) {
                        ?>
                        <li><a href='product.php?q=<?= $item['prod_id'] ?>'><?= $item['prod_name'] ?></a></li>
                        <?php
                    }
                    
                
                ?>
                
                <hr/>
                <h4>Blogs</h4>
                <hr/>
                
                <?php 
                    $stmt=$conn->prepare("SELECT title, id FROM blogs WHERE 1=? ORDER BY title ASC");
                    
                    $stmt->bind_param('i', $one); //i for int, d for double, s for string, b for blob
                    
                    $stmt->execute();
                    
                    $result=$stmt->get_result();
                    
                    $blogs=[];
                    
                    if($result->num_rows > 0){
                        while($row=$result->fetch_assoc()){
                            array_push($blogs, $row);
                        }
                    }
                    
                    foreach ($blogs as $key => $item) {
                        ?>
                            <li><a href='blogRead.php?q=<?= $item['id'] ?>'><?= $item['title'] ?></a></li>
                            <?php
                    }
                ?>
            </ul>

       
       
       
        </div>
        
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/' . 'endLine.php'; ?>
    </body>
</html>
