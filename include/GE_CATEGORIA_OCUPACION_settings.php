<?php
require_once(getabspath("classes/cipherer.php"));




$tdataGE_CATEGORIA_OCUPACION = array();	
	$tdataGE_CATEGORIA_OCUPACION[".truncateText"] = true;
	$tdataGE_CATEGORIA_OCUPACION[".NumberOfChars"] = 80; 
	$tdataGE_CATEGORIA_OCUPACION[".ShortName"] = "GE_CATEGORIA_OCUPACION";
	$tdataGE_CATEGORIA_OCUPACION[".OwnerID"] = "";
	$tdataGE_CATEGORIA_OCUPACION[".OriginalTable"] = "GE.CATEGORIA_OCUPACION";

//	field labels
$fieldLabelsGE_CATEGORIA_OCUPACION = array();
$fieldToolTipsGE_CATEGORIA_OCUPACION = array();
$pageTitlesGE_CATEGORIA_OCUPACION = array();

if(mlang_getcurrentlang()=="Spanish")
{
	$fieldLabelsGE_CATEGORIA_OCUPACION["Spanish"] = array();
	$fieldToolTipsGE_CATEGORIA_OCUPACION["Spanish"] = array();
	$pageTitlesGE_CATEGORIA_OCUPACION["Spanish"] = array();
	$fieldLabelsGE_CATEGORIA_OCUPACION["Spanish"]["CATEGORIA_OCUPACION_ID"] = "CATEGORIA OCUPACION ID";
	$fieldToolTipsGE_CATEGORIA_OCUPACION["Spanish"]["CATEGORIA_OCUPACION_ID"] = "";
	$fieldLabelsGE_CATEGORIA_OCUPACION["Spanish"]["NOMBRE"] = "NOMBRE";
	$fieldToolTipsGE_CATEGORIA_OCUPACION["Spanish"]["NOMBRE"] = "";
	$fieldLabelsGE_CATEGORIA_OCUPACION["Spanish"]["FEC_CREACION"] = "FEC CREACION";
	$fieldToolTipsGE_CATEGORIA_OCUPACION["Spanish"]["FEC_CREACION"] = "";
	$fieldLabelsGE_CATEGORIA_OCUPACION["Spanish"]["USUARIO_CREACION"] = "USUARIO CREACION";
	$fieldToolTipsGE_CATEGORIA_OCUPACION["Spanish"]["USUARIO_CREACION"] = "";
	$fieldLabelsGE_CATEGORIA_OCUPACION["Spanish"]["FEC_ULTIMA_MOD"] = "FEC ULTIMA MOD";
	$fieldToolTipsGE_CATEGORIA_OCUPACION["Spanish"]["FEC_ULTIMA_MOD"] = "";
	$fieldLabelsGE_CATEGORIA_OCUPACION["Spanish"]["USUARIO_ULTIMA_MOD"] = "USUARIO ULTIMA MOD";
	$fieldToolTipsGE_CATEGORIA_OCUPACION["Spanish"]["USUARIO_ULTIMA_MOD"] = "";
	if (count($fieldToolTipsGE_CATEGORIA_OCUPACION["Spanish"]))
		$tdataGE_CATEGORIA_OCUPACION[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsGE_CATEGORIA_OCUPACION[""] = array();
	$fieldToolTipsGE_CATEGORIA_OCUPACION[""] = array();
	$pageTitlesGE_CATEGORIA_OCUPACION[""] = array();
	$fieldLabelsGE_CATEGORIA_OCUPACION[""]["CATEGORIA_OCUPACION_ID"] = "CATEGORIA OCUPACION ID";
	$fieldToolTipsGE_CATEGORIA_OCUPACION[""]["CATEGORIA_OCUPACION_ID"] = "";
	$fieldLabelsGE_CATEGORIA_OCUPACION[""]["NOMBRE"] = "NOMBRE";
	$fieldToolTipsGE_CATEGORIA_OCUPACION[""]["NOMBRE"] = "";
	$fieldLabelsGE_CATEGORIA_OCUPACION[""]["FEC_CREACION"] = "FEC CREACION";
	$fieldToolTipsGE_CATEGORIA_OCUPACION[""]["FEC_CREACION"] = "";
	$fieldLabelsGE_CATEGORIA_OCUPACION[""]["USUARIO_CREACION"] = "USUARIO CREACION";
	$fieldToolTipsGE_CATEGORIA_OCUPACION[""]["USUARIO_CREACION"] = "";
	$fieldLabelsGE_CATEGORIA_OCUPACION[""]["FEC_ULTIMA_MOD"] = "FEC ULTIMA MOD";
	$fieldToolTipsGE_CATEGORIA_OCUPACION[""]["FEC_ULTIMA_MOD"] = "";
	$fieldLabelsGE_CATEGORIA_OCUPACION[""]["USUARIO_ULTIMA_MOD"] = "USUARIO ULTIMA MOD";
	$fieldToolTipsGE_CATEGORIA_OCUPACION[""]["USUARIO_ULTIMA_MOD"] = "";
	if (count($fieldToolTipsGE_CATEGORIA_OCUPACION[""]))
		$tdataGE_CATEGORIA_OCUPACION[".isUseToolTips"] = true;
}
	
	
	$tdataGE_CATEGORIA_OCUPACION[".NCSearch"] = true;



$tdataGE_CATEGORIA_OCUPACION[".shortTableName"] = "GE_CATEGORIA_OCUPACION";
$tdataGE_CATEGORIA_OCUPACION[".nSecOptions"] = 0;
$tdataGE_CATEGORIA_OCUPACION[".recsPerRowList"] = 1;
$tdataGE_CATEGORIA_OCUPACION[".mainTableOwnerID"] = "";
$tdataGE_CATEGORIA_OCUPACION[".moveNext"] = 1;
$tdataGE_CATEGORIA_OCUPACION[".nType"] = 0;

$tdataGE_CATEGORIA_OCUPACION[".strOriginalTableName"] = "GE.CATEGORIA_OCUPACION";




$tdataGE_CATEGORIA_OCUPACION[".showAddInPopup"] = false;

$tdataGE_CATEGORIA_OCUPACION[".showEditInPopup"] = false;

$tdataGE_CATEGORIA_OCUPACION[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdataGE_CATEGORIA_OCUPACION[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdataGE_CATEGORIA_OCUPACION[".fieldsForRegister"] = array();

$tdataGE_CATEGORIA_OCUPACION[".listAjax"] = false;

	$tdataGE_CATEGORIA_OCUPACION[".audit"] = false;

	$tdataGE_CATEGORIA_OCUPACION[".locking"] = false;

$tdataGE_CATEGORIA_OCUPACION[".edit"] = true;

$tdataGE_CATEGORIA_OCUPACION[".list"] = true;

$tdataGE_CATEGORIA_OCUPACION[".inlineEdit"] = true;
$tdataGE_CATEGORIA_OCUPACION[".inlineAdd"] = true;
$tdataGE_CATEGORIA_OCUPACION[".view"] = true;

$tdataGE_CATEGORIA_OCUPACION[".import"] = true;

$tdataGE_CATEGORIA_OCUPACION[".exportTo"] = true;

$tdataGE_CATEGORIA_OCUPACION[".printFriendly"] = true;

$tdataGE_CATEGORIA_OCUPACION[".delete"] = true;

$tdataGE_CATEGORIA_OCUPACION[".showSimpleSearchOptions"] = false;

// search Saving settings
$tdataGE_CATEGORIA_OCUPACION[".searchSaving"] = false;
//

$tdataGE_CATEGORIA_OCUPACION[".showSearchPanel"] = true;
		$tdataGE_CATEGORIA_OCUPACION[".flexibleSearch"] = true;		

if (isMobile())
	$tdataGE_CATEGORIA_OCUPACION[".isUseAjaxSuggest"] = false;
else 
	$tdataGE_CATEGORIA_OCUPACION[".isUseAjaxSuggest"] = true;

$tdataGE_CATEGORIA_OCUPACION[".rowHighlite"] = true;



$tdataGE_CATEGORIA_OCUPACION[".addPageEvents"] = false;

// use timepicker for search panel
$tdataGE_CATEGORIA_OCUPACION[".isUseTimeForSearch"] = false;



$tdataGE_CATEGORIA_OCUPACION[".useDetailsPreview"] = true;


$tdataGE_CATEGORIA_OCUPACION[".allSearchFields"] = array();
$tdataGE_CATEGORIA_OCUPACION[".filterFields"] = array();
$tdataGE_CATEGORIA_OCUPACION[".requiredSearchFields"] = array();

$tdataGE_CATEGORIA_OCUPACION[".allSearchFields"][] = "CATEGORIA_OCUPACION_ID";
	$tdataGE_CATEGORIA_OCUPACION[".allSearchFields"][] = "NOMBRE";
	$tdataGE_CATEGORIA_OCUPACION[".allSearchFields"][] = "FEC_CREACION";
	$tdataGE_CATEGORIA_OCUPACION[".allSearchFields"][] = "USUARIO_CREACION";
	$tdataGE_CATEGORIA_OCUPACION[".allSearchFields"][] = "FEC_ULTIMA_MOD";
	$tdataGE_CATEGORIA_OCUPACION[".allSearchFields"][] = "USUARIO_ULTIMA_MOD";
	

$tdataGE_CATEGORIA_OCUPACION[".googleLikeFields"] = array();
$tdataGE_CATEGORIA_OCUPACION[".googleLikeFields"][] = "CATEGORIA_OCUPACION_ID";
$tdataGE_CATEGORIA_OCUPACION[".googleLikeFields"][] = "NOMBRE";
$tdataGE_CATEGORIA_OCUPACION[".googleLikeFields"][] = "FEC_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".googleLikeFields"][] = "USUARIO_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".googleLikeFields"][] = "FEC_ULTIMA_MOD";
$tdataGE_CATEGORIA_OCUPACION[".googleLikeFields"][] = "USUARIO_ULTIMA_MOD";


$tdataGE_CATEGORIA_OCUPACION[".advSearchFields"] = array();
$tdataGE_CATEGORIA_OCUPACION[".advSearchFields"][] = "CATEGORIA_OCUPACION_ID";
$tdataGE_CATEGORIA_OCUPACION[".advSearchFields"][] = "NOMBRE";
$tdataGE_CATEGORIA_OCUPACION[".advSearchFields"][] = "FEC_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".advSearchFields"][] = "USUARIO_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".advSearchFields"][] = "FEC_ULTIMA_MOD";
$tdataGE_CATEGORIA_OCUPACION[".advSearchFields"][] = "USUARIO_ULTIMA_MOD";

$tdataGE_CATEGORIA_OCUPACION[".tableType"] = "list";

$tdataGE_CATEGORIA_OCUPACION[".printerPageOrientation"] = 0;
$tdataGE_CATEGORIA_OCUPACION[".nPrinterPageScale"] = 100;

$tdataGE_CATEGORIA_OCUPACION[".nPrinterSplitRecords"] = 40;

$tdataGE_CATEGORIA_OCUPACION[".nPrinterPDFSplitRecords"] = 40;





	





// view page pdf

// print page pdf


$tdataGE_CATEGORIA_OCUPACION[".pageSize"] = 20;

$tdataGE_CATEGORIA_OCUPACION[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataGE_CATEGORIA_OCUPACION[".strOrderBy"] = $tstrOrderBy;

$tdataGE_CATEGORIA_OCUPACION[".orderindexes"] = array();

$tdataGE_CATEGORIA_OCUPACION[".sqlHead"] = "SELECT CATEGORIA_OCUPACION_ID,  NOMBRE,  FEC_CREACION,  USUARIO_CREACION,  FEC_ULTIMA_MOD,  USUARIO_ULTIMA_MOD";
$tdataGE_CATEGORIA_OCUPACION[".sqlFrom"] = "FROM GE.CATEGORIA_OCUPACION";
$tdataGE_CATEGORIA_OCUPACION[".sqlWhereExpr"] = "";
$tdataGE_CATEGORIA_OCUPACION[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataGE_CATEGORIA_OCUPACION[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataGE_CATEGORIA_OCUPACION[".arrGroupsPerPage"] = $arrGPP;

$tdataGE_CATEGORIA_OCUPACION[".highlightSearchResults"] = true;

$tableKeysGE_CATEGORIA_OCUPACION = array();
$tableKeysGE_CATEGORIA_OCUPACION[] = "CATEGORIA_OCUPACION_ID";
$tdataGE_CATEGORIA_OCUPACION[".Keys"] = $tableKeysGE_CATEGORIA_OCUPACION;

$tdataGE_CATEGORIA_OCUPACION[".listFields"] = array();
$tdataGE_CATEGORIA_OCUPACION[".listFields"][] = "CATEGORIA_OCUPACION_ID";
$tdataGE_CATEGORIA_OCUPACION[".listFields"][] = "NOMBRE";
$tdataGE_CATEGORIA_OCUPACION[".listFields"][] = "FEC_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".listFields"][] = "USUARIO_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".listFields"][] = "FEC_ULTIMA_MOD";
$tdataGE_CATEGORIA_OCUPACION[".listFields"][] = "USUARIO_ULTIMA_MOD";

$tdataGE_CATEGORIA_OCUPACION[".hideMobileList"] = array();


$tdataGE_CATEGORIA_OCUPACION[".viewFields"] = array();
$tdataGE_CATEGORIA_OCUPACION[".viewFields"][] = "CATEGORIA_OCUPACION_ID";
$tdataGE_CATEGORIA_OCUPACION[".viewFields"][] = "NOMBRE";
$tdataGE_CATEGORIA_OCUPACION[".viewFields"][] = "FEC_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".viewFields"][] = "USUARIO_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".viewFields"][] = "FEC_ULTIMA_MOD";
$tdataGE_CATEGORIA_OCUPACION[".viewFields"][] = "USUARIO_ULTIMA_MOD";

$tdataGE_CATEGORIA_OCUPACION[".addFields"] = array();
$tdataGE_CATEGORIA_OCUPACION[".addFields"][] = "CATEGORIA_OCUPACION_ID";
$tdataGE_CATEGORIA_OCUPACION[".addFields"][] = "NOMBRE";

$tdataGE_CATEGORIA_OCUPACION[".inlineAddFields"] = array();
$tdataGE_CATEGORIA_OCUPACION[".inlineAddFields"][] = "CATEGORIA_OCUPACION_ID";
$tdataGE_CATEGORIA_OCUPACION[".inlineAddFields"][] = "NOMBRE";
$tdataGE_CATEGORIA_OCUPACION[".inlineAddFields"][] = "FEC_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".inlineAddFields"][] = "USUARIO_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".inlineAddFields"][] = "FEC_ULTIMA_MOD";
$tdataGE_CATEGORIA_OCUPACION[".inlineAddFields"][] = "USUARIO_ULTIMA_MOD";

$tdataGE_CATEGORIA_OCUPACION[".editFields"] = array();
$tdataGE_CATEGORIA_OCUPACION[".editFields"][] = "CATEGORIA_OCUPACION_ID";
$tdataGE_CATEGORIA_OCUPACION[".editFields"][] = "NOMBRE";

$tdataGE_CATEGORIA_OCUPACION[".inlineEditFields"] = array();
$tdataGE_CATEGORIA_OCUPACION[".inlineEditFields"][] = "CATEGORIA_OCUPACION_ID";
$tdataGE_CATEGORIA_OCUPACION[".inlineEditFields"][] = "NOMBRE";
$tdataGE_CATEGORIA_OCUPACION[".inlineEditFields"][] = "FEC_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".inlineEditFields"][] = "USUARIO_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".inlineEditFields"][] = "FEC_ULTIMA_MOD";
$tdataGE_CATEGORIA_OCUPACION[".inlineEditFields"][] = "USUARIO_ULTIMA_MOD";

