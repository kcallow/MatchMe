<?php

//  define('SHOW_VARIABLES', 1);
//  define('DEBUG_LEVEL', 1);

//  error_reporting(E_ALL ^ E_NOTICE);
//  ini_set('display_errors', 'On');

set_include_path('.' . PATH_SEPARATOR . get_include_path());


include_once dirname(__FILE__) . '/' . 'components/utils/system_utils.php';

//  SystemUtils::DisableMagicQuotesRuntime();

SystemUtils::SetTimeZoneIfNeed('America/Tegucigalpa');

function GetGlobalConnectionOptions()
{
    return array(
  'username' => 'ge',
  'password' => 'ge',
  'database' => 'BDMATCHME'
);
}

function HasAdminPage()
{
    return false;
}

function GetPageGroups()
{
    $result = array('Default');
    return $result;
}

function GetPageInfos()
{
    $result = array();
    $result[] = array('caption' => 'GE.BEBEDOR', 'short_caption' => 'GE.BEBEDOR', 'filename' => 'GE.BEBEDOR.php', 'name' => 'GE.BEBEDOR', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.CATEGORIA INTERES', 'short_caption' => 'GE.CATEGORIA INTERES', 'filename' => 'GE.CATEGORIA_INTERES.php', 'name' => 'GE.CATEGORIA_INTERES', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.CIUDAD', 'short_caption' => 'GE.CIUDAD', 'filename' => 'GE.CIUDAD.php', 'name' => 'GE.CIUDAD', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.CATEGORIA OCUPACION', 'short_caption' => 'GE.CATEGORIA OCUPACION', 'filename' => 'GE.CATEGORIA_OCUPACION.php', 'name' => 'GE.CATEGORIA_OCUPACION', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.WINK', 'short_caption' => 'GE.WINK', 'filename' => 'GE.WINK.php', 'name' => 'GE.WINK', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.VISITA', 'short_caption' => 'GE.VISITA', 'filename' => 'GE.VISITA.php', 'name' => 'GE.VISITA', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.RELIGION', 'short_caption' => 'GE.RELIGION', 'filename' => 'GE.RELIGION.php', 'name' => 'GE.RELIGION', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.SALARIO', 'short_caption' => 'GE.SALARIO', 'filename' => 'GE.SALARIO.php', 'name' => 'GE.SALARIO', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.PERSONA DISPONIBLEXRELIGION', 'short_caption' => 'GE.PERSONA DISPONIBLEXRELIGION', 'filename' => 'GE.PERSONA_DISPONIBLEXRELIGION.php', 'name' => 'GE.PERSONA_DISPONIBLEXRELIGION', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.PERSONA DISPONIBLEXOCUPACION', 'short_caption' => 'GE.PERSONA DISPONIBLEXOCUPACION', 'filename' => 'GE.PERSONA_DISPONIBLEXOCUPACION.php', 'name' => 'GE.PERSONA_DISPONIBLEXOCUPACION', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.PERSONA DISPONIBLEXINTERES', 'short_caption' => 'GE.PERSONA DISPONIBLEXINTERES', 'filename' => 'GE.PERSONA_DISPONIBLEXINTERES.php', 'name' => 'GE.PERSONA_DISPONIBLEXINTERES', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.PERSONA DISPONIBLEXMASCOTA', 'short_caption' => 'GE.PERSONA DISPONIBLEXMASCOTA', 'filename' => 'GE.PERSONA_DISPONIBLEXMASCOTA.php', 'name' => 'GE.PERSONA_DISPONIBLEXMASCOTA', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.PERSONA DISPONIBLEXIDIOMA', 'short_caption' => 'GE.PERSONA DISPONIBLEXIDIOMA', 'filename' => 'GE.PERSONA_DISPONIBLEXIDIOMA.php', 'name' => 'GE.PERSONA_DISPONIBLEXIDIOMA', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.PERSONA DISPONIBLEXEJERCICIO', 'short_caption' => 'GE.PERSONA DISPONIBLEXEJERCICIO', 'filename' => 'GE.PERSONA_DISPONIBLEXEJERCICIO.php', 'name' => 'GE.PERSONA_DISPONIBLEXEJERCICIO', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.PERSONA DISPONIBLEXCOLOR PELO', 'short_caption' => 'GE.PERSONA DISPONIBLEXCOLOR PELO', 'filename' => 'GE.PERSONA_DISPONIBLEXCOLOR_PELO.php', 'name' => 'GE.PERSONA_DISPONIBLEXCOLOR_PELO', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.PERSONA DISPONIBLE', 'short_caption' => 'GE.PERSONA DISPONIBLE', 'filename' => 'GE.PERSONA_DISPONIBLE.php', 'name' => 'GE.PERSONA_DISPONIBLE', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.PERSONA', 'short_caption' => 'GE.PERSONA', 'filename' => 'GE.PERSONA.php', 'name' => 'GE.PERSONA', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.PARAMETROS', 'short_caption' => 'GE.PARAMETROS', 'filename' => 'GE.PARAMETROS.php', 'name' => 'GE.PARAMETROS', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.PAIS', 'short_caption' => 'GE.PAIS', 'filename' => 'GE.PAIS.php', 'name' => 'GE.PAIS', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.OCUPACIONXCATEGORIA OCUPACION', 'short_caption' => 'GE.OCUPACIONXCATEGORIA OCUPACION', 'filename' => 'GE.OCUPACIONXCATEGORIA_OCUPACION.php', 'name' => 'GE.OCUPACIONXCATEGORIA_OCUPACION', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.OCUPACION', 'short_caption' => 'GE.OCUPACION', 'filename' => 'GE.OCUPACION.php', 'name' => 'GE.OCUPACION', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.NIVEL EDUCACION', 'short_caption' => 'GE.NIVEL EDUCACION', 'filename' => 'GE.NIVEL_EDUCACION.php', 'name' => 'GE.NIVEL_EDUCACION', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.MASCOTA', 'short_caption' => 'GE.MASCOTA', 'filename' => 'GE.MASCOTA.php', 'name' => 'GE.MASCOTA', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.COLOR OJOS', 'short_caption' => 'GE.COLOR OJOS', 'filename' => 'GE.COLOR_OJOS.php', 'name' => 'GE.COLOR_OJOS', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.COLOR PELO', 'short_caption' => 'GE.COLOR PELO', 'filename' => 'GE.COLOR_PELO.php', 'name' => 'GE.COLOR_PELO', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.COLOR PIEL', 'short_caption' => 'GE.COLOR PIEL', 'filename' => 'GE.COLOR_PIEL.php', 'name' => 'GE.COLOR_PIEL', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.CONTEXTURA', 'short_caption' => 'GE.CONTEXTURA', 'filename' => 'GE.CONTEXTURA.php', 'name' => 'GE.CONTEXTURA', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.EJERCICIO', 'short_caption' => 'GE.EJERCICIO', 'filename' => 'GE.EJERCICIO.php', 'name' => 'GE.EJERCICIO', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.EMAIL', 'short_caption' => 'GE.EMAIL', 'filename' => 'GE.EMAIL.php', 'name' => 'GE.EMAIL', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.ESTADO CIVIL', 'short_caption' => 'GE.ESTADO CIVIL', 'filename' => 'GE.ESTADO_CIVIL.php', 'name' => 'GE.ESTADO_CIVIL', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.FOTO', 'short_caption' => 'GE.FOTO', 'filename' => 'GE.FOTO.php', 'name' => 'GE.FOTO', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.EVENTO', 'short_caption' => 'GE.EVENTO', 'filename' => 'GE.EVENTO.php', 'name' => 'GE.EVENTO', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.FUMADOR', 'short_caption' => 'GE.FUMADOR', 'filename' => 'GE.FUMADOR.php', 'name' => 'GE.FUMADOR', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.INTERES', 'short_caption' => 'GE.INTERES', 'filename' => 'GE.INTERES.php', 'name' => 'GE.INTERES', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.IDIOMA', 'short_caption' => 'GE.IDIOMA', 'filename' => 'GE.IDIOMA.php', 'name' => 'GE.IDIOMA', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.GENERO', 'short_caption' => 'GE.GENERO', 'filename' => 'GE.GENERO.php', 'name' => 'GE.GENERO', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.INTERESXCATEGORIA INTERES', 'short_caption' => 'GE.INTERESXCATEGORIA INTERES', 'filename' => 'GE.INTERESXCATEGORIA_INTERES.php', 'name' => 'GE.INTERESXCATEGORIA_INTERES', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'GE.FRECUENCIA EJERCICIO', 'short_caption' => 'GE.FRECUENCIA EJERCICIO', 'filename' => 'GE.FRECUENCIA_EJERCICIO.php', 'name' => 'GE.FRECUENCIA_EJERCICIO', 'group_name' => 'Default', 'add_separator' => false);
    return $result;
}

