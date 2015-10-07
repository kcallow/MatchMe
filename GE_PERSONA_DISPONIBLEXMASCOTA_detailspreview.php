<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

require_once("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

require_once("include/GE_PERSONA_DISPONIBLEXMASCOTA_variables.php");

$mode = postvalue("mode");


require_once("classes/searchclause.php");

$cipherer = new RunnerCipherer($strTableName);

require_once('include/xtempl.php');
$xt = new Xtempl();





$layout = new TLayout("detailspreview", "Rounded1DeliciousLavender1", "MobileDeliciousLavender1");
$layout->version = 2;
$layout->blocks["bare"] = array();
$layout->containers["dcount"] = array();
$layout->container_properties["dcount"] = array(  );
$layout->containers["dcount"][] = array("name"=>"detailspreviewheader", 
	"block"=>"", "substyle"=>1  );

$layout->containers["dcount"][] = array("name"=>"detailspreviewdetailsfount", 
	"block"=>"", "substyle"=>1  );

$layout->containers["dcount"][] = array("name"=>"detailspreviewdispfirst", 
	"block"=>"display_first", "substyle"=>1  );

$layout->skins["dcount"] = "empty";

$layout->blocks["bare"][] = "dcount";
$layout->containers["detailspreviewgrid"] = array();
$layout->container_properties["detailspreviewgrid"] = array(  );
$layout->containers["detailspreviewgrid"][] = array("name"=>"detailspreviewfields", 
	"block"=>"details_data", "substyle"=>1  );

$layout->skins["detailspreviewgrid"] = "grid";

$layout->blocks["bare"][] = "detailspreviewgrid";
$page_layouts["GE_PERSONA_DISPONIBLEXMASCOTA_detailspreview"] = $layout;

$layout->skinsparams = array();
$layout->skinsparams["empty"] = array("button"=>"button2");
$layout->skinsparams["menu"] = array("button"=>"button1");
$layout->skinsparams["hmenu"] = array("button"=>"button1");
$layout->skinsparams["undermenu"] = array("button"=>"button1");
$layout->skinsparams["fields"] = array("button"=>"button1");
$layout->skinsparams["form"] = array("button"=>"button1");
$layout->skinsparams["1"] = array("button"=>"button1");
$layout->skinsparams["2"] = array("button"=>"button1");
$layout->skinsparams["3"] = array("button"=>"button1");



$recordsCounter = 0;

//	process masterkey value
$mastertable = postvalue("mastertable");
$masterKeys = my_json_decode(postvalue("masterKeys"));
if($mastertable != "")
{
	$_SESSION[$strTableName."_mastertable"]=$mastertable;
//	copy keys to session
	$i = 1;
	if(is_array($masterKeys) && count($masterKeys) > 0)
	{
		while(array_key_exists ("masterkey".$i, $masterKeys))
		{
			$_SESSION[$strTableName."_masterkey".$i] = $masterKeys["masterkey".$i];
			$i++;
		}
	}
	if(isset($_SESSION[$strTableName."_masterkey".$i]))
		unset($_SESSION[$strTableName."_masterkey".$i]);
}
else
	$mastertable = $_SESSION[$strTableName."_mastertable"];

$params = array();
$params['id'] = 1;
$params['xt'] = &$xt;
$params['tName'] = $strTableName;
$params['pageType'] = "detailspreview";
$pageObject = new RunnerPage($params);

if($mastertable == "GE.PERSONA_DISPONIBLE")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("USERNAME") . "=" . make_db_value("USERNAME",$_SESSION[$strTableName."_masterkey1"]);
		$where.=" and ";
	$where .= $pageObject->getFieldSQLDecrypt("ES_REAL") . "=" . make_db_value("ES_REAL",$_SESSION[$strTableName."_masterkey2"]);
}
if($mastertable == "GE.MASCOTA")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("MASCOTA_ID") . "=" . make_db_value("MASCOTA_ID",$_SESSION[$strTableName."_masterkey1"]);
}

$str = SecuritySQL("Search");
if(strlen($str))
	$where.=" and ".$str;
$strSQL = $gQuery->gSQLWhere($where);

$strSQL.=" ".$gstrOrderBy;

