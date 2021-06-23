<?php   
namespace App\Http\LazyDevs;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use View;
use response;
use Schema;
use Exporter;

class LazyServices {


  public $forms_panels = [];

  public $forms_rows = [];
  
  public $forms_cols = [];
  
  public $forms_contents = [];

  public function decrypt($passphrase, $jsonString){

    $jsondata = json_decode($jsonString, true);

    $salt = hex2bin($jsondata["s"]);

    $ct = base64_decode($jsondata["ct"]);

    $iv  = hex2bin($jsondata["iv"]);

    $concatedPassphrase = $passphrase.$salt;

    $md5 = array();
    
    $md5[0] = md5($concatedPassphrase, true);

    $result = $md5[0];

    for ($i = 1; $i < 3; $i++) {

        $md5[$i] = md5($md5[$i - 1].$concatedPassphrase, true);

        $result .= $md5[$i];

    }

    $key = substr($result, 0, 32);

    $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);

    return json_decode($data, true);

}

  function getForms() {

    $collection = (object)array();

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    $collection = collect($forms);

    return $collection;

  }

  function getPanels( $formId ) {

    $collection = (object)array();

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach ($forms as $key => $value) {

      if($value->id == $formId)
      {

        $collection = $value->panels;

      }

    }

    return $collection;

  }

  function getRows( $formId, $panelId ) {

    $collection = (object)array();

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach ($forms as $key => $form) {

      if($form->id == $formId)
      {

        foreach ($form->panels as $key => $panel) {

          if($panel->id == $panelId)
          {
    
            $collection = collect($panel->rows);
    
          }
    
        }

      }

    }

    return $collection;

  }

  function getColumns( $formId, $panelId, $rowId ) {

    $collection = (object)array();

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach ($forms as $key => $form) {

      if($form->id == $formId)
      {

        foreach ($form->panels as $key => $panel) {

          if($panel->id == $panelId)
          {
            
            foreach ($panel->rows as $key => $row) {

              if($row->id == $rowId)
              {
        
                $collection = collect($row->columns);
        
              }
        
            }
    
          }
    
        }

      }

    }

    return $collection;

  }

  function getContents( $formId, $panelId, $rowId, $columnId ) {
    
    $collection = (object)array();

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach ($forms as $key => $form) {

      if($form->id == $formId)
      {

        foreach ($form->panels as $key => $panel) {

          if($panel->id == $panelId)
          {
            
            foreach ($panel->rows as $key => $row) {

              if($row->id == $rowId)
              {
                
                foreach ($row->columns as $key => $column) {

                  if($column->id == $columnId)
                  {
            
                    $collection = $column->contents;

                    // dd(  $column->contents);

                  }
            
                }
        
              }
        
            }
    
          }
    
        }

      }

    }

    return $collection;

  }

  function getFormName( $formId ) {

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach ($forms as $key => $value) {

      if($value->id == $formId)
      {

        return $value->formName;

      }

    }

  }

  function getPanelName( $formId, $panelId ) {

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach ($forms as $key => $form) {

      if($form->id == $formId)
      {

        foreach ($form->panels as $key => $panel) {

          if($panel->id == $panelId)
          {
    
            return $panel->title;
    
          }
    
        }

      }

    }

  }

  function getRowName( $formId, $panelId , $rowId ) {

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach ($forms as $key => $form) {

      if($form->id == $formId)
      {

        foreach ($form->panels as $key => $panel) {

          if($panel->id == $panelId)
          {
    
            foreach ($panel->rows as $key => $row) {

              if($row->id == $rowId)
              {
        
                return $row->title;
        
              }
        
            }
    
          }
    
        }

      }

    }

  }

  function getColumnName( $formId, $panelId, $rowId, $colId ) {

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach ($forms as $key => $form) {

      if($form->id == $formId)
      {

        foreach ($form->panels as $key => $panel) {

          if($panel->id == $panelId)
          {
    
            foreach ($panel->rows as $key => $row) {

              if($row->id == $rowId)
              {
        
                foreach ($row->columns as $key => $col) {

                  if($col->id == $colId)
                  {
            
                    return $col->title;
            
                  }
            
                }
        
              }
        
            }
    
          }
    
        }

      }

    }

  }


  function lazyInsert(Request $request)
  {

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    $TEMP = json_encode($request->all());
        
    $TEMP = json_decode($TEMP);

    $TEMP = json_decode(json_encode($TEMP), true);

    if( $TEMP['v3'] )
    {

      $DATA = base64_decode($TEMP['v3']);

      $IDS = $this->decrypt('mlqu-hash-password-2021',$DATA);

    }

    foreach($TEMP as $key => $val)
    {

      if( $key != '_token' && $key != 'v1' && $key != 'v2' && $key != 'v3' )
      {

        $NEW_DATA[$key] = $val;

      }

    }

    if($TEMP['insertType'] == 'content')
    {

      $this->addContent( $IDS['_D'], $NEW_DATA ) ;

    }

    if($TEMP['insertType'] == 'column')
    {

      $this->addColumn( $IDS['_D'], $NEW_DATA ) ;

    }

    if($TEMP['insertType'] == 'row')
    {

      $this->addRow( $IDS['_D'], $NEW_DATA ) ;

    }

    if($TEMP['insertType'] == 'panel')
    {

      $this->addPanel( $IDS['_D'], $NEW_DATA ) ;

    }

    if($TEMP['insertType'] == 'form')
    {

      $this->addForm( $NEW_DATA ) ;

    }

    return redirect()->back()->with('success-message', $TEMP['v2']);

  }

  function checkId($array, $key, $value)
  {
      $results = array();

      if (is_array($array)) {

          if (isset($array[$key]) && $array[$key] == $value) {

              $results[] = $array;

          }

          foreach ($array as $subarray) {

              $results = array_merge($results, $this->checkId($subarray, $key, $value));

          }

      }

      return $results;
  }

  function lazyUpdate(Request $request)
  {

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    $TEMP = json_encode($request->all());
        
    $TEMP = json_decode($TEMP);

    $TEMP = json_decode(json_encode($TEMP), true);

    $DATA = base64_decode($TEMP['v3']);

    $IDS = $this->decrypt('mlqu-hash-password-2021',$DATA);

    foreach($TEMP as $key => $val)
    {

      if( $key != '_token' && $key != 'v1' && $key != 'v2' && $key != 'v3' )
      {

        $NEW_DATA[$key] = $val;

      }

    }

    if($TEMP['updateType'] == 'content')
    {

      $this->updateContent( $IDS['_MD'], $this->getFormProperties($IDS['_MD'][0]), $NEW_DATA ) ;

    }

    if($TEMP['updateType'] == 'column')
    {

      $this->updateColumn( $IDS['_MD'], $this->getFormProperties($IDS['_MD'][0]), $NEW_DATA ) ;

    }

    if($TEMP['updateType'] == 'row')
    {

      $this->updateRow( $IDS['_MD'], $this->getFormProperties($IDS['_MD'][0]), $NEW_DATA ) ;

    }

    if($TEMP['updateType'] == 'panel')
    {

      $this->updatePanel( $IDS['_MD'], $this->getFormProperties($IDS['_MD'][0]), $NEW_DATA ) ;

    }

    if($TEMP['updateType'] == 'form')
    {

      $this->updateForm( $IDS['_MD'], $this->getFormProperties($IDS['_MD'][0]), $NEW_DATA ) ;

    }

    return redirect()->back()->with('success-message', $TEMP['v2']);

  }

  function lazyDelete(Request $request)
  {

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    $TEMP = json_encode($request->all());
        
    $TEMP = json_decode($TEMP);

    $TEMP = json_decode(json_encode($TEMP), true);

    $DATA = base64_decode($TEMP['v3']);


    
    $IDS = $this->decrypt('mlqu-hash-password-2021',$DATA);

    if($TEMP['deleteType'] == 'content')
    {

      $this->deleteContent( $IDS['_D'], $forms ) ;

    }

    if($TEMP['deleteType'] == 'column')
    {

      $this->deleteColumn( $IDS['_D'], $forms ) ;

    }

    if($TEMP['deleteType'] == 'row')
    {

      $this->deleteRow( $IDS['_D'], $forms ) ;

    }

    if($TEMP['deleteType'] == 'panel')
    {

      $this->deletePanel( $IDS['_D'], $forms ) ;

    }

    if($TEMP['deleteType'] == 'form')
    {

      $this->deleteForm( $IDS['_D'], $forms  ) ;

    }

    

    return redirect()->back()->with('success-message', $TEMP['v2']);

  }

  function addContent( $id, $NEW_DATA )
  {
    $dummy = (object)[
                        "id"=> "0",
                        "tc"=> "0",
                        "cc"=> "0",
                        "type"=> "text",
                        "element"=> "input",
                        "label"=> "Test",
                        "value"=> "",
                        "placeholder"=> "",
                        "pf"=> "",
                        "iV"=> "",
                        "oV"=> ""
                    ];

    $formProperties = $this->getFormProperties($id[0]);
    
    $formPanel = $formProperties->panels;

    foreach ( $formProperties->panels as $key => $panel ) {

      if( $panel->id == $id[1] )
      {
        $panelProperties = $panel;

        $formPanelRows = $panel->rows;

        foreach ( $panel->rows as $key => $row ) {
      
          if( $row->id == $id[2] )
          {

            $rowProperties = $row;

            $formRowColumns = $row->columns ;

            foreach ( $row->columns as $key => $column ) {

              if( $column->id == $id[3] )
              {

                $columnProperties = $column;
                  
                $contents = $this->getContents($id[0],$id[1],$id[2],$id[3]);

                $NEW_ENTRY = array_merge((array)$dummy, $NEW_DATA );

                if( count($contents) > 0 )
                {
                  foreach ($contents as $key => $content) {

                    $NEW_ENTRY['id'] = $this->createId((array)$content);
    
                  }
                }
                else
                {

                  $NEW_ENTRY['id'] = rand(100000,20000);

                }
                
                array_push($contents, (object)$NEW_ENTRY);
              
              }
              
            }
          
          }
          
        }
      
      }
      
    }

  
    $columnProperties->contents = $contents ;

    $rowProperties->columns =  $formRowColumns ;

    $panelProperties->rows =  $formPanelRows  ;

    $formProperties->panels = (array) $formPanel ;

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach( $forms as $key => $value)
    {

      if( $value->id == $id[0] )
      {

        $forms[$key] =(object)$formProperties;

      }
    
    }

    file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($forms, JSON_PRETTY_PRINT) );

  }

  function addColumn( $id, $NEW_DATA )
  {

    $dummy = (object)[
                        "id"=> "",
                        "title"=> "",
                        "order"=> "",
                        "type"=> "",
                        "contents"=>array()
                    ];

    $formProperties = $this->getFormProperties($id[0]);
    
    $formPanel = $formProperties->panels;

    foreach ( $formProperties->panels as $key => $panel ) {

      if( $panel->id == $id[1] )
      {
        $panelProperties = $panel;

        $formPanelRows = $panel->rows;

        foreach ( $panel->rows as $key => $row ) {
      
          if( $row->id == $id[2] )
          {

            $rowProperties = $row;

            $formRowColumns = $row->columns ;

            $NEW_ENTRY = array_merge((array)$dummy, $NEW_DATA );

            if( count($formRowColumns) > 0 )
            {
              foreach ($formRowColumns as $key => $row) {

                $NEW_ENTRY['id'] = $this->createId((array)$row);

              }
            }
            else
            {
              $NEW_ENTRY['id'] = rand(100000,20000);

            }

            array_push($formRowColumns, (object)$NEW_ENTRY);
          
          }
          
        }
      
      }
      
    }

    $rowProperties->columns =  $formRowColumns ;

    $panelProperties->rows =  $formPanelRows  ;

    $formProperties->panels = (array) $formPanel ;

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach( $forms as $key => $value)
    {

      if( $value->id == $id[0] )
      {

        $forms[$key] =(object)$formProperties;

      }
    
    }

    file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($forms, JSON_PRETTY_PRINT) );

  }

  function addRow( $id, $NEW_DATA )
  {

    $dummy = (object)[
                        "id"=> "",
                        "title"=> "",
                        "order"=> "",
                        "columns"=>array()
                    ];

    $formProperties = $this->getFormProperties($id[0]);
    
    $formPanel = $formProperties->panels;

    foreach ( $formProperties->panels as $key => $panel ) {

      if( $panel->id == $id[1] )
      {
        $panelProperties = $panel;

        $formPanelRows = $panel->rows;

        $NEW_ENTRY = array_merge( (array)$dummy, $NEW_DATA );

        if( count( $formPanelRows ) > 0 )
        {

          foreach ( $formPanelRows as $key => $row ) {

            $NEW_ENTRY['id'] = $this->createId((array)$row);

          }

        }
        else
        {

          $NEW_ENTRY['id'] = rand(100000,20000);

        }

        array_push($formPanelRows, (object)$NEW_ENTRY);
  
      }
      
    }

    $panelProperties->rows =  $formPanelRows;

    $formProperties->panels = (array) $formPanel;

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach( $forms as $key => $value)
    {

      if( $value->id == $id[0] )
      {

        $forms[$key] =(object)$formProperties;

      }
    
    }

    file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($forms, JSON_PRETTY_PRINT) );

  }

  function addPanel( $id, $NEW_DATA )
  {

    $dummy = (object)[
                        "id"=> "",
                        "title"=> "",
                        "order"=> "",
                        "rows"=>array()
                    ];

    $formProperties = $this->getFormProperties($id[0]);

    $formPanels = $formProperties->panels;

    $NEW_ENTRY = array_merge( (array)$dummy, $NEW_DATA );

    if( count( $formPanels ) > 0 )
    {

      $NEW_ENTRY['id'] = $this->createId((array)$formPanels);

    }
    else
    {

      $NEW_ENTRY['id'] = rand(100000,20000);

    }

    array_push($formPanels, (object) $NEW_ENTRY);

    $formProperties->panels = (array) $formPanels;

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach( $forms as $key => $value)
    {

      if( $value->id == $id[0] )
      {

        $forms[$key] = (object) $formProperties;

      }
    
    }

    file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($forms, JSON_PRETTY_PRINT) );

  }

  function addForm( $NEW_DATA )
  {

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    $dummy = (object)[
                        "id"=> "",
                        "formName"=> "",
                        "panels"=>array()
                    ];

    $NEW_ENTRY = array_merge( (array)$dummy, $NEW_DATA );

    if( !is_null($forms) )
    {

      $NEW_ENTRY['id'] = $this->createId((array)$forms);

      $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

      array_push($forms, (object)$NEW_ENTRY);

      file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($forms, JSON_PRETTY_PRINT) );

    }
    else
    {

      $NEW_ENTRY['id'] = rand(100000,20000);

      $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );
  
      file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode(array($NEW_ENTRY), JSON_PRETTY_PRINT) );

    }

  }

  function createId( $arr )
  {

    $isValid = false;

    $newId = rand(100000,20000);

    while(!$isValid)
    {

      if( count($this->checkId($arr, 'id',  $newId)) == 0 )
      {

         $isValid = true;
      
      }
      else
      {
        $this->createId($arr);
      }
   
    }

    return $newId;

  }

  function updateContent( $id, $formProperties, $NEW_DATA )
  {
    
    $formPanel = $formProperties->panels;

    foreach ( $formProperties->panels as $key => $panel ) {

      if( $panel->id == $id[1] )
      {
        $panelProperties = $panel;

        $formPanelRows = $panel->rows;

        foreach ( $panel->rows as $key => $row ) {
      
          if( $row->id == $id[2] )
          {

            $rowProperties = $row;

            $formRowColumns = $row->columns ;

            foreach ( $row->columns as $key => $column ) {

              if( $column->id == $id[3] )
              {

                $columnProperties = $column;
                
                $contents = array();

                foreach ( $column->contents as $key => $content ) {
                  
                  if( $content->id == $id[4] )
                  {

                    $UPDATED_DATA = array_merge( (array)$content, $NEW_DATA );

                    $UPDATED_DATA = (object)$UPDATED_DATA;
                    
                    foreach ( $content as $key => $v) {

                     $content->$key = $UPDATED_DATA->$key;

                    }
                  
                  }

                }
              
              }
              
            }
          
          }
          
        }
      
      }
      
    }

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach( $forms as $key => $value)
    {

      if( $value->id == $id[0] )
      {

        $forms[$key] =(object)$formProperties;

      }
    
    }

    file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($forms, JSON_PRETTY_PRINT) );

  }

  function updateColumn( $id, $formProperties, $NEW_DATA )
  {

    $formPanel = $formProperties->panels;

    foreach ( $formProperties->panels as $key => $panel ) {

      if( $panel->id == $id[1] )
      {
        $panelProperties = $panel;

        $formPanelRows = $panel->rows;

      

        foreach ( $panel->rows as $key => $row ) {
      
          if( $row->id == $id[2] )
          {

            $rowProperties = $row;

            $formRowColumns = $row->columns ;

            $columnProperties = array();

            foreach ( $row->columns as $key => $column ) {

              if( $column->id == $id[3] )
              {
                $UPDATED_DATA = array_merge( (array)$column, $NEW_DATA );

                $UPDATED_DATA = (object) $UPDATED_DATA;               


                foreach ($column as $key => $value) {

                  $column->$key = $UPDATED_DATA->$key;

                }

              }

              array_push($columnProperties, $column);

            }
          
          }
          
        }
      
      }
      
    }

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach( $forms as $key => $value)
    {

      if( $value->id == $id[0] )
      {

        $forms[$key] =(object)$formProperties;

      }
    
    }

    file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($forms, JSON_PRETTY_PRINT) );

  }

  function updateRow( $id, $formProperties, $NEW_DATA )
  {

    $formPanel = $formProperties->panels;

    foreach ( $formProperties->panels as $key => $panel ) {

      if( $panel->id == $id[1] )
      {

        $panelProperties = $panel;

        $formPanelRows = $panel->rows;

        foreach ( $panel->rows as $key => $row ) {
      
          if( $row->id == $id[2] )
          {

            $rowProperties = $row;

            $formRowColumns = $row->columns ;

            $UPDATED_DATA = array_merge( (array)$row, $NEW_DATA );

            $UPDATED_DATA = (object) $UPDATED_DATA;               

            foreach ( $row as $key => $value ) {

              $row->$key = $UPDATED_DATA->$key;

            }
          
          }
          
        }
      
      }
      
    }

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach( $forms as $key => $value)
    {

      if( $value->id == $id[0] )
      {

        $forms[$key] =(object)$formProperties;

      }
    
    }

    file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($forms, JSON_PRETTY_PRINT) );

  }

  function updatePanel( $id, $formProperties, $NEW_DATA )
  {

    $formPanels = $formProperties->panels;

    foreach ( $formProperties->panels as $key => $panel ) {

      if( $panel->id == $id[1] )
      {

        $UPDATED_DATA = array_merge( (array)$panel, $NEW_DATA );

        $UPDATED_DATA = (object) $UPDATED_DATA;          
        
        foreach ( $panel as $key => $value ) {

          $panel->$key = $UPDATED_DATA->$key;

        }

      }
      
    }


    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    foreach( $forms as $key => $value)
    {

      if( $value->id == $id[0] )
      {

        $forms[$key] =(object)$formProperties;

      }
    
    }

    file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($forms, JSON_PRETTY_PRINT) );

  }

  function updateForm( $id, $forms, $NEW_DATA )
  {
  
    if( $forms->id == $id[0] )
    {

      $UPDATED_DATA = array_merge( (array)$forms, $NEW_DATA );

      $UPDATED_DATA = (object) $UPDATED_DATA;          
      
      foreach ( $forms as $key => $value ) {

        $forms->$key = $UPDATED_DATA->$key;

      }

    }
    

    file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode(array($forms), JSON_PRETTY_PRINT) );

  }

  function deleteContent( $id, $forms)
  {

    foreach ($forms as $key => $form) {

      if( $form->id == $id[0] )
      {
        $formPanel = $form->panels;

        foreach ( $form->panels as $key => $panel ) {

          if( $panel->id == $id[1] )
          {
            $panelProperties = $panel;

            $formPanelRows = $panel->rows;

            foreach ( $panel->rows as $key => $row ) {
          
              if( $row->id == $id[2] )
              {

                $rowProperties = $row;

                $formRowColumns = $row->columns ;

                foreach ( $row->columns as $key => $column ) {

                  if( $column->id == $id[3] )
                  {

                    $columnProperties = $column;

                    foreach ( $column->contents as $key => $content ) {
                      
                      if( $content->id == $id[4] )
                      {

                        array_splice( $column->contents, $key, 1);

                        $contentProperties = $column->contents;

                      }
                      
                    }
                  
                  }
                  
                }
              
              }
              
            }
          
          }
          
        }

        $columnProperties->contents =  $contentProperties;

        $rowProperties->columns =  $formRowColumns;

        $panelProperties->rows =  $formPanelRows;

        $form->panels = (array) $formPanel;

        $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

        foreach( $forms as $key => $value)
        {

          if( $value->id == $id[0] )
          {

            $forms[$key] =(object)$form;

          }
        
        }

        file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($forms, JSON_PRETTY_PRINT) );

      }
      
    }
    
  }

  function deleteColumn( $id, $forms)
  {

    foreach ($forms as $key => $form) {

      if( $form->id == $id[0] )
      {
        $formPanel = $form->panels;

        foreach ( $form->panels as $key => $panel ) {

          if( $panel->id == $id[1] )
          {
            $panelProperties = $panel;

            $formPanelRows = $panel->rows;

            foreach ( $panel->rows as $key => $row ) {
          
              if( $row->id == $id[2] )
              {

                $rowProperties = $row;

                $formRowColumns = $row->columns ;

                foreach ( $row->columns as $key => $column ) {

                  if( $column->id == $id[3] )
                  {

                    array_splice( $row->columns, $key, 1);

                    $columnProperties = $row->columns;

                  }
                  
                }
              
              }
              
            }
          
          }
          
        }

        $rowProperties->columns =  $columnProperties;

        $panelProperties->rows =  $formPanelRows;

        $form->panels = (array) $formPanel;

        $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

        foreach( $forms as $key => $value)
        {

          if( $value->id == $id[0] )
          {

            $forms[$key] =(object)$form;

          }
        
        }

        file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($forms, JSON_PRETTY_PRINT) );

      }
      
    }
    
  }

  function deleteRow( $id, $forms)
  {

    foreach ($forms as $key => $form) {

      if( $form->id == $id[0] )
      {
        $formPanel = $form->panels;

        foreach ( $form->panels as $key => $panel ) {

          if( $panel->id == $id[1] )
          {
            $panelProperties = $panel;

            $formPanelRows = $panel->rows;

            foreach ( $panel->rows as $key => $row ) {
          
              if( $row->id == $id[2] )
              {

                $rowProperties = $row;
               
                array_splice( $panel->rows, $key, 1);

                $formPanelRows = $panel->rows ;
              
              }
              
            }
          
          }
          
        }

        $panelProperties->rows =  $formPanelRows;

        $form->panels = (array) $formPanel;

        $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

        foreach( $forms as $key => $value)
        {

          if( $value->id == $id[0] )
          {

            $forms[$key] = (object)$form;

          }
        
        }

        file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($forms, JSON_PRETTY_PRINT) );

      }
      
    }
    
  }

  function deletePanel( $id, $forms)
  {

    foreach ($forms as $key => $form) {

      if( $form->id == $id[0] )
      {
        $formPanel = $form->panels;

        foreach ( $form->panels as $key => $panel ) {

          if( $panel->id == $id[1] )
          {
           

            array_splice( $form->panels, $key, 1);

            $formPanel = $form->panels;
          
          }
          
        }



        $form->panels = (array) $formPanel;

        $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

        foreach( $forms as $key => $value)
        {

          if( $value->id == $id[0] )
          {

            $forms[$key] = (object)$form;

          }
        
        }

        file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($forms, JSON_PRETTY_PRINT) );

      }
      
    }
    
  }

  function deleteForm( $id, $forms )
  {

    foreach ($forms as $key => $form) {

      if( $form->id == $id[0] )
      {

        array_splice( $forms, $key, 1);

        $outputForm = $forms;

      }
 
    }

    file_put_contents( $_SERVER["DOCUMENT_ROOT"].'..\..\public\LD\func\zForms.json' , json_encode($outputForm, JSON_PRETTY_PRINT) );
    
  }

  function getFormProperties( $id )
  {

    $forms = json_decode( file_get_contents( asset('LD/func/zForms.json') ) );

    $CUR_FORM = $this->getForms($id);

    foreach ($CUR_FORM as $key => $Form) {

      if( $id ==  $Form->id )

      return $Form;

    }

  }
 
}





























?>