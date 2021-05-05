<script type="text/javascript">

    // FUNCTION FOR GET VALUES
    // SO KAILANGAN ENCRYPTED SIYA PARA MAKAPAG PASA KA NG OBJECT sa URL
    function getEncrypted( value, data = 0 )
    {
        // PWEDE KA MAG ADD NG FUNCTION HERE ADD KALANG NG CONDITION MO
        // THEN FOLLOW MO NALANG YUNG STRUCTURE NASA GUIDES 
        // ref:guideJs #1

        // get latest enlistment batch
        if( value == 1 )
        {
            d = JSON.stringify(
                                {
                                    v1: 0,
                                    v2: [0], 
                                    v3: 
                                    [
                                        {
                                            c5: [
                                                    [5,0,'Open']
                                                ] 
                                        }
                                    ]
                                }
                            )
        }

        // ADD CONDITION HERE








        encyptedData = encryptData( d, hp );

        return encyptedData;
    }

    $(document.body).on('click', '#btn_submit', function(){

        $('.chkSubject').each(function(){

            if( $(this).is(':checked') ){

                submitEnlistment( $(this).attr('c'), $('.t').attr('i') )

            }

        })
    });


    $(document.body).on('click', '.delete_enlistment', function(){

        ids = [$(this).attr('_c')];

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
            
                v1: '1',
            
                v2: 'Enlistment deleted successfully.',

                v3: ids
            
                }

        __BUILDERN(data);

        $('.toast').toast('show')
       
    });


    

    function submitEnlistment(_c,_i){

        var date = getDateNow();

        $.ajaxSetup({
  
            headers: {
  
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  
            }
  
        });

        $.ajax({
  
            url: "/UNIV/INSERT",
  
            type: "POST",
  
            async: false,
  
            data:{
  
                v1:'1',
  
                '1': _i,
  
                '2': '0',
  
                '3': 'For Approval',
  
                '4': '0000-00-00',
  
                '5': date,
  
                '6': $('.t').attr('eno'),

                '7': _c,
  
            },
            success:function(response){


                content = [
                    {
                            _E: 'label',

                            _C: 'form-label',

                            _V: 'Enlistment added successfully.',

                    },
                    {
                            _E: 'sm-label',

                            _C: 'form-label',


                            _V: 'Page is reloading..',

                    },
                   
                ]

                data =  {
                                modalTitle: 'Information',
                                
                                modalContent: content,
                                
                                buttonCancel: 'Close',
                                
                                url: '',
                                
                                v1: '',
                                
                                v2: '',
                                
                                v3: '',
                                
                                v4: ''
                        }

                __BUILDER(data);
                
              

                setTimeout(function(){
                    location.reload();
                },3000);
                
            },
        });

    }

    $(document.body).on('click', '.chkSubject', function(){

        // prerequisite
        p1 = $(this).attr('p1');

        // student id
        _i = $('.t').attr('i');

        // subject code
        _c = $(this).attr('c');

        toAppend = '';

        $.getJSON('/UNIV/FETCHJS/'+getEncrypted(1),function(data) {

            // latest enl batch
            fv1 = data[0]['no']

            // check if not none yung pre-req, check if completed
            if(p1 != 'none'){

                $.getJSON('/UNIV/FETCHJS/'+getEncrypted(2,[p1]), function(data) {

                    subjectCode = data[0]['subject_code'];

                    d = JSON.stringify({

                        table:  'student_subjects',

                        column: 'status',

                        where:  [

                                    ['subject_code','=',subjectCode],

                                ]

                    });

                    encyptedData = encryptData(d,hp);

                    $.getJSON('/UNIV/FETCHJS/'+encyptedData, function(data) {

                        if(data[0]['status'] != 'Completed'){

                            content = form_label('','You must complete the prerequisite subject.');

                            content += form_input('','v2','','',message,'hidden');

                            content += form_input('','v3','','',subject_code,'hidden');

                            footer = form_button('btn_close','Close','btn btn-sm mlqu-color text-light','button','background:#7A353C;height:25px;width:80px','data-dismiss="modal"');

                            showModal('modal_univ','Enlistment Exists');

                            formBuild('form_univ','',content,footer);

                            $('#'+id).prop('checked',false);

                        }
                        else
                        {
                            selectedSubject =[];

                            $('.chkSubject').each(function(){

                                if( $(this).is(':checked') ){

                                    var x = [{

                                                'code':$(this).attr('code'),

                                                'subject':$(this).attr('subject'),

                                                'unit': $(this).attr('unit')

                                    }]

                                    selectedSubject.push(x);

                                }
                            })

                            setSelected();
                        }
                        
                    })

                })

            }
            else{

                selectedSubject =[];

                $('.chkSubject').each(function(){

                    if( $(this).is(':checked') ){

                        var x = [{

                                    'code':$(this).attr('c'),

                                    'subject':$(this).attr('s'),

                                    'unit': $(this).attr('u')

                        }]

                        selectedSubject.push(x);

                    }
                })

                setSelected();
                
            }

        })
       

        // $.getJSON('/UNIV/FETCHJS/'+encyptedData, function(data) {

        //     enlistment_batch = data[0]['no'];

        //     // check if already enlisted
        //     d = JSON.stringify({

        //         table:  'enlistment',

        //         column: '*',

        //         where:  [

        //                     ['stud_id','=',stud_id],

        //                     ['subject_code','=',subject_code],

        //                     ['enl_batch','=',enlistment_batch],


        //                 ]
        //     });

        //     encyptedData = encryptData(d,hp);

        //     $.getJSON('/UNIV/FETCHJS/'+encyptedData, function(data) {

        //         if(Object.keys(data).length === 0 ){

        //             // check if not none yung pre-req, check if completed
        //             if(prerequisite != 'none'){

        //                 d = JSON.stringify({

        //                     table:  'subjects',

        //                     column: 'subject_code',

        //                     where:  [

        //                                 ['name','=',prerequisite],
                                    
        //                             ]
        //                 });

        //                 encyptedData = encryptData(d,hp);

        //                 $.getJSON('/UNIV/FETCHJS/'+encyptedData, function(data) {

        //                     subjectCode = data[0]['subject_code'];

        //                     d = JSON.stringify({

        //                         table:  'student_subjects',

        //                         column: 'status',

        //                         where:  [

        //                                     ['subject_code','=',subjectCode],

        //                                 ]

        //                     });

        //                     encyptedData = encryptData(d,hp);

        //                     $.getJSON('/UNIV/FETCHJS/'+encyptedData, function(data) {

        //                         if(data[0]['status'] != 'Completed'){

        //                             content = form_label('','You must complete the prerequisite subject.');

        //                             content += form_input('','v2','','',message,'hidden');

        //                             content += form_input('','v3','','',subject_code,'hidden');

        //                             footer = form_button('btn_close','Close','btn btn-sm mlqu-color text-light','button','background:#7A353C;height:25px;width:80px','data-dismiss="modal"');

        //                             showModal('modal_univ','Enlistment Exists');

        //                             formBuild('form_univ','',content,footer);

        //                             $('#'+id).prop('checked',false);

        //                         }
        //                         else
        //                         {
        //                             selectedSubject =[];

        //                             $('.chkSubject').each(function(){

        //                                 if( $(this).is(':checked') ){

        //                                     var x = [{

        //                                                 'code':$(this).attr('code'),

        //                                                 'subject':$(this).attr('subject'),

        //                                                 'unit': $(this).attr('unit')

        //                                     }]

        //                                     selectedSubject.push(x);

        //                                 }
        //                             })

        //                             setSelected();
        //                         }
                                
        //                     })

        //                 })

        //             }
        //             else{

        //                 selectedSubject =[];

        //                 $('.chkSubject').each(function(){

        //                     if( $(this).is(':checked') ){

        //                         var x = [{

        //                                     'code':$(this).attr('code'),

        //                                     'subject':$(this).attr('subject'),

        //                                     'unit': $(this).attr('unit')

        //                         }]

        //                         selectedSubject.push(x);

        //                     }
        //                 })

        //                 setSelected();
                        
        //             }

        //         }
        //         else{

        //             $('.chkSubject').each(function(){

        //                 if( $(this).attr('code') == subject_code ){

        //                     content = form_label('','You have enlisted this subject already.');

        //                     content += form_input('','v2','','',message,'hidden');

        //                     content += form_input('','v3','','',subject_code,'hidden');

        //                     footer = form_button('btn_close','Close','btn btn-sm mlqu-color text-light','button','background:#7A353C;height:25px;width:80px','data-dismiss="modal"');

        //                     showModal('modal_univ','Enlistment Exists');

        //                     formBuild('form_univ','',content,footer);

        //                     $(this).prop('checked',false);

        //                 }

        //             })

        //         }

        //     })

        // })

    });

    function checkFunction()
    {
        $('.chkSubject').each(function(){

            // prerequisite
            p1 = $(this).attr('p1');

            // student id
            _i = $('.t').attr('i');

            // subject code
            _c = $(this).attr('c');

            toAppend = '';

            $.getJSON('/UNIV/FETCHJS/'+getEncrypted(1),function(data) {

                // latest enl batch
                fv1 = data[0]['no']

                // check if not none yung pre-req, check if completed
                if(p1 != 'none')
                {

                    $.getJSON('/UNIV/FETCHJS/'+getEncrypted(2,[p1]), function(data) {

                        subjectCode = data[0]['subject_code'];

                        d = JSON.stringify({

                            table:  'student_subjects',

                            column: 'status',

                            where:  [

                                        ['subject_code','=',subjectCode],

                                    ]

                        });

                        encyptedData = encryptData(d,hp);

                        $.getJSON('/UNIV/FETCHJS/'+encyptedData, function(data) {

                            if(data[0]['status'] != 'Completed'){

                                content = form_label('','You must complete the prerequisite subject.');

                                content += form_input('','v2','','',message,'hidden');

                                content += form_input('','v3','','',subject_code,'hidden');

                                footer = form_button('btn_close','Close','btn btn-sm mlqu-color text-light','button','background:#7A353C;height:25px;width:80px','data-dismiss="modal"');

                                showModal('modal_univ','Enlistment Exists');

                                formBuild('form_univ','',content,footer);

                                $('#'+id).prop('checked',false);

                            }
                            else
                            {
                                selectedSubject =[];

                                $('.chkSubject').each(function(){

                                    if( $(this).is(':checked') ){

                                        var x = [{

                                                    'code':$(this).attr('code'),

                                                    'subject':$(this).attr('subject'),

                                                    'unit': $(this).attr('unit')

                                        }]

                                        selectedSubject.push(x);

                                    }
                                })

                                setSelected();
                            }
                            
                        })

                    })

                }
                else
                {

                    selectedSubject =[];

                    $('.chkSubject').each(function(){

                        if( $(this).is(':checked') ){

                            var x = [{

                                        'code':$(this).attr('c'),

                                        'subject':$(this).attr('s'),

                                        'unit': $(this).attr('u')

                            }]

                            selectedSubject.push(x);

                        }
                    })

                    setSelected();
                    
                }

            })
        })
    }

    $(document.body).on('click', '#checkAllMajor', function(){

        checkFunction();

        if($(this).prop('checked'))
        {
            $('.chkMajor').prop('checked',true)
        }
        else
        {
            $('.chkMajor').prop('checked',false)
        }

    })

    $(document.body).on('click', '#chkAllMinor', function(){

        checkFunction()

        if($(this).prop('checked'))
        {
            $('.chkMinor').prop('checked',true)
        }
        else
        {
            $('.chkMinor').prop('checked',false)
        }

    })

    $(document.body).on('click', '#checkAllOther', function(){

        checkFunction();

        if($(this).prop('checked'))
        {
            $('.chkOther').prop('checked',true)
        }
        else
        {
            $('.chkOther').prop('checked',false)
        }

    })

    function setSelected(){

        var toAppend = '';

        total = 0;

        for(var i = 0; i < selectedSubject.length; i++) {

            toAppend += '<tr>'
          
            + '<td code="'+selectedSubject[i][0].code+'">'+selectedSubject[i][0].subject+'</td>'
          
            + '<td>'+selectedSubject[i][0].unit+'</td'
          
            + '</tr>'

            total = parseInt(selectedSubject[i][0].unit) + total;

        }

        $('#tbl_selected tbody').empty();

        if(toAppend)
        {

            toAppend += '<tr>'
         
            + '<td class="text-right font-weight-bold">Total units:</td>'
         
            + '<td>'+total.toFixed(1)+'</td'
         
            + '</tr>'

            $('#tbl_selected tbody').append(toAppend);

            $('#qwe').addClass('d-none');

       
        }
        else
        {   

            $('#qwe').removeClass('d-none');


        }

    }

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');
        
        $('#nv_student').removeClass('active');
        
        $('#nv_schedule').removeClass('active');

        addSearch("txtSearch", "tbl_major");

        addSearch("txtSearch", "tbl_minor");

        addSearch("txtSearch", "tbl_other");

        document.getElementById("selYear").selectedIndex = "1";
     
        document.getElementById("selProgram").selectedIndex = "1";


    })
   

    $(document.body).on('change', '#selYear', function(){



    })

    


       



        

    

   

    function collectTableData(id,variable)
    {
       
        var table = document.getElementById(id);

        for (var r = 1, n = table.rows.length; r < n; r++) {

            temp = [];

            for (var c = 1, m = table.rows[r].cells.length; c < m; c++) {

                if(table.rows[r].cells[c].innerHTML)
                {

                    temp.push(table.rows[r].cells[c].innerHTML);

                }   
                


                // alert(table.rows[r].cells[c].innerHTML);

            }

            variable.push(temp);
            
        }

    }





    // $('.__edit').click('',function ()  {

    //     var code = $(this).attr('code');

    //     var startDate = $(this).attr('startDate');

    //     var startedBy = $(this).attr('startedBy');

    //     var endDate = $(this).attr('endDate');
        
    //     var status = $(this).attr('status');

    //     var campus = $(this).attr('campus');

    //     content = [
    //                 {
    //                     _E: 'label',

    //                     _C: 'form-label',

    //                     _V: 'Campus',

    //                 },
    //                 {
    //                     _E: 'select',

    //                     _C: 'custom-select form-control',

    //                     _I: 'txtCampus',

    //                     _N: 'campus',
    //                 },
    //                 {
    //                     _E: 'label',

    //                     _C: 'form-label mt-2',

    //                     _V: 'Start Date',

    //                 },
    //                 {
    //                     _E: 'input',

    //                     _T: 'date',

    //                     _I: 'txtStartDate',

    //                     _N: 'startDate',

    //                     _C: 'form-control',
                        
    //                     _V: startDate
    //                 },
    //                 {
    //                     _E: 'label',

    //                     _C: 'form-label mt-2',

    //                     _V: 'End Date',
    //                 },
    //                 {
    //                     _E: 'input',

    //                     _T: 'date',

    //                     _I: 'txtEndDate',

    //                     _N: 'endDate',

    //                     _C: 'form-control',

    //                     _V: endDate

    //                 },
    //                 {
    //                     _E: 'label',

    //                     _C: 'form-label mt-2',

    //                     _V: 'Status',
    //                 },
    //                 {
    //                     _E: 'select',

    //                     _C: 'custom-select form-control',

    //                     _I: 'txtStatus',

    //                     _N: 'status',
    //                 },
    //                 {
    //                     _E: 'input',

    //                     _T: 'text',

    //                     _I: 'txtStartedBy',

    //                     _N: 'startedBy',

    //                     _V: startedBy,

    //                     _A: 'hidden'

    //                 },
    //                 {
    //                     _E: 'input',

    //                     _T: 'text',

    //                     _V: code,

    //                     _A: 'hidden',

    //                     _I: 'txtCampus',

    //                     _N: 'id',
    //                 },
                   
    //         ]

    //     id = [code];

    //     d = JSON.stringify({
    //         id
    //     })

    //     id = encryptData(d,hp);

    //     data =  {
    //                     modalTitle: 'Edit Clearance Batch',
                        
    //                     modalContent: content,
                        
    //                     buttonSubmit:  'Save',
                        
    //                     buttonCancel: 'Close',
                        
    //                     url: '/UNIV/EDIT',
                        
    //                     v1: 'clearance_batch',
                        
    //                     v2: 'Clearance batch updated successfully.',
                        
    //                     v3: id,
                        
    //                     v4: ''
    //             }

    //     __BUILDER(data);


    //     // PREPARE FETCHING DATA FOR OPTION
    //     _IV = 'id';

    //     _OV = 'name' ;

    //     d =  JSON.stringify({

    //           table:'campus_list',

    //           column: [_OV,_IV]

    //     })

    //     encyptedData = encryptData(d,hp);

    //     data = [
    //             {
    //                     _E: 'option',

    //                     _IV: 'Open',

    //                     _FS: 'txtStatus',

    //                     _OV: 'Open',
    //             },
    //             {
    //                     _E: 'option',

    //                     _IV: 'Closed',

    //                     _FS: 'txtStatus',

    //                     _OV: 'Closed',
    //             },
    //             {
    //                     _E: 'option-selected-value',

    //                     _FS: 'txtStatus',

    //                     _SV: status,
    //             },
    //             {
    //                     _E: 'option-fetch-value',

    //                     _U: '/UNIV/FETCHJS/',

    //                     _ED: encyptedData,

    //                     _I: 'txtCampus',

    //                     _IV: _IV,

    //                     _OV: _OV
    //             },
    //             {
    //                     _E: 'option-selected-value',

    //                     _FS: 'txtCampus',

    //                     _SV: campus,
    //             }
    //     ]

    //     __ADDTL(data);
 
    // })

    // $('.__add').click('',function ()  {

    //     startedBy = $('.t').attr('clas');

    //     content = [
    //                 {
    //                     _E: 'label',

    //                     _C: 'form-label ',

    //                     _V: 'Campus',

    //                 },
    //                 {
    //                     _E: 'select',

    //                     _C: 'custom-select form-control',

    //                     _I: 'txtCampus',

    //                     _N: 'campus',
    //                 },
    //                 {
    //                     _E: 'label',

    //                     _C: 'form-label mt-2',

    //                     _V: 'Start Date',

    //                 },
    //                 {
    //                     _E: 'input',

    //                     _T: 'date',

    //                     _I: 'txtStartDate',

    //                     _N: 'startDate',

    //                     _C: 'form-control',
                            
    //                 },
    //                 {
    //                     _E: 'label',

    //                     _C: 'form-label mt-2',

    //                     _V: 'End Date',
    //                 },
    //                 {
    //                     _E: 'input',

    //                     _T: 'date',

    //                     _I: 'txtEndDate',

    //                     _N: 'endDate',

    //                     _C: 'form-control',

    //                 },
    //                 {
    //                     _E: 'label',

    //                     _C: 'form-label mt-2',

    //                     _V: 'Status',
    //                 },
    //                 {
    //                     _E: 'select',

    //                     _C: 'custom-select form-control',

    //                     _I: 'txtStatus',

    //                     _N: 'status',
    //                 },
    //                 {
    //                     _E: 'input',

    //                     _T: 'text',

    //                     _I: 'txtStartedBy',

    //                     _N: 'startedBy',

    //                     _V: startedBy,

    //                     _A: 'hidden'

    //                 },
                   
    //         ]

    //     data =  {
    //                     modalTitle: 'Add Clearance Batch',
                        
    //                     modalContent: content,
                        
    //                     buttonSubmit:  'Save',
                        
    //                     buttonCancel: 'Close',
                        
    //                     url: '/UNIV/INSERT',
                        
    //                     v1: 'clearance_batch',
                        
    //                     v2: 'Clearance batch updated successfully.',
                        
    //                     v3: '',
                        
    //                     v4: '',
    //                     mi:''
    //             }

    //     __BUILDER(data);

    //     // PREPARE FETCHING DATA FOR OPTION {OV - outer value , IV - inner value}
    //     _IV = 'id';

    //     _OV = 'name' ;

    //     d =  JSON.stringify({

    //           table:'campus_list',

    //           column: [_OV,_IV]

    //     })

    //     encyptedData = encryptData(d,hp);

    //     data = [

    //             {
    //                     _E: 'option',

    //                     _IV: 'Open',

    //                     _FS: 'txtStatus',

    //                     _OV: 'Open',
    //             },
    //             {
    //                     _E: 'option',

    //                     _IV: 'Closed',

    //                     _FS: 'txtStatus',

    //                     _OV: 'Closed',
    //             },
    //             {
    //                     _E: 'option-fetch-value',

    //                     _U: '/UNIV/FETCHJS/',

    //                     _ED: encyptedData,

    //                     _I: 'txtCampus',

    //                     _IV: _IV,

    //                     _OV: _OV
    //             }
                
    //     ]

    //     __ADDTL(data);

    // })

    // $('body').on('click', '.__delete', function () {

    //     code = $(this).attr('code');

    //     id = [code];

    //     d = JSON.stringify({
    //         _D: id
    //     })

    //     id = encryptData(d,hp);

        // content = [
        //             {
        //                     _E: 'label',

        //                     _C: 'form-label',

        //                     _V: 'Do you want to delete this item?',

        //             },
                   
        //         ]

        // data =  {
        //                 modalTitle: 'Delete Clearance Batch',
                        
        //                 modalContent: content,
                        
        //                 buttonSubmit:  'Confirm',
                        
        //                 buttonCancel: 'Close',
                        
        //                 url: '/UNIV/DELETE',
                        
        //                 v1: 'clearance_batch',
                        
        //                 v2: 'Clearance batch deleted successfully.',
                        
        //                 v3: id,
                        
        //                 v4: ''
        //         }

        // __BUILDER(data);

    // })
 
    
  </script>