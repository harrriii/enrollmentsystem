<script type="text/javascript">

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');
        $('#nv_student').removeClass('active');
        $('#nv_schedule').removeClass('active');
    })

    $('#btn_add').click('',function ()  {

      message = 'Subject added successfully.';

      content = [
                  ['label','','Subject *','form-label'],
                  ['input','txtSubject','name','','form-control','',''],
                  ['label','','Category *','form-label mt-2'],
                  ['select','txtCategory','category','custom-select form-control'],
                  ['label','','Pre-Requisite ','form-label mt-2'],
                  ['select','txtPrerequisite','prerequisite','custom-select form-control'],
                  ['label','','Units *','form-label mt-2'],
                  ['input','txtUnit','units','','form-control','',''],
                ]

      data =  {
                modalTitle: 'Add Subject',
                modalContent: content,
                buttonSubmit:  'Add',
                buttonCancel: 'Close',
                url: '/UNIV/INSERT',
                v1: 'subjects',
                v2: 'Subject added successfully.',
                v3: $(this).attr('subject_code'),
                v4: ''
              }

      buildModal(data);


      d = JSON.stringify({
                table:'subjects',
                column: 'category',
                group: 'category'
      })

      encyptedData = encryptData(d,hp);

      form_option('/UNIV/FETCHDATA/','txtCategory',encyptedData,'category','category');

      d =  JSON.stringify({
              table:'subjects',
              column: 'name',
              group: 'name'
      })

      encyptedData = encryptData(d,hp);
      
      var addtl = '<option value="none">none</option>'

      console.log(addtl)
      form_option('/UNIV/FETCHDATA/','txtPrerequisite',encyptedData,'name','name','none',addtl);

    })
    
   
    $('body').on('click', '.edit', function () {

      var name = $(this).attr('name');

      var category = $(this).attr('category');

      var prerequisite = $(this).attr('prerequisite');

      var units = $(this).attr('units');

      content = [
                  ['label','','Subject *','form-label'],
                  ['input','txtSubject','name','','form-control',name,''],
                  ['label','','Category *','form-label mt-2'],
                  ['select','txtCategory','category','custom-select form-control'],
                  ['label','','Pre-Requisite ','form-label mt-2'],
                  ['select','txtPrerequisite','prerequisite','custom-select form-control'],
                  ['label','','Units *','form-label mt-2'],
                  ['input','txtUnit','units','','form-control',units,''],
                ]

      data =  {
                modalTitle: 'Edit Subject',
                modalContent: content,
                buttonSubmit:  'Edit',
                buttonCancel: 'Close',
                url: '/UNIV/EDIT',
                v1: 'subjects',
                v2: 'Subject updated successfully.',
                v3: $(this).attr('subject_code'),
                v4: ''
              }

      buildModal(data);
   
      d = JSON.stringify({
                table:'subjects',
                column: 'category',
                group: 'category'
      })

      encyptedData = encryptData(d,hp);

      form_option('/UNIV/FETCHDATA/','txtCategory',encyptedData,'category','category',category);

      d =  JSON.stringify({
              table:'subjects',
              column: 'name',
              group: 'name'
      })

      encyptedData = encryptData(d,hp);

      var addtl = '<option value="none">none</option>'

      form_option('/UNIV/FETCHDATA/','txtPrerequisite',encyptedData,'name','name',prerequisite,addtl);

    })
    $('body').on('click', '.sub_delete', function () {

      content = [
                  ['label','','Do you want to delete this subject?','form-label'],
                  ]

      data =  {
                  modalTitle: 'Delete Subject',
                  modalContent: content,
                  buttonSubmit:  'Confirm',
                  buttonCancel: 'Cancel',
                  url: '/UNIV/DELETE',
                  v1: 'subjects',
                  v2: 'Subject deleted successfully.',
                  v3: $(this).attr('subject_code'),
                  v4: ''
              }

      buildModal(data);
    })
    
    $('body').on('click', '.toOffer', function () {
      
      content = [
                  ['label','','Do you want to offer this subject?','form-label'],
                  ]

      data =  {
                  modalTitle: 'Delete Subject',
                  modalContent: content,
                  buttonSubmit:  'Confirm',
                  buttonCancel: 'Cancel',
                  url: '/UNIV/DELETE',
                  v1: 'subjects',
                  v2: 'Subject deleted successfully.',
                  v3: $(this).attr('subject_code'),
                  v4: ''
              }

      buildModal(data);

    });
    
  </script>