<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index1.css" />
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+HK&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="wrap">
    <div class="header">
        <div class="yo">
			<ul class="list">
				<li><a href="bio.php">BioGrid</a></li>
                <li><a href="Introduction.html">Pan_troglodytes Introduction</a></li>
                <li><a href="index1.php">Homepage</a></li>
			</ul>
		</div>
        <div class="container">
                    <!-- Logo -->
                    <div class="logo">
                        <span>Click the item you want to query</span>
                    </div>
                    
                    <!-- Nav -->
                    <nav id="nav">
                        <form action="indexresult.php" method="POST" >
                            <div class="but">
                                <button type="submit" value="target" name="target">Target </button>
                                <button type="submit" value="mrna" name="mrna">mRNA </button>
                                <button type="submit" value="exon" name="exon">Exon</button>
                                <button type="submit" value="insert" name="insert">Insert</button>
                            </div>
                        </form>
                    </nav>
                </div>
            </div>
    </div>
</div>
<?php
    $link = @mysqli_connect('localhost','roger', 'aZxcv7904','roger');
    $SQLDelete="DELETE  FROM test ";
    $result = mysqli_query($link, $SQLDelete);


?>
</body>
</html>