$tdataGE_CATEGORIA_OCUPACION[".exportFields"] = array();
$tdataGE_CATEGORIA_OCUPACION[".exportFields"][] = "CATEGORIA_OCUPACION_ID";
$tdataGE_CATEGORIA_OCUPACION[".exportFields"][] = "NOMBRE";
$tdataGE_CATEGORIA_OCUPACION[".exportFields"][] = "FEC_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".exportFields"][] = "USUARIO_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".exportFields"][] = "FEC_ULTIMA_MOD";
$tdataGE_CATEGORIA_OCUPACION[".exportFields"][] = "USUARIO_ULTIMA_MOD";

$tdataGE_CATEGORIA_OCUPACION[".importFields"] = array();
$tdataGE_CATEGORIA_OCUPACION[".importFields"][] = "CATEGORIA_OCUPACION_ID";
$tdataGE_CATEGORIA_OCUPACION[".importFields"][] = "NOMBRE";
$tdataGE_CATEGORIA_OCUPACION[".importFields"][] = "FEC_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".importFields"][] = "USUARIO_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".importFields"][] = "FEC_ULTIMA_MOD";
$tdataGE_CATEGORIA_OCUPACION[".importFields"][] = "USUARIO_ULTIMA_MOD";

$tdataGE_CATEGORIA_OCUPACION[".printFields"] = array();
$tdataGE_CATEGORIA_OCUPACION[".printFields"][] = "CATEGORIA_OCUPACION_ID";
$tdataGE_CATEGORIA_OCUPACION[".printFields"][] = "NOMBRE";
$tdataGE_CATEGORIA_OCUPACION[".printFields"][] = "FEC_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".printFields"][] = "USUARIO_CREACION";
$tdataGE_CATEGORIA_OCUPACION[".printFields"][] = "FEC_ULTIMA_MOD";
$tdataGE_CATEGORIA_OCUPACION[".printFields"][] = "USUARIO_ULTIMA_MOD";

