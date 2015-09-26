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
    
    
    
    class GE_NIVEL_EDUCACIONPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new OracleConnectionFactory(),
                GetConnectionOptions(),
                '"GE"."NIVEL_EDUCACION"');
            $field = new IntegerField('NIVEL_EDUCACION_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('GRADO');
            $this->dataset->AddField($field, false);
            $field = new DateField('FEC_CREACION');
            $this->dataset->AddField($field, false);
            $field = new StringField('USUARIO_CREACION');
            $this->dataset->AddField($field, false);
            $field = new DateField('FEC_ULTIMA_MOD');
            $this->dataset->AddField($field, false);
            $field = new StringField('USUARIO_ULTIMA_MOD');
            $this->dataset->AddField($field, false);
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
            $grid->SearchControl = new SimpleSearch('GE_NIVEL_EDUCACIONssearch', $this->dataset,
                array('NIVEL_EDUCACION_ID', 'GRADO', 'FEC_CREACION', 'USUARIO_CREACION', 'FEC_ULTIMA_MOD', 'USUARIO_ULTIMA_MOD'),
                array($this->RenderText('NIVEL EDUCACION ID'), $this->RenderText('GRADO'), $this->RenderText('FEC CREACION'), $this->RenderText('USUARIO CREACION'), $this->RenderText('FEC ULTIMA MOD'), $this->RenderText('USUARIO ULTIMA MOD')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('GE_NIVEL_EDUCACIONasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->setTimerInterval(1000);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('NIVEL_EDUCACION_ID', $this->RenderText('NIVEL EDUCACION ID')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('GRADO', $this->RenderText('GRADO')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('FEC_CREACION', $this->RenderText('FEC CREACION'), 'Y-m-d'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('USUARIO_CREACION', $this->RenderText('USUARIO CREACION')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('FEC_ULTIMA_MOD', $this->RenderText('FEC ULTIMA MOD'), 'Y-m-d'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('USUARIO_ULTIMA_MOD', $this->RenderText('USUARIO ULTIMA MOD')));
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
            // View column for NIVEL_EDUCACION_ID field
            //
            $column = new TextViewColumn('NIVEL_EDUCACION_ID', 'NIVEL EDUCACION ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for GRADO field
            //
            $column = new TextViewColumn('GRADO', 'GRADO', $this->dataset);
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
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for NIVEL_EDUCACION_ID field
            //
            $column = new TextViewColumn('NIVEL_EDUCACION_ID', 'NIVEL EDUCACION ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for GRADO field
            //
            $column = new TextViewColumn('GRADO', 'GRADO', $this->dataset);
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
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for NIVEL_EDUCACION_ID field
            //
            $editor = new TextEdit('nivel_educacion_id_edit');
            $editColumn = new CustomEditColumn('NIVEL EDUCACION ID', 'NIVEL_EDUCACION_ID', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for GRADO field
            //
            $editor = new TextEdit('grado_edit');
            $editor->SetSize(20);
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('GRADO', 'GRADO', $editor, $this->dataset);
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
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for NIVEL_EDUCACION_ID field
            //
            $editor = new TextEdit('nivel_educacion_id_edit');
            $editColumn = new CustomEditColumn('NIVEL EDUCACION ID', 'NIVEL_EDUCACION_ID', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for GRADO field
            //
            $editor = new TextEdit('grado_edit');
            $editor->SetSize(20);
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('GRADO', 'GRADO', $editor, $this->dataset);
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
            // View column for NIVEL_EDUCACION_ID field
            //
            $column = new TextViewColumn('NIVEL_EDUCACION_ID', 'NIVEL EDUCACION ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for GRADO field
            //
            $column = new TextViewColumn('GRADO', 'GRADO', $this->dataset);
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
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for NIVEL_EDUCACION_ID field
            //
            $column = new TextViewColumn('NIVEL_EDUCACION_ID', 'NIVEL EDUCACION ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for GRADO field
            //
            $column = new TextViewColumn('GRADO', 'GRADO', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'GE_NIVEL_EDUCACION_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'GE_NIVEL_EDUCACIONGrid');
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
        $Page = new GE_NIVEL_EDUCACIONPage("GE.NIVEL_EDUCACION.php", "GE_NIVEL_EDUCACION", GetCurrentUserGrantForDataSource("GE.NIVEL_EDUCACION"), 'UTF-8');
        $Page->SetShortCaption('GE.NIVEL EDUCACION');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('GE.NIVEL EDUCACION');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("GE.NIVEL_EDUCACION"));
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
	
