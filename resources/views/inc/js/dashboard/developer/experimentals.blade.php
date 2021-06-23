<script type="text/javascript">

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');
       
    })
    

    $('#btn_test').click('',function ()  {

        let zmodal = new LazyModal();

        zmodal.InitInsertModal('Add Subject',2);

        zmodal.addLabelR('Subject Name');
        zmodal.addTextBox('1','txtSubjectName','form-control');

        zmodal.addLabelR('Category ','form-label mt-2');
        zmodal.addSelect('2','selCategory');
        zmodal.addOption('selCategory','Minor','Minor');
        zmodal.addOption('selCategory','Major','Major');

        // zmodal.addLabelR('Prerequisite ','form-label mt-2');
        // zmodal.addSelect('3','selPrerequisite');
        // zmodal.addCustomOption('selPrerequisite','2','1','1','None','None');

        // zmodal.addLabelR('School ','form-label mt-2');
        // zmodal.addSelect('4','selSchool');
        // zmodal.addCustomOption('selSchool','6','0','1');

        // zmodal.addLabelR('Lecture Units');
        // zmodal.addSelect('5','selLecUnits');
        // zmodal.addOption('selLecUnits','0','0');
        // zmodal.addOption('selLecUnits','1','1');
        // zmodal.addOption('selLecUnits','2','2');
        // zmodal.addOption('selLecUnits','3','3');
        // zmodal.addOption('selLecUnits','4','4');

        // zmodal.addLabelR('Laboratory Units');
        // zmodal.addSelect('6','selLabUnits');
        // zmodal.addOption('selLabUnits','0','0');
        // zmodal.addOption('selLabUnits','1','1');
        // zmodal.addOption('selLabUnits','2','2');
        // zmodal.addOption('selLabUnits','3','3');
        // zmodal.addOption('selLabUnits','4','4');

        zmodal.AlertOutput('Subject added successfully.');
        zmodal.Show();

    })

    $('#btn_add').click('',function ()  {

      content = [
                  {
                      _E: 'label',

                      _C: 'form-label ',

                      _V: 'Subject *',
                  },
                  {
                      _E: 'input',

                      _T: 'text',

                      _C: 'form-control',

                      _N: '1',
                  },
                  {
                      _E: 'label',

                      _C: 'form-label mt-2',

                      _V: 'Category *',
                  },
                  {
                      _E: 'select',

                      _I: 'selCategory',

                      _N: '2',

                      _C: 'custom-select form-control',
                  },
                  {
                      _E: 'label',

                      _C: 'form-label mt-2',

                      _V: 'Pre-requisite *',

                  },
                  {
                      _E: 'select',

                      _I: 'selPrerequisite',

                      _N: '4',

                      _C: 'custom-select form-control',
                          
                  },
                  {
                      _E: 'label',

                      _C: 'form-label mt-2 ',

                      _V: 'Units *',

                  },
                  {
                      _E: 'input',

                      _T: 'text',

                      _C: 'form-control',

                      _N: '3',
                  }
          ]

        data =  {

              modalTitle: 'Add Subject',
           
              modalContent: content,
           
              buttonSubmit:  'Add',
           
              buttonCancel: 'Close',
           
              url: '/UNIV/INSERT',
           
              v1: '2',
           
              v2: 'Subject added successfully.',
           
            }

      __BUILDERN(data);


      // PREPARE DATA FOR OPTION
      d =  JSON.stringify({

          v1: '2',

          v2: [1,1]

      })

      encyptedData = encryptData(d,hp);

      data = [
                  {
                          _E: 'option',

                          _IV: 'Minor',

                          _FS: 'selCategory',

                          _OV: 'Minor',
                  },
                  {
                          _E: 'option',

                          _IV: 'Major',

                          _FS: 'selCategory',

                          _OV: 'Major',
                  },
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

              ]

      __ADDTL(data);


    })
    
   
    $('body').on('click', '.edit', function () {

      d = JSON.stringify({

          _D: $(this).attr('col_0'),

          _M: false

      })

      _i = encryptData(d,hp);

      content = [
                  {
                      _E: 'label',

                      _C: 'form-label ',

                      _V: 'Subject *',
                  },
                  {
                      _E: 'input',

                      _T: 'text',

                      _C: 'form-control',

                      _N: '1',

                      _V: $(this).attr('col_1')
                  },
                  {
                      _E: 'label',

                      _C: 'form-label mt-2',

                      _V: 'Category *',
                  },
                  {
                      _E: 'select',

                      _I: 'selCategory',

                      _N: '2',

                      _C: 'custom-select form-control',
                  },
                  {
                      _E: 'label',

                      _C: 'form-label mt-2',

                      _V: 'Pre-requisite *',

                  },
                  {
                      _E: 'select',

                      _I: 'selPrerequisite',

                      _N: '4',

                      _C: 'custom-select form-control',
                          
                  },
                  {
                      _E: 'label',

                      _C: 'form-label mt-2 ',

                      _V: 'Units *',

                  },
                  {
                      _E: 'input',

                      _T: 'text',

                      _C: 'form-control',

                      _N: '3',

                      _V: $(this).attr('col_3')
                  }
          ]

        data =  {

              modalTitle: 'Edit Subject',
           
              modalContent: content,
           
              buttonSubmit:  'Update',
           
              buttonCancel: 'Close',
           
              url: '/UNIV/EDIT',
           
              v1: '2',
           
              v2: 'Subject updated successfully.',

              v3: _i
           
            }

      __BUILDERN(data);

      // PREPARE DATA FOR OPTION
      d =  JSON.stringify({

          v1: '2',

          v2: [1,1]

      })

      encyptedData = encryptData(d,hp);

      data = [
                  {
                          _E: 'option',

                          _IV: 'Minor',

                          _FS: 'selCategory',

                          _OV: 'Minor',
                  },
                  {
                          _E: 'option',

                          _IV: 'Major',

                          _FS: 'selCategory',

                          _OV: 'Major',
                  },
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

    })

    $('body').on('click', '.delete', function () {

      ids = [$(this).attr('col_0')];

      d = JSON.stringify({

          _D: ids

      })

      ids = encryptData(d,hp);

      content = [
                  {
                      _E: 'label',

                      _C: 'form-label ',

                      _V: 'Do you want to delete this subject?',
                  }
                ]

        data =  {

              modalTitle: 'Delete Subject',
           
              modalContent: content,
           
              buttonSubmit:  'Confirm',
           
              buttonCancel: 'Close',
           
              url: '/UNIV/DELETE',
           
              v1: '2',
           
              v2: 'Subject deleted successfully.',

              v3: ids
           
            }

      __BUILDERN(data);


    })
    
   
  </script>