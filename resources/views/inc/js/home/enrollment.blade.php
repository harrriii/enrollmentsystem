
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
                + '<td><input type="checkbox" class="chkList" code="'+val['code']+'" aria-label="test"> </td>'
                + '<td>'+val['code']+'</td>'
                + '<td>'+val['name']+'</td>'
                + '</tr>'

            })

            $('#tbl_studentSearch tbody').empty();

            $('#tbl_studentSearch tbody').append(toAppend);

            feather.replace();
        })

    } 
    function getSubjects(id){

        var toAppend = '';
        
        d = JSON.stringify({
                            table:  'student_profile',
                            column: [
                                        'subjects.subject_code as subjectCode',
                                        'subjects.name as subject',
                                        'subjects.category as subjectCategory',
                                        'subjects.units as units',
                                        'subjects.prerequisite as prerequisite'
                                    ],
                            join:   [
                                        ['student_year', 'student_year.stud_id', '=', 'student_profile.stud_id'],
                                        ['year_lvl', 'year_lvl.yr_code', '=', 'student_year.yr_code'],
                                        ['subject_year', 'subject_year.yr_code', '=', 'year_lvl.yr_code'],
                                        ['subjects', 'subjects.subject_code', '=', 'subject_year.subject_code'],
                                    ],
                            where:  [
                                        ['student_profile.stud_id','=',id]
                                    ]
        });

        $.getJSON('/UNIV/FETCHDATA/'+ encryptData(d,hp) , function (data) {

            var minorSubjects = [];
            var majorSubjects = [];
            var otherSubjects = [];

            for (let i = 0; i < data.length; i++) {
                console.log(data[i]['subjectCategory']);

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
                    if(data[i]['subjectCategory'] == 'Other'){

                    otherSubjects.push([
                                            data[i]['subjectCode'],
                                            data[i]['subject'],
                                            data[i]['subjectCategory'],
                                            data[i]['units'],
                                            data[i]['prerequisite']
                                        ])
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

    }    
    function getInformation(studentId){

        toAppend =''
        d = JSON.stringify({
                                table:'student_profile',
                                column: [
                           
                                            'concat(fname," ",mname," ",lname) as "name"',
                                            'year_lvl.yr_name as year',
                                            'courses.cour_name'
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
            
            console.log(data)
            $('#txtStudentNo').val( studentId );
            $('#txtStudentNo').attr('readonly',true);
            $('#txtName').val( data[0]['name'] );
            $('#txtYear').val(data[0]['year'] );
            $('#txtCourse').val( data[0]['cour_name'] );

            getSubjects(studentId);
        })
    }
    function setSelected(){

        var toAppend='';

        for(var i = 0; i < selectedSubject.length; i++) {
        
            toAppend += '<tr>'
            + '<td code="'+selectedSubject[i][0].code+'">'+selectedSubject[i][0].subject+'</td>'
            + '<td>'+selectedSubject[i][0].unit+'</td'
            + '</tr>'

        }
        $('#tbl_selected tbody').empty();

        if(toAppend){

            $('#tbl_selected tbody').append(toAppend);

            $('#alert_noSelected').attr('hidden',true);
        }
        else{   

            $('#alert_noSelected').removeAttr('hidden');

        }

    }
    function submitEnlistment(subject,studentNumber,enlistmentDate){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/enlistment",
            type: "POST",
            data:{
                    subject_code:subject,
                    stud_id:studentNumber,
                    enlistment_date:enlistmentDate,
                
            },
            success:function(response){
                $('#alert_enlistment').empty()
                $('#alert_enlistment').append(response.success)
                $('#alert_enlistment').removeAttr('hidden')

                setTimeout(function(){
                    location.reload();
                },1200);
                
            },
        });
    }

    $(document.body).ready(function(){
        
        $(".alert").delay(2000).slideUp(300);
        
        $('#nv_dashboard').addClass('active');
        $('#nv_student').removeClass('active');
        $('#nv_schedule').removeClass('active');
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

        getInformation(studentId);

    });

    $(document.body).on('click', '.chkList', function(){

        $('.chkList').prop('checked', false);

        $(this).prop('checked', true);

    });

    $(document.body).on('click', '.chkSubject', function(){

        var stud_id = $('#txtStudentNo').val();

        var subject_code = $(this).attr('code');

        toAppend = '';
        
        d = JSON.stringify({
                                table:  'enlistment',
                                column: '*',
                                where:  [
                                            ['stud_id','=',stud_id],
                                            ['subject_code','=',subject_code]
                                        ]
        });

        encyptedData = encryptData(d,hp);

        $.getJSON('/UNIV/FETCHDATA/'+encyptedData, function(data) {

            console.log(Object.keys(data).length < 0)
            if(Object.keys(data).length === 0 ){

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
            else{
                $('.chkSubject').each(function(){
                    if( $(this).attr('code') == subject_code ){

                        content = form_label('','You have enlisted this subject already.');
                        content += form_input('','v2','','',message,'hidden');
                        content += form_input('','v3','','',subject_code,'hidden');
                        footer = form_button('btn_close','Close','btn btn-sm mlqu-color','button','background:#7A353C;height:25px;width:80px','data-dismiss="modal"');

                        showModal('modal_univ','Enlistment Exists');
                        formBuild('form_univ','',content,footer);

                        $(this).prop('checked',false);
                    }
                })
            }
        
        })

        // var data = __FETCH('UNIV/FETCHDATA',d);

        // console.log(data);
        // console.log(Object.keys(data).length === 0);


        // if(Object.keys(data).length === 0 ){
        //     selectedSubject =[];

        //     $('.chkSubject').each(function(){
        //         if( $(this).is(':checked') ){
        //             var x = [{
        //                         'code':$(this).attr('code'),
        //                         'subject':$(this).attr('subject'),
        //                         'unit': $(this).attr('unit')
        //             }]
        //             selectedSubject.push(x);
        //         }
        //     })

        //     setSelected();
        // }
        // else{
        //     $(this).prop('checked',false);
        // }
        

    });

    $(document.body).on('click', '#btn_submit', function(){

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '/' +  mm + '/' + dd ;

        $('.chkSubject').each(function(){
            if( $(this).is(':checked') ){
                submitEnlistment($(this).attr('code'),$('#txtStudentNo').val(),today)
            }
        })

    

    });

</script>