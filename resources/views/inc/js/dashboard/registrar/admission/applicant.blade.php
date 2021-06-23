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
    function enableBasicInformation()
    {
        $('#applicant_txtFirstName').attr('readonly',false);

        $('#applicant_txtMiddleName').attr('readonly',false);

        $('#applicant_txtLastName').attr('readonly',false);

        $('#applicant_txtSuffix').attr('readonly',false);

        $('#applicant_txtNationality').attr('readonly',false);

        $('#applicant_txtReligion').attr('readonly',false);

        $('#applicant_txtBirthDate').attr('readonly',false);

        $('#applicant_txtMobileNo').attr('readonly',false);

        $('#applicant_txtEmailAddress').attr('readonly',false);

        $('#applicant_txtAcrNo').attr('readonly',false);

        $('#applicant_txtPassNo').attr('readonly',false);

        $('#applicant_txtNoOfSiblings').attr('readonly',false);

        $('#applicant_selCivilStatus').prop('disabled',false)
        
        $('#applicant_selGender').prop('disabled',false);
    }

    function disableBasicInformation()
    {

        $('#applicant_txtFirstName').attr('readonly',true);

        $('#applicant_txtMiddleName').attr('readonly',true);

        $('#applicant_txtLastName').attr('readonly',true);

        $('#applicant_txtSuffix').attr('readonly',true);

        $('#applicant_txtNationality').attr('readonly',true);

        $('#applicant_txtReligion').attr('readonly',true);

        $('#applicant_txtBirthDate').attr('readonly',true);

        $('#applicant_txtMobileNo').attr('readonly',true);

        $('#applicant_txtEmailAddress').attr('readonly',true);

        $('#applicant_txtAcrNo').attr('readonly',true);

        $('#applicant_txtPassNo').attr('readonly',true);

        $('#applicant_txtNoOfSiblings').attr('readonly',true);

        $('#applicant_selCivilStatus').prop('disabled',true)
        
        $('#applicant_selGender').prop('disabled',true);
    
    }

    function enableAddressInformation()
    {
        $('#address_no').attr('readonly',false);

        $('#address_street').attr('readonly',false);

        $('#address_barangay').attr('readonly',false);

        $('#address_city').attr('readonly',false);

        $('#address_zip_code').attr('readonly',false);

        $('#address_subdivision').attr('readonly',false);

        $('#address_type').prop('disabled',false);
    }

    function disableAddressInformation()
    {
        $('#address_no').attr('readonly',true);

        $('#address_street').attr('readonly',true);

        $('#address_barangay').attr('readonly',true);

        $('#address_city').attr('readonly',true);

        $('#address_zip_code').attr('readonly',true);

        $('#address_subdivision').attr('readonly',true);

        $('#address_type').attr('readonly',true);

        $('#address_type').prop('disabled',true);

    }

    function enableFatherInformation()
    {
        $('#txtFatherFirstName').attr('readonly',false);

        $('#txtFatherMiddleName').attr('readonly',false);

        $('#txtFatherLastName').attr('readonly',false);

        $('#txtFatherSuffix').attr('readonly',false);

        $('#txtFatherOccupation').attr('readonly',false);

        $('#txtFatherIncome').attr('readonly',false);

    }

    function disableFatherInformation()
    {
        $('#txtFatherFirstName').attr('readonly',true);

        $('#txtFatherMiddleName').attr('readonly',true);

        $('#txtFatherLastName').attr('readonly',true);

        $('#txtFatherSuffix').attr('readonly',true);

        $('#txtFatherOccupation').attr('readonly',true);

        $('#txtFatherIncome').attr('readonly',true);
    }

    


    $('body').on('click', '.btnedit', function () {

        let zModal = new LazyModal();

        zModal.InitUpdateModalXl('Update Applicant Information',1);


        zModal.addTabContainer('tab1');
        
        zModal.addTab('tabItem1','tab1','tabPanel1','Basic Information');

        zModal.addTab('tabItem1','tab2','tabPanel2','Address Information');

        zModal.addTab('tabItem1','tab3','tabPanel3','Family Information');

        zModal.addTab('tabItem1','tab4','tabPanel4','Scholastic Information');

        zModal.addTab('tabItem1','tab5','tabPanel5','Employment Information');

        zModal.addTab('tabItem1','tab6','tabPanel6','Student Information');

        zModal.addTabContainer('tab2'); 

        zModal.addTab('tabItem1','tab2','tabPanel1','Basic Information');

        zModal.addTab('tabItem1','tab2','tabPanel2','Address Information');

        zModal.addTab('tabItem1','tab2','tabPanel3','Family Information');

        zModal.addTab('tabItem1','tab2','tabPanel4','Scholastic Information');

        zModal.addTab('tabItem1','tab2','tabPanel5','Employment Information');

        zModal.addTab('tabItem1','tab2','tabPanel6','Student Information');

        zModal.Show();
       

        

    })



    // $('body').on('click', '#btnMaintenanceAdmission', function () {

    //     setChevRon('maintenanceAdmissionCollapse','admissionChevU1','admissionChevD1')

    // })

    


    $('body').on('click', '.applicant_view', function () {

        

    })


    $(document.body).ready(function(){
            
        $('#admissionChevU').hide();

        $('#btnSubmit_basicInformation').hide();

        $('#btnSubmit_addressInformation').hide();

        $('#btnSubmit_familyFatherInformation').hide();



        

        
    })


    
  </script>