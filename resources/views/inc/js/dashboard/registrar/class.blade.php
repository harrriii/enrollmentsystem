<script type="text/javascript">


    $('body').on('click', '#registrar_btnAdd', function () {

      var date = getDateNow();

      content = [
                  ['label','','Class Adviser',' mt-1 form-label'],
                  ['select','txtProfessor','adviser','custom-select form-control'],
                  ['label','','Section',' mt-1 form-label'],
                  ['input','txtSection','section','','form-control','',''],
                  ['label','','Room',' mt-1 form-label'],
                  ['input','txtRoom','room','','form-control','',''],
                  ['label','','Max Student Number',' mt-1 form-label'],
                  ['input','txtMaxStudent','max_student','','form-control','',''],
                  ['label','','Term',' mt-1 form-label'],
                  ['select','txtTerm','term','custom-select form-control'],
                  ['label','','Year',' mt-1 form-label'],
                  ['select','txtYear','year','custom-select form-control'],
                  ['label','','School Year',' mt-1 form-label'],
                  ['select','txtSchoolYear','school_year','custom-select form-control'],
                  ['input','txtMaxStudent','created_by','','form-control',$('.t').attr('clas'),'hidden'],
                  ['input','txtMaxStudent','created_date','','form-control',date,'hidden'],
                ]

      data =  {
                modalTitle: 'Add Class',
                modalContent: content,
                buttonSubmit:  'Save',
                buttonCancel: 'Close',
                url: '/UNIV/INSERT',
                v1: 'classes',
                v2: 'Class created successfully.',
                v3: '',
                v4: ''
              }

      buildModal(data);


      d =  JSON.stringify({
              table:'professor_profile',
              column: ['name','id']
      })

      encyptedData = encryptData(d,hp);

      form_option('/UNIV/FETCHDATA/','txtProfessor',encyptedData,'name','id');


      d =  JSON.stringify({
              table:'terms',
              column: ['term','id']
      })

      encyptedData = encryptData(d,hp);

      form_option('/UNIV/FETCHDATA/','txtTerm',encyptedData,'term','id');


      d =  JSON.stringify({
              table:'year_lvl',
              column: ['yr_name','yr_code']
      })

      encyptedData = encryptData(d,hp);

      form_option('/UNIV/FETCHDATA/','txtYear',encyptedData,'yr_name','yr_code');

      d =  JSON.stringify({
              table:'school_year',
              column: ['school_year','id']
      })

      encyptedData = encryptData(d,hp);

      form_option('/UNIV/FETCHDATA/','txtSchoolYear',encyptedData,'school_year','id');

    })

    $('body').on('click', '.cls_delete', function () {

      content = [
                  ['label','','Do you want to delete this class?','form-label'],
                ]

      data =  {
                modalTitle: 'Delete Class',
                modalContent: content,
                buttonSubmit:  'Confirm',
                buttonCancel: 'Cancel',
                url: '/UNIV/DELETE',
                v1: 'classes',
                v2: 'Class deleted successfully.',
                v3: $(this).attr('classNo'),
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

        location.href = '/UNIV/SHOW/'+encyptedData;

    })

    $('body').on('click', '.cls_edit', function () {
        
      var date = getDateNow();
      content = [
                  ['label','','Class Adviser',' mt-1 form-label'],
                  ['select','txtProfessor','adviser','custom-select form-control'],
                  ['label','','Section',' mt-1 form-label'],
                  ['input','txtSection','section','','form-control',$(this).attr('section'),''],
                  ['label','','Room',' mt-1 form-label'],
                  ['input','txtRoom','room','','form-control',$(this).attr('room'),''],
                  ['label','','Max Student Number',' mt-1 form-label'],
                  ['input','txtMaxStudent','max_student','','form-control',$(this).attr('maxStudent'),''],
                  ['label','','Term',' mt-1 form-label'],
                  ['select','txtTerm','term','custom-select form-control'],
                  ['label','','Year',' mt-1 form-label'],
                  ['select','txtYear','year','custom-select form-control'],
                  ['label','','School Year',' mt-1 form-label'],
                  ['select','txtSchoolYear','school_year','custom-select form-control'],
                  ['input','txtMaxStudent','created_by','','form-control',$('.t').attr('clas'),'hidden'],
                  ['input','txtMaxStudent','created_date','','form-control',date,'hidden'],
                ]

      data =  {
                modalTitle: 'Edit Class',
                modalContent: content,
                buttonSubmit:  'Update',
                buttonCancel: 'Close',
                url: '/UNIV/EDIT',
                v1: 'classes',
                v2: 'Class created successfully.',
                v3: $(this).attr('classNo'),
                v4: ''
              }

      buildModal(data);


      d =  JSON.stringify({
              table:'professor_profile',
              column: ['name','id']
      })

      encyptedData = encryptData(d,hp);

      form_option('/UNIV/FETCHDATA/','txtProfessor',encyptedData,'name','id',$(this).attr('professor'));


      d =  JSON.stringify({
              table:'terms',
              column: ['term','id']
      })

      encyptedData = encryptData(d,hp);

      form_option('/UNIV/FETCHDATA/','txtTerm',encyptedData,'term','id',$(this).attr('term'));


      d =  JSON.stringify({
              table:'year_lvl',
              column: ['yr_name','yr_code']
      })

      encyptedData = encryptData(d,hp);

      form_option('/UNIV/FETCHDATA/','txtYear',encyptedData,'yr_name','yr_code',$(this).attr('year'));

      d =  JSON.stringify({
              table:'school_year',
              column: ['school_year','id']
      })

      encyptedData = encryptData(d,hp);

      form_option('/UNIV/FETCHDATA/','txtSchoolYear',encyptedData,'school_year','id',$(this).attr('schoolYear'));
    })

    // $('body').on('click', '.grd_accept', function () {

    //   x = $('.t').attr('clas');

    //   d = JSON.stringify({
    //                       data: [
    //                               ['status','Approved'],
    //                               ['deansApproval',x]
    //                             ]
    //   })


    //   var message = 'Grade approved successfully.';  

    //   content = form_label('','Do you want to approve this grade?','form-label');
    //   content += form_input('','v1','','','student_class_grade','hidden');
    //   content += form_input('','v2','','',message,'hidden');
    //   content += form_input('','v3','','',$(this).attr('code'),'hidden');
    //   content += form_input('','v4','','',encryptData(d),'hidden');


    //   footer = form_button('btn_submit','Accept','btn btn-sm mlqu-color','submit','background:#7A353C;height:25px;width:80px');
    //   footer += form_button('btn_close','Cancel','btn btn-sm mlqu-color','button','background:#7A353C;height:25px;width:80px','data-dismiss="modal"');

    //   showModal('modal_univ','Confirm');
    //   formBuild('form_univ','/UNIV/EDIT',content,footer);
    // })

    // $('body').on('click', '.grd_decline', function () {

    //   x = $('.t').attr('clas');

    //   d = JSON.stringify({
    //                       data: [
    //                               ['status','Declined'],
    //                               ['deansApproval',x]
    //                             ]
    //   })


    //   var message = 'Grade declined successfully.';  

    //   content = form_label('','Do you want to decline this grade?','form-label');
    //   content += form_input('','v1','','','student_class_grade','hidden');
    //   content += form_input('','v2','','',message,'hidden');
    //   content += form_input('','v3','','',$(this).attr('code'),'hidden');
    //   content += form_input('','v4','','',encryptData(d),'hidden');


    //   footer = form_button('btn_submit','Confirm','btn btn-sm mlqu-color','submit','background:#7A353C;height:25px;width:80px');
    //   footer += form_button('btn_close','Cancel','btn btn-sm mlqu-color','button','background:#7A353C;height:25px;width:80px','data-dismiss="modal"');

    //   showModal('modal_univ','Decline grade');
    //   formBuild('form_univ','/UNIV/EDIT',content,footer);
    //   })
   
   
 
    // $('body').on('click', '.toOffer', function () {
      
    //   $('#offerModal').modal('show');

    // });
    
  </script>