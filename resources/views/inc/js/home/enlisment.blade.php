
<script type="text/javascript">

    var selectedSubject = [];

    $( ".icon" ).mouseover(function() {
        $(this).css('transform','scale(1.2)');
    })
    .mouseout(function() {
        $(this).css('transform','scale(1)');
    });

    function getStudents(){
        
        var toAppend = '';
        
        d = JSON.stringify({

            table :     'student_profile',
            column :    [
                            'stud_id as code',
                            'concat(fname," ",mname," ",lname) as "name"'
                        ]
        });

        encyptedData = encryptData(d,hp);

        $.getJSON('/UNIV/FETCHDATA/'+encyptedData, function(data) {

            $('#modal_studentSearch').modal('show');
           
            $.each(data, function(key,val){

                toAppend += '<tr>'
                + '<td><input type="checkbox" class="chkList custom-checkbox" code="'+val['code']+'" style="" aria-label="test"> </td>'
                + '<td>'+val['code']+'</td>'
                + '<td>'+val['name']+'</td>'
                + '</tr>'

            })

            $('#tbl_studentSearch tbody').empty();

            $('#tbl_studentSearch tbody').append(toAppend);

            feather.replace();
        })

    } 
    function getInformation(studentId,no){

        toAppend =''

        d = JSON.stringify({
                                table:'student_profile',
                                column: [
                           
                                            'concat(fname," ",mname," ",lname) as "name"',
                                            'year_lvl.yr_name as year',
                                            'year_lvl.yr_value as yrValue',
                                            'courses.cour_name',
                                            'yr_value'
                                        ],
                                join:   [
                                            ['student_year', 'student_year.stud_id', '=', 'student_profile.stud_id'],
                                            ['year_lvl', 'year_lvl.yr_code', '=', 'student_year.yr_code'],
                                            ['student_course', 'student_course.stud_id', '=', 'student_profile.stud_id'],
                                            ['courses', 'student_course.cour_code', '=', 'courses.cour_code'],
                                        ],
                                where:  [
                                            ['student_profile.stud_id','=',studentId]
                                        ]
        })

        $.getJSON('/UNIV/FETCHDATA/'+encryptData(d,hp), function(data) {

            $('#txtStudentNo').val( studentId );
            $('#txtStudentNo').attr('readonly',true);
            $('#txtName').val( data[0]['name'] );
            $('#txtYear').val( data[0]['year'] );
            $('#txtCourse').val( data[0]['cour_name'] );

            studentYr = data[0]['yrValue'];

            // TO GET SUBJECTS
            d = JSON.stringify({
                                table:'enlistment_subject',
                                column: [
                                            'subjects.subject_code as subjectCode',
                                            'subjects.name as subject',
                                            'subjects.category as subjectCategory',
                                            'subjects.units as units',
                                            'subjects.prerequisite as prerequisite',
                                            'for_yr'
                                        ],
                                where:  [
                                            ['enlistment_batch','=',no],
                                            ['min_yr','<=',studentYr],
                                            ['max_yr','>=',studentYr]
                                        ],
                                join:   [
                                            ['subjects','subjects.subject_code','=','enlistment_subject.subject_code']
                                        ]
                                
            })

            $.getJSON('/UNIV/FETCHDATA/'+encryptData(d,hp), function(data) {

                var minorSubjects = [];
                var majorSubjects = [];
                var otherSubjects = [];

                for (let i = 0; i < data.length; i++) {

                    if(data[i]['for_yr'] != studentYr){

                        otherSubjects.push([
                                                data[i]['subjectCode'],
                                                data[i]['subject'],
                                                data[i]['subjectCategory'],
                                                data[i]['units'],
                                                data[i]['prerequisite']
                                            ])
                    }
                    else{

                        if(data[i]['subjectCategory'] == 'Major'){

                            majorSubjects.push([
                                                    data[i]['subjectCode'],
                                                    data[i]['subject'],
                                                    data[i]['subjectCategory'],
                                                    data[i]['units'],
                                                    data[i]['prerequisite']
                                                ])
                        }
                        if(data[i]['subjectCategory'] == 'Minor'){

                            minorSubjects.push([
                                                    data[i]['subjectCode'],
                                                    data[i]['subject'],
                                                    data[i]['subjectCategory'],
                                                    data[i]['units'],
                                                    data[i]['prerequisite']
                                                ])
                        }
                    }
                    
                        
                    
                }

                var toAppendMajor ='';
                var toAppendMinor ='';
                var toAppendOther ='';

                alert   = '<div class="alert alert-secondary text-secondary"  style="background:#F7F7F7" role="alert" >'
                        +'No available data.'
                        +'</div>';

            
                if($.isEmptyObject(majorSubjects))
                {
                    $('#empty_major').append(alert);
                    $('#tbl_major').attr('hidden',true);
                    $('#txtSearch_major').attr('hidden',true);
                }
                else{
                
                    appendToTable('tbl_major',majorSubjects,'homeEnlistment')
                }

                if($.isEmptyObject(minorSubjects))
                {
                    $('#empty_minor').append(alert);
                    $('#tbl_minor').attr('hidden',true);
                    $('#txtSearch_minor').attr('hidden',true);
                    
                }
                else{
        
                    appendToTable('tbl_minor',minorSubjects,'homeEnlistment')
                }

                if($.isEmptyObject(otherSubjects))
                {
                    $('#empty_other').append(alert);
                    $('#tbl_other').attr('hidden',true);
                    $('#txtSearch_other').attr('hidden',true);

                }
                else{

                    appendToTable('tbl_other',otherSubjects,'homeEnlistment')
                }

                $('#subjectField').removeAttr('hidden');
                $('#noSubjectField').attr('hidden',true);
             
            })
        })
    }
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

        if(toAppend){

            toAppend += '<tr>'
            + '<td class="text-right font-weight-bold">Total units:</td>'
            + '<td>'+total.toFixed(1)+'</td'
            + '</tr>'

            $('#tbl_selected tbody').append(toAppend);

            $('#alert_noSelected').attr('hidden',true);
        }
        else{   

            $('#alert_noSelected').removeAttr('hidden');

        }

    }
    function submitEnlistment(subject,studentNumber){

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
                    v1:'enlistment',
                    v2:'',
                    v3:'',
                    v4:'',
                    subject_code: subject,
                    stud_id: studentNumber,
                    approving_adviser: '0',
                    current_status: 'FOR APPROVAL',
                    approved_date: '0000-00-00',
                    enlistment_date: date,
                    enl_batch: $('#txtEnlistmentBatch').attr('no')
                },
            success:function(response){
                $('#alert_enlistment').empty()
                $('#alert_enlistment').append('Enlistment added successfully.')
                $('#alert_enlistment').removeAttr('hidden')

                setTimeout(function(){
                    location.reload();
                },1200);
                
            },
        });
    }
    function getEnlistment(){

        d = JSON.stringify({
                                table:'enlistment_batch',
                                column: [
                                            'enl_startDate',
                                            'enl_endDate',
                                            'no'
                                        ],
                                where:  [
                                            ['status','=','Open']
                                        ]
        })

        $.getJSON('/UNIV/FETCHDATA/'+encryptData(d,hp), function(data) {

     
            if (data.length>0) {

                setBanner(data[0]['enl_startDate'],data[0]['enl_endDate'],data[0]['no'])

            }
            else{

                $('#txtEnlistmentBanner').text('Subjects enlistment is now closed.');

                $('#txtEnlistmentDate').text('Wait for further announcement.');

            }
            

        })

        
       
    }

    
    function setBanner(startDate,endDate,enlistmentNo){

        if(dateCheck(startDate,endDate,getDateNow())){

            $('#txtEnlistmentBanner').text('Subjects enlistment is now open!');

            $('#txtEnlistmentDate').text("("+formatDateMDY(startDate)+" - "+formatDateMDY(endDate)+")");

            $('#txtEnlistmentBatch').attr('no',enlistmentNo);

            $('#btn_select').attr('no',enlistmentNo);

            $('.pageContent').removeAttr('hidden');

            addSearch("txtStudentSearch","tbl_studentSearch");

            addSearch("txtSearchMajor","tbl_major");

            addSearch("txtSearchMinor","tbl_minor");

            addSearch("txtSearchOther","tbl_other");

            $(".alert").delay(2000).slideUp(300);
            
            $('#nv_dashboard').addClass('active');

            $('#nv_student').removeClass('active');

            $('#nv_schedule').removeClass('active');
        }
        else{

            $('#txtEnlistmentBanner').text('Subjects enlistment is now closed.');

            $('#txtEnlistmentDate').text('Wait for further announcement.');

        }
       
    }

    $(document.body).ready(function(){

        getEnlistment()

    })

    $( "#txtStudentNo" ).click(function( event ) {

        event.preventDefault();

        getStudents();

    });

    $(document.body).on('click', '#btn_select', function(){

        var studentId = '';

        $('.chkList').each(function(){

            if( $(this).is(':checked') ){

                studentId= $(this).attr('code');

            }

        })

        no = $(this).attr('no');
 
        getInformation(studentId,no);

    });

    $(document.body).on('click', '.chkList', function(){

        $('.chkList').prop('checked', false);

        $(this).prop('checked', true);

    });

    $(document.body).on('click', '.chkSubject', function(){

        prerequisite = $(this).attr('prerequisite');

        id = $(this).attr('id');

        stud_id = $('#txtStudentNo').val();

        subject_code = $(this).attr('code');

        toAppend = '';

        enlistment_batch = '';

        // get latest enlistment batch
        d = JSON.stringify({
                                table:  'enlistment_batch',

                                column: 'no',

                                where:  [
                                            ['status','=','Open']
                                        ]
        });

        encyptedData = encryptData(d,hp);

        $.getJSON('/UNIV/FETCHDATA/'+encyptedData, function(data) {

            enlistment_batch = data[0]['no'];

            // check if already enlisted
            d = JSON.stringify({

                table:  'enlistment',

                column: '*',

                where:  [

                            ['stud_id','=',stud_id],

                            ['subject_code','=',subject_code],

                            ['enl_batch','=',enlistment_batch],


                        ]
            });

            encyptedData = encryptData(d,hp);

            $.getJSON('/UNIV/FETCHDATA/'+encyptedData, function(data) {

                if(Object.keys(data).length === 0 ){

                    // check if not none yung pre-req, check if completed
                    if(prerequisite != 'none'){

                        d = JSON.stringify({

                            table:  'subjects',

                            column: 'subject_code',

                            where:  [

                                        ['name','=',prerequisite],
                                    
                                    ]
                        });

                        encyptedData = encryptData(d,hp);

                        $.getJSON('/UNIV/FETCHDATA/'+encyptedData, function(data) {

                            subjectCode = data[0]['subject_code'];

                            d = JSON.stringify({

                                table:  'student_subjects',

                                column: 'status',

                                where:  [

                                            ['subject_code','=',subjectCode],

                                        ]

                            });

                            encyptedData = encryptData(d,hp);

                            $.getJSON('/UNIV/FETCHDATA/'+encyptedData, function(data) {

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

                                            'code':$(this).attr('code'),

                                            'subject':$(this).attr('subject'),

                                            'unit': $(this).attr('unit')

                                }]

                                selectedSubject.push(x);

                            }
                        })

                        setSelected();
                        
                    }

                }
                else{

                    $('.chkSubject').each(function(){

                        if( $(this).attr('code') == subject_code ){

                            content = form_label('','You have enlisted this subject already.');

                            content += form_input('','v2','','',message,'hidden');

                            content += form_input('','v3','','',subject_code,'hidden');

                            footer = form_button('btn_close','Close','btn btn-sm mlqu-color text-light','button','background:#7A353C;height:25px;width:80px','data-dismiss="modal"');

                            showModal('modal_univ','Enlistment Exists');

                            formBuild('form_univ','',content,footer);

                            $(this).prop('checked',false);

                        }

                    })

                }

            })

        })
        
    });

    $(document.body).on('click', '#btn_submit', function(){

        $('.chkSubject').each(function(){

            if( $(this).is(':checked') ){

                submitEnlistment($(this).attr('code'),$('#txtStudentNo').val())

            }

        })
    });

  

</script>