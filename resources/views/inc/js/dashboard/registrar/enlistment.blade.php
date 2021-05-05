<script type="text/javascript">

    $('body').on('click', '#c_btn_add', function () {

      var date = getDateNow();

      startedBy = $('.t').attr('clas');

      content = [
                  {
                      _E: 'label',

                      _C: 'form-label ',

                      _V: 'Start Date',

                  },
                  {
                      _E: 'input',

                      _T: 'date',

                      _C: 'form-control',

                      _I: 'txtStartDate',

                      _N: 'enl_startDate',
                  },
                  {
                      _E: 'label',

                      _C: 'form-label mt-2',

                      _V: 'End Date',

                  },
                  {
                      _E: 'input',

                      _T: 'date',

                      _I: 'txtEndDate',

                      _N: 'enl_endDate',

                      _C: 'form-control',
                          
                  },
                  {
                      _E: 'input',

                      _T: 'text',

                      _I: 'txtEndDate',

                      _N: 'startedBy',

                      _V: startedBy,

                      _A: 'hidden',

                  },
                  {
                      _E: 'input',

                      _T: 'text',

                      _N: 'enl_createdDate',

                      _V: date,

                      _A: 'hidden',
                  },
                  {
                      _E: 'input',

                      _T: 'text',

                      _N: 'status',

                      _V: 'Open',

                      _A: 'hidden',
                  }
          ]

     
          data =  {
                      modalTitle: 'Add Enlistment Batch',
                      
                      modalContent: content,
                      
                      buttonSubmit:  'Save',
                      
                      buttonCancel: 'Close',
                      
                      url: '/UNIV/INSERT',
                      
                      v1: 'enlistment_batch',
                      
                      v2: 'Enlistment batch added successfully.',
                      
                      v3: '',
                      
                      v4: '',

                      mi:''
              }

      __BUILDER(data);

      // // PREPARE FETCHING DATA FOR OPTION {OV - outer value , IV - inner value}
      // _IV = 'id';

      // _OV = 'name' ;

      // d =  JSON.stringify({

      //       table:'campus_list',

      //       column: [_OV,_IV]

      // })

      // encyptedData = encryptData(d,hp);

      // data = [

      //         {
      //                 _E: 'option',

      //                 _IV: 'Open',

      //                 _FS: 'txtStatus',

      //                 _OV: 'Open',
      //         },
      //         {
      //                 _E: 'option',

      //                 _IV: 'Closed',

      //                 _FS: 'txtStatus',

      //                 _OV: 'Closed',
      //         },
      //         {
      //                 _E: 'option-fetch-value',

      //                 _U: '/UNIV/FETCHDATA/',

      //                 _ED: encyptedData,

      //                 _I: 'txtCampus',

      //                 _IV: _IV,

      //                 _OV: _OV
      //         }
              
      // ]

      // __ADDTL(data);



    })

    $('body').on('click', '.enl_delete', function () {

      code = $(this).attr('col_0');

      id = [code];

      d = JSON.stringify({
          _D: id
      })

      id = encryptData(d,hp);

      content = [
                  {
                          _E: 'label',

                          _C: 'form-label',

                          _V: 'Delete this item?',

                  },
              ]

      data =  {
                      modalTitle: 'Delete Enlistment Batch?',
                      
                      modalContent: content,
                      
                      buttonSubmit:  'Confirm',
                      
                      buttonCancel: 'Close',
                      
                      url: '/UNIV/DELETE',
                      
                      v1: 'enlistment_batch',
                      
                      v2: 'Enlistment Batch deleted successfully.',
                      
                      v3: id,
                      
                      v4: ''
              }

      __BUILDER(data);

    })

    $('body').on('click', '.cls_show', function () {

        classNo = $(this).attr('classNo');

        d = {
                url: 'pages/dashboard/registrar/schedule',
                primaryKey: classNo,
                t: 'classes_schedule',
                c: [     
                        'classes_schedule.timein as timein',
                        'classes_schedule.timeout as timeout',
                        'classes_schedule.class_no as no', 
                        'classes_schedule.professor as professorNo',
                        'classes_schedule.id as scheduleNo',
                        'subjects.subject_code as subjectCode', 
                        'subjects.name as subject', 
                        'professor_profile.name as professor',
                        'classes_schedule.day as day',
                        'concat(TIME_FORMAT(classes_schedule.timein,"%H:%i %p"),"-",TIME_FORMAT(classes_schedule.timeout,"%H:%i %p")) as "time"'
                ],
                j:[
                        ['subjects', 'subjects.subject_code', '=', 'classes_schedule.subject_code'],
                        ['classes', 'classes.id', '=', 'classes_schedule.class_no'],
                        ['professor_profile', 'professor_profile.id', '=', 'classes_schedule.professor']
                ],
                w:[
                        ['classes_schedule.class_no', '=', classNo]
                ],
                transferWith: [
                        'id',
                        'role',
                        'data',
                        'primaryKey'
                ]
        }       

        d = JSON.stringify(d);

        encyptedData = encryptData(d,hp);

        $.getJSON('/UNIV/FETCHDATA/'+encyptedData, function(data) {

        // var jsonData = JSON.stringify(data);

        // $.each(JSON.parse(jsonData), function(key, val){
        
        // content += '<option value="'+val[code]+'">'+val[column]+'</option>'

        // })

        // $('#'+selectid).empty();
        // $('#'+selectid).append(content);

        // if(selected){
        // document.getElementById(selectid).value = selected;
        // }

        })

    })

    $('body').on('click', '.enl_edit', function () {

      var code = $(this).attr('code');

      var startDate = $(this).attr('startDate');

      var startedBy = $(this).attr('startedBy');

      var endDate = $(this).attr('endDate');

      var status = $(this).attr('status');

      var campus = $(this).attr('campus');

      content = [
                  {
                      _E: 'label',

                      _C: 'form-label',

                      _V: 'Campus',

                  },
                  {
                      _E: 'select',

                      _C: 'custom-select form-control',

                      _I: 'txtCampus',

                      _N: 'campus',
                  },
                  {
                      _E: 'label',

                      _C: 'form-label mt-2',

                      _V: 'Start Date',

                  },
                  {
                      _E: 'input',

                      _T: 'date',

                      _I: 'txtStartDate',

                      _N: 'startDate',

                      _C: 'form-control',
                      
                      _V: startDate
                  },
                  {
                      _E: 'label',

                      _C: 'form-label mt-2',

                      _V: 'End Date',
                  },
                  {
                      _E: 'input',

                      _T: 'date',

                      _I: 'txtEndDate',

                      _N: 'endDate',

                      _C: 'form-control',

                      _V: endDate

                  },
                  {
                      _E: 'label',

                      _C: 'form-label mt-2',

                      _V: 'Status',
                  },
                  {
                      _E: 'select',

                      _C: 'custom-select form-control',

                      _I: 'txtStatus',

                      _N: 'status',
                  },
                  {
                      _E: 'input',

                      _T: 'text',

                      _I: 'txtStartedBy',

                      _N: 'startedBy',

                      _V: startedBy,

                      _A: 'hidden'

                  },
                  {
                      _E: 'input',

                      _T: 'text',

                      _V: code,

                      _A: 'hidden',

                      _I: 'txtCampus',

                      _N: 'id',
                  },
                
              ]

          id = [code];

          d = JSON.stringify({
              id
          })

          id = encryptData(d,hp);

          data =  {
                          modalTitle: 'Edit Enlistment Batch',
                          
                          modalContent: content,
                          
                          buttonSubmit:  'Save',
                          
                          buttonCancel: 'Close',
                          
                          url: '/UNIV/EDIT',
                          
                          v1: 'clearance_batch',
                          
                          v2: 'Clearance batch updated successfully.',
                          
                          v3: id,
                          
                          v4: ''
                  }

          __BUILDER(data);


          // PREPARE FETCHING DATA FOR OPTION
          _IV = 'id';

          _OV = 'name' ;

          d =  JSON.stringify({

                v1:'campus_list',

                column: [_OV,_IV]

          })

          encyptedData = encryptData(d,hp);

          data = [
                  {
                          _E: 'option',

                          _IV: 'Open',

                          _FS: 'txtStatus',

                          _OV: 'Open',
                  },
                  {
                          _E: 'option',

                          _IV: 'Closed',

                          _FS: 'txtStatus',

                          _OV: 'Closed',
                  },
                  {
                          _E: 'option-selected-value',

                          _FS: 'txtStatus',

                          _SV: status,
                  },
                  {
                          _E: 'option-fetch-value',

                          _U: '/UNIV/FETCHJS/',

                          _ED: encyptedData,

                          _I: 'txtCampus',

                          _IV: _IV,

                          _OV: _OV
                  },
                  {
                          _E: 'option-selected-value',

                          _FS: 'txtCampus',

                          _SV: campus,
                  }
          ]

          __ADDTL(data);




    
    //   var date = getDateNow();

    //   content = [
    //               ['label','','Start Date',' mt-1 form-label'],
    //               ['input','','enl_startDate','','form-control',$(this).attr('startDate'),'','date'],
    //               ['label','','End Date',' mt-1 form-label'],
    //               ['input','','enl_endDate','','form-control',$(this).attr('endDate'),'','date'],
    //               ['label','','Status',' mt-1 form-label'],
    //               ['select','txtStatus','status','custom-select form-control'],
    //               ['input','','enl_createdDate','','form-control',date,'hidden'],
    //               ['input','','startedBy','','form-control',$('.t').attr('clas'),'hidden']
              
    //             ]

    //   data =  {
    //             modalTitle: 'Edit Enlisment Batch',
    //             modalContent: content,
    //             buttonSubmit:  'Update',
    //             buttonCancel: 'Close',
    //             url: '/UNIV/EDIT',
    //             v1: 'enlistment_batch',
    //             v2: 'Enlistment Batch updated successfully.',
    //             v3: $(this).attr('code'),
    //             v4: ''
    //           }

    //   buildModal(data);
        
    //   addtl = '<option value="Open">Open</option>'
    //         + '<option value="Closed">Closed</option>';

    //   form_option('','txtStatus',null,null,null, $(this).attr('status'),addtl);

    })

    
  </script>