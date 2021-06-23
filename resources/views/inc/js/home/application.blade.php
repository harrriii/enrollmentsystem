

<script type="text/javascript">

let formInputs = [];

let formContent = [];

let formPanels = [];

let panelIds = [];

let rowIds = [];

let colIds = [];

let panel_list =[];

let row_list =[];

let column_list =[];

let element_list =[];

let var_keys = [];

let row_keys = [];

let col_keys = [];

let panel_keys = [];

var panelcount = 0;

var loadingStatus = false;

var currentPanel = 0;

var tempArray = [];

var finalArray = [];

var firstInsert = false;

var checkInsert = false;

var checkPoint = 0;

    $(document.body).ready(function(){

        let lf = new LazyForm('Registration Form','.panelContainer');
        lf.init('Application Form','.panelContainer')

        // getformPanels()

        // $.each(panel_list, function(key, val){

        //     writePanel(val[0],val[1])

        //     panelcount++;

        // })

        // $.each(row_list, function(key, val){

        //     writeRow(val[0],val[1],val[2])

        // })

        // $.each(column_list, function(key, val){

        //     writeCol(val[0],val[1],val[2],val[3],val[4])

        // })  

        // $.each(element_list, function(key, val){

        //     writeElement(
        //                     [{
                          
        //                         'colId':val[0],
                          
        //                         'tc':val[1],
                          
        //                         'cc':val[2],
                          
        //                         'element':val[3],
                          
        //                         'type':val[4],
                          
        //                         'label':val[5],
                          
        //                         'pf':val[6],
                          
        //                         'iV':val[7],
                          
        //                         'oV':val[8],
                          
        //                         'elementId':val[9],
                          
        //                         'ig':val[10],
                          
        //                         'value':val[11]
                          
        //                     }]
        //                 )

        // }) 

        $('#loading').hide();

        output = '<button type="button" class="btn text-light btn text-light pb-2 px-3 mr-1" style="background:#7A353C;height:30px;font-size:9pt;"   id="btn_next">Next</button>'

        $('#col_btn_next').append(output)
     
    })

    $(document.body).on('click', '#tester', function(){

        // let lf = new LazyForm();

        // lf.init('Application Form','.panelContainer')
        

    })

    $(document.body).on('click', '#btn_modal_submit', function(){

        compileInputs();

        // console.log(finalArray)

        prepareForm()


        // var form_data = new FormData();
        // var file_data = $("#FileInput108").prop("files")[0];

        // form_data.append("file", file_data)
        // form_data.append("user_id", 123)


        // let tempo = 'test';

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

       
            // type: 'POST',

            // data: { testdata:tempo},

            // url: '/APPLICATION/SUBMIT',

            // dataType: 'JSON',

            

           

            // // contentType: 'application/json',

            // cache: false,

            // // processData: false,

            // success: function( data ){
                
            //     console.log(data);

            // }


        // })

        
        


        // insertToTemp(finalArray)

    })


    // function submitForm(form_data)
    // {
        
       

    // }
    
    // function insertToTemp( arr )
    // {
    //     $.each(arr, function(key, val){

    //         $.each(val.data, function(key, value){

    //             // tablecode + name + id + value + type
    //             console.log(value[0]+' '+value[1]+' '+value[2]+' '+value[3]+' '+value[4])

    //         })

    //     })

    // }

    function getId()
    {
        $.get('/APPLICATION/GETID', function(response) {
            //handle response
        })
    }

    // function prepareForm()
    // {

    //     $.get('/APPLICATION/GETCODE', function(vercode) {

    //         $.get('/APPLICATION/GETID', function(id) {

    //             $.each(formInputs, function(key, val){

    //                 console.log(val.data)

    //                 var form_data = new FormData();

    //                 form_data.append( 'vercode', vercode )

    //                 form_data.append( 'applicant_id', id )

    //                 $.each(val.data, function(key, value){

    //                     if( value[0] != 0 )
    //                     {

    //                         if( val.data[4] == 'select' || val.data[4] == 'text' || val.data[4] == 'date' || val.data[4] == 'hidden'   )
    //                         {
                    
    //                             form_data.append( 'tc', val.data[0] )

    //                             form_data.append( 'cc', val.data[1] )

    //                             form_data.append( 'v', val.data[2] )

    //                             form_data.append( 't', val.data[4] )

    //                         }

    //                         if( val.data[4] == 'image-file' ||  val.data[4] == 'file' )
    //                         {
                  
    //                             file_data = $('#'+val.data[2]).prop("files")[0];

    //                             form_data.append( 'tc', val.data[0] )

    //                             form_data.append( 'cc', val.data[1] )

    //                             form_data.append( 'v', file_data )

    //                             form_data.append( 't', val.data[4] )

    //                         }
                            
    //                     }

    //                 })

    //                 $.ajaxSetup({
               
    //                         headers: {
                
    //                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            
    //                         }
           
    //                 });

    //                 $.ajax({

    //                         url: "/APPLICATION/SUBMIT", 
                    
    //                         dataType: 'script',
                    
    //                         cache: false,
                    
    //                         contentType: false,
                    
    //                         processData: false,
                    
    //                         data: form_data, 
                    
    //                         type: 'post',
                    
    //                         success: function(data) {}
    //                     })

    //                 })

    //         })

           

    //     })

       
    // }

    // function compileInputs()
    // {
    //     $('.userInput').each(function(i, obj) {

    //     formInputs.push(
    //                         {

    //                             ig:     $(this).attr('ig'),

    //                             data:   [$(this).attr('tc'),$(this).attr('name'),$(this).attr('id'),$(this).val(),$(this).attr('it')]

    //                         }
    //                     )
    //     })

    //     // console.log(formInputs);

    //     // for (let index = 0; index < formInputs.length; index++) {

    //     //     tempArray = [];

    //     //     if(!firstInsert)
    //     //     {
    //     //         firstInsert = true;

    //     //         tempArray.push([formInputs[0].data]);

    //     //     }

    //     //     for (let counter = 1; counter < formInputs.length; counter++) {

    //     //         if(counter != formInputs.length)
    //     //         {

    //     //             if( formInputs[index].ig == formInputs[counter].ig )
    //     //             {
    //     //                 tempArray.push([formInputs[counter].data])
    //     //             }

    //     //         }
                
    //     //     }

    //     //     addToTemp(finalArray,formInputs[index].ig,tempArray)

    //     // }

    // }

    // function addToTemp(arr, ig, data) {

    //     if( ig != 'null' )
    //     {
    //         const { length } = arr;

    //         const id = length + 1;

    //         const found = arr.some(el => el.ig === ig);

    //         if (!found ) arr.push({ ig: ig, data: data});

    //         return arr;
    //     }
        
    // }
    

    $(document.body).on('click', '#btn_next', function(){

        if( $('#btn_next').text() == 'Submit' )
        {

            $('#modal_reusable .modal-title').text('Submit Application')

            $('#modal_reusable .modal-body').empty()

            $('#modal_reusable .modal-body').append('Do you want to submit your application?')

            $('#modal_reusable').modal('toggle')

        }

        count = 0;
        
        visiblePanel = '';
        
        nextPanel = '';

        ids = [];

        $('.panel').each(function(i, obj) {


            ids.push($(this).attr('id'));

        });

        for (let index = 0; index < ids.length; index++) {

            if( $('#'+ids[index]).is(':visible') ) 
            {

                visiblePanel = ids[index];

                index++;

                if(index < ids.length)
                {
                    nextPanel = ids[index];

                    $('#'+visiblePanel).attr('hidden','hidden');

                    $('#'+nextPanel).removeAttr('hidden');

                    currentPanel = nextPanel;

                    $('#col_btn_prev').empty()

                    output = '<button type="button" class="btn text-light btn text-light pb-2 px-3 ml-1" style="background:#7A353C;height:30px;font-size:9pt;"   id="btn_prev">Back</button>'

                    $('#col_btn_prev').append(output)

                    if(index == ids.length-1)
                    {
                     
                        $('#btn_next').text('Submit');
                     
                        $('#btn_next').attr('data-toggle','modal')
                     
                        $('#btn_next').attr('data-target','#staticBackdrop')
                  
                    }

                }
                else if(index == 0)
                {

                    $('#col_btn_prev').empty()

                }

            }

        }


        

    })

    $(document.body).on('click', '#btn_prev', function(){

        count = 0;

        visiblePanel = '';

        nextPanel = '';

        ids = [];

        $('.panel').each(function(i, obj) {


            ids.push($(this).attr('id'));

        });

        for (let index = 0; index < ids.length; index++) {

            if( $('#'+ids[index]).is(':visible') ) 
            {

                visiblePanel = ids[index];

                index--;

                if(index < ids.length)
                {
                    nextPanel = ids[index];

                    $('#'+visiblePanel).attr('hidden','hidden');

                    $('#'+nextPanel).removeAttr('hidden');

                    if(index == 0)
                    {
                        
                        $('#col_btn_prev').empty()

                    }

                    $('#btn_next').text('Next');

                }
                else if(index == 0)
                {
                    
                    $('#col_btn_prev').empty()

                    $('#btn_next').text('Next');


                }

            }

        }

    })

    // function addToformContent(orn, type, label, tc, cc, pf = null, iV = null, oV = null)
    // {

    //     formContent.push([orn, type, label, tc, cc, pf , iV , oV ]);
       
    // }

    // function getformPanels()
    // {
    //     d =  JSON.stringify({

    //     v1: '11',

    //     v2: [ [12,0], [12,1] ],

    //     v3: [
    //             {
                    
    //                 c5: [ [11,1],0,'registration' ], 

    //                 c1: [
    //                         [[12,2],0,[11,0]]
                            
    //                     ], 

    //                 c4:[ [12,3,'asc'] ] 

    //             }
    //         ]

    //     })

    //     encyptedData = encryptData(d,hp);

    //     $.ajax({

    //         url: '/UNIV/FETCHJS/'+encyptedData,

    //         dataType: 'json',

    //         async: false,

    //         success: function(data) {

    //             panel_keys = getKeys(data);

    //             $.each(data, function(key, val){

    //                 panel_list.push(
    //                                     [

    //                                         val[panel_keys[0]],

    //                                         val[panel_keys[1]],

    //                                     ]
    //                                 );

    //                 getRows(val[panel_keys[0]])

    //             })

    //         }

    //     })

    // }

    // function getRows( panelid )
    // {

    //     x =  JSON.stringify({

    //     v1: '13',

    //     v2: [[13,0],[13,1],[13,2]],

    //     v3: [
    //             {
                    
    //                 c5: [[13,1],0,panelid],

    //                 c4:[[13,3,'asc']] 

    //             }
    //         ]

    //     })

    //     encyptedData = encryptData(x,hp);

    //     $.ajax({

    //         url: '/UNIV/FETCHJS/'+encyptedData,

    //         dataType: 'json',

    //         async: false,

    //         success: function(data) {

    //             row_keys = getKeys(data);

    //             $.each(data, function(key, val){

    //                 row_list.push(  
    //                                 [
    //                                     val[row_keys[1]],
                                    
    //                                     val[row_keys[0]],

    //                                     val[row_keys[2]],

    //                                 ]
    //                             );

    //                 getCols(val[row_keys[0]])

    //             })  

    //         }

    //     })
            
    // }

    // function getCols( rowid )
    // {

    //     x =  JSON.stringify({

    //     v1: '14',

    //     v2: [[14,0],[14,1],[14,2],[14,3],[14,4]],

    //     v3: [
    //             {
                    
    //                 c5: [[14,3],0,rowid],

    //                 c4:[[14,4,'asc']] 

    //             }
    //         ]

    //     })

    //     encyptedData = encryptData(x,hp);

    //     $.ajax({

    //         url: '/UNIV/FETCHJS/'+encyptedData,

    //         dataType: 'json',

    //         async: false,

    //         success: function(data) {

    //             col_keys = getKeys(data);

    //             $.each(data, function(key, val){


    //                 column_list.push(
    //                                     [
    //                                         val[col_keys[3]],
                                        
    //                                         val[col_keys[0]],
                                            
    //                                         val[col_keys[2]],
                                            
    //                                         val[col_keys[1]]
    //                                     ]
    //                                 );

    //                 getElements(val[col_keys[0]])

    //             })


    //         },

    //     })
            
    // }

    // function getElements( colId )
    // {

    //     x =  JSON.stringify({

    //     v1: '15',

    //     v2: [[15,0],[15,1],[15,2],[15,3],[15,4],[15,5],[15,6],[15,7],[15,8],[15,9],[15,10],[15,11]],

    //     v3: [
    //             {
                    
    //                 c5: [[15,1],0,colId],
    //             }
    //         ]

    //     })

    //     encyptedData = encryptData(x,hp);

    //     $.ajax({

    //         url: '/UNIV/FETCHJS/'+encyptedData,

    //         dataType: 'json',

    //         async: false,

    //         success: function(data) {

    //             var_keys = getKeys(data);

    //             $.each(data, function(key, val){

    //             element_list.push(
    //                                 [
    //                                     val[var_keys[1]],

    //                                     val[var_keys[2]],
                                       
    //                                     val[var_keys[3]],
                                       
    //                                     val[var_keys[5]],
                                       
    //                                     val[var_keys[4]],
                                       
    //                                     val[var_keys[6]],
                                       
    //                                     val[var_keys[7]],
                                       
    //                                     val[var_keys[8]],
                                       
    //                                     val[var_keys[9]],
                                       
    //                                     val[var_keys[0]],
                                       
    //                                     val[var_keys[10]],
                                       
    //                                     val[var_keys[11]],
    //                                 ]

    //                             )
             
    //             })

    //         }

    //     })
    // }

    // function getKeys( arr )
    // {

    //     let keys = [] ;

    //     $.each(arr, function(key, val){

    //         $.each(val, function(key,val)
    //         {
    //             keys.push(key)

    //         })

    //     })

    //     return keys;
    // }

    // function writeElement( arr )
    // {

    //     $.each(arr, function(key, val){

    //         if( val['element'] == 'input' )
    //         {

    //             if( val['type'] == 'text' || val['type'] == 'date' || val['type'] == 'hidden')
    //             {

    //                 output = addInput(val['label'],val['elementId'], val['tc'], val['cc'], val['type'], val['ig'] )

    //                 $('#col' + val['colId']).append(output);

    //             }

    //             if( val['type'] == 'image-file' )
    //             {

    //                 output = addFileInput(val['label'],val['elementId'], val['tc'], val['cc'], val['type'], val['ig'] )

    //                 $('#col' + val['colId']).append(output);

    //             }

    //             if( val['type']== 'checkbox' )
    //             {
    //                 output = addCheckbox(val['label'],val['elementId'], val['tc'], val['cc'], val['ig'], val['type'] )

    //                 $('#col' + val['colId']).append(output);

    //             }

    //             if( val['type'] == 'select' )
    //             {

    //                 x =  JSON.stringify({
    
    //                     v1: val['pf'],

    //                     v2: [ [ val['pf'], val['iV'] ], [ val['pf'], val['oV'] ] ]

    //                 })

    //                 encyptedData = encryptData(x,hp);

    //                 $.ajax({

    //                     url: '/UNIV/FETCHJS/'+encyptedData,

    //                     dataType: 'json',

    //                     async: false,

    //                     success: function(data) {

    //                         var keys = [];

    //                         $.each(data, function(key, val){

    //                             $.each(val, function(key,val)
    //                             {
    //                                 keys.push(key)

    //                             })
                                
    //                         })
                            
    //                         output = '<label style="font-size:9pt;" class="text-muted mt-2">'+val['label']+'</label>';
                            
    //                         output += '<select class="userInput custom-select-sm custom-select" name="'+val['cc']+'" ig="'+val['ig']+'" tc='+val['tc']+' cc="'+val['cc']+'" it="'+val['type']+'" id="sel'+val['elementId']+'"></select>'
                        
    //                         $('#col'+val['colId']).append(output);
                            
    //                         output = '';
                            
    //                         $.each(data, function(key, val){

    //                             output += '<option value="'+val[keys[0]]+'">'+val[keys[1]]+'</option>'
                            
    //                         })

    //                         $('#sel'+val['elementId']).append(output);
                        
    //                     }

    //                 })

    //             }
    //         }

    //         if( val['element'] == 'heading' )
    //         {
    //             if( val['type'] == 'subtitle' )
    //             {

    //                 output = addSubtitle(val['label'])

    //                 $('#col' + val['colId']).append(output);

    //             }
    //         }

    //         if( val['element'] == 'image' )
    //         {

    //             output = addImage( val['elementId'], val['label'] );

    //             $('#col' + val['colId']).append( output );

    //             $('#col' + val['colId']).addClass( 'mb-5' );
                
    //             setImagePull( 'FileInput' + val['pf'], 'Image' + val['elementId'] );

    //         }

    //         if( val['element'] == 'button' )
    //         {

    //             if( val['type'] == 'icon-button' )
    //             {

    //                 output = addSubtitle(val['label'])

    //                 $('#col' + val['colId']).append(output);

    //             }

    //         }

    //     })

        





    // }

    // function setImagePull( fileInputId , imageId )
    // {

    //     const inputFile = document.getElementById(fileInputId)

    //     const previewImage = document.getElementById(imageId)

    //     inputFile.addEventListener("change", function(){

    //         const file = this.files[0];

    //         if( file )
    //         {

    //             const reader = new FileReader();

    //             reader.addEventListener("load", function(){
                    
    //                 previewImage.setAttribute("src", this.result)
    //             })

    //             reader.readAsDataURL(file)

    //         }

    //     })
    // }
    // function addImage( imageId , label )
    // {
    //     output = '<label style="font-size:9pt;" class="text-muted mt-2 ">'+label+'</label><br>';

    //     output += '<img src="..." class="border rounded" alt="" id="Image'+imageId+'" style="height:100%; width:100%;">';

    //     return output;

    // }

    // function addInput ( label, inputId, tc, cc, type, ig)
    // {
        
    //     if( type == 'hidden' )
    //     {

    //         output = '<label style="font-size:9pt;" class="text-muted mt-2 " hidden>'+label+'</label><input ig="'+ig+'" name="'+cc+'" cc="'+cc+'" tc='+tc+' it="'+type+'" class="userInput form-control form-control-sm" type="text" id="txtInput'+inputId+'" hidden>'
       
    //     }
    //     else
    //     {

    //         output = '<label style="font-size:9pt;" class="text-muted mt-2 ">'+label+'</label><input ig="'+ig+'" cc="'+cc+'" name="'+cc+'" tc='+tc+' it="'+type+'" class="userInput form-control form-control-sm" type="'+type+'" id="txtInput'+inputId+'">'

    //     }

    //     return output;

    // }

    // function addFileInput ( label, inputId, tc, cc, type, ig)
    // {

    //     output = '<label class="custom-file-label" for="customFile">'+label+'</label>'
        
    //     output += '<div class="custom-file"><input type="file" class="userInput custom-file-input" it="'+type+'" ig="'+ig+'" cc="'+cc+'" tc='+tc+' name="'+cc+'"  id="FileInput'+inputId+'"></div>'

    //     return output;

    // }

    // function addCheckbox( label, inputId, tc, cc, ig, type )
    // {
    //    output = '<div class="form-check my-3"><input class="userInput form-check-input" type="checkbox" it="'+type+'" name="'+cc+'" ig="'+ig+'" tc='+tc+' cc='+cc+' id="chkBox'+inputId+'">'
       
    //    output += '<label class="form-check-label" for="chkBox'+inputId+'">'+label+'</label></div>'

    //    return output;

    // }

    // function addSubtitle( output )
    // {
    //     output = '<h6 class="font-weight-bold border-bottom text-center text-muted mt-4 " style="font-size:8pt;"> '+output+'</h6>'

    //     return output;

    // }
    

    // function writePanel(panelId,panelHeader)
    // {

    //     if(panelId== '1')
    //     {

    //         output = '<div class="panel" count="'+panelcount+'" id="panel'+panelId+'" >';

    //         output += '<div class="col my-3 pl-0 mb-1 font-weight-bold text-muted border-bottom pb-1 text-secondary" id="header" style="font-size:9pt;">' + panelHeader+'</div><div class="container"></div></div>';

    //     }
    //     else
    //     {
    //         output = '<div class="panel" count="'+panelcount+'" hidden id="panel'+panelId+'" >';

    //         output += '<div class="col my-3 pl-0 mb-1 font-weight-bold text-muted border-bottom pb-1 text-secondary" id="header" style="font-size:9pt;">' + panelHeader+'</div><div class="container"></div></div>';

    //     }
       
    //     $('.panelContainer').append( output);
        
            
    // }

    // function writeRow(panelid,rowId,rowName)
    // {

    //     output='<div class="row  pb-1" id="row'+rowId+'" name="'+rowName+'"> </div>';

    //     $('#panel'+panelid+' .container').append( output );

    // }

    // function writeCol(rowId,colId,colType,name)
    // {

    //     output='<div class="'+colType+' px-1" id="col'+colId+'" name="'+name+'"> </div>';

    //     $('#row'+rowId).append( output );

    // }




</script>