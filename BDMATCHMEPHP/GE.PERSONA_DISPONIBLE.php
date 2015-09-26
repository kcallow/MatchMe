<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php 
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */


    include_once dirname(__FILE__) . '/' . 'components/utils/check_utils.php';
    CheckPHPVersion();
    CheckTemplatesCacheFolderIsExistsAndWritable();


    include_once dirname(__FILE__) . '/' . 'phpgen_settings.php';
    include_once dirname(__FILE__) . '/' . 'database_engine/oracle_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page.php';


    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'AL32UTF8';
        GetApplication()->GetUserAuthorizationStrategy()->ApplyIdentityToConnectionOptions($result);
        return $result;
    }

    
    // OnGlobalBeforePageExecute event handler
    
    
    // OnBeforePageExecute event handler
    
    
    
    class GE_PERSONA_DISPONIBLEPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."PERSONA_DISPONIBLE"');
            $field = new StringField('USERNAME');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('ES_REAL');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('COLOR_OJOS_ID');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('COLOR_PIEL_ID');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('CONTEXTURA_ID');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('NIVEL_EDUCACION_ID');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('ESTADO_CIVIL_ID');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('FUMADOR_ID');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('BEBEDOR_ID');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('FRECUENCIA_EJERCICIO_ID');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('SALARIO_ID');
            $this->dataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $this->dataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $this->dataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $this->dataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('ALTURA');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('PESO');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('NUM_HIJOS');
            $this->dataset->AddField($field, false);
            $field = new StringField('QUIERE_HIJOS');
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('USERNAME', 'GE.PERSONA', new StringField('USERNAME'), new StringField('ES_ADMIN', 'LA1', 'LT1'), 'LT1');
            $this->dataset->AddLookupField('COLOR_OJOS_ID', 'GE.COLOR_OJOS', new IntegerField('COLOR_OJOS_ID'), new StringField('NOMBRE', 'LA2', 'LT2'), 'LT2');
            $this->dataset->AddLookupField('COLOR_PIEL_ID', 'GE.COLOR_PIEL', new IntegerField('COLOR_PIEL_ID'), new StringField('NOMBRE', 'LA3', 'LT3'), 'LT3');
            $this->dataset->AddLookupField('CONTEXTURA_ID', 'GE.CONTEXTURA', new IntegerField('CONTEXTURA_ID'), new StringField('TIPO', 'LA4', 'LT4'), 'LT4');
            $this->dataset->AddLookupField('NIVEL_EDUCACION_ID', 'GE.NIVEL_EDUCACION', new IntegerField('NIVEL_EDUCACION_ID'), new StringField('GRADO', 'LA5', 'LT5'), 'LT5');
            $this->dataset->AddLookupField('ESTADO_CIVIL_ID', 'GE.ESTADO_CIVIL', new IntegerField('ESTADO_CIVIL_ID'), new StringField('NOMBRE', 'LA6', 'LT6'), 'LT6');
            $this->dataset->AddLookupField('FUMADOR_ID', 'GE.FUMADOR', new IntegerField('FUMADOR_ID'), new StringField('TIPO', 'LA7', 'LT7'), 'LT7');
            $this->dataset->AddLookupField('BEBEDOR_ID', 'GE.BEBEDOR', new IntegerField('BEBEDOR_ID'), new StringField('TIPO', 'LA8', 'LT8'), 'LT8');
            $this->dataset->AddLookupField('FRECUENCIA_EJERCICIO_ID', 'GE.FRECUENCIA_EJERCICIO', new IntegerField('FRECUENCIA_EJERCICIO_ID'), new StringField('RANGO', 'LA9', 'LT9'), 'LT9');
            $this->dataset->AddLookupField('SALARIO_ID', 'GE.SALARIO', new IntegerField('SALARIO_ID'), new StringField('RANGO', 'LA10', 'LT10'), 'LT10');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        public function GetPageList()
        {
            $currentPageCaption = $this->GetShortCaption();
            $result = new PageList($this);
            $result->AddGroup($this->RenderText('Default'));
            if (GetCurrentUserGrantForDataSource('GE.BEBEDOR')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.BEBEDOR'), 'GE.BEBEDOR.php', $this->RenderText('GE.BEBEDOR'), $currentPageCaption == $this->RenderText('GE.BEBEDOR'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.CATEGORIA_INTERES')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.CATEGORIA INTERES'), 'GE.CATEGORIA_INTERES.php', $this->RenderText('GE.CATEGORIA INTERES'), $currentPageCaption == $this->RenderText('GE.CATEGORIA INTERES'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.CIUDAD')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.CIUDAD'), 'GE.CIUDAD.php', $this->RenderText('GE.CIUDAD'), $currentPageCaption == $this->RenderText('GE.CIUDAD'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.CATEGORIA_OCUPACION')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.CATEGORIA OCUPACION'), 'GE.CATEGORIA_OCUPACION.php', $this->RenderText('GE.CATEGORIA OCUPACION'), $currentPageCaption == $this->RenderText('GE.CATEGORIA OCUPACION'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.WINK')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.WINK'), 'GE.WINK.php', $this->RenderText('GE.WINK'), $currentPageCaption == $this->RenderText('GE.WINK'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.VISITA')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.VISITA'), 'GE.VISITA.php', $this->RenderText('GE.VISITA'), $currentPageCaption == $this->RenderText('GE.VISITA'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.RELIGION')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.RELIGION'), 'GE.RELIGION.php', $this->RenderText('GE.RELIGION'), $currentPageCaption == $this->RenderText('GE.RELIGION'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.SALARIO')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.SALARIO'), 'GE.SALARIO.php', $this->RenderText('GE.SALARIO'), $currentPageCaption == $this->RenderText('GE.SALARIO'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.PERSONA_DISPONIBLEXRELIGION')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.PERSONA DISPONIBLEXRELIGION'), 'GE.PERSONA_DISPONIBLEXRELIGION.php', $this->RenderText('GE.PERSONA DISPONIBLEXRELIGION'), $currentPageCaption == $this->RenderText('GE.PERSONA DISPONIBLEXRELIGION'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.PERSONA_DISPONIBLEXOCUPACION')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.PERSONA DISPONIBLEXOCUPACION'), 'GE.PERSONA_DISPONIBLEXOCUPACION.php', $this->RenderText('GE.PERSONA DISPONIBLEXOCUPACION'), $currentPageCaption == $this->RenderText('GE.PERSONA DISPONIBLEXOCUPACION'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.PERSONA_DISPONIBLEXINTERES')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.PERSONA DISPONIBLEXINTERES'), 'GE.PERSONA_DISPONIBLEXINTERES.php', $this->RenderText('GE.PERSONA DISPONIBLEXINTERES'), $currentPageCaption == $this->RenderText('GE.PERSONA DISPONIBLEXINTERES'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.PERSONA_DISPONIBLEXMASCOTA')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.PERSONA DISPONIBLEXMASCOTA'), 'GE.PERSONA_DISPONIBLEXMASCOTA.php', $this->RenderText('GE.PERSONA DISPONIBLEXMASCOTA'), $currentPageCaption == $this->RenderText('GE.PERSONA DISPONIBLEXMASCOTA'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.PERSONA_DISPONIBLEXIDIOMA')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.PERSONA DISPONIBLEXIDIOMA'), 'GE.PERSONA_DISPONIBLEXIDIOMA.php', $this->RenderText('GE.PERSONA DISPONIBLEXIDIOMA'), $currentPageCaption == $this->RenderText('GE.PERSONA DISPONIBLEXIDIOMA'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.PERSONA_DISPONIBLEXEJERCICIO')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.PERSONA DISPONIBLEXEJERCICIO'), 'GE.PERSONA_DISPONIBLEXEJERCICIO.php', $this->RenderText('GE.PERSONA DISPONIBLEXEJERCICIO'), $currentPageCaption == $this->RenderText('GE.PERSONA DISPONIBLEXEJERCICIO'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.PERSONA_DISPONIBLEXCOLOR_PELO')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.PERSONA DISPONIBLEXCOLOR PELO'), 'GE.PERSONA_DISPONIBLEXCOLOR_PELO.php', $this->RenderText('GE.PERSONA DISPONIBLEXCOLOR PELO'), $currentPageCaption == $this->RenderText('GE.PERSONA DISPONIBLEXCOLOR PELO'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.PERSONA_DISPONIBLE')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.PERSONA DISPONIBLE'), 'GE.PERSONA_DISPONIBLE.php', $this->RenderText('GE.PERSONA DISPONIBLE'), $currentPageCaption == $this->RenderText('GE.PERSONA DISPONIBLE'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.PERSONA')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.PERSONA'), 'GE.PERSONA.php', $this->RenderText('GE.PERSONA'), $currentPageCaption == $this->RenderText('GE.PERSONA'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.PARAMETROS')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.PARAMETROS'), 'GE.PARAMETROS.php', $this->RenderText('GE.PARAMETROS'), $currentPageCaption == $this->RenderText('GE.PARAMETROS'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.PAIS')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.PAIS'), 'GE.PAIS.php', $this->RenderText('GE.PAIS'), $currentPageCaption == $this->RenderText('GE.PAIS'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.OCUPACIONXCATEGORIA_OCUPACION')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.OCUPACIONXCATEGORIA OCUPACION'), 'GE.OCUPACIONXCATEGORIA_OCUPACION.php', $this->RenderText('GE.OCUPACIONXCATEGORIA OCUPACION'), $currentPageCaption == $this->RenderText('GE.OCUPACIONXCATEGORIA OCUPACION'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.OCUPACION')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.OCUPACION'), 'GE.OCUPACION.php', $this->RenderText('GE.OCUPACION'), $currentPageCaption == $this->RenderText('GE.OCUPACION'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.NIVEL_EDUCACION')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.NIVEL EDUCACION'), 'GE.NIVEL_EDUCACION.php', $this->RenderText('GE.NIVEL EDUCACION'), $currentPageCaption == $this->RenderText('GE.NIVEL EDUCACION'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.MASCOTA')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.MASCOTA'), 'GE.MASCOTA.php', $this->RenderText('GE.MASCOTA'), $currentPageCaption == $this->RenderText('GE.MASCOTA'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.COLOR_OJOS')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.COLOR OJOS'), 'GE.COLOR_OJOS.php', $this->RenderText('GE.COLOR OJOS'), $currentPageCaption == $this->RenderText('GE.COLOR OJOS'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.COLOR_PELO')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.COLOR PELO'), 'GE.COLOR_PELO.php', $this->RenderText('GE.COLOR PELO'), $currentPageCaption == $this->RenderText('GE.COLOR PELO'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.COLOR_PIEL')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.COLOR PIEL'), 'GE.COLOR_PIEL.php', $this->RenderText('GE.COLOR PIEL'), $currentPageCaption == $this->RenderText('GE.COLOR PIEL'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.CONTEXTURA')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.CONTEXTURA'), 'GE.CONTEXTURA.php', $this->RenderText('GE.CONTEXTURA'), $currentPageCaption == $this->RenderText('GE.CONTEXTURA'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.EJERCICIO')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.EJERCICIO'), 'GE.EJERCICIO.php', $this->RenderText('GE.EJERCICIO'), $currentPageCaption == $this->RenderText('GE.EJERCICIO'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.EMAIL')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.EMAIL'), 'GE.EMAIL.php', $this->RenderText('GE.EMAIL'), $currentPageCaption == $this->RenderText('GE.EMAIL'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.ESTADO_CIVIL')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.ESTADO CIVIL'), 'GE.ESTADO_CIVIL.php', $this->RenderText('GE.ESTADO CIVIL'), $currentPageCaption == $this->RenderText('GE.ESTADO CIVIL'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.FOTO')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.FOTO'), 'GE.FOTO.php', $this->RenderText('GE.FOTO'), $currentPageCaption == $this->RenderText('GE.FOTO'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.EVENTO')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.EVENTO'), 'GE.EVENTO.php', $this->RenderText('GE.EVENTO'), $currentPageCaption == $this->RenderText('GE.EVENTO'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.FUMADOR')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.FUMADOR'), 'GE.FUMADOR.php', $this->RenderText('GE.FUMADOR'), $currentPageCaption == $this->RenderText('GE.FUMADOR'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.INTERES')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.INTERES'), 'GE.INTERES.php', $this->RenderText('GE.INTERES'), $currentPageCaption == $this->RenderText('GE.INTERES'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.IDIOMA')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.IDIOMA'), 'GE.IDIOMA.php', $this->RenderText('GE.IDIOMA'), $currentPageCaption == $this->RenderText('GE.IDIOMA'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.GENERO')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.GENERO'), 'GE.GENERO.php', $this->RenderText('GE.GENERO'), $currentPageCaption == $this->RenderText('GE.GENERO'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.INTERESXCATEGORIA_INTERES')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.INTERESXCATEGORIA INTERES'), 'GE.INTERESXCATEGORIA_INTERES.php', $this->RenderText('GE.INTERESXCATEGORIA INTERES'), $currentPageCaption == $this->RenderText('GE.INTERESXCATEGORIA INTERES'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('GE.FRECUENCIA_EJERCICIO')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('GE.FRECUENCIA EJERCICIO'), 'GE.FRECUENCIA_EJERCICIO.php', $this->RenderText('GE.FRECUENCIA EJERCICIO'), $currentPageCaption == $this->RenderText('GE.FRECUENCIA EJERCICIO'), false, $this->RenderText('Default')));
            
            if ( HasAdminPage() && GetApplication()->HasAdminGrantForCurrentUser() ) {
              $result->AddGroup('Admin area');
              $result->AddPage(new PageLink($this->GetLocalizerCaptions()->GetMessageString('AdminPage'), 'phpgen_admin.php', $this->GetLocalizerCaptions()->GetMessageString('AdminPage'), false, false, 'Admin area'));
            }
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function CreateGridSearchControl(Grid $grid)
        {
            $grid->UseFilter = true;
            $grid->SearchControl = new SimpleSearch('GE_PERSONA_DISPONIBLEssearch', $this->dataset,
                array('LA1', 'ES_REAL', 'LA2', 'LA3', 'LA4', 'LA5', 'LA6', 'LA7', 'LA8', 'LA9', 'LA10', 'FEC_CREACION', 'USUARIO_CREACION', 'FEC_ULTIMA_MOD', 'USUARIO_ULTIMA_MOD', 'ALTURA', 'PESO', 'NUM_HIJOS', 'QUIERE_HIJOS'),
                array($this->RenderText('USERNAME'), $this->RenderText('ES REAL'), $this->RenderText('COLOR OJOS ID'), $this->RenderText('COLOR PIEL ID'), $this->RenderText('CONTEXTURA ID'), $this->RenderText('NIVEL EDUCACION ID'), $this->RenderText('ESTADO CIVIL ID'), $this->RenderText('FUMADOR ID'), $this->RenderText('BEBEDOR ID'), $this->RenderText('FRECUENCIA EJERCICIO ID'), $this->RenderText('SALARIO ID'), $this->RenderText('FEC CREACION'), $this->RenderText('USUARIO CREACION'), $this->RenderText('FEC ULTIMA MOD'), $this->RenderText('USUARIO ULTIMA MOD'), $this->RenderText('ALTURA'), $this->RenderText('PESO'), $this->RenderText('NUM HIJOS'), $this->RenderText('QUIERE HIJOS')),
                array(
                    '=' => $this->GetLocalizerCaptions()->GetMessageString('equals'),
                    '<>' => $this->GetLocalizerCaptions()->GetMessageString('doesNotEquals'),
                    '<' => $this->GetLocalizerCaptions()->GetMessageString('isLessThan'),
                    '<=' => $this->GetLocalizerCaptions()->GetMessageString('isLessThanOrEqualsTo'),
                    '>' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThan'),
                    '>=' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThanOrEqualsTo'),
                    'ILIKE' => $this->GetLocalizerCaptions()->GetMessageString('Like'),
                    'STARTS' => $this->GetLocalizerCaptions()->GetMessageString('StartsWith'),
                    'ENDS' => $this->GetLocalizerCaptions()->GetMessageString('EndsWith'),
                    'CONTAINS' => $this->GetLocalizerCaptions()->GetMessageString('Contains')
                    ), $this->GetLocalizerCaptions(), $this, 'CONTAINS'
                );
        }
    
        protected function CreateGridAdvancedSearchControl(Grid $grid)
        {
            $this->AdvancedSearchControl = new AdvancedSearchControl('GE_PERSONA_DISPONIBLEasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->setTimerInterval(1000);
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."PERSONA"');
            $field = new StringField('USERNAME');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('ES_ADMIN');
            $lookupDataset->AddField($field, false);
            $field = new DateField('NACIMIENTO');
            $lookupDataset->AddField($field, false);
            $field = new StringField('PRIMER_APELLIDO');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SEGUNDO_APELLIDO');
            $lookupDataset->AddField($field, false);
            $field = new StringField('NOMBRE');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('GENERO_ID');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('CIUDAD_ID');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SLOGAN');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('ES_ADMIN', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('USERNAME', $this->RenderText('USERNAME'), $lookupDataset, 'USERNAME', 'ES_ADMIN', false, 8));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('ES_REAL', $this->RenderText('ES REAL')));
            
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."COLOR_OJOS"');
            $field = new IntegerField('COLOR_OJOS_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('NOMBRE');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('NOMBRE', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('COLOR_OJOS_ID', $this->RenderText('COLOR OJOS ID'), $lookupDataset, 'COLOR_OJOS_ID', 'NOMBRE', false, 8));
            
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."COLOR_PIEL"');
            $field = new IntegerField('COLOR_PIEL_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('NOMBRE');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('NOMBRE', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('COLOR_PIEL_ID', $this->RenderText('COLOR PIEL ID'), $lookupDataset, 'COLOR_PIEL_ID', 'NOMBRE', false, 8));
            
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."CONTEXTURA"');
            $field = new IntegerField('CONTEXTURA_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('TIPO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('TIPO', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('CONTEXTURA_ID', $this->RenderText('CONTEXTURA ID'), $lookupDataset, 'CONTEXTURA_ID', 'TIPO', false, 8));
            
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."NIVEL_EDUCACION"');
            $field = new IntegerField('NIVEL_EDUCACION_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('GRADO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('GRADO', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('NIVEL_EDUCACION_ID', $this->RenderText('NIVEL EDUCACION ID'), $lookupDataset, 'NIVEL_EDUCACION_ID', 'GRADO', false, 8));
            
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."ESTADO_CIVIL"');
            $field = new IntegerField('ESTADO_CIVIL_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('NOMBRE');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('NOMBRE', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('ESTADO_CIVIL_ID', $this->RenderText('ESTADO CIVIL ID'), $lookupDataset, 'ESTADO_CIVIL_ID', 'NOMBRE', false, 8));
            
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."FUMADOR"');
            $field = new IntegerField('FUMADOR_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('TIPO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('TIPO', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('FUMADOR_ID', $this->RenderText('FUMADOR ID'), $lookupDataset, 'FUMADOR_ID', 'TIPO', false, 8));
            
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."BEBEDOR"');
            $field = new IntegerField('BEBEDOR_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('TIPO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('TIPO', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('BEBEDOR_ID', $this->RenderText('BEBEDOR ID'), $lookupDataset, 'BEBEDOR_ID', 'TIPO', false, 8));
            
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."FRECUENCIA_EJERCICIO"');
            $field = new IntegerField('FRECUENCIA_EJERCICIO_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('RANGO');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('RANGO', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('FRECUENCIA_EJERCICIO_ID', $this->RenderText('FRECUENCIA EJERCICIO ID'), $lookupDataset, 'FRECUENCIA_EJERCICIO_ID', 'RANGO', false, 8));
            
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."SALARIO"');
            $field = new IntegerField('SALARIO_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('RANGO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('RANGO', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('SALARIO_ID', $this->RenderText('SALARIO ID'), $lookupDataset, 'SALARIO_ID', 'RANGO', false, 8));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('FEC_CREACION', $this->RenderText('FEC CREACION'), 'Y-m-d'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('USUARIO_CREACION', $this->RenderText('USUARIO CREACION')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('FEC_ULTIMA_MOD', $this->RenderText('FEC ULTIMA MOD'), 'Y-m-d'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('USUARIO_ULTIMA_MOD', $this->RenderText('USUARIO ULTIMA MOD')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('ALTURA', $this->RenderText('ALTURA')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('PESO', $this->RenderText('PESO')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('NUM_HIJOS', $this->RenderText('NUM HIJOS')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('QUIERE_HIJOS', $this->RenderText('QUIERE HIJOS')));
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actionsBandName = 'actions';
            $grid->AddBandToBegin($actionsBandName, $this->GetLocalizerCaptions()->GetMessageString('Actions'), true);
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
            }
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->OnShow->AddListener('ShowDeleteButtonHandler', $this);
                $column->SetAdditionalAttribute('data-modal-delete', 'true');
                $column->SetAdditionalAttribute('data-delete-handler-name', $this->GetModalGridDeleteHandler());
            }
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
            }
        }
    
        protected function AddFieldColumns(Grid $grid)
        {
            //
            // View column for ES_ADMIN field
            //
            $column = new TextViewColumn('LA1', 'USERNAME', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for ES_REAL field
            //
            $column = new TextViewColumn('ES_REAL', 'ES REAL', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for NOMBRE field
            //
            $column = new TextViewColumn('LA2', 'COLOR OJOS ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for NOMBRE field
            //
            $column = new TextViewColumn('LA3', 'COLOR PIEL ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for TIPO field
            //
            $column = new TextViewColumn('LA4', 'CONTEXTURA ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for GRADO field
            //
            $column = new TextViewColumn('LA5', 'NIVEL EDUCACION ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for NOMBRE field
            //
            $column = new TextViewColumn('LA6', 'ESTADO CIVIL ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for TIPO field
            //
            $column = new TextViewColumn('LA7', 'FUMADOR ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for TIPO field
            //
            $column = new TextViewColumn('LA8', 'BEBEDOR ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for RANGO field
            //
            $column = new TextViewColumn('LA9', 'FRECUENCIA EJERCICIO ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for RANGO field
            //
            $column = new TextViewColumn('LA10', 'SALARIO ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for FEC_CREACION field
            //
            $column = new DateTimeViewColumn('FEC_CREACION', 'FEC CREACION', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for USUARIO_CREACION field
            //
            $column = new TextViewColumn('USUARIO_CREACION', 'USUARIO CREACION', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for FEC_ULTIMA_MOD field
            //
            $column = new DateTimeViewColumn('FEC_ULTIMA_MOD', 'FEC ULTIMA MOD', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for USUARIO_ULTIMA_MOD field
            //
            $column = new TextViewColumn('USUARIO_ULTIMA_MOD', 'USUARIO ULTIMA MOD', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for ALTURA field
            //
            $column = new TextViewColumn('ALTURA', 'ALTURA', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for PESO field
            //
            $column = new TextViewColumn('PESO', 'PESO', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for NUM_HIJOS field
            //
            $column = new TextViewColumn('NUM_HIJOS', 'NUM HIJOS', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for QUIERE_HIJOS field
            //
            $column = new TextViewColumn('QUIERE_HIJOS', 'QUIERE HIJOS', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for ES_ADMIN field
            //
            $column = new TextViewColumn('LA1', 'USERNAME', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ES_REAL field
            //
            $column = new TextViewColumn('ES_REAL', 'ES REAL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NOMBRE field
            //
            $column = new TextViewColumn('LA2', 'COLOR OJOS ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NOMBRE field
            //
            $column = new TextViewColumn('LA3', 'COLOR PIEL ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for TIPO field
            //
            $column = new TextViewColumn('LA4', 'CONTEXTURA ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for GRADO field
            //
            $column = new TextViewColumn('LA5', 'NIVEL EDUCACION ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NOMBRE field
            //
            $column = new TextViewColumn('LA6', 'ESTADO CIVIL ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for TIPO field
            //
            $column = new TextViewColumn('LA7', 'FUMADOR ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for TIPO field
            //
            $column = new TextViewColumn('LA8', 'BEBEDOR ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for RANGO field
            //
            $column = new TextViewColumn('LA9', 'FRECUENCIA EJERCICIO ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for RANGO field
            //
            $column = new TextViewColumn('LA10', 'SALARIO ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for FEC_CREACION field
            //
            $column = new DateTimeViewColumn('FEC_CREACION', 'FEC CREACION', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for USUARIO_CREACION field
            //
            $column = new TextViewColumn('USUARIO_CREACION', 'USUARIO CREACION', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for FEC_ULTIMA_MOD field
            //
            $column = new DateTimeViewColumn('FEC_ULTIMA_MOD', 'FEC ULTIMA MOD', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for USUARIO_ULTIMA_MOD field
            //
            $column = new TextViewColumn('USUARIO_ULTIMA_MOD', 'USUARIO ULTIMA MOD', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ALTURA field
            //
            $column = new TextViewColumn('ALTURA', 'ALTURA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for PESO field
            //
            $column = new TextViewColumn('PESO', 'PESO', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NUM_HIJOS field
            //
            $column = new TextViewColumn('NUM_HIJOS', 'NUM HIJOS', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for QUIERE_HIJOS field
            //
            $column = new TextViewColumn('QUIERE_HIJOS', 'QUIERE HIJOS', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for USERNAME field
            //
            $editor = new ComboBox('username_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."PERSONA"');
            $field = new StringField('USERNAME');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('ES_ADMIN');
            $lookupDataset->AddField($field, false);
            $field = new DateField('NACIMIENTO');
            $lookupDataset->AddField($field, false);
            $field = new StringField('PRIMER_APELLIDO');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SEGUNDO_APELLIDO');
            $lookupDataset->AddField($field, false);
            $field = new StringField('NOMBRE');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('GENERO_ID');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('CIUDAD_ID');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SLOGAN');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('ES_ADMIN', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'USERNAME', 
                'USERNAME', 
                $editor, 
                $this->dataset, 'USERNAME', 'ES_ADMIN', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ES_REAL field
            //
            $editor = new TextEdit('es_real_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('ES REAL', 'ES_REAL', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for COLOR_OJOS_ID field
            //
            $editor = new ComboBox('color_ojos_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."COLOR_OJOS"');
            $field = new IntegerField('COLOR_OJOS_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('NOMBRE');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('NOMBRE', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'COLOR OJOS ID', 
                'COLOR_OJOS_ID', 
                $editor, 
                $this->dataset, 'COLOR_OJOS_ID', 'NOMBRE', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for COLOR_PIEL_ID field
            //
            $editor = new ComboBox('color_piel_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."COLOR_PIEL"');
            $field = new IntegerField('COLOR_PIEL_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('NOMBRE');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('NOMBRE', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'COLOR PIEL ID', 
                'COLOR_PIEL_ID', 
                $editor, 
                $this->dataset, 'COLOR_PIEL_ID', 'NOMBRE', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for CONTEXTURA_ID field
            //
            $editor = new ComboBox('contextura_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."CONTEXTURA"');
            $field = new IntegerField('CONTEXTURA_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('TIPO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('TIPO', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'CONTEXTURA ID', 
                'CONTEXTURA_ID', 
                $editor, 
                $this->dataset, 'CONTEXTURA_ID', 'TIPO', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for NIVEL_EDUCACION_ID field
            //
            $editor = new ComboBox('nivel_educacion_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."NIVEL_EDUCACION"');
            $field = new IntegerField('NIVEL_EDUCACION_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('GRADO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('GRADO', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'NIVEL EDUCACION ID', 
                'NIVEL_EDUCACION_ID', 
                $editor, 
                $this->dataset, 'NIVEL_EDUCACION_ID', 'GRADO', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ESTADO_CIVIL_ID field
            //
            $editor = new ComboBox('estado_civil_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."ESTADO_CIVIL"');
            $field = new IntegerField('ESTADO_CIVIL_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('NOMBRE');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('NOMBRE', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'ESTADO CIVIL ID', 
                'ESTADO_CIVIL_ID', 
                $editor, 
                $this->dataset, 'ESTADO_CIVIL_ID', 'NOMBRE', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for FUMADOR_ID field
            //
            $editor = new ComboBox('fumador_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."FUMADOR"');
            $field = new IntegerField('FUMADOR_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('TIPO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('TIPO', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'FUMADOR ID', 
                'FUMADOR_ID', 
                $editor, 
                $this->dataset, 'FUMADOR_ID', 'TIPO', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for BEBEDOR_ID field
            //
            $editor = new ComboBox('bebedor_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."BEBEDOR"');
            $field = new IntegerField('BEBEDOR_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('TIPO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('TIPO', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'BEBEDOR ID', 
                'BEBEDOR_ID', 
                $editor, 
                $this->dataset, 'BEBEDOR_ID', 'TIPO', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for FRECUENCIA_EJERCICIO_ID field
            //
            $editor = new ComboBox('frecuencia_ejercicio_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."FRECUENCIA_EJERCICIO"');
            $field = new IntegerField('FRECUENCIA_EJERCICIO_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('RANGO');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('RANGO', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'FRECUENCIA EJERCICIO ID', 
                'FRECUENCIA_EJERCICIO_ID', 
                $editor, 
                $this->dataset, 'FRECUENCIA_EJERCICIO_ID', 'RANGO', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SALARIO_ID field
            //
            $editor = new ComboBox('salario_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."SALARIO"');
            $field = new IntegerField('SALARIO_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('RANGO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('RANGO', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'SALARIO ID', 
                'SALARIO_ID', 
                $editor, 
                $this->dataset, 'SALARIO_ID', 'RANGO', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for FEC_CREACION field
            //
            $editor = new DateTimeEdit('fec_creacion_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('FEC CREACION', 'FEC_CREACION', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for USUARIO_CREACION field
            //
            $editor = new TextEdit('usuario_creacion_edit');
            $editor->SetSize(10);
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('USUARIO CREACION', 'USUARIO_CREACION', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for FEC_ULTIMA_MOD field
            //
            $editor = new DateTimeEdit('fec_ultima_mod_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('FEC ULTIMA MOD', 'FEC_ULTIMA_MOD', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for USUARIO_ULTIMA_MOD field
            //
            $editor = new TextEdit('usuario_ultima_mod_edit');
            $editor->SetSize(10);
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('USUARIO ULTIMA MOD', 'USUARIO_ULTIMA_MOD', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ALTURA field
            //
            $editor = new TextEdit('altura_edit');
            $editColumn = new CustomEditColumn('ALTURA', 'ALTURA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for PESO field
            //
            $editor = new TextEdit('peso_edit');
            $editColumn = new CustomEditColumn('PESO', 'PESO', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for NUM_HIJOS field
            //
            $editor = new TextEdit('num_hijos_edit');
            $editColumn = new CustomEditColumn('NUM HIJOS', 'NUM_HIJOS', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for QUIERE_HIJOS field
            //
            $editor = new TextEdit('quiere_hijos_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('QUIERE HIJOS', 'QUIERE_HIJOS', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for USERNAME field
            //
            $editor = new ComboBox('username_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."PERSONA"');
            $field = new StringField('USERNAME');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('ES_ADMIN');
            $lookupDataset->AddField($field, false);
            $field = new DateField('NACIMIENTO');
            $lookupDataset->AddField($field, false);
            $field = new StringField('PRIMER_APELLIDO');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SEGUNDO_APELLIDO');
            $lookupDataset->AddField($field, false);
            $field = new StringField('NOMBRE');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('GENERO_ID');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('CIUDAD_ID');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SLOGAN');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('ES_ADMIN', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'USERNAME', 
                'USERNAME', 
                $editor, 
                $this->dataset, 'USERNAME', 'ES_ADMIN', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ES_REAL field
            //
            $editor = new TextEdit('es_real_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('ES REAL', 'ES_REAL', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for COLOR_OJOS_ID field
            //
            $editor = new ComboBox('color_ojos_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."COLOR_OJOS"');
            $field = new IntegerField('COLOR_OJOS_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('NOMBRE');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('NOMBRE', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'COLOR OJOS ID', 
                'COLOR_OJOS_ID', 
                $editor, 
                $this->dataset, 'COLOR_OJOS_ID', 'NOMBRE', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for COLOR_PIEL_ID field
            //
            $editor = new ComboBox('color_piel_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."COLOR_PIEL"');
            $field = new IntegerField('COLOR_PIEL_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('NOMBRE');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('NOMBRE', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'COLOR PIEL ID', 
                'COLOR_PIEL_ID', 
                $editor, 
                $this->dataset, 'COLOR_PIEL_ID', 'NOMBRE', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for CONTEXTURA_ID field
            //
            $editor = new ComboBox('contextura_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."CONTEXTURA"');
            $field = new IntegerField('CONTEXTURA_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('TIPO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('TIPO', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'CONTEXTURA ID', 
                'CONTEXTURA_ID', 
                $editor, 
                $this->dataset, 'CONTEXTURA_ID', 'TIPO', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for NIVEL_EDUCACION_ID field
            //
            $editor = new ComboBox('nivel_educacion_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."NIVEL_EDUCACION"');
            $field = new IntegerField('NIVEL_EDUCACION_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('GRADO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('GRADO', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'NIVEL EDUCACION ID', 
                'NIVEL_EDUCACION_ID', 
                $editor, 
                $this->dataset, 'NIVEL_EDUCACION_ID', 'GRADO', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ESTADO_CIVIL_ID field
            //
            $editor = new ComboBox('estado_civil_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."ESTADO_CIVIL"');
            $field = new IntegerField('ESTADO_CIVIL_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('NOMBRE');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('NOMBRE', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'ESTADO CIVIL ID', 
                'ESTADO_CIVIL_ID', 
                $editor, 
                $this->dataset, 'ESTADO_CIVIL_ID', 'NOMBRE', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for FUMADOR_ID field
            //
            $editor = new ComboBox('fumador_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."FUMADOR"');
            $field = new IntegerField('FUMADOR_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('TIPO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('TIPO', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'FUMADOR ID', 
                'FUMADOR_ID', 
                $editor, 
                $this->dataset, 'FUMADOR_ID', 'TIPO', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for BEBEDOR_ID field
            //
            $editor = new ComboBox('bebedor_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."BEBEDOR"');
            $field = new IntegerField('BEBEDOR_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('TIPO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('TIPO', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'BEBEDOR ID', 
                'BEBEDOR_ID', 
                $editor, 
                $this->dataset, 'BEBEDOR_ID', 'TIPO', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for FRECUENCIA_EJERCICIO_ID field
            //
            $editor = new ComboBox('frecuencia_ejercicio_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."FRECUENCIA_EJERCICIO"');
            $field = new IntegerField('FRECUENCIA_EJERCICIO_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('RANGO');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('RANGO', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'FRECUENCIA EJERCICIO ID', 
                'FRECUENCIA_EJERCICIO_ID', 
                $editor, 
                $this->dataset, 'FRECUENCIA_EJERCICIO_ID', 'RANGO', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SALARIO_ID field
            //
            $editor = new ComboBox('salario_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."SALARIO"');
            $field = new IntegerField('SALARIO_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('RANGO');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $lookupDataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('RANGO', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'SALARIO ID', 
                'SALARIO_ID', 
                $editor, 
                $this->dataset, 'SALARIO_ID', 'RANGO', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for FEC_CREACION field
            //
            $editor = new DateTimeEdit('fec_creacion_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('FEC CREACION', 'FEC_CREACION', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for USUARIO_CREACION field
            //
            $editor = new TextEdit('usuario_creacion_edit');
            $editor->SetSize(10);
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('USUARIO CREACION', 'USUARIO_CREACION', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for FEC_ULTIMA_MOD field
            //
            $editor = new DateTimeEdit('fec_ultima_mod_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('FEC ULTIMA MOD', 'FEC_ULTIMA_MOD', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for USUARIO_ULTIMA_MOD field
            //
            $editor = new TextEdit('usuario_ultima_mod_edit');
            $editor->SetSize(10);
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('USUARIO ULTIMA MOD', 'USUARIO_ULTIMA_MOD', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ALTURA field
            //
            $editor = new TextEdit('altura_edit');
            $editColumn = new CustomEditColumn('ALTURA', 'ALTURA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for PESO field
            //
            $editor = new TextEdit('peso_edit');
            $editColumn = new CustomEditColumn('PESO', 'PESO', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for NUM_HIJOS field
            //
            $editor = new TextEdit('num_hijos_edit');
            $editColumn = new CustomEditColumn('NUM HIJOS', 'NUM_HIJOS', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for QUIERE_HIJOS field
            //
            $editor = new TextEdit('quiere_hijos_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('QUIERE HIJOS', 'QUIERE_HIJOS', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $grid->SetShowAddButton(true);
                $grid->SetShowInlineAddButton(false);
            }
            else
            {
                $grid->SetShowInlineAddButton(false);
                $grid->SetShowAddButton(false);
            }
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for ES_ADMIN field
            //
            $column = new TextViewColumn('LA1', 'USERNAME', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ES_REAL field
            //
            $column = new TextViewColumn('ES_REAL', 'ES REAL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for NOMBRE field
            //
            $column = new TextViewColumn('LA2', 'COLOR OJOS ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for NOMBRE field
            //
            $column = new TextViewColumn('LA3', 'COLOR PIEL ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for TIPO field
            //
            $column = new TextViewColumn('LA4', 'CONTEXTURA ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for GRADO field
            //
            $column = new TextViewColumn('LA5', 'NIVEL EDUCACION ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for NOMBRE field
            //
            $column = new TextViewColumn('LA6', 'ESTADO CIVIL ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for TIPO field
            //
            $column = new TextViewColumn('LA7', 'FUMADOR ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for TIPO field
            //
            $column = new TextViewColumn('LA8', 'BEBEDOR ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for RANGO field
            //
            $column = new TextViewColumn('LA9', 'FRECUENCIA EJERCICIO ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for RANGO field
            //
            $column = new TextViewColumn('LA10', 'SALARIO ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for FEC_CREACION field
            //
            $column = new DateTimeViewColumn('FEC_CREACION', 'FEC CREACION', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for USUARIO_CREACION field
            //
            $column = new TextViewColumn('USUARIO_CREACION', 'USUARIO CREACION', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for FEC_ULTIMA_MOD field
            //
            $column = new DateTimeViewColumn('FEC_ULTIMA_MOD', 'FEC ULTIMA MOD', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for USUARIO_ULTIMA_MOD field
            //
            $column = new TextViewColumn('USUARIO_ULTIMA_MOD', 'USUARIO ULTIMA MOD', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ALTURA field
            //
            $column = new TextViewColumn('ALTURA', 'ALTURA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for PESO field
            //
            $column = new TextViewColumn('PESO', 'PESO', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for NUM_HIJOS field
            //
            $column = new TextViewColumn('NUM_HIJOS', 'NUM HIJOS', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for QUIERE_HIJOS field
            //
            $column = new TextViewColumn('QUIERE_HIJOS', 'QUIERE HIJOS', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for ES_ADMIN field
            //
            $column = new TextViewColumn('LA1', 'USERNAME', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ES_REAL field
            //
            $column = new TextViewColumn('ES_REAL', 'ES REAL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for NOMBRE field
            //
            $column = new TextViewColumn('LA2', 'COLOR OJOS ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for NOMBRE field
            //
            $column = new TextViewColumn('LA3', 'COLOR PIEL ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for TIPO field
            //
            $column = new TextViewColumn('LA4', 'CONTEXTURA ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for GRADO field
            //
            $column = new TextViewColumn('LA5', 'NIVEL EDUCACION ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for NOMBRE field
            //
            $column = new TextViewColumn('LA6', 'ESTADO CIVIL ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for TIPO field
            //
            $column = new TextViewColumn('LA7', 'FUMADOR ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for TIPO field
            //
            $column = new TextViewColumn('LA8', 'BEBEDOR ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for RANGO field
            //
            $column = new TextViewColumn('LA9', 'FRECUENCIA EJERCICIO ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for RANGO field
            //
            $column = new TextViewColumn('LA10', 'SALARIO ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for FEC_CREACION field
            //
            $column = new DateTimeViewColumn('FEC_CREACION', 'FEC CREACION', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for USUARIO_CREACION field
            //
            $column = new TextViewColumn('USUARIO_CREACION', 'USUARIO CREACION', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for FEC_ULTIMA_MOD field
            //
            $column = new DateTimeViewColumn('FEC_ULTIMA_MOD', 'FEC ULTIMA MOD', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for USUARIO_ULTIMA_MOD field
            //
            $column = new TextViewColumn('USUARIO_ULTIMA_MOD', 'USUARIO ULTIMA MOD', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ALTURA field
            //
            $column = new TextViewColumn('ALTURA', 'ALTURA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for PESO field
            //
            $column = new TextViewColumn('PESO', 'PESO', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for NUM_HIJOS field
            //
            $column = new TextViewColumn('NUM_HIJOS', 'NUM HIJOS', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for QUIERE_HIJOS field
            //
            $column = new TextViewColumn('QUIERE_HIJOS', 'QUIERE HIJOS', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        public function ShowEditButtonHandler(&$show)
        {
            if ($this->GetRecordPermission() != null)
                $show = $this->GetRecordPermission()->HasEditGrant($this->GetDataset());
        }
        public function ShowDeleteButtonHandler(&$show)
        {
            if ($this->GetRecordPermission() != null)
                $show = $this->GetRecordPermission()->HasDeleteGrant($this->GetDataset());
        }
        
        public function GetModalGridDeleteHandler() { return 'GE_PERSONA_DISPONIBLE_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'GE_PERSONA_DISPONIBLEGrid');
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(false);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(false);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->CreateGridSearchControl($result);
            $this->CreateGridAdvancedSearchControl($result);
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
    
            $this->SetShowPageList(true);
            $this->SetHidePageListByDefault(false);
            $this->SetExportToExcelAvailable(false);
            $this->SetExportToWordAvailable(false);
            $this->SetExportToXmlAvailable(false);
            $this->SetExportToCsvAvailable(false);
            $this->SetExportToPdfAvailable(false);
            $this->SetPrinterFriendlyAvailable(false);
            $this->SetSimpleSearchAvailable(true);
            $this->SetAdvancedSearchAvailable(false);
            $this->SetFilterRowAvailable(false);
            $this->SetVisualEffectsEnabled(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
    
            //
            // Http Handlers
            //
    
            return $result;
        }
        
        public function OpenAdvancedSearchByDefault()
        {
            return false;
        }
    
        protected function DoGetGridHeader()
        {
            return '';
        }
    }



    try
    {
        $Page = new GE_PERSONA_DISPONIBLEPage("GE.PERSONA_DISPONIBLE.php", "GE_PERSONA_DISPONIBLE", GetCurrentUserGrantForDataSource("GE.PERSONA_DISPONIBLE"), 'UTF-8');
        $Page->SetShortCaption('GE.PERSONA DISPONIBLE');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('GE.PERSONA DISPONIBLE');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("GE.PERSONA_DISPONIBLE"));
        GetApplication()->SetEnableLessRunTimeCompile(GetEnableLessFilesRunTimeCompilation());
        GetApplication()->SetCanUserChangeOwnPassword(
            !function_exists('CanUserChangeOwnPassword') || CanUserChangeOwnPassword());
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e->getMessage());
    }
	