//	CATEGORIA_OCUPACION_ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "CATEGORIA_OCUPACION_ID";
	$fdata["GoodName"] = "CATEGORIA_OCUPACION_ID";
	$fdata["ownerTable"] = "GE.CATEGORIA_OCUPACION";
	$fdata["Label"] = GetFieldLabel("GE_CATEGORIA_OCUPACION","CATEGORIA_OCUPACION_ID"); 
	$fdata["FieldType"] = 14;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "CATEGORIA_OCUPACION_ID"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "CATEGORIA_OCUPACION_ID";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
		
		
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "number";
	
		$edata["EditParams"] = "";
			
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
			
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between");
// the end of search options settings	

	

	
	$tdataGE_CATEGORIA_OCUPACION["CATEGORIA_OCUPACION_ID"] = $fdata;
//	NOMBRE
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "NOMBRE";
	$fdata["GoodName"] = "NOMBRE";
	$fdata["ownerTable"] = "GE.CATEGORIA_OCUPACION";
	$fdata["Label"] = GetFieldLabel("GE_CATEGORIA_OCUPACION","NOMBRE"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "NOMBRE"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "NOMBRE";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=20";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdataGE_CATEGORIA_OCUPACION["NOMBRE"] = $fdata;
//	FEC_CREACION
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "FEC_CREACION";
	$fdata["GoodName"] = "FEC_CREACION";
	$fdata["ownerTable"] = "GE.CATEGORIA_OCUPACION";
	$fdata["Label"] = GetFieldLabel("GE_CATEGORIA_OCUPACION","FEC_CREACION"); 
	$fdata["FieldType"] = 135;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "FEC_CREACION"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "FEC_CREACION";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		$edata["ShowTime"] = true; 
		
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between");
// the end of search options settings	

	

	
	$tdataGE_CATEGORIA_OCUPACION["FEC_CREACION"] = $fdata;
//	USUARIO_CREACION
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "USUARIO_CREACION";
	$fdata["GoodName"] = "USUARIO_CREACION";
	$fdata["ownerTable"] = "GE.CATEGORIA_OCUPACION";
	$fdata["Label"] = GetFieldLabel("GE_CATEGORIA_OCUPACION","USUARIO_CREACION"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "USUARIO_CREACION"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "USUARIO_CREACION";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=10";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdataGE_CATEGORIA_OCUPACION["USUARIO_CREACION"] = $fdata;
//	FEC_ULTIMA_MOD
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "FEC_ULTIMA_MOD";
	$fdata["GoodName"] = "FEC_ULTIMA_MOD";
	$fdata["ownerTable"] = "GE.CATEGORIA_OCUPACION";
	$fdata["Label"] = GetFieldLabel("GE_CATEGORIA_OCUPACION","FEC_ULTIMA_MOD"); 
	$fdata["FieldType"] = 135;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "FEC_ULTIMA_MOD"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "FEC_ULTIMA_MOD";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		$edata["ShowTime"] = true; 
		
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between");
// the end of search options settings	

	

	
	$tdataGE_CATEGORIA_OCUPACION["FEC_ULTIMA_MOD"] = $fdata;
//	USUARIO_ULTIMA_MOD
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "USUARIO_ULTIMA_MOD";
	$fdata["GoodName"] = "USUARIO_ULTIMA_MOD";
	$fdata["ownerTable"] = "GE.CATEGORIA_OCUPACION";
	$fdata["Label"] = GetFieldLabel("GE_CATEGORIA_OCUPACION","USUARIO_ULTIMA_MOD"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "USUARIO_ULTIMA_MOD"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "USUARIO_ULTIMA_MOD";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=10";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdataGE_CATEGORIA_OCUPACION["USUARIO_ULTIMA_MOD"] = $fdata;

	
$tables_data["GE.CATEGORIA_OCUPACION"]=&$tdataGE_CATEGORIA_OCUPACION;
$field_labels["GE_CATEGORIA_OCUPACION"] = &$fieldLabelsGE_CATEGORIA_OCUPACION;
$fieldToolTips["GE.CATEGORIA_OCUPACION"] = &$fieldToolTipsGE_CATEGORIA_OCUPACION;
$page_titles["GE_CATEGORIA_OCUPACION"] = &$pageTitlesGE_CATEGORIA_OCUPACION;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["GE.CATEGORIA_OCUPACION"] = array();
//	GE.OCUPACIONXCATEGORIA_OCUPACION
	
	

		$dIndex = 0;
	$detailsParam = array();
	$detailsParam["dDataSourceTable"]="GE.OCUPACIONXCATEGORIA_OCUPACION";
		$detailsParam["dOriginalTable"] = "GE.OCUPACIONXCATEGORIA_OCUPACION";
				$detailsParam["dType"]=PAGE_LIST;
	$detailsParam["dShortTable"] = "GE_OCUPACIONXCATEGORIA_OCUPACION";
	$detailsParam["masterKeys"] =array();
	$detailsParam["detailKeys"] =array();
	$detailsParam["dispChildCount"] = "1";
		$detailsParam["hideChild"] = false;
	$detailsParam["previewOnList"] = 1;
	$detailsParam["previewOnAdd"] = 0;
	$detailsParam["previewOnEdit"] = 0;
	$detailsParam["previewOnView"] = 0;
			
	$detailsTablesData["GE.CATEGORIA_OCUPACION"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["GE.CATEGORIA_OCUPACION"][$dIndex]["masterKeys"] = array();

	$detailsTablesData["GE.CATEGORIA_OCUPACION"][$dIndex]["masterKeys"][]="CATEGORIA_OCUPACION_ID";

				$detailsTablesData["GE.CATEGORIA_OCUPACION"][$dIndex]["detailKeys"] = array();

	$detailsTablesData["GE.CATEGORIA_OCUPACION"][$dIndex]["detailKeys"][]="CATEGORIA_OCUPACION_ID";
	
// tables which are master tables for current table (detail)
$masterTablesData["GE.CATEGORIA_OCUPACION"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_GE_CATEGORIA_OCUPACION()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "CATEGORIA_OCUPACION_ID,  NOMBRE,  FEC_CREACION,  USUARIO_CREACION,  FEC_ULTIMA_MOD,  USUARIO_ULTIMA_MOD";
$proto0["m_strFrom"] = "FROM GE.CATEGORIA_OCUPACION";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
			$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = false;
$proto1["m_inBrackets"] = false;
$proto1["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = false;
$proto3["m_inBrackets"] = false;
$proto3["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLField(array(
	"m_strName" => "CATEGORIA_OCUPACION_ID",
	"m_strTable" => "GE.CATEGORIA_OCUPACION",
	"m_srcTableName" => "GE.CATEGORIA_OCUPACION"
));

$proto5["m_sql"] = "CATEGORIA_OCUPACION_ID";
$proto5["m_srcTableName"] = "GE.CATEGORIA_OCUPACION";
$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "NOMBRE",
	"m_strTable" => "GE.CATEGORIA_OCUPACION",
	"m_srcTableName" => "GE.CATEGORIA_OCUPACION"
));

$proto7["m_sql"] = "NOMBRE";
$proto7["m_srcTableName"] = "GE.CATEGORIA_OCUPACION";
$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "FEC_CREACION",
	"m_strTable" => "GE.CATEGORIA_OCUPACION",
	"m_srcTableName" => "GE.CATEGORIA_OCUPACION"
));

$proto9["m_sql"] = "FEC_CREACION";
$proto9["m_srcTableName"] = "GE.CATEGORIA_OCUPACION";
$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "USUARIO_CREACION",
	"m_strTable" => "GE.CATEGORIA_OCUPACION",
	"m_srcTableName" => "GE.CATEGORIA_OCUPACION"
));

