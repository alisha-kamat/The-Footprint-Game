<div id = "code"></div>
<script type='text/javascript'>
var sum = 0;//clickManager
var curr_row = 1;
var table_array2 = [
			[0,6,1,3,6],
			[8,2,1,3,2],
			[9,4,5,7,3],
			[6,3,7,4,8],
			[5,7,3,5,1]
			];
var k=0;
var curr_col = 1;
var count=0;
var prev_row= 1;
var prev_col=1;
var click_row=0;
var click_col=0;
var check = false;
var t_path = "";
var path1 = "1,1";
var table_array = "";


/*for(var i=0;i<5;i++)
{
	for(var j=0;j<5;j++)
	{
		table_array[i][j]=0;
	}
}*/

//var btn = document.getElementById("submit_button"); 
/*function rand()
{
	/*for(var i=0;i<5;i++)
	{
		for(var j=0;j<5;j++)
		{
			var min =1;
			var max = 10;
			var num = Math.floor(Math.random() * (max - min)) + min;
			document.write(num);
			for(var i=0;i<5;i++)
			{
				for(var j=1;j<5;j++)
				{
					table_array2[i][j] = num;
				}
			}
			//var element = document.getElementById('num');
			//document.write(element.innerHTML);
			//document.getElementById('n');
		/*}
	document.write("<br>");
	}*/

	
//}

function colorChanger(cellref)
{
	
	var str = ""; 
	str = cellref.innerHTML;
	var num = 0;
	num = Number(str);
	//alert(num);
	click_col = (cellref.cellIndex)+1;
	click_row = (cellref.parentElement.rowIndex)+1;
		
	if (click_row == curr_row && click_col == curr_col || click_row == curr_row && Number(click_col) == (Number(curr_col)+1) || Number(click_row) == (Number(curr_row)+1) && click_col == curr_col)
	{		
		 if (cellref.style.backgroundColor == "" && (click_col==5 && click_row==5))
		{
			cellref.style.backgroundColor = '#696969';
			sum = sum + num;
			//check = true;
			curr_col = (cellref.cellIndex) + 1;
			curr_row = (cellref.parentElement.rowIndex) + 1;
			path1 += ";" + curr_row + "," + curr_col;
				
		}
		else if (cellref.style.backgroundColor == "")
		{
			cellref.style.backgroundColor = '#A9A9A9';
			sum = sum + num;
			//check = true;
			curr_col = (cellref.cellIndex) + 1;
			curr_row = (cellref.parentElement.rowIndex) + 1;
			path1 += ";" + curr_row + "," + curr_col;
				
		}
		else
		{	
			cellref.style.backgroundColor = "";
			sum = sum - num;
			path1 = path1.substring(0,path1.lastIndexOf(";"));
			
			curr_row = Number(path1.substring(Number(path1.lastIndexOf(";")+1),path1.lastIndexOf(",")));
			curr_col = Number(path1.substring(Number(path1.lastIndexOf(",")+1)));
			
			var t_path = "";
			if(path1.lastIndexOf(";") == -1)
			{
				prev_row = 1;
				prev_col = 1;
				curr_col = 1;
				curr_row = 1;
			} 
			else
			{
				t_path = path1.substring(0,path1.lastIndexOf(";"));
				prev_row = Number(t_path.substring(Number(t_path.lastIndexOf(";")+1),t_path.lastIndexOf(",")));
				prev_col = Number(t_path.substring(Number(t_path.lastIndexOf(",")+1)));
			}
		}			
	}
	else
	{
		alert("Invalid click");//+curr_col + curr_row);
	}
	/*var table=document.getElementById("result");
	while(count<1)
	{
		while(row=table.rows[r++])
		{
			while(cell=row.cells[c++])
			{
				table_array += cell.innerHTML + ",";
			}
		}
		return table_array;
	}*/
		//alert("hi");
		/*while(count<1)
		{
		for(var i=0;i<5;i++)
		{
			for(var j=1;j<5;j++)
			{
				table_array[i][j] = cellref.innerHTML;
				k++;
		        //document.write(table_array[i][j);
			}
		}
		count++;
	}*/
}

<?php
function random()
{
	$k=0;
	$aray =  array();
	$aray[$k] = 0;
	$aray[$k] = (rand(1,5));
	echo $aray[$k];
	$k++;
}
?>
	
function process_click(str,sum,table_array) {
//alert("hi");

table_array = extract_val();
//alert(table_array);
if((curr_col == 5 && curr_row == 5))// || (curr_col == 4 && curr_row == 5))
{
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
	
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
			{
			//alert("hi");
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "footprintbackend.php?q=" + str + "&r="+sum + "&arr=" + table_array);
        xmlhttp.send();
    }
}
else{
	alert("Incomplete! Complete the path to reveal answer.");
}
}


function extract_val()
{
	var str_temp="";
	while(count<1)
	{
		var table=document.getElementById("myTable");
		var r=0;
		while(row=table.rows[r++])
		{
			var c=0;
			while(cell=row.cells[c++])
			{
				table_array +=  Number(cell.innerHTML);
				//str_temp += "S" ;//cell.innerHTML;
				//break;
			}
		}
		count++;
	}
	return table_array;
}

</script>
<!doctype html>
<html>
<head>
<title>Footprint Game</title>

<!--CSS -->
<style>
    td{
        cursor:pointer;
        background: white;
        text-align:center;
    }
 
    td:hover{
        background: -moz-linear-gradient(top, #249ee4, #057cc0);
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#249ee4), to(#057cc0));
    }
 
    #result{
        font-weight:bold;
        font-size:16pt;
    }
</style>
<!--JAVASCRIPT -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js" ></script>     
<script type='text/javascript'>
    $(document).ready(function(){
        $("#myTable td").click(function() {     
			
            $("#result").html( "<center>"+"Your Sum : "+sum + "<br></center>");
			if(click_row == prev_row && click_col == prev_col || click_row == prev_row && Number(click_col) == (Number(prev_col)+1) || Number(click_row) == (Number(prev_row)+1) && click_col == prev_col)
			{
				if(this.style.backgroundColor != "")
				{
				prev_col=curr_col;
				prev_row=curr_row;
				}
			}
        });
    });
</script>
<script type="text/javascript">
 function toggleMe(a){
 var e=document.getElementById(a);
 if(!e)return true;
 if(e.style.display=="none"){
 e.style.display="block"
 } else {
 e.style.display="none"
 }
 return false;
 }
</script>

</head>
<body>
<center><h1>Footprint Game</h1></center>
<p><a style="cursor:pointer;" onclick="return toggleMe('para5')"><b><center><font color=blue>Click to See/Hide the Rules</font></center></b></a></p>
 <div id="para5" style="display:none" style="display:none" style="display:none" mce_style="display:none"><center><b>1. Each cell represents an activity to be<br> completed in order to link the first<br> and the last cell in one continuous path.<br><br>
2. The numbers in each cell indicate the<br> amount of natural resources consumed <br>(i.e. carbon footprint) by each activity.<br><br>
3. Design a path using the least number<br> of resources.<br><br>
4. Use single-step vertical and horizontal<br> hops only.<br><br>
5. In case you want to deselect the path,<br>
reclick on the clicked cell.<br><br></b></center>
 </div>
    <div id="result"> </div>
    <center><table id="myTable" border="1" style="border-collapse: collapse;" cellpadding="20">
        <!--1st ROW-->
        <tr>
            <td onclick="style.backgroundColor = '#696969';">0</td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
        </tr>
 
        <!--2nd ROW-->
        <tr>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
        </tr>
 
        <!--3rd ROW-->
        <tr>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
        </tr>
 
        <!--4th ROW-->
        <tr>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
        </tr>
 
        <!--5th ROW-->
        <tr>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
            <td onclick=colorChanger(this)><?php random();?></td>
        </tr>
    </table>
	<table border="1" style="border-collapse: collapse;" cellpadding="2">
	<tr>
			<br><td onclick=process_click(path1,sum,table_array)>Show Answer</td>
		</tr>
		</table></center>
		<!--script>
		for(var i=0;i<5;i++)
			{
				for(var j=0;j<5;j++)
				{
					document.write(table_array2[i][j]);
				}
				document.write("<br>");
			}
		</script-->
		
</head>
<body>
<p> <span id="txtHint"></span></p>
</body>
</html>
