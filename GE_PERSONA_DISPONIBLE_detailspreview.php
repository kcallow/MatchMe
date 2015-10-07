<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

require_once("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

require_once("include/GE_PERSONA_DISPONIBLE_variables.php");

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
$page_layouts["GE_PERSONA_DISPONIBLE_detailspreview"] = $layout;

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

if($mastertable == "GE.BEBEDOR")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("BEBEDOR_ID") . "=" . make_db_value("BEBEDOR_ID",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "GE.FRECUENCIA_EJERCICIO")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("FRECUENCIA_EJERCICIO_ID") . "=" . make_db_value("FRECUENCIA_EJERCICIO_ID",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "GE.SALARIO")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("SALARIO_ID") . "=" . make_db_value("SALARIO_ID",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "GE.COLOR_OJOS")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("COLOR_OJOS_ID") . "=" . make_db_value("COLOR_OJOS_ID",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "GE.NIVEL_EDUCACION")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("NIVEL_EDUCACION_ID") . "=" . make_db_value("NIVEL_EDUCACION_ID",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "GE.FUMADOR")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("FUMADOR_ID") . "=" . make_db_value("FUMADOR_ID",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "GE.PERSONA")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("USERNAME") . "=" . make_db_value("USERNAME",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "GE.ESTADO_CIVIL")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("ESTADO_CIVIL_ID") . "=" . make_db_value("ESTADO_CIVIL_ID",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "GE.COLOR_PIEL")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("COLOR_PIEL_ID") . "=" . make_db_value("COLOR_PIEL_ID",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "GE.CONTEXTURA")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("CONTEXTURA_ID") . "=" . make_db_value("CONTEXTURA_ID",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "GE.TIPO_RELACION")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("TIPO_RELACION_ID") . "=" . make_db_value("TIPO_RELACION_ID",$_SESSION[$strTableName."_masterkey1"]);
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
		$keylink.="&key1=".runner_htmlspecialchars(rawurlencode(@$data["USERNAME"]));
		$keylink.="&key2=".runner_htmlspecialchars(rawurlencode(@$data["ES_REAL"]));
	
	
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
	//	COLOR_OJOS_ID - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("COLOR_OJOS_ID", $data, $keylink);
			$row["COLOR_OJOS_ID_value"] = $value;
			$format = $pSet->getViewFormat("COLOR_OJOS_ID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("COLOR_OJOS_ID")))
				$class = ' rnr-field-number';
			$row["COLOR_OJOS_ID_class"] = $class;
	//	COLOR_PIEL_ID - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("COLOR_PIEL_ID", $data, $keylink);
			$row["COLOR_PIEL_ID_value"] = $value;
			$format = $pSet->getViewFormat("COLOR_PIEL_ID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("COLOR_PIEL_ID")))
				$class = ' rnr-field-number';
			$row["COLOR_PIEL_ID_class"] = $class;
	//	CONTEXTURA_ID - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("CONTEXTURA_ID", $data, $keylink);
			$row["CONTEXTURA_ID_value"] = $value;
			$format = $pSet->getViewFormat("CONTEXTURA_ID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("CONTEXTURA_ID")))
				$class = ' rnr-field-number';
			$row["CONTEXTURA_ID_class"] = $class;
	//	NIVEL_EDUCACION_ID - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("NIVEL_EDUCACION_ID", $data, $keylink);
			$row["NIVEL_EDUCACION_ID_value"] = $value;
			$format = $pSet->getViewFormat("NIVEL_EDUCACION_ID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("NIVEL_EDUCACION_ID")))
				$class = ' rnr-field-number';
			$row["NIVEL_EDUCACION_ID_class"] = $class;
	//	ESTADO_CIVIL_ID - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ESTADO_CIVIL_ID", $data, $keylink);
			$row["ESTADO_CIVIL_ID_value"] = $value;
			$format = $pSet->getViewFormat("ESTADO_CIVIL_ID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("ESTADO_CIVIL_ID")))
				$class = ' rnr-field-number';
			$row["ESTADO_CIVIL_ID_class"] = $class;
	//	FUMADOR_ID - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("FUMADOR_ID", $data, $keylink);
			$row["FUMADOR_ID_value"] = $value;
			$format = $pSet->getViewFormat("FUMADOR_ID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("FUMADOR_ID")))
				$class = ' rnr-field-number';
			$row["FUMADOR_ID_class"] = $class;
	//	BEBEDOR_ID - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("BEBEDOR_ID", $data, $keylink);
			$row["BEBEDOR_ID_value"] = $value;
			$format = $pSet->getViewFormat("BEBEDOR_ID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("BEBEDOR_ID")))
				$class = ' rnr-field-number';
			$row["BEBEDOR_ID_class"] = $class;
	//	FRECUENCIA_EJERCICIO_ID - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("FRECUENCIA_EJERCICIO_ID", $data, $keylink);
			$row["FRECUENCIA_EJERCICIO_ID_value"] = $value;
			$format = $pSet->getViewFormat("FRECUENCIA_EJERCICIO_ID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("FRECUENCIA_EJERCICIO_ID")))
				$class = ' rnr-field-number';
			$row["FRECUENCIA_EJERCICIO_ID_class"] = $class;
	//	SALARIO_ID - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("SALARIO_ID", $data, $keylink);
			$row["SALARIO_ID_value"] = $value;
			$format = $pSet->getViewFormat("SALARIO_ID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("SALARIO_ID")))
				$class = ' rnr-field-number';
			$row["SALARIO_ID_class"] = $class;
	//	ALTURA - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ALTURA", $data, $keylink);
			$row["ALTURA_value"] = $value;
			$format = $pSet->getViewFormat("ALTURA");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("ALTURA")))
				$class = ' rnr-field-number';
			$row["ALTURA_class"] = $class;
	//	PESO - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("PESO", $data, $keylink);
			$row["PESO_value"] = $value;
			$format = $pSet->getViewFormat("PESO");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("PESO")))
				$class = ' rnr-field-number';
			$row["PESO_class"] = $class;
	//	NUM_HIJOS - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("NUM_HIJOS", $data, $keylink);
			$row["NUM_HIJOS_value"] = $value;
			$format = $pSet->getViewFormat("NUM_HIJOS");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("NUM_HIJOS")))
				$class = ' rnr-field-number';
			$row["NUM_HIJOS_class"] = $class;
	//	QUIERE_HIJOS - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("QUIERE_HIJOS", $data, $keylink);
			$row["QUIERE_HIJOS_value"] = $value;
			$format = $pSet->getViewFormat("QUIERE_HIJOS");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("QUIERE_HIJOS")))
				$class = ' rnr-field-number';
			$row["QUIERE_HIJOS_class"] = $class;
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
	//	TIPO_RELACION_ID - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("TIPO_RELACION_ID", $data, $keylink);
			$row["TIPO_RELACION_ID_value"] = $value;
			$format = $pSet->getViewFormat("TIPO_RELACION_ID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("TIPO_RELACION_ID")))
				$class = ' rnr-field-number';
			$row["TIPO_RELACION_ID_class"] = $class;
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
$xt->load_template(GetTemplateName("GE_PERSONA_DISPONIBLE", "detailspreview"));
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