$proto11["m_sql"] = "USUARIO_CREACION";
$proto11["m_srcTableName"] = "GE.CATEGORIA_OCUPACION";
$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "FEC_ULTIMA_MOD",
	"m_strTable" => "GE.CATEGORIA_OCUPACION",
	"m_srcTableName" => "GE.CATEGORIA_OCUPACION"
));

$proto13["m_sql"] = "FEC_ULTIMA_MOD";
$proto13["m_srcTableName"] = "GE.CATEGORIA_OCUPACION";
$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "USUARIO_ULTIMA_MOD",
	"m_strTable" => "GE.CATEGORIA_OCUPACION",
	"m_srcTableName" => "GE.CATEGORIA_OCUPACION"
));

$proto15["m_sql"] = "USUARIO_ULTIMA_MOD";
$proto15["m_srcTableName"] = "GE.CATEGORIA_OCUPACION";
$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto17=array();
$proto17["m_link"] = "SQLL_MAIN";
			$proto18=array();
$proto18["m_strName"] = "GE.CATEGORIA_OCUPACION";
$proto18["m_srcTableName"] = "GE.CATEGORIA_OCUPACION";
$proto18["m_columns"] = array();
$proto18["m_columns"][] = "CATEGORIA_OCUPACION_ID";
$proto18["m_columns"][] = "NOMBRE";
$proto18["m_columns"][] = "FEC_CREACION";
$proto18["m_columns"][] = "USUARIO_CREACION";
$proto18["m_columns"][] = "FEC_ULTIMA_MOD";
$proto18["m_columns"][] = "USUARIO_ULTIMA_MOD";
$obj = new SQLTable($proto18);

$proto17["m_table"] = $obj;
$proto17["m_sql"] = "GE.CATEGORIA_OCUPACION";
$proto17["m_alias"] = "";
$proto17["m_srcTableName"] = "GE.CATEGORIA_OCUPACION";
$proto19=array();
$proto19["m_sql"] = "";
$proto19["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto19["m_column"]=$obj;
$proto19["m_contained"] = array();
$proto19["m_strCase"] = "";
$proto19["m_havingmode"] = false;
$proto19["m_inBrackets"] = false;
$proto19["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto19);

$proto17["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto17);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="GE.CATEGORIA_OCUPACION";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_GE_CATEGORIA_OCUPACION = createSqlQuery_GE_CATEGORIA_OCUPACION();


	
						
	
$tdataGE_CATEGORIA_OCUPACION[".sqlquery"] = $queryData_GE_CATEGORIA_OCUPACION;

$tableEvents["GE.CATEGORIA_OCUPACION"] = new eventsBase;
$tdataGE_CATEGORIA_OCUPACION[".hasEvents"] = false;

?>