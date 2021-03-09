<script type="text/javascript">


    $('body').on('click', '#btn_add', function () {

      var date = getDateNow();

      content = [
                  ['label','','Professor',' mt-1 form-label'],
                  ['select','txtProfessor','professor','custom-select form-control'],
                  ['label','','Subject',' mt-1 form-label'],
                  ['select','txtSubject','subject_code','custom-select form-control'],
                  ['label','','Time-In',' mt-1 form-label'],
                  ['input','txtTimeIn','timein','','form-control','','','Time'],
                  ['label','','Time-Out',' mt-1 form-label'],
                  ['input','txtTimeOut','timeout','','form-control','','','Time'],
                  ['label','','Day',' mt-1 form-label'],
                  ['input','txtDay','day','','form-control','','','text'],
                  ['input','','class_no','','form-control',$(this).attr('classNo'),'hidden','text']
                ]

      data =  {
                modalTitle: 'Add Schedule',
                modalContent: content,
                buttonSubmit:  'Save',
                buttonCancel: 'Close',
                url: '/UNIV/INSERT',
                v1: 'classes_schedule',
                v2: 'Schedule added successfully.',
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
              table:'subjects',
              column: ['name','subject_code']
      })

      encyptedData = encryptData(d,hp);

      form_option('/UNIV/FETCHDATA/','txtSubject',encyptedData,'name','subject_code');


    })


    
    $('body').on('click', '.sch_edit', function () {
    var date = getDateNow();

        content =   [
                        ['label','','Professor',' mt-1 form-label'],
                        ['select','txtProfessor','professor','custom-select form-control'],
                        ['label','','Subject',' mt-1 form-label'],
                        ['select','txtSubject','subject_code','custom-select form-control'],
                        ['label','','Time-In',' mt-1 form-label'],
                        ['input','txtTimeIn','timein','','form-control',$(this).attr('timein'),'','Time'],
                        ['label','','Time-Out',' mt-1 form-label'],
                        ['input','txtTimeOut','timeout','','form-control',$(this).attr('timeout'),'','Time'],
                        ['label','','Day',' mt-1 form-label'],
                        ['input','txtDay','day','','form-control',$(this).attr('day'),'','text'],
                        ['input','','class_no','','form-control',$(this).attr('classNo'),'hidden','text']
                    ]

        data =  {
                    modalTitle: 'Edit Schedule',
                    modalContent: content,
                    buttonSubmit:  'Update',
                    buttonCancel: 'Close',
                    url: '/UNIV/EDIT',
                    v1: 'classes_schedule',
                    v2: 'Schedule updated successfully.',
                    v3: $(this).attr('scheduleNo'),
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
                table:'subjects',
                column: ['name','subject_code']
        })

        encyptedData = encryptData(d,hp);

        form_option('/UNIV/FETCHDATA/','txtSubject',encyptedData,'name','subject_code',$(this).attr('subjectCode'));
        })

    $('body').on('click', '.sch_delete', function () {

        content = [
                    ['label','','Do you want to delete this schedule?','form-label'],
                    ]

        data =  {
                    modalTitle: 'Delete Schedule',
                    modalContent: content,
                    buttonSubmit:  'Confirm',
                    buttonCancel: 'Cancel',
                    url: '/UNIV/DELETE',
                    v1: 'classes_schedule',
                    v2: 'Schedule deleted successfully.',
                    v3: $(this).attr('scheduleNo'),
                    v4: ''
                }

        buildModal(data);
    })


 
  </script>