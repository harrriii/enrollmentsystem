<script type="text/javascript">


    $('body').on('click', '#c_btn_add', function () {

      var date = getDateNow();

      content = [
                  ['label','','Start Date',' mt-1 form-label'],
                  ['input','','enl_startDate','','form-control','','','date'],
                  ['label','','End Date',' mt-1 form-label'],
                  ['input','','enl_endDate','','form-control','','','date'],
                  ['input','','enl_createdDate','','form-control',date,'hidden'],
                  ['input','','startedBy','','form-control',$('.t').attr('clas'),'hidden'],
                  ['input','','status','','form-control','Open','hidden']
                ]

      data =  {
                modalTitle: 'Start Enlistment',
                modalContent: content,
                buttonSubmit:  'Save',
                buttonCancel: 'Close',
                url: '/UNIV/INSERT',
                v1: 'enlistment_batch',
                v2: 'Enlistment Batch created successfully.',
                v3: '',
                v4: ''
              }

      buildModal(data);

    })

    $('body').on('click', '.enl_delete', function () {

      content = [
                  ['label','','Do you want to delete this enlistment batch?','form-label'],
                ]

      data =  {
                modalTitle: 'Delete Enlistment Batch',
                modalContent: content,
                buttonSubmit:  'Confirm',
                buttonCancel: 'Cancel',
                url: '/UNIV/DELETE',
                v1: 'enlistment_batch',
                v2: 'Enlistment Batch deleted successfully.',
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