function GetPagesHeader()
{
    return
    '';
}

function GetPagesFooter()
{
    return
        ''; 
    }

function ApplyCommonPageSettings(Page $page, Grid $grid)
{
    $page->SetShowUserAuthBar(false);
    $page->OnCustomHTMLHeader->AddListener('Global_CustomHTMLHeaderHandler');
    $page->OnGetCustomTemplate->AddListener('Global_GetCustomTemplateHandler');
    $grid->BeforeUpdateRecord->AddListener('Global_BeforeUpdateHandler');
    $grid->BeforeDeleteRecord->AddListener('Global_BeforeDeleteHandler');
    $grid->BeforeInsertRecord->AddListener('Global_BeforeInsertHandler');
}

/*
  Default code page: 1252
*/
function GetAnsiEncoding() { return 'windows-1252'; }

function Global_CustomHTMLHeaderHandler($page, &$customHtmlHeaderText)
{

}

function Global_GetCustomTemplateHandler($part, $mode, &$result, &$params, Page $page = null)
{

}

function Global_BeforeUpdateHandler($page, &$rowData, &$cancel, &$message, $tableName)
{

}

function Global_BeforeDeleteHandler($page, &$rowData, &$cancel, &$message, $tableName)
{

}

function Global_BeforeInsertHandler($page, &$rowData, &$cancel, &$message, $tableName)
{

}

function GetDefaultDateFormat()
{
    return 'Y-m-d';
}

function GetFirstDayOfWeek()
{
    return 0;
}

function GetEnableLessFilesRunTimeCompilation()
{
    return false;
}



?>