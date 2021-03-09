<script type="text/javascript">

// GLOBAL VARIABLES

    var hp = "mlqu-hash-password-2021";

    var message = 'Subject added successfully.';

    var content = '';

    var d = '';

    var encyptedData = '';

    var footer = '';

    var toAppend = '';

    var x = '';


// ENCRYPT
    var CryptoJSAesJson = {
            stringify: function (cipherParams) {
                var j = {ct: cipherParams.ciphertext.toString(CryptoJS.enc.Base64)};
                if (cipherParams.iv) j.iv = cipherParams.iv.toString();
                if (cipherParams.salt) j.s = cipherParams.salt.toString();
                return JSON.stringify(j);
            },
            parse: function (jsonStr) {
                var j = JSON.parse(jsonStr);
                var cipherParams = CryptoJS.lib.CipherParams.create({ciphertext: CryptoJS.enc.Base64.parse(j.ct)});
                if (j.iv) cipherParams.iv = CryptoJS.enc.Hex.parse(j.iv)
                if (j.s) cipherParams.salt = CryptoJS.enc.Hex.parse(j.s)
                return cipherParams;
            }
    }

    function encryptData(data, pass=null){

        var encrypted = CryptoJS.AES.encrypt(data, 'mlqu-hash-password-2021', {format: CryptoJSAesJson});

        return btoa(unescape(encodeURIComponent(encrypted.toString())));

    }


// MODAL BUILDER
    function showModal(modal, title){

        $('#'+modal+' .modal-title').empty();

        $('#'+modal+' .modal-body .container').empty();

        $('#'+modal+' .modal-footer').empty();

        $('#'+modal+' .modal-title').append(title);

        $('#'+modal).modal('show');

    }

// FORM BUILDER
    function formBuild(formId,action,content,footer){

        var form = document.getElementById(formId);
      
        form.action = action;
       
        $('#'+formId+' .container').append(content);

        $('#'+formId+' .modal-footer').append(footer);

    }
    function form_label(id,content,t_class){
        return '<label class="'+t_class+'">'+content+'</label>'; 
    }
    function form_input(id,name,placeholder,t_class,value,attr='',type=''){

        console.log(type)
       return '<input type="'+type+'" class="'+t_class+'" name="'+name+'" id="'+id+'" placeholder="'+placeholder+'" '+attr+' value="'+value+'"/>'; 
    }
    function form_select(id, name,  t_class){

        var output = '';
        
        output = '<select class="'+t_class+'" id="'+id+'" name="'+name+'">'
            
        output += '</select>';

        return output;

    }
    function form_button(id,name,t_class,type,style='',attr=''){
        return '<button type="'+type+'" class="'+t_class+'" id="'+id+'" style="'+style+'" '+attr+'>'+name+'</button>';
    }

// FORM COMPLEX
    function form_option(url,selectid,input,column=null,code=null,selected=null,addtl=null){

        var content = '';

        if(addtl){
            content += addtl;

            $('#'+selectid).empty();
            $('#'+selectid).append(content);
            
            if(selected){
                document.getElementById(selectid).value = selected;
            }
        }
            
        $.getJSON(url+input, function(data) {

        var jsonData = JSON.stringify(data);

        $.each(JSON.parse(jsonData), function(key, val){
            
            content += '<option value="'+val[code]+'">'+val[column]+'</option>'

        })

        $('#'+selectid).empty();
        $('#'+selectid).append(content);

        if(selected){
            document.getElementById(selectid).value = selected;
        }

        })
       
    }
    
// GET DATA FUNCTIONS
    function fetchGetJSON( input, callback ){

        // $.getJSON('/UNIV/FETCHDATA/'+encyptedData, function(data) {
                    
        // }

        $.getJSON(input['url']+input['data'], function(data) {
            
            callback(data)

        })


		// $.ajax({

		// 	type: 'POST',
		// 	data: input,
		// 	url: url,
		// 	dataType: 'json',
		// 	success: function( res ){

                
               

		// 		// if( plain_data == 'Y' ){

		// 		// 	// callback( res );

				

		// 		// }
		// 	},
        //   	error: function(XMLHttpRequest, textStatus, errorThrown){

        //     	console.log(XMLHttpRequest.responseText);

        //     	callback('');
        //   	}
		// });

	}

