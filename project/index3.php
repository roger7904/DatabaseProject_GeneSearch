<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index1.css" />
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+HK&display=swap" rel="stylesheet">
    <title>GeneQuery</title>
</head>
<body>
    <div class="wrap">
    <div class="header">
        <div class="yo">
			<ul class="list">
				<li><a href="bio.php">BioGrid</a></li>
                <li><a href="Introduction.html">Pan_troglodytes Introduction</a></li>
               
  <li><a href="index3.php">Gene Query</a></li>            
 <li><a href="index1.php">Homepage</a></li>
			</ul>
		</div>
        <div class="container">
                    <!-- Logo -->
                    <div class="logo">
                        <span>Gene query</span>
                    </div>
                    
                    <!-- Nav -->
                    <nav id="nav">
                        <form method="get">
                        <input class='text'type='text' name='geneguery'>
                        <input class='btn' type="submit" value='submit' name='submit'>
                        </form>
                    

                    <?php
                    $link = mysqli_connect( 
                        'localhost',  // MySQL主機名稱 
                        'roger',       // 使用者名稱 
                        'aZxcv7904',  // 密碼
                        'roger');  // 預設使用的資料庫名稱
                    //$name2=$_GET["geneguery"];
                    //[20231219] 
                    $name2 = isset($_GET["geneguery"]) ? $_GET["geneguery"] : null;
                    
                    if(isset($name2)){
                        $SQL="SELECT g.name2,g.chrom,g.name,t.txStart,t.txEnd,t.qName,m.cdsStart FROM gene g inner join transcript t on g.chrom=t.chrom and g.bin=t.bin and g.name=t.name and g.txStart=t.txStart inner join mrna m on t.qName=m.qName WHERE g.name2='$name2'";
                        echo "<div class='tableee'>";
                        echo "<table bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
                        echo "<tr bgcolor=#b0b0b0 style='color:#FFF'>";
                        echo "<td>"."name2"."</td><td>"."chrom"."</td><td>"."name"."</td><td>"."txStart"."</td><td>"."txEnd"."</td><td>"."qName"."</td><td>"."cdsStart"."</td>";
                        echo "</tr>";
                        if($result=mysqli_query($link,$SQL)){
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>".$row["name2"]."</td><td>".$row["chrom"]."</td><td>".$row["name"]."</td><td>".$row["txStart"]."</td><td>".$row["txEnd"]."</td><td>".$row["qName"]."</td><td>".$row["cdsStart"]."</td>";
                                echo "</tr>";
                            }
                        }
                        echo "</table>";
                       echo "</div>";
                    }
                    ?> 
                    </nav>
		<?php
	
                                          
			$SQL="SELECT distinct name2  FROM gene ";
			echo "<div class='tableeee'>";
                        echo "<table bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;bord    er-collapse:collapse;' rules='all' cellpadding='10px';>";             
			if($result=mysqli_query($link,$SQL)){
                              	for($j=0;$j<20;$j++){ 
				echo "<tr>";
				for($i=0;$i<10;$i++){
				    $row=mysqli_fetch_assoc($result);
                                  echo "<td>".$row["name2"]."</td>";                    
                              }
					echo "</tr>";
				}
}

                          echo "</table>";
                         echo "</div>";
?>

        </div>
    </div>
    
    </div>
</body>
</html>

