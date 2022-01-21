<?php
$path = "";
$n = 0;
$row=array();
$colum=array();
$path_row = array();
$path_col = array();
$temp_row=array();
$temp_col = array();
$sum = 0;
$col="";
$row="";
//$min_path = array();
$INT_MAX = 0x7FFFFFFF;
/*$cell_val2 = array(
			array(0,6,1,3,6),
			array(8,2,1,3,2),
			array(9,4,5,7,3),
			array(6,3,7,4,8),
			array(5,7,3,5,1)
			);*/
$posn = 0;
$aray = array();
$cell_val = array();
$q = $_REQUEST["q"];
$r = $_REQUEST["r"];
$arr = $_REQUEST["arr"];
$aray = "";
$aray = $arr;
$path2 = "";
$user_sum = "";
$user_sum = intval($r);
$path2 = $q;
echo "<center><font color ='#606060'>Scroll down to view the complete Answer.</font></center>";

for($i=0;$i<5;$i++)
{
	for($j=0;$j<5;$j++)
	{
		
		$cell_val[$i][$j] = 0;
	}
}
for($i=0;$i<5;$i++)
{
	for($j=0;$j<5;$j++)
	{
		$cell_val[$i][$j] = intval($aray[$posn]);
		$posn++;
	}
}
//echo $cell_val;
//echo "<br>";
/*for($i=0;$i<5;$i++)
{
	for($j=0;$j<5;$j++)
	{
		echo $cell_val[$i][$j];
		echo "   ";
	}
	echo "<br>";
}*/

//echo "<br>";
$num = array(array());
$skArr = array(array());
for($i = 0;$i < 5;$i++)
{
	for($j = 0;$j < 5;$j++)
	{
		$aray[$n] = $cell_val[$i][$j];
		$n++;
	}
}
for($i=0;$i<25;$i++)
{
	$roww[$i] = 0;
	$colum[$i] = 0;
}
for($i = 0;$i<25;$i++)
{
	for($j=0;$j<25;$j++)
	{
		$num[$i][$j] = 0;
		$skArr[$i][$j] = 0;
	}
	
}

//for($j=0;$j<25;$j++)
	//{
		//echo $roww[$j].".".$colum[$j];
	//}
$count = 0;
$k=0;

$skn = 5;
for($i=0;$i<$skn+$skn;$i++)
{
	$path_col[$i] = 0;
	$path_row[$i] = 0;
	$temp_col[$i] = 0;
	$temp_row[$i] = 0;
}

for($i = 1; $i <= $skn; $i++)
{
	for($j = 1; $j <= $skn; $j++)
	{
		$sktemp = ($i-1)*$skn+$j-1;
		
		if($j < $skn )
		{
			$skArr[$sktemp][$sktemp+1] = $cell_val[$i-1][$j];
		}
		
		if($i < $skn)
		{
			$skArr[$sktemp][$sktemp+$skn] = $cell_val[$i][$j-1];
		}
		
	}
}

/*for($i = 0;$i < 25;$i++)
{
	for($j = 0;$j < 25;$j++)
	{
		echo $skArr[$i][$j]." ";
		
	}
	echo "<br>";
} */


function MinimumDistance($distance, $shortestPathTreeSet, $verticesCount)
{
	global $INT_MAX;
	$min = $INT_MAX;
	$minIndex = 1;

	for ($v = 0; $v < $verticesCount; ++$v)
	{
		if ($shortestPathTreeSet[$v] == false && $distance[$v] <= $min)
		{
			$min = $distance[$v];
			$minIndex = $v;
		}
	}

	return $minIndex;
}

