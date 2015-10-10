<?php

ini_set("display_errors","1");
ini_set("display_startup_errors","1");
include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT");



include("include/reportfunctions.php");

$strTableName="";

if(@$_REQUEST["cname"])
{
	// #9875 It's expected that webreports table belongs to the same db connection
	$_connection = $cman->getForWebReports();	
	$cname = @$_REQUEST["cname"];
	
	$sql_query = "SELECT ".$_connection->addFieldWrappers("rpt_id")." FROM ".$_connection->addTableWrappers("webreports")
		." WHERE ".$_connection->addFieldWrappers("rpt_name")."='".$cname."' and ".$_connection->addFieldWrappers("rpt_type")."='chart'";
		
	$data = $_connection->query( $sql_query )->fetchNumeric();	

	if( !count($data) )
		header("location: ".GetTableLink("webreport"));
	else
		Reload_Chart(postvalue("cname"));
}
include('include/xtempl.php');
$xt = new Xtempl();

$chrt_array = getChartArray(postvalue("cname"));

if(is_wr_project())
	include("include/" . $chrt_array['settings']['short_table_name'] . "_variables.php");


$show_dchart='<script type="text/javascript" language="javascript">
	//<![CDATA[
	var chart = new AnyChart("'.GetRootPathForResources("libs/swf/AnyChart.swf").'", "'.GetRootPathForResources("libs/swf/Preloader.swf").'");
	chart.width = "780";
	chart.height = "570";

	var xmlFile = "'.GetTableLink("dchartdata", "", 'cname='.jsreplace(runner_htmlspecialchars(postvalue('cname')))).'";
	xmlFile += "&ctype='.$chrt_array['chart_type']['type'].'";
	chart.setXMLFile(xmlFile);
	chart.write();
	//]]>
</script>';

$load_flash_player = '
<script type="text/javascript">
	var svgSupported = window.SVGAngle != undefined;
		var str="";
		if (!svgSupported)
		{
			str = "<center>";
			str += "'."".'<br /><br />";
			str += "<a href=\"http://www.adobe.com/go/getflashplayer\"><img border=\"0\" src=\"http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif\" /></a><br />";
			str += "</center>";		
		}
		if (typeof(ActiveXObject) != "undefined") {
			try { a = new ActiveXObject("ShockwaveFlash.ShockwaveFlash");d = a.GetVariable("$version"); }
			catch (e) { d = false; }
			if (!d) {
				$("div.center_div").html( str );	
			}			
		} else if ((navigator.product == "Gecko" && window.find && !navigator.savePreferences)
			|| (navigator.userAgent.indexOf("WebKit") != -1 || navigator.userAgent.indexOf("Konqueror") != -1))
		{
			div = $("div[id*=\'__chart_generated_container__\']");
			if ( div[0] == undefined ) {
				$("div.center_div").html( str );			
			} else {
				$(div).appendTo("div.center_div");
			}
		}
</script>';
$xt->assign("wr_pagestylepath", $wr_pagestylepath);

$xt->assign("chart_constructor", $show_dchart);
$xt->assign("load_flash_player", $load_flash_player);
$templatefile = GetTemplateName("", "dchart_preview");
$xt->display($templatefile);
?>