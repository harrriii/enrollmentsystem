<script type="text/javascript">


    $('body').on('click', '#subjects_btn_add', function () {

        var date = getDateNow();

        startedBy = $('.t').attr('clas');

        content =       [
                                {

                                        _E: 'label',

                                        _C: 'form-label mt-1',

                                        _V: 'Subject',

                                },
                                {

                                        _E: 'select',

                                        _C: 'form-control custom-select',

                                        _I: 'txtSubject',

                                        _N: '2',
                                },
                                {

                                        _E: 'label',

                                        _C: 'form-label mt-2',

                                        _V: 'Year',

                                },
                                {

                                        _E: 'select',

                                        _C: 'form-control custom-select',

                                        _I: 'txtForYear',

                                        _N: '3',
                                },
                                {

                                        _E: 'label',

                                        _C: 'form-label mt-2',

                                        _V: 'Minimum Year',

                                },
                                {
                                        
                                        _E: 'select',

                                        _C: 'form-control custom-select',

                                        _I: 'txtForYear',

                                        _N: '3',
                                },
                                {

                                        _E: 'label',

                                        _C: 'form-label mt-2',

                                        _V: 'Max Year',

                                },
                                {
                                        
                                        _E: 'select',

                                        _C: 'form-control custom-select',

                                        _I: 'txtForYear',

                                        _N: '3',
                                }
                        
                        ]
        
                data =    {
                                modalTitle: 'Add Subject',
                                
                                modalContent: content,
                                
                                buttonSubmit:  'Save',
                                
                                buttonCancel: 'Close',
                                
                                url: '/UNIV/INSERT',
                                
                                v1: '4',
                                
                                v2: 'Subject added successfully.',
                        }

        __BUILDERN(data);


         // PREPARE DATA FOR OPTION
        d =  JSON.stringify({
                                v1: '5',

                                v2: [0,1]
                        })

        encyptedData = encryptData(d,hp);

        data = [
                {
                        _E: 'option',

                        _IV: 'none',

                        _FS: 'selPrerequisite',

                        _OV: 'none',
                },
                {
                        _E: 'option-fetch-value',

                        _U: '/UNIV/FETCHJS/',

                        _ED: encyptedData,

                        _I: 'selPrerequisite',

                },
                {
                        _E: 'option-selected-value',

                        _FS: 'selCategory',

                        _SV: $(this).attr('col_2')
                },
                {
                        _E: 'option-selected-value',

                        _FS: 'selPrerequisite',

                        _SV: $(this).attr('col_4')
                },

        ]

        __ADDTL(data);

//       content = [
   
//                   ['label','','Subject',' mt-1 form-label'],
   
//                   ['select','txtSubject','2','custom-select form-control'],
   
//                   ['label','','Year',' mt-1 form-label'],
   
//                   ['select','txtForYear','3','custom-select form-control'],
   
//                   ['label','','Minimum Year',' mt-1 form-label'],
   
//                   ['select','txtMinYear','4','custom-select form-control'],
   
//                   ['label','','Maximum Year',' mt-1 form-label'],
   
//                   ['select','txtMaxYear','5','custom-select form-control'],
   
//                   ['input','','6','','form-control',$('.t').attr('clas'),'hidden'],
   
//                   ['input','','1','','form-control',$('.t').attr('clas1'),'hidden']
   
//                 ]

//       data =  {
     
//                 modalTitle: 'Add Subject to Enlistment',
     
//                 modalContent: content,
     
//                 buttonSubmit:  'Save',
     
//                 buttonCancel: 'Close',
     
//                 url: '/UNIV/INSERT',
     
//                 v1: 'enlistment_subject',
     
//                 v2: 'Subject added to Enlistment successfully.',
     
//                 v3: '',
     
//                 v4: ['subject_code']
     
//               }
     
//         buildModal(data);


//         d =  JSON.stringify({
//                                 table:'subjects',
//                                 column: ['name','subject_code']
//         })

//       encyptedData = encryptData(d,hp);

//       form_option('/UNIV/FETCHDATA/','txtSubject',encyptedData,'name','subject_code');

//       d =  JSON.stringify({
//               table:'year_lvl',
//               column: ['yr_name','yr_value']
//       })

//       encyptedData = encryptData(d,hp);

//       form_option('/UNIV/FETCHDATA/','txtMinYear',encyptedData,'yr_name','yr_value');

//       form_option('/UNIV/FETCHDATA/','txtMaxYear',encyptedData,'yr_name','yr_value');

//       form_option('/UNIV/FETCHDATA/','txtForYear',encyptedData,'yr_name','yr_value');
    })

    $('body').on('click', '.sub_edit', function () {

        var date = getDateNow();

        var minYr = $(this).attr('minYr');

        var maxYr = $(this).attr('maxYr');

        var forYr = $(this).attr('forYr');

        var subjectCode = $(this).attr('subject_code');

        var code = $(this).attr('code');

        content = [
                        ['label','','Subject',' mt-1 form-label'],
                        ['select','txtSubject','subject_code','custom-select form-control'],
                        ['label','','Year',' mt-1 form-label'],
                        ['select','txtForYear','for_yr','custom-select form-control'],
                        ['label','','Minimum Year',' mt-1 form-label'],
                        ['select','txtMinYear','min_yr','custom-select form-control'],
                        ['label','','Maximum Year',' mt-1 form-label'],
                        ['select','txtMaxYear','max_yr','custom-select form-control'],
                        ['input','','addedBy','','form-control',$('.t').attr('clas'),'hidden'],
                        ['input','','enlistment_batch','','form-control',$('.t').attr('clas1'),'hidden']
                ]

                data =  {
                modalTitle: 'Edit Subject',
                modalContent: content,
                buttonSubmit:  'Edit',
                buttonCancel: 'Close',
                url: '/UNIV/EDIT',
                v1: 'enlistment_subject',
                v2: 'Subject updated successfully.',
                v3: code,
                v4: ''
        }

        buildModal(data);


        d =  JSON.stringify({
                table:'subjects',
                column: ['name','subject_code']
        })

        encyptedData = encryptData(d,hp);

        form_option('/UNIV/FETCHDATA/','txtSubject',encyptedData,'name','subject_code',subjectCode);

        d =  JSON.stringify({
                table:'year_lvl',
                column: ['yr_name','yr_value']
        })

        encyptedData = encryptData(d,hp);

        form_option('/UNIV/FETCHDATA/','txtMinYear',encyptedData,'yr_name','yr_value',minYr);

        form_option('/UNIV/FETCHDATA/','txtMaxYear',encyptedData,'yr_name','yr_value',maxYr);

        form_option('/UNIV/FETCHDATA/','txtForYear',encyptedData,'yr_name','yr_value');

    })


    $('body').on('click', '.sub_delete', function () {

        content = [
                        ['label','','Do you want to delete this subject to enlistment offer list?','form-label'],
                  ]

        data =  {
                        modalTitle: 'Delete Subject',
                        modalContent: content,
                        buttonSubmit:  'Confirm',
                        buttonCancel: 'Cancel',
                        url: '/UNIV/DELETE',
                        v1: 'enlistment_subject',
                        v2: 'Subject deleted successfully.',
                        v3: $(this).attr('code'),
                        v4: ''
                }

        buildModal(data);

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
    
      var date = getDateNow();

      content = [
                  ['label','','Start Date',' mt-1 form-label'],
                  ['input','','enl_startDate','','form-control',$(this).attr('startDate'),'','date'],
                  ['label','','End Date',' mt-1 form-label'],
                  ['input','','enl_endDate','','form-control',$(this).attr('endDate'),'','date'],
                  ['label','','Status',' mt-1 form-label'],
                  ['select','txtStatus','status','custom-select form-control'],
                  ['input','','enl_createdDate','','form-control',date,'hidden'],
                  ['input','','startedBy','','form-control',$('.t').attr('clas'),'hidden']
              
                ]

      data =  {
                modalTitle: 'Edit Enlisment Batch',
                modalContent: content,
                buttonSubmit:  'Update',
                buttonCancel: 'Close',
                url: '/UNIV/EDIT',
                v1: 'enlistment_batch',
                v2: 'Enlistment Batch updated successfully.',
                v3: $(this).attr('code'),
                v4: ''
              }

      buildModal(data);
        
      addtl = '<option value="Open">Open</option>'
            + '<option value="Closed">Closed</option>';

      form_option('','txtStatus',null,null,null, $(this).attr('status'),addtl);
    })



    
  </script>