function PrintResult($distance, $verticesCount,$min_path,$path_col,$path_row,$skn,$path2, $user_sum,$sum,$cell_val)      
{
	$row=1.0;
	$col=1;
	/*for($k = 0;$k < $verticesCount;$k++)
	{
		$row = ($min_path[$k]+1)/5;
		$col = ($min_path[$k]+1)%5;
	}*/
	//echo "<pre>" . "Vertex    Distance from source    Path" . "</pre>";

	for ($i = 0; $i < $verticesCount; $i++)
	{
		$temp = ((int)$min_path[$i]+1);
		$row = $temp/5;
		$row = floor($row)+1;
		$col = $temp%5;
		//$roww = array();
		//$colum = array();
		if($col == 0)
		{
			$col = 5;
			$row = $row-1;
			
		}
		$roww[$i] = $row;
		$colum[$i] = $col;
		//echo "<pre>" . $i . "\t  " . $distance[$i]. "\t\t\t  " .$min_path[$i]. "\t". $row. "," .$col ."</pre>";
		
	}
	//path($min_path, $roww, $colum,$path_col,$path_row,$path2,$user_sum,$sum,$cell_val);
	//check($path2, $user_sum,$str);
	//echo $_POST['x'];
	$k=0;
	$k = $verticesCount;
	//$i =0 ;
	//$i = $k-1;
	$k-=1;
	$sum = $distance[$k];
	//echo "<br>";
	if($user_sum == $sum)
		echo "<center><h3>Success!<br>";
	else
	{	echo "<center><h3>Failure!<br>";}
	echo "Your Sum: ".$user_sum."  |  Shortest Sum : ".$sum." </h3></center>";
	
path($min_path, $roww, $colum,$path_col,$path_row,$path2,$user_sum,$sum,$cell_val);
	//echo "Shortest Sum : ".$sum;
	//echo "<br>";
	//echo "Shortest Path: ".$str;
	//echo $sum;
	//table($path_col,$path_row);
}
function path($min_path, $roww, $colum,$path_col,$path_row,$path2,$user_sum,$sum,$cell_val)
{ 
	$str = "";
	$i = 24;
	$c = 0;
	while($i>0)
	{
		$str = $roww[$i].",". $colum[$i] . ";" . $str;
		//$temp_col[$c] = $colum[$i];
		//$temp_row[$c] = $roww[$i];
		$i = $min_path[$i];
		$c++;
	}
	
	$arrayy = array();
	for($i=0;$i<31;$i++)
		$arrayy[$i] = 0;
	$i=0;
	$k=0;
	while($i<31)
	{
		$arrayy[$k] = intval($str[$i]);
		$k++;
		$i=$i+2;
	}
	$i=0;
	$k=0;
	$j=0;
	while($i<16)
	{
		if($i%2!=0)
		{
			$path_col[$k] = $arrayy[$i];
			$k++;
		}
		else
		{
			$path_row[$j] = $arrayy[$i];
			$j++;
		}
		$i++;
	}

	$path2 = $path2 . ";"; 

echo "<br>";
	echo "<center><table border=1 border=1 style='border-collapse: collapse;' cellpadding='20'>";
	$k=0;
	for($i=1;$i<=5;$i++)
	{
		echo "<tr>";
		for($j=1;$j<=5;$j++)
		{
			if($i==$path_row[$k] && $j == $path_col[$k] || $i==5 && $j==5)
			{
				echo "<td bgcolor = 'blue'>".$cell_val[$i-1][$j-1]."</td>";
				$k++;
			}
			else
			{
				echo "<td></td>";
			}
		}
		echo "</tr>";
		
	}
	echo "</table></center>";
	return $str;
}
function Dijkstra($skArr, $source, $verticesCount,$path_col,$path_row,$path2, $user_sum,$sum,$skn,$cell_val)
{
	global $INT_MAX;
	$distance = array();
	$shortestPathTreeSet = array();
	$min_path = array();      

	for ($i = 0; $i < $verticesCount; ++$i)
	{
		$distance[$i] = $INT_MAX;
		$shortestPathTreeSet[$i] = false;
		$min_path[$i] = "";
	}

	$distance[$source] = 0;

	for ($count = 0; $count < $verticesCount - 1; ++$count)
	{
		$u = MinimumDistance($distance, $shortestPathTreeSet, $verticesCount);
		$shortestPathTreeSet[$u] = true;

		for ($v = 0; $v < $verticesCount; ++$v)
			if (!$shortestPathTreeSet[$v] && $skArr[$u][$v] && $distance[$u] != $INT_MAX && $distance[$u] + $skArr[$u][$v] < $distance[$v])
			{
				$distance[$v] = $distance[$u] + $skArr[$u][$v];
				$min_path[$v] .= $u;
				
			}
	}
		
	PrintResult($distance, $verticesCount,$min_path,$path_col,$path_row,$skn,$path2, $user_sum,$sum,$cell_val);
}

Dijkstra($skArr, 0, $skn*$skn,$path_col,$path_row,$path2, $user_sum,$sum,$skn,$cell_val);
?>
<center><button type="submit"  onClick=window.location.reload();>Play Again</button></center>