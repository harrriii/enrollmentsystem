<script type="text/javascript">

  $(document.body).ready(function(){
  
  addSearch('txtHSearch','table_enlistment');

  addSearch('txtSearch','table_enlistment');
  
  $('#nv_student').removeClass('active');
  
  $('#nv_schedule').removeClass('active');

  })

  $("#txtHSearch").change(function () {
    
    var value = this.value.toLowerCase().trim();

    $("#table_enlistment tr").each(function (index) {

        if (!index) return;

        $(this).find("td").each(function () {

            var id = $(this).text().toLowerCase().trim();

            var not_found = (id.indexOf(value) == -1);

            $(this).closest('tr').toggle(!not_found);

            return not_found;
        
            });
        });
    });
  

  
  $('body').on('click', '.form-check-input', function () {


    $('#txtHSearch').val($(this).val())

    $('#txtHSearch').trigger("change");

})

  $('body').on('click', '.navs', function () {

    $('.navs').removeClass('font-weight-bold');

    $(this).addClass('font-weight-bold');

  })

  $('body').on('click', '.enl_accept', function () {

    x = $('.t').attr('clas');

    pk = $(this).attr('code');

    d = JSON.stringify({

    data:   [

              [3,'Approved'],

              [2,x]

            ]

    })

    md = encryptData(d,hp);

    d = JSON.stringify({

                        _D: $(this).attr('col_0'),

                        _M: false,

                        _MD: md

                      })

    _i = encryptData(d,hp);

    content = [

                {
                    _E: 'label',

                    _C: 'form-label ',

                    _V: 'Do you want to accept this enlistment?'

                }

              ]

    data =  {
                    modalTitle: 'Approve Enlistment',
                    
                    modalContent: content,
                    
                    buttonSubmit:  'Confirm',
                    
                    buttonCancel: 'Close',
                    
                    url: '/UNIV/EDIT',
                    
                    v1: 1,
                    
                    v2: 'Student enlistment accepted successfully.',
                    
                    v3: _i,
          
            }

    __BUILDERN(data);

  })

  $('body').on('change', '#sid', function () {

    // selected = $(this).val();

    // if( selected  == '*' )
    // {

    //   d = {
            
    //         url: "pages\\dashboard\\courseadviser\\enlisment",

    //         t: 'enlistment',

    //         c:[  
    
    //               'enlistment.id as code',
    
    //               'student_profile.stud_id as studId',
    
    //               'subjects.subject_code as subjectCode', 
    
    //               'subjects.name as subject', 
    
    //               'concat(student_profile.fname," ",student_profile.mname," ",student_profile.lname) as student', 
    
    //               'enlistment_date as date',
    
    //               'units',
    
    //               'current_status',
    
    //               'enl_batch'

    //           ],

    //         j:[

    //               ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],
          
    //               ['subjects', 'subjects.subject_code', '=', 'enlistment.subject_code']

    //           ],

    //         transferWith: [

    //                 'id',

    //                 'role',

    //                 'data',

    //                 'filter'
    //         ],

    //         filterData: 
    //                     {
                          
    //                       f_t:    'enlistment_batch',

    //                       f_c:    [

    //                                   'no',

    //                               ],

    //                     },

    //         selectedFilter: selected

    //       }    

    // }
    // else 
    // {
    //     d = {
    //           url: "pages\\dashboard\\courseadviser\\enlisment",

    //           t: 'enlistment',

    //           c:[  

    //                 'enlistment.id as code',

    //                 'student_profile.stud_id as studId',

    //                 'subjects.subject_code as subjectCode', 

    //                 'subjects.name as subject', 

    //                 'concat(student_profile.fname," ",student_profile.mname," ",student_profile.lname) as student', 

    //                 'enlistment_date as date',

    //                 'units',

    //                 'current_status',

    //                 'enl_batch'

    //             ],

    //           j:[

    //                 ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],

    //                 ['subjects', 'subjects.subject_code', '=', 'enlistment.subject_code']

    //             ],

    //           transferWith: [

    //                   'id',

    //                   'role',

    //                   'data',

    //                   'filter'
    //           ],

    //           filterData: 
    //                       {
    //                           f_t:    'clearance_requirements',

    //                           f_c:    [

    //                                       'year_lvl.name',

    //                                       'year_lvl.id',

    //                                   ],

    //                           f_j:    [
    //                                       ['department_list','department_list.id','=','clearance_requirements.department'],

    //                                       ['year_lvl','year_lvl.id','=','clearance_requirements.year']
    //                                   ],

    //                           f_g:    [

    //                                       'clearance_requirements.year'

    //                                   ],

    //                       },

    //           selectedFilter: selected

    //     }      

    // }

    // d = JSON.stringify(d);

    // encyptedData = encryptData(d,hp);

    // location.href = '/UNIV/SHOW/'+encyptedData;


  })

  $('body').on('click', '.enl_decline', function () {

    x = $('.t').attr('clas');

    pk = $(this).attr('code');

    d = JSON.stringify({

    data:   [

              [3,'Declined'],

              [2,x]

            ]

    })

    md = encryptData(d,hp);

    d = JSON.stringify({

                        _D: $(this).attr('col_0'),

                        _M: false,

                        _MD: md

                      })

    _i = encryptData(d,hp);

    content = [

                {
                    _E: 'label',

                    _C: 'form-label ',

                    _V: 'Do you want to accept this enlistment?'

                }

              ]

    data =  {
                    modalTitle: 'Decline Enlistment',
                    
                    modalContent: content,
                    
                    buttonSubmit:  'Confirm',
                    
                    buttonCancel: 'Close',
                    
                    url: '/UNIV/EDIT',
                    
                    v1: 1,
                    
                    v2: 'Student enlistment declined successfully.',
                    
                    v3: _i,
          
            }

    __BUILDERN(data);

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