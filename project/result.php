<?php
    $link = @mysqli_connect('localhost','roger', 'aZxcv7904','roger');
    $name2=$_GET["genename2"];

    if((isset($name2))&&(isset($_POST["mrna"]))){
        $SQL="SELECT g.chrom,g.name,t.qName,m.cdsStart,m.cdsEnd,t.txStart,t.txEnd FROM gene g inner join transcript t on g.chrom=t.chrom and g.bin=t.bin and g.name=t.name and g.txStart=t.txStart inner join mrna m on t.qName=m.qName and t.tStart=m.tStart WHERE g.name2='$name2'";

        echo "<table  bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
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
    
    if((isset($name2))&&(isset($_POST["target"]))){
        $SQL="SELECT t.tName,c.tSize,g.name,t.tStarts,t.tStart,t.tEnd FROM gene g inner join transcript t on g.chrom=t.chrom and g.bin=t.bin and g.name=t.name and g.txStart=t.txStart inner join chromosome c on g.tName=c.tName WHERE g.name2='$name2'";

        echo "<table  bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
        echo "<tr>";
        echo "<td>"."tName"."</td><td>"."tSize"."</td><td>"."name"."</td><td>"."tStarts"."</td><td>"."tStart"."</td><td>"."tEnd"."</td>";
        echo "<tr bgcolor=#b0b0b0 style='color:#FFF'>";
        if($result=mysqli_query($link,$SQL)){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["tName"]."</td><td>".$row["tSize"]."</td><td>".$row["name"]."</td><td>".$row["tStarts"]."</td><td>".$row["tStart"]."</td><td>".$row["tEnd"]."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }

    if((isset($name2))&&(isset($_POST["exon"]))){
        $SQL="SELECT g.chrom,g.name,g.exonStarts,g.exonEnds,g.exonCount,g.exonFrames FROM gene g inner join transcript t on g.chrom=t.chrom and g.bin=t.bin and g.name=t.name and g.txStart=t.txStart inner join mrna m on t.qName=m.qName and t.tStart=m.tStart WHERE g.name2='$name2'";

        echo "<table  bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
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

    if((isset($name2))&&(isset($_POST["insert"]))){
        $SQL="SELECT g.name,t.tNumInsert,t.tBaseInsert,t.qName,m.qNumInsert,m.qBaseInsert FROM gene g inner join transcript t on g.chrom=t.chrom and g.bin=t.bin and g.name=t.name and g.txStart=t.txStart inner join mrna m on t.qName=m.qName and t.tStart=m.tStart WHERE g.name2='$name2'";

        echo "<table  bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
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
?>