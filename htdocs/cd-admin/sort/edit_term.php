<?php
if (isset($_GET['term_id'])){
	$term_id = $_GET['term_id'];
}
$sql = 'SELECT te.term_name FROM `cd_terms` te WHERE term_id = '.$term_id;
mysql_query('set names utf8');
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($result);
?>
<h3>修改一级栏目</h3>			
<div class="clear"></div>
</div> <!-- End .content-box-header -->
<div class="content-box-content">
<div class="tab-content default-tab" > <!-- This is the target div. id must match the href of this div's tab -->
<form method="post" action="./sort/transact_sorts.php" id="form1">
<table><tr><td style="font-weight:bold;">一级栏目名称</td><td><input type="text" name="term" id="term" class="text-input small-input" value ="<?php echo $row['term_name']; ?>"/></td></tr>
<tr><td colspan='2'><input type="submit" name="action" value="修改一级栏目" class="button" style="margin-right:8px;"/><input type="submit" name="action" value="取消" class="button" /></td></tr></table>
<input type="hidden" name="term_id" value="<?php echo $term_id; ?>" />
</form>
</div> <!-- End #tab1 -->
<script language="javascript">
<!--
function jiaodian(){
	var esrc = document.forms["form1"].elements["term"];
	if(navigator.userAgent.indexOf("MSIE")>0){
		if(esrc==null){
		esrc=event.srcElement;
		}
		var rtextRange =esrc.createTextRange();
		rtextRange.moveStart('character',esrc.value.length); 
        rtextRange.collapse(true); 
        rtextRange.select();
	}else{ 
		var rtextRange = esrc.setSelectionRange(esrc.value.length,esrc.value.length);
		esrc.focus();
	}
}
-->
</script>