<script type="text/javascript">

    $('body').on('click', '.enl_accept', function () {

      x = $('.t').attr('clas');

      d = JSON.stringify({
                        data: [
                                ['current_status','Approved'],
                                ['approving_adviser',x]
                              ]
      })

      content = [
                  ['label','','Do you want to accept this enlistment?','form-label']
                ]

      data = {
                modalTitle: 'Confirm',
                modalContent: content,
                buttonSubmit:  'Accept',
                buttonCancel: 'Cancel',
                url: '/UNIV/EDIT',
                v1: 'enlistment',
                v2: 'Enlistment accepted successfully.',
                v3: $(this).attr('code'),
                v4: encryptData(d)
      }

      buildModal(data);

    })


    $('body').on('click', '.enl_decline', function () {

      x = $('.t').attr('clas');

      d = JSON.stringify({
                          data: [
                                  ['current_status','Declined'],
                                  ['approving_adviser',x]
                                ]
      })

      content = [
                  ['label','','Do you want to decline this enlistment?','form-label']
                ]

      data =  {
                modalTitle: 'Decline Enlistment',
                modalContent: content,
                buttonSubmit:  'Confirm',
                buttonCancel: 'Cancel',
                url: '/UNIV/EDIT',
                v1: 'enlistment',
                v2: 'Enlistment declined successfully.',
                v3: $(this).attr('code'),
                v4: encryptData(d)
              }

      buildModal(data);

    })
   
    $('body').on('click', '.enl_view', function () {

      $('#modal_univ_table').modal('toggle'); 

      $('#txtStudentNo').empty();
      $('#txtStudentName').empty();
      $('#txtYear').empty();
      $('#txtCourse').empty();


      

      d = JSON.stringify({
              table:  'student_profile',
              column: [
                          'subjects.subject_code as subjectCode',
                          'subjects.name as subject',
                          'subjects.prerequisite as prerequisite'
                      ],
              join:   [
                          ['student_year', 'student_year.stud_id', '=', 'student_profile.stud_id'],
                          ['year_lvl', 'year_lvl.yr_code', '=', 'student_year.yr_code'],
                          ['subject_year', 'subject_year.yr_code', '=', 'year_lvl.yr_code'],
                          ['subjects', 'subjects.subject_code', '=', 'subject_year.subject_code'],
                      ],
              where:  [
                          ['student_profile.stud_id','=','']
                      ]
      });

      data =  {
                tableId: '#tbl_univ',
                d: encryptData(d,hp)
              }


      $('#txtStudentNo').append($(this).attr('s_code'));
      $('#txtStudentName').append('hello');
      $('#txtYear').append('hello');
      $('#txtCourse').append('hello');
      
        

      // fillTable();
      
      


      // content = [
      //             ['label','','Do you want to decline this enlistment?','form-label']
      //           ]

      // data =  {
      //           modalTitle: 'Decline Enlistment',
      //           modalContent: content,
      //           buttonSubmit:  'Confirm',
      //           buttonCancel: 'Cancel',
      //           url: '/UNIV/EDIT',
      //           v1: 'enlistment',
      //           v2: 'Enlistment declined successfully.',
      //           v3: $(this).attr('code'),
      //           v4: encryptData(d)
      //         }

      // buildModal(data);

    })
 
    $('body').on('click', '.toOffer', function () {
      
      $('#offerModal').modal('show');

    });
    
  </script>