// APPEND TO 
    function appendToTable(id, data, from=null){

        toAppend = '';
       
        if(from == 'homeEnlistment'){
            
            $.each(data, function(key,val){
                
                toAppend += '<tr>'
                +'<td><input type="checkbox" prerequisite="'+val[4]+'" code="'+val[0]+'" subject="'+val[1]+'" unit="'+val[3]+'" class="chkSubject" id="chk'+val[0]+'"aria-label="s"> </td>'
                +'<td>'+val[1]+'</td>'
                +'<td>'+val[4]+'</td>'
                +'<td>'+val[3]+'</td>'
                +'</tr>';
            })
        }

        $('#'+id+' tbody').empty();
        $('#'+id+' tbody').append(toAppend);
    }



// fill TABLE 
    function fillModalTable(input){

        console.log(input)
        $.getJSON('/UNIV/FETCHDATA/'+ input['d'] , function (data) {




        })
    }

// TEMPLATES

    function buildModal(data){

        content = '';

        for (let i = 0; i < data['modalContent'].length; i++) {

            if(data['modalContent'][i][0] == 'label')
            {
                content += form_label(data['modalContent'][i][1],data['modalContent'][i][2],data['modalContent'][i][3]);
            }
            if(data['modalContent'][i][0] == 'input')
            {   
                content += form_input(data['modalContent'][i][1],data['modalContent'][i][2],data['modalContent'][i][3],data['modalContent'][i][4],data['modalContent'][i][5],data['modalContent'][i][6],data['modalContent'][i][7]);
            }
            if(data['modalContent'][i][0] == 'select')
            {   
                content += form_select(data['modalContent'][i][1],data['modalContent'][i][2],data['modalContent'][i][3]);
            }
        }

      content += form_input('','v1','','',data['v1'],'hidden');
      content += form_input('','v2','','',data['v2'],'hidden');
      content += form_input('','v3','','',data['v3'],'hidden');
      content += form_input('','v4','','',data['v4'],'hidden');

      footer = form_button('btn_submit',data['buttonSubmit'],'btn btn-sm mlqu-color text-light','submit','background:#7A353C;height:25px;width:80px');
      footer += form_button('btn_close',data['buttonCancel'],'btn btn-sm mlqu-color text-light','button','background:#7A353C;height:25px;width:80px','data-dismiss="modal"');

      showModal('modal_univ', data['modalTitle']);
      formBuild('form_univ',data['url'],content,footer);

    }



// DATE FUNCTION    

    function getDateNow(){

        var today = new Date();

        var dd = String(today.getDate()).padStart(2, '0');

        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        
        var yyyy = today.getFullYear();

        today =   yyyy + '/'  + mm  + '/' + dd ;

        return today;
    }
    function formatDateMDY(date){

        date = new Date(date);

        const ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(date);

        const mo = new Intl.DateTimeFormat('en', { month: 'long' }).format(date);

        const da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(date);
        
        return mo+' '+da+', '+ye;

    }

    function dateCheck(from,to,check) {

        var fDate,lDate,cDate;

        fDate = Date.parse(from);

        lDate = Date.parse(to);

        cDate = Date.parse(check);

        if(cDate <= lDate || cDate >= fDate || cDate == lDate || cDate == fDate) {

            return true;

        }

        return false;
    }



// SEARCH FUNCTION
function addSearch(txtSearch, table){

    $("#"+txtSearch).keyup(function () {

    var value = this.value.toLowerCase().trim();

    $("#"+table+" tr").each(function (index) {

        if (!index) return;

        $(this).find("td").each(function () {

            var id = $(this).text().toLowerCase().trim();

            var not_found = (id.indexOf(value) == -1);

            $(this).closest('tr').toggle(!not_found);

            return not_found;
        
            });
        });
    });
}








$( ".icon" )
.mouseover(function() {

    $(this).css('transform','scale(1.2)');
    $(this).css('background','#7A353C !important');



})
.mouseout(function() {

    $(this).css('transform','scale(1)');
    $(this).css('background','#7A353C !important');

});

$(document.body).ready(function(){
        
    $(".alert").delay(1500).slideUp(500);

})

</script>