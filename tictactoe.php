<html>
	<head>
		<title>Tic-Tac_Toe</title>
	</head>

	<body>
		<p align="center" margin="5px">
			<input type="radio" name="gametype" value="human" checked="checked" onclick="selectMan()" />vs Human
			<input type="radio" name="gametype" value="computer" onclick="selectComp()"/>vs Computer
		</p>

		<table id="mytictac" width="30%" height="30%" align="center" border="1px">

			<tr >
				<td onclick="tic(100)" class="f100" width="33%">-</td>
				<td onclick="tic(101)" class="f101" width="33%">-</td>
				<td onclick="tic(102)" class="f102" width="33%">-</td>
			</tr>

			<tr >
				<td onclick="tic(210)" class="f210">-</td>
				<td onclick="tic(211)" class="f211">-</td>
				<td onclick="tic(212)" class="f212">-</td>
			</tr>

			<tr >
				<td onclick="tic(320)" class="f320">-</td>
				<td onclick="tic(321)" class="f321">-</td>
				<td onclick="tic(322)" class="f322">-</td>
			</tr>

			<tr >
				<td colspan="2" class="winner" width="50%"></td>
				<td onclick="refresh()" >Refresh</td>
			</tr>

			
		</table>




<script type="text/javascript">
	var counter=0;

	function checkColumn(posit,posNum,playerNum){
		var colNumber=posNum;
		var rowNumber=posit[1];
		var colSpace=[];
		var colValue=[];

			if (rowNumber==='0'){
				colSpace[0]=colNumber;
				colSpace[1]=colNumber+110;
				colSpace[2]=colNumber+220;			
			}else if (rowNumber==='1'){
				colSpace[0]=colNumber-110;
				colSpace[1]=colNumber;
				colSpace[2]=colNumber+110;
			}else if (rowNumber==='2'){
				colSpace[0]=colNumber-220;
				colSpace[1]=colNumber-110;
				colSpace[2]=colNumber;
			}

		for (j=0; j<3; j++){
			var className='.f'+colSpace[j];
			var text=document.querySelector(className);
			var colText=text.textContent;
			colValue[j]=colText;
		}

		if ((colValue[0] === colValue[1]) && (colValue[0] === colValue[2])){
			var text=document.querySelector(".winner");
			text.textContent= "Player "+playerNum+" wins";
			counter=10;
			}		
	}

	function checkWinner(pos,player){
			posi=pos.toString();
			var rowNumber=posi[1];
			var rowArray=document.getElementById('mytictac').rows[rowNumber].textContent;
			

			if ((rowArray[5] === rowArray[11]) && (rowArray[5] === rowArray[17])){
				var text=document.querySelector(".winner");
				text.textContent= "Player "+player+" wins";
				counter=10;
			}else{
				checkColumn(posi,pos,player);
			}
	}

	function tic(pos){
		const t0=performance.now();
		var className='.f'+pos;
		var text=document.querySelector(className);
		var innerText=text.textContent;
		if (innerText==='-'){
			counter++;
			if (counter<9){
				if (counter%2===1){	
					text.textContent="X";
					checkWinner(pos,1);				
				}else {
					text.textContent="O";
					checkWinner(pos,2);
				}

			}else if (counter===9){
				alert ('No winner. Game Tied');
			}else if (counter>9){
				alert ('Game Over. Click Refresh.');
			}

		}else{
			alert ("Cant Select Cell.");
		}

	const t1=performance.now();
	console.log(t1);

	console.log("time taken= "+ (t1-t0) +" milliseconds");
	}

	function refresh(){
		window.location.href=('tictactoe.php');
	}

	function selectComp(){
		alert("computer selected");
	}

</script>




	</body>

</html>