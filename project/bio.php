<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="biostyle.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+HK&display=swap" rel="stylesheet">
</head>
<body>
    <div class="warp">
        <div class="header">
            <div class="white"></div>
                <h1>BioGRID</h1>
                <div class="conn"><a  href="index1.php" >回首頁</a></div>
                <div class="content">
                    <form action="#" method="POST" >
                            <span class="title">選擇所要查詢的項目</span>
                            <select name="bio"  class="choice"> 
                              <option value="1">-----</option> 
                              <option value="protein">Protein</option> 
                              <option value="interacta">InteractA</option>
                              <option value="interactb">InteractB</option> 
                            </select> 
                            <input type="submit" class="submit">
                    </form>
                    
<?php
$link = mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'roger',       // 使用者名稱 
    'aZxcv7904',  // 密碼
    'roger');  // 預設使用的資料庫名稱
    
    //$bio=$_POST["bio"];
    //[20231219] 
    $bio = isset($_POST["bio"]) ? $_POST["bio"] : null;
    
    echo "<div class='tablee'>";
    if ($bio=='protein') {
        $SQL="SELECT BioGRID_Interaction_ID,Author,Pubmed_ID FROM protein";
    echo "<table align='center' bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px' cellpacing='5px';>";
    echo "<tr bgcolor=#b0b0b0 style='color:#FFF'>";
    echo "<td>"."BioGRID Interaction ID"."</td><td>"."Author"."</td><td>"."Pubmed ID"."</td>";
    echo "</tr>";
    if($result=mysqli_query($link,$SQL)){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row["BioGRID_Interaction_ID"]."</td><td>".$row["Author"]."</td><td>".$row["Pubmed_ID"]."</td>";
            echo "</tr>";
        }
    }
    }
    if ($bio=='interacta') {
        $sql2="SELECT BioGRID_Interaction_ID,Entrez_Gene_Interactor_A,BioGRID_ID_Interactor_A,Official_Symbol_Interactor_A,Organism_Interactor_A FROM interacta";
        echo "<table align='center'  bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
        echo "<tr bgcolor=#b0b0b0 style='color:#FFF'>";
        echo "<td>"."BioGRID_Interaction_ID"."</td><td>"."Entrez_Gene_Interactor_A"."</td><td>"."BioGRID_ID_Interactor_A"."</td><td>"."Official_Symbol_Interactor_A"."</td><td>"."Organism_Interactor_A"."</td>";
        echo "</tr>";
        if($result3=mysqli_query($link,$sql2)){
            while($row3=mysqli_fetch_assoc($result3)){
                echo "<tr>";
                echo "<td>".$row3["BioGRID_Interaction_ID"]."</td><td>".$row3["Entrez_Gene_Interactor_A"]."</td><td>".$row3["BioGRID_ID_Interactor_A"]."</td><td>".$row3["Official_Symbol_Interactor_A"]."</td><td>".$row3["Organism_Interactor_A"]."</td>";
                echo "</tr>";
            }
        }
    }
    if ($bio=='interactb') {
        $sql="SELECT BioGRID_Interaction_ID,Entrez_Gene_Interactor_B,BioGRID_ID_Interactor_B,Official_Symbol_Interactor_B,Organism_Interactor_B FROM interactb";
    echo "<table align='center'  bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
    echo "<tr bgcolor=#b0b0b0 style='color:#FFF'>";
    echo "<td>"."BioGRID_Interaction_ID"."</td><td>"."Entrez_Gene_Interactor_B"."</td><td>"."BioGRID_ID_Interactor_B"."</td><td>"."Official_Symbol_Interactor_B"."</td><td>"."Organism_Interactor_B"."</td>";
    echo "</tr>";
    if($result2=mysqli_query($link,$sql)){
        while($row2=mysqli_fetch_assoc($result2)){
            echo "<tr>";
            echo "<td>".$row2["BioGRID_Interaction_ID"]."</td><td>".$row2["Entrez_Gene_Interactor_B"]."</td><td>".$row2["BioGRID_ID_Interactor_B"]."</td><td>".$row2["Official_Symbol_Interactor_B"]."</td><td>".$row2["Organism_Interactor_B"]."</td>";
            echo "</tr>";
        }
    }
    }
    echo "</div>";
?>

                </div>
        </div>
    </div>
        <div class="clear"></div>
     </div>
    

</body>
</html>