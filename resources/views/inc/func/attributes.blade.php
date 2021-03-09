<?php
    $formAttr = array(
                        'action' => 'App\Http\Controllers\StudentRegistrationController@store',
                        'method' => 'POST',
                        'class' => 'needs-validation',
                        'novalidate' => ''
                      );

    $textRequireAttr = array(
                              'class' => 'form-control', 
                              'required' => ''
                            );

    $textRequireDataPickerAttr = array(
      'class' => 'form-control', 
      'required' => '',
      'data-provide' => 'datepicker',
      'autocomplete' => 'off'
    );

    $textAttr = array(
      'class' => 'form-control'
    );

    $customSelectRequireAttr = array(
      'class' => 'custom-select form-control',
      'require' =>''
    ); 
    $buttonSubmitAttr = array(
      'class' => 'btn btn-sm mlqu-color',
      'style' => 'background:#7A353C;height:25px;width:80px'
    );


    
