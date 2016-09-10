<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start ();
require_once '../db.php';
require_once '../functions.php';
if (! isset ( $_SESSION ['admin_id'] ) || isAdminLoginSessionExpired ()) {
	header ( 'location:../admin.php' );
}
$uq = makeTransIdFor ( "LR" );
?></head>

<body>
	<table width="100%" border="0">
		<tr>
			<td width="100%" align="center" valign="middle" class="head">Online Library System
				<p class="sub_head">Sri Venkateswara College of
					Engineering,Etcherlla</p>
			</td>
		</tr>
		<tr>
			<td><table width="100%" border="0" align="right" cellpadding="5">
					<tr>
						<td align="left">Welcome::<?php echo $_SESSION["admin_id"];?></td>
						<td align="center"><a onClick="window.print()" class="a1">Print</a></td>
						<td align="right"><a href="index.php" class="a1">HOME</a></td>
						<td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td align="center" bgcolor="#999999">View Status of Cards</td>
		</tr>
	</table>
<?php
$ad = $_SESSION ["admin_id"];
if (isset ( $_GET ["id"] ) && $_GET ["id"] != "") {
	$id = $_GET ["id"];
	$type = getIDType ( $id );
	if (isValidBorrower ( "login", $id )) {
		if ($type == "student") {



			$sql = "select *from u490995680_lms.cards where id='$id'";
			$result = mysqli_query ( $conn, $sql );
			$t1 = "";
			$t2 = "";
			$t3 = "";
			$rt = "";
			while ( $row = mysqli_fetch_assoc ( $result ) ) {
				$t1 = $row ["T1"];
				$t2 = $row ["T2"];
				$t3 = $row ["T3"];
				$rt = $row ["RT"];
			}
			mysqli_free_result ( $result );
			?>
			<form autocomplete="off" id="form2" name="form2" method="post" action="">
			<table width="60%" border="0" align="center">
			<tbody>
			<?php
			$x = 0;
			if ($t1 != "0") {
			$x = 1;
			$value = "<a href=\"res.php?search=$t1\" target=\"_blank\" class=\"a1\">" . getTitle ( $t1 ) . "</a>";
			} elseif ($t1 == "0") {
			$x = 2;
			$value = "Not issued";
			}
			?>
			<tr>
			<td bgcolor="#CCCCCC">TOKEN-I</td>
			<td><?php echo $value;?>
			<?php if($x==2){?><input type="button" name="issuet1" id="issuet1"
			value="Issue" onclick="window.location.href='Issue Books.php'" /><?php } elseif($x==1){?>
			<input type="button" name="returnt1" id="returnt1" value="Return"
			onclick="window.location.href='Return Books.php?TID=<?php echo $t1;?>'" /><?php }?></td>
			</tr>
			<?php
			$x = 0;
			if ($t2 != "0") {
			$x = 1;
			$value = "<a href=\"res.php?search=$t2\" target=\"_blank\" class=\"a1\">" . getTitle ( $t2 ) . "</a>";
			} elseif ($t2 == "0") {
			$x = 2;
			$value = "Not issued";
			}
			?>
			<tr>
			<td bgcolor="#CCCCCC">TOKEN-II</td>
			<td><?php echo $value;?>
			<?php if($x==2){?><input type="button" name="issuet2" id="issuet2"
			value="Issue" onclick="window.location.href='Issue Books.php'" /><?php } elseif($x==1){?>
			<input type="button" name="returnt2" id="returnt2" value="Return"
			onclick="window.location.href='Return Books.php?TID=<?php echo $t2;?>'" /><?php }?></td>
			</tr>
			<?php
			$x = 0;
			if ($t3 != "0") {
			$x = 1;
			$value = "<a href=\"res.php?search=$t3\" target=\"_blank\" class=\"a1\">" . getTitle ( $t3 ) . "</a>";
			} elseif ($t3 == "0") {
			$x = 2;
			$value = "Not issued";
			}
			?>
			<tr>
			<td bgcolor="#CCCCCC">TOKEN-III</td>
			<td><?php echo $value;?>
			<?php if($x==2){?><input type="button" name="issuet3" id="issuet3"
			value="Issue" onclick="window.location.href='Issue Books.php'" /><?php } elseif($x==1){?>
			<input type="button" name="returnt3" id="returnt3" value="Return"
			onclick="window.location.href='Return Books.php?TID=<?php echo $t3;?>'" /><?php }?></td>
			</tr>
			<?php
			$x = 0;
			if ($rt != "0") {
			$x = 1;
			$value = "<a href=\"res.php?search=$rt\" target=\"_blank\" class=\"a1\">" . getTitle ( $rt ) . "</a>";
			} elseif ($rt == "0") {
			$x = 2;
			$value = "Not issued";
			}
			?>
			<tr>
			<td bgcolor="#CCCCCC">Reference Token</td>
			<td><?php echo $value;?>
			<?php if($x==2){?><input type="button" name="issuert" id="issuert"
			value="Issue" onclick="window.location.href='Issue Books.php'" /><?php } elseif($x==1){?>
			<input type="button" name="returnrt" id="returnrt" value="Return"
			onclick="window.location.href='Return Books.php?TID=<?php echo $rt;?>'" /><?php }?></td>
			</tr>
			</tbody>
			</table>
			</form>			
			
<?php 			
		} elseif ($type == "staff") {

			

			$sql = "select *from u490995680_lms.scards where id='$id'";
			$result = mysqli_query ( $conn, $sql );
			$t1 = "";
			$t2 = "";
			$t3 = "";
			$t4 = "";$t5 = "";
			$t6 = "";
			while ( $row = mysqli_fetch_assoc ( $result ) ) {
				$t1 = $row ["T1"];
				$t2 = $row ["T2"];
				$t3 = $row ["T3"];
				$t4 = $row ["T4"];
				$t5 = $row ["T5"];
				$t6 = $row ["T6"];
			}
			mysqli_free_result ( $result );
			?>
						<form autocomplete="off" id="form2" name="form2" method="post" action="">
						<table width="60%" border="0" align="center">
						<tbody>
						<?php
						$x = 0;
						if ($t1 != "0") {
						$x = 1;
						$value = "<a href=\"res.php?search=$t1\" target=\"_blank\" class=\"a1\">" . getTitle ( $t1 ) . "</a>";
						} elseif ($t1 == "0") {
						$x = 2;
						$value = "Not issued";
						}
						?>
						<tr>
						<td bgcolor="#CCCCCC">Token-I</td>
						<td><?php echo $value;?>
						<?php if($x==2){?><input type="button" name="issuet1" id="issuet1"
						value="Issue" onclick="window.location.href='Issue Books.php'" /><?php } elseif($x==1){?>
						<input type="button" name="returnt1" id="returnt1" value="Return"
						onclick="window.location.href='Return Books.php?TID=<?php echo $t1;?>'" /><?php }?></td>
						</tr>
						<?php
						$x = 0;
						if ($t2 != "0") {
						$x = 1;
						$value = "<a href=\"res.php?search=$t2\" target=\"_blank\" class=\"a1\">" . getTitle ( $t2 ) . "</a>";
						} elseif ($t2 == "0") {
						$x = 2;
						$value = "Not issued";
						}
						?>
						<tr>
						<td bgcolor="#CCCCCC">Token-II</td>
						<td><?php echo $value;?>
						<?php if($x==2){?><input type="button" name="issuet2" id="issuet2"
						value="Issue" onclick="window.location.href='Issue Books.php'" /><?php } elseif($x==1){?>
						<input type="button" name="returnt2" id="returnt2" value="Return"
						onclick="window.location.href='Return Books.php?TID=<?php echo $t2;?>'" /><?php }?></td>
						</tr>
						<?php
						$x = 0;
						if ($t3 != "0") {
						$x = 1;
						$value = "<a href=\"res.php?search=$t3\" target=\"_blank\" class=\"a1\">" . getTitle ( $t3 ) . "</a>";
						} elseif ($t3 == "0") {
						$x = 2;
						$value = "Not issued";
						}
						?>
						<tr>
						<td bgcolor="#CCCCCC">Token-III</td>
						<td><?php echo $value;?>
						<?php if($x==2){?><input type="button" name="issuet3" id="issuet3"
						value="Issue" onclick="window.location.href='Issue Books.php'" /><?php } elseif($x==1){?>
						<input type="button" name="returnt3" id="returnt3" value="Return"
						onclick="window.location.href='Return Books.php?TID=<?php echo $t3;?>'" /><?php }?></td>
						</tr>
						<?php
						$x = 0;
						if ($t4 != "0") {
						$x = 1;
						$value = "<a href=\"res.php?search=$t4\" target=\"_blank\" class=\"a1\">" . getTitle ( t4 ) . "</a>";
						} elseif ($t4 == "0") {
						$x = 2;
						$value = "Not issued";
						}
						?>
						<tr>
						<td bgcolor="#CCCCCC">Token-IV</td>
						<td><?php echo $value;?>
						<?php if($x==2){?><input type="button" name="issuert" id="issuert"
						value="Issue" onclick="window.location.href='Issue Books.php'" /><?php } elseif($x==1){?>
						<input type="button" name="returnrt" id="returnrt" value="Return"
						onclick="window.location.href='Return Books.php?TID=<?php echo $rt;?>'" /><?php }?></td>
						</tr>
						<?php
						$x = 0;
						if ($t5 != "0") {
						$x = 1;
						$value = "<a href=\"res.php?search=$t5\" target=\"_blank\" class=\"a1\">" . getTitle ( t5 ) . "</a>";
						} elseif ($t5 == "0") {
						$x = 2;
						$value = "Not issued";
						}
						?>
						<tr>
						<td bgcolor="#CCCCCC">Token-V</td>
						<td><?php echo $value;?>
						<?php if($x==2){?><input type="button" name="issuert" id="issuert"
						value="Issue" onclick="window.location.href='Issue Books.php'" /><?php } elseif($x==1){?>
						<input type="button" name="returnrt" id="returnrt" value="Return"
						onclick="window.location.href='Return Books.php?TID=<?php echo $rt;?>'" /><?php }?></td>
						</tr>
						<?php
						$x = 0;
						if ($t6 != "0") {
						$x = 1;
						$value = "<a href=\"res.php?search=$t6\" target=\"_blank\" class=\"a1\">" . getTitle ( t6 ) . "</a>";
						} elseif ($t6 == "0") {
						$x = 2;
						$value = "Not issued";
						}
						?>
						<tr>
						<td bgcolor="#CCCCCC">Token-IV</td>
						<td><?php echo $value;?>
						<?php if($x==2){?><input type="button" name="issuert" id="issuert"
						value="Issue" onclick="window.location.href='Issue Books.php'" /><?php } elseif($x==1){?>
						<input type="button" name="returnrt" id="returnrt" value="Return"
						onclick="window.location.href='Return Books.php?TID=<?php echo $rt;?>'" /><?php }?></td>
						</tr>
						</tbody>
						</table>
						</form>
						
			
<?php 			
		}
	} else {
		echo "<table class=\"warning\" align=\"center\"><tr><td>Invalid Borrower ID</td></tr></table><table align=\"center\"><tr><td><a href=\"View Status.php\">back..</a></td></tr></table>";
	}
} else {
	?>
<form autocomplete="off" id="form1" name="form1" method="post" action="">
		<table width="60%" border="0" align="center">
			<tbody>
				<tr>
					<td bgcolor="#cccccc"><label for="viestatid">Borrower Id:</label></td>
					<td><input name="viestatid" type="text" autofocus="autofocus"
						id="viestatid" /></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit"
						id="submit" value="Submit" /></td>
				</tr>
			</tbody>
		</table>
	</form>
<?php
	if (! empty ( $_POST ['submit'] )) {
		$id = $_POST ['viestatid'];
		header ( "location:View Status.php?id=$id" );
	}
}
?>
</body>
</html>