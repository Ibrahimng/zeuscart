<?php 
 ob_start(); ?><?php /* Smarty version 2.6.19, created on 2013-03-07 16:36:59
compiled from sitesettings.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "left.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
?>
<table width="97%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" class="content_title">Site Moto <!--&nbsp;<img src="images/help.gif" onmouseover="ShowHelp('dchead', 'Site Moto', 'Add here')" onmouseout="HideHelp('dchead');">
<div id="dchead" style="left: 50px; top: 50px;"></div>--></td>
</tr>
<!--<tr>
<td align="left">&nbsp;</td>
</tr>-->
<tr>
<td align="center"  style="padding-top:5px; padding-bottom:5px;"><?php echo $this->_tpl_vars['sitemotomsg']; ?>
</td>
</tr>
<!--<tr>
<td align="left">&nbsp;</td>
</tr>-->
<tr>
<td align="left" class="content_form_bdr">
<form name="site" action="?do=site&action=update" method="post" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan="2" align="left" class="content_list_head">Edit Site Motto</td></tr>
<tr>
<td align="left">&nbsp;</td>
</tr>
<?php echo $this->_tpl_vars['sitemoto']; ?>
<tr><td colspan="2" align="center" class="content_form_line">
<input type="submit" name="button" id="button" value="Submit" class="all_bttn"  /></td>
</tr>
</table></form></td></tr>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
?>
<?php 
   $op=explode("\n", ob_get_contents());
   ob_clean();
    foreach($op as $p)		
	{
		if(trim($p)!="")
			echo trim($p)."\n"; 
		ob_flush();
	}
?>