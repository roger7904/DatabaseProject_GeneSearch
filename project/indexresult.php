<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index2.css" />
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
                <li><a href="index3.php">Query Gene</a></li>
                <li><a href="index1.php">Homepage</a></li>
              
			</ul>
        </div>
        <div class="title">
                <div id="logo">
                        <h1>Gene Inquiry System</h1>
                        <span>Pan_troglodytes</span>
                </div>
<?php
$link = mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'roger',       // 使用者名稱 
    'aZxcv7904',  // 密碼
    'roger');  // 預設使用的資料庫名稱
/*
$target=$_POST["target"];
$mrna=$_POST["mrna"];
$exon=$_POST["exon"];
$insert=$_POST["insert"];
*/
//[20231219] 
$target = isset($_POST["target"]) ? $_POST["target"] : null;
$mrna = isset($_POST["mrna"]) ? $_POST["mrna"] : null;
$exon = isset($_POST["exon"]) ? $_POST["exon"] : null;
$insert = isset($_POST["insert"]) ? $_POST["insert"] : null;

    if (isset($target)) {
        $SQLCreate="INSERT into test(test) VALUES('$target')";
        $insertresult = mysqli_query($link, $SQLCreate); 
    }
    if (isset($mrna)) {
        $SQLCreate="INSERT into test(test) VALUES('$mrna')";
        $insertresult = mysqli_query($link, $SQLCreate); 
    }
    if (isset($exon)) {
        $SQLCreate="INSERT into test(test) VALUES('$exon')";
        $insertresult = mysqli_query($link, $SQLCreate); 
    }
    if (isset($insert)) {
        $SQLCreate="INSERT into test(test) VALUES('$insert')";
        $insertresult = mysqli_query($link, $SQLCreate); 
    }
    
echo "<nav id='nav'>";
echo "<form  method=".'GET'.">";
echo "<span class='chrop'>Choose Chromosome</span>";
echo "<select distinct name='chrom' class='option'>";
$chromsql="select distinct chrom from gene order by chrom ";
    if ( $result = mysqli_query($link, $chromsql) ) {
        while( $row = mysqli_fetch_assoc($result) ){
            //[20231219] 
            echo "<option value='{$row['chrom']}'>".$row['chrom']."</option>"."<br/>";
        }
    }
echo "</select>";
echo "<input type=".'submit'.">";
echo "</form>";
//$chrom=$_GET["chrom"];
//[20231219] 
$chrom = isset($_GET["chrom"]) ? $_GET["chrom"] : null;

if(isset($chrom)){
echo "<span class='chrop'>Chromosome:<font color=blue)>".$chrom."</font></span><br/>";
echo "<form  method=".'GET'.">";
echo "<span class='name2op'>Choose Gene</span>";
echo "<select name='genename2' class='option'>";
$sql="select name2 from gene where tName='$chrom'";
    if ( $result = mysqli_query($link, $sql) ) {
        while( $row = mysqli_fetch_assoc($result) ){
            //[20231219] 
            echo "<option value='{$row['name2']}'>".$row['name2']."</option>"."<br/>";
        }
    }
echo "</select>";
echo "<input type=".'submit'.">";
echo "</form>";
echo "</nav>";
}
echo "<div class='tableee'>";
//$name2=$_GET["genename2"];
//[20231219] 
$name2 = isset($_GET["genename2"]) ? $_GET["genename2"] : null;

$dbdb="select test from test";
if ( $result2 = mysqli_query($link, $dbdb) ) {
     $row2 = mysqli_fetch_assoc($result2); 
    if(isset($name2)&&($row2["test"]=='mrna')){
        $SQL="SELECT g.chrom,g.name,t.qName,m.cdsStart,m.cdsEnd,t.txStart,t.txEnd FROM gene g inner join transcript t on g.chrom=t.chrom and g.bin=t.bin and g.name=t.name and g.txStart=t.txStart inner join mrna m on t.qName=m.qName and t.tStart=m.tStart WHERE g.name2='$name2'";
        echo "<table bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
        echo "<tr bgcolor=#b0b0b0 style='color:#FFF'>";
        echo "<td>"."chrom"."</td><td>"."name"."</td><td>"."qName"."</td><td>"."cdsStart"."</td><td>"."cdsEnd"."</td><td>"."txStart"."</td><td>"."txEnd"."</td>";
        echo "</tr>";
        if($result=mysqli_query($link,$SQL)){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["chrom"]."</td><td>".$row["name"]."</td><td>".$row["qName"]."</td><td>".$row["cdsStart"]."</td><td>".$row["cdsEnd"]."</td><td>".$row["txStart"]."</td><td>".$row["txEnd"]."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }
    
    if((isset($name2))&&($row2["test"]=='target')){
        $SQL="SELECT g.tName,c.tSize,g.name,t.tStarts,t.tStart,t.tEnd FROM gene g inner join transcript t on g.chrom=t.chrom and g.bin=t.bin and g.name=t.name and g.txStart=t.txStart inner join chromosome c on g.tName=c.tName WHERE g.name2='$name2'";

        echo "<table align='center'  bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
        echo "<tr bgcolor=#b0b0b0 style='color:#FFF'>";
        echo "<td>"."tName"."</td><td>"."tSize"."</td><td>"."name"."</td><td>"."tStarts"."</td><td>"."tStart"."</td><td>"."tEnd"."</td>";
        echo "</tr>";
        if($result=mysqli_query($link,$SQL)){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["tName"]."</td><td>".$row["tSize"]."</td><td>".$row["name"]."</td><td>".$row["tStarts"]."</td><td>".$row["tStart"]."</td><td>".$row["tEnd"]."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
       
    }

    if((isset($name2))&&($row2["test"]=='exon')){
        $SQL="SELECT g.chrom,g.name,g.exonStarts,g.exonEnds,g.exonCount,g.exonFrames FROM gene g inner join transcript t on g.chrom=t.chrom and g.bin=t.bin and g.name=t.name and g.txStart=t.txStart inner join mrna m on t.qName=m.qName and t.tStart=m.tStart WHERE g.name2='$name2'";

        echo "<table align='center' bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
        echo "<tr bgcolor=#b0b0b0 style='color:#FFF'>";
        echo "<td>"."chrom"."</td><td>"."name"."</td><td>"."exonStarts"."</td><td>"."exonEnds"."</td><td>"."exonCount"."</td><td>"."exonFrames"."</td>";
        echo "</tr>";
        if($result=mysqli_query($link,$SQL)){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["chrom"]."</td><td>".$row["name"]."</td><td>".$row["exonStarts"]."</td><td>".$row["exonEnds"]."</td><td>".$row["exonCount"]."</td><td>".$row["exonFrames"]."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        
    }

    if((isset($name2))&&($row2["test"]=='insert')){
        $SQL="SELECT g.name,t.tNumInsert,t.tBaseInsert,t.qName,m.qNumInsert,m.qBaseInsert FROM gene g inner join transcript t on g.chrom=t.chrom and g.bin=t.bin and g.name=t.name and g.txStart=t.txStart inner join mrna m on t.qName=m.qName and t.tStart=m.tStart WHERE g.name2='$name2'";

        echo "<table align='center' bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
        echo "<tr bgcolor=#b0b0b0 style='color:#FFF'>";
        echo "<td>"."name"."</td><td>"."tNumInsert"."</td><td>"."tBaseInsert"."</td><td>"."qName"."</td><td>"."qNumInsert"."</td><td>"."qBaseInsert"."</td>";
        echo "</tr>";
        if($result=mysqli_query($link,$SQL)){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["name"]."</td><td>".$row["tNumInsert"]."</td><td>".$row["tBaseInsert"]."</td><td>".$row["qName"]."</td><td>".$row["qNumInsert"]."</td><td>".$row["qBaseInsert"]."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
       
    }
}
echo "</div>";
?> 
      </div>

</div>
</div>
  </body>
  </html>
  

