<script type="text/javascript">

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');
        
        $('#nv_student').removeClass('active');
        
        $('#nv_schedule').removeClass('active');

    })

    $('.__edit').click('',function ()  {

        var code = $(this).attr('code');

        var startDate = $(this).attr('startDate');

        var startedBy = $(this).attr('startedBy');

        var endDate = $(this).attr('endDate');
        
        var status = $(this).attr('status');

        var campus = $(this).attr('campus');

        content = [
                    {
                        _E: 'label',

                        _C: 'form-label',

                        _V: 'Campus',

                    },
                    {
                        _E: 'select',

                        _C: 'custom-select form-control',

                        _I: 'txtCampus',

                        _N: 'campus',
                    },
                    {
                        _E: 'label',

                        _C: 'form-label mt-2',

                        _V: 'Start Date',

                    },
                    {
                        _E: 'input',

                        _T: 'date',

                        _I: 'txtStartDate',

                        _N: 'startDate',

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

                        _N: 'endDate',

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

                        _N: 'status',
                    },
                    {
                        _E: 'input',

                        _T: 'text',

                        _I: 'txtStartedBy',

                        _N: 'startedBy',

                        _V: startedBy,

                        _A: 'hidden'

                    },
                    {
                        _E: 'input',

                        _T: 'text',

                        _V: code,

                        _A: 'hidden',

                        _I: 'txtCampus',

                        _N: 'id',
                    },
                   
            ]

        id = [code];

        d = JSON.stringify({
            id
        })

        id = encryptData(d,hp);

        data =  {
                        modalTitle: 'Edit Clearance Batch',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Save',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/EDIT',
                        
                        v1: 'clearance_batch',
                        
                        v2: 'Clearance batch updated successfully.',
                        
                        v3: id,
                        
                        v4: ''
                }

        __BUILDER(data);


        // PREPARE FETCHING DATA FOR OPTION
        _IV = 'id';

        _OV = 'name' ;

        d =  JSON.stringify({

              table:'campus_list',

              column: [_OV,_IV]

        })

        encyptedData = encryptData(d,hp);

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
                },
                {
                        _E: 'option-fetch-value',

                        _U: '/UNIV/FETCHDATA/',

                        _ED: encyptedData,

                        _I: 'txtCampus',

                        _IV: _IV,

                        _OV: _OV
                },
                {
                        _E: 'option-selected-value',

                        _FS: 'txtCampus',

                        _SV: campus,
                }
        ]

        __ADDTL(data);
 
    })

    $('.__add').click('',function ()  {

        startedBy = $('.t').attr('clas');

        content = [
                    {
                        _E: 'label',

                        _C: 'form-label ',

                        _V: 'Campus',

                    },
                    {
                        _E: 'select',

                        _C: 'custom-select form-control',

                        _I: 'txtCampus',

                        _N: 'campus',
                    },
                    {
                        _E: 'label',

                        _C: 'form-label mt-2',

                        _V: 'Start Date',

                    },
                    {
                        _E: 'input',

                        _T: 'date',

                        _I: 'txtStartDate',

                        _N: 'startDate',

                        _C: 'form-control',
                            
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

                        _N: 'endDate',

                        _C: 'form-control',

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

                        _N: 'status',
                    },
                    {
                        _E: 'input',

                        _T: 'text',

                        _I: 'txtStartedBy',

                        _N: 'startedBy',

                        _V: startedBy,

                        _A: 'hidden'

                    },
                   
            ]

        data =  {
                        modalTitle: 'Add Clearance Batch',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Save',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/INSERT',
                        
                        v1: 'clearance_batch',
                        
                        v2: 'Clearance batch updated successfully.',
                        
                        v3: '',
                        
                        v4: '',
                        mi:''
                }

        __BUILDER(data);

        // PREPARE FETCHING DATA FOR OPTION {OV - outer value , IV - inner value}
        _IV = 'id';

        _OV = 'name' ;

        d =  JSON.stringify({

              table:'campus_list',

              column: [_OV,_IV]

        })

        encyptedData = encryptData(d,hp);

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
                        _E: 'option-fetch-value',

                        _U: '/UNIV/FETCHDATA/',

                        _ED: encyptedData,

                        _I: 'txtCampus',

                        _IV: _IV,

                        _OV: _OV
                }
                
        ]

        __ADDTL(data);

    })

    $('body').on('click', '.__delete', function () {

        code = $(this).attr('code');

        id = [code];

        d = JSON.stringify({
            _D: id
        })

        id = encryptData(d,hp);

        content = [
                    {
                            _E: 'label',

                            _C: 'form-label',

                            _V: 'Do you want to delete this item?',

                    },
                   
                ]

        data =  {
                        modalTitle: 'Delete Clearance Batch',
                        
                        modalContent: content,
                        
                        buttonSubmit:  'Confirm',
                        
                        buttonCancel: 'Close',
                        
                        url: '/UNIV/DELETE',
                        
                        v1: 'clearance_batch',
                        
                        v2: 'Clearance batch deleted successfully.',
                        
                        v3: id,
                        
                        v4: ''
                }

        __BUILDER(data);

    })
 
    
  </script>