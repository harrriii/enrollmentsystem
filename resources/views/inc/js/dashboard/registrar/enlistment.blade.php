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

                      _N: '1',
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

                      _N: '2',

                      _C: 'form-control',
                          
                  },
                  {
                      _E: 'input',

                      _T: 'text',

                      _I: 'txtEndDate',

                      _N: '4',

                      _V: startedBy,

                      _A: 'hidden',

                  },
                  {
                      _E: 'input',

                      _T: 'text',

                      _N: '3',

                      _V: date,

                      _A: 'hidden',
                  },
                  {
                      _E: 'input',

                      _T: 'text',

                      _N: '5',

                      _V: 'Open',

                      _A: 'hidden',
                  }
                ]

     
          data =    {
                        modalTitle: 'Add Enlistment Batch',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Save',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/INSERT',
                        
                        v1: '0',
                        
                        v2: 'Enlistment batch added successfully.',
                    }

      __BUILDERN(data);

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

        ids = [$(this).attr('col_0')];

        d = JSON.stringify({

            _D: ids

        })

        ids = encryptData(d,hp);

        content = [
                    {
                        _E: 'label',

                        _C: 'form-label ',

                        _V: 'Do you want to delete this enlistment?',
                    }
                ]

        data =  {

                modalTitle: 'Delete Enlistment',
            
                modalContent: content,
            
                buttonSubmit:  'Confirm',
            
                buttonCancel: 'Close',
            
                url: '/UNIV/DELETE',
            
                v1: '0',
            
                v2: 'Enlistment deleted successfully.',

                v3: ids
            
            }

        __BUILDERN(data);

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

      var code = $(this).attr('col_0');

      var startDate = $(this).attr('col_1');

      var startedBy = $('.t').attr('clas');

      var endDate = $(this).attr('col_2');

      var status = $(this).attr('col_5');

      content = [

                  {
                      _E: 'label',

                      _C: 'form-label',

                      _V: 'Start Date',

                  },
                  {
                      _E: 'input',

                      _T: 'date',

                      _I: 'txtStartDate',

                      _N: '1',

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

                      _N: '2',

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

                      _N: '5',
                  },
                  {
                      _E: 'input',

                      _T: 'text',

                      _I: 'txtStartedBy',

                      _N: '4',

                      _V: startedBy,

                      _A: 'hidden'

                  }
                
              ]

          d = JSON.stringify({

                                _D: $(this).attr('col_0'),

                                _M: false

                            })

            _i = encryptData(d,hp);


          data =    {

                        modalTitle: 'Edit Enlistment Batch',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Save',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/EDIT',
                        
                        v1: '0',
                        
                        v2: 'Enlistment batch updated successfully.',

                        v3: _i

                    }

          __BUILDERN(data);


 
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
                  }
          ]

          __ADDTL(data);

    })


    $('body').on('click', '#btnAdmission', function () {

        setChevRon('admissionCollapse','admissionChevU','admissionChevD')

    })

    $(document.body).ready(function(){
            
        $('#admissionChevU').hide();
        
    })


    
  </script>