$rowcount = $gQuery->gSQLRowCount($where, $pageObject->connection);
$xt->assign("row_count",$rowcount);
if($rowcount) 
{
	$xt->assign("details_data",true);

	$display_count = 10;
	if($mode == "inline")
		$display_count*=2;
		
	if($rowcount>$display_count+2)
	{
		$xt->assign("display_first",true);
		$xt->assign("display_count",$display_count);
	}
	else
		$display_count = $rowcount;

	$rowinfo = array();
	
	require_once getabspath('classes/controls/ViewControlsContainer.php');
	$pSet = new ProjectSettings($strTableName, PAGE_LIST);
	$viewContainer = new ViewControlsContainer($pSet, PAGE_LIST);
	$viewContainer->isDetailsPreview = true;

	$b = true;
	$qResult = $pageObject->connection->query( $strSQL );
	$data = $cipherer->DecryptFetchedArray( $qResult->fetchAssoc() );
	while($data && $recordsCounter<$display_count) {
		$recordsCounter++;
		$row = array();
		$keylink = "";
	
	
	//	USERNAME - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("USERNAME", $data, $keylink);
			$row["USERNAME_value"] = $value;
			$format = $pSet->getViewFormat("USERNAME");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("USERNAME")))
				$class = ' rnr-field-number';
			$row["USERNAME_class"] = $class;
	//	ES_REAL - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ES_REAL", $data, $keylink);
			$row["ES_REAL_value"] = $value;
			$format = $pSet->getViewFormat("ES_REAL");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("ES_REAL")))
				$class = ' rnr-field-number';
			$row["ES_REAL_class"] = $class;
	//	MASCOTA_ID - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("MASCOTA_ID", $data, $keylink);
			$row["MASCOTA_ID_value"] = $value;
			$format = $pSet->getViewFormat("MASCOTA_ID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("MASCOTA_ID")))
				$class = ' rnr-field-number';
			$row["MASCOTA_ID_class"] = $class;
	//	CANTIDAD - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("CANTIDAD", $data, $keylink);
			$row["CANTIDAD_value"] = $value;
			$format = $pSet->getViewFormat("CANTIDAD");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("CANTIDAD")))
				$class = ' rnr-field-number';
			$row["CANTIDAD_class"] = $class;
	//	FEC_CREACION - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("FEC_CREACION", $data, $keylink);
			$row["FEC_CREACION_value"] = $value;
			$format = $pSet->getViewFormat("FEC_CREACION");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("FEC_CREACION")))
				$class = ' rnr-field-number';
			$row["FEC_CREACION_class"] = $class;
	//	USUARIO_CREACION - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("USUARIO_CREACION", $data, $keylink);
			$row["USUARIO_CREACION_value"] = $value;
			$format = $pSet->getViewFormat("USUARIO_CREACION");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("USUARIO_CREACION")))
				$class = ' rnr-field-number';
			$row["USUARIO_CREACION_class"] = $class;
	//	FEC_ULTIMA_MOD - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("FEC_ULTIMA_MOD", $data, $keylink);
			$row["FEC_ULTIMA_MOD_value"] = $value;
			$format = $pSet->getViewFormat("FEC_ULTIMA_MOD");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("FEC_ULTIMA_MOD")))
				$class = ' rnr-field-number';
			$row["FEC_ULTIMA_MOD_class"] = $class;
	//	USUARIO_ULTIMA_MOD - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("USUARIO_ULTIMA_MOD", $data, $keylink);
			$row["USUARIO_ULTIMA_MOD_value"] = $value;
			$format = $pSet->getViewFormat("USUARIO_ULTIMA_MOD");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("USUARIO_ULTIMA_MOD")))
				$class = ' rnr-field-number';
			$row["USUARIO_ULTIMA_MOD_class"] = $class;
		$rowinfo[] = $row;
		if ($b) {
			$rowinfo2[] = $row;
			$b = false;
		}
		$data = $cipherer->DecryptFetchedArray( $qResult->fetchAssoc() );
	}
	$xt->assign_loopsection("details_row",$rowinfo);
	$xt->assign_loopsection("details_row_header",$rowinfo2); // assign class for header
}
$returnJSON = array("success" => true);
$xt->load_template(GetTemplateName("GE_PERSONA_DISPONIBLEXMASCOTA", "detailspreview"));
$returnJSON["body"] = $xt->fetch_loaded();

if($mode!="inline")
{
	$returnJSON["counter"] = postvalue("counter");
	$layout = GetPageLayout(GoodFieldName($strTableName), 'detailspreview');
	if($layout)
	{
		foreach($layout->getCSSFiles(isRTL(), isMobile()) as $css)
		{
			$returnJSON['CSSFiles'][] = $css;
		}
	}	
}	

echo printJSON($returnJSON);
exit();
?>