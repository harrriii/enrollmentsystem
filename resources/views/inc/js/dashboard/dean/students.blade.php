<script type="text/javascript">

    $('body').on('click', '.grd_accept', function () {

      x = $('.t').attr('clas');

      d = JSON.stringify({
                          data: [
                                  ['status','Approved'],
                                  ['deansApproval',x]
                                ]
      })


      var message = 'Grade approved successfully.';  

      content = form_label('','Do you want to approve this grade?','form-label');
      content += form_input('','v1','','','student_class_grade','hidden');
      content += form_input('','v2','','',message,'hidden');
      content += form_input('','v3','','',$(this).attr('code'),'hidden');
      content += form_input('','v4','','',encryptData(d),'hidden');


      footer = form_button('btn_submit','Accept','btn btn-sm mlqu-color','submit','background:#7A353C;height:25px;width:80px');
      footer += form_button('btn_close','Cancel','btn btn-sm mlqu-color','button','background:#7A353C;height:25px;width:80px','data-dismiss="modal"');

      showModal('modal_univ','Confirm');
      formBuild('form_univ','/UNIV/EDIT',content,footer);
    })

    $('body').on('click', '.grd_decline', function () {

      x = $('.t').attr('clas');

      d = JSON.stringify({
                          data: [
                                  ['status','Declined'],
                                  ['deansApproval',x]
                                ]
      })


      var message = 'Grade declined successfully.';  

      content = form_label('','Do you want to decline this grade?','form-label');
      content += form_input('','v1','','','student_class_grade','hidden');
      content += form_input('','v2','','',message,'hidden');
      content += form_input('','v3','','',$(this).attr('code'),'hidden');
      content += form_input('','v4','','',encryptData(d),'hidden');


      footer = form_button('btn_submit','Confirm','btn btn-sm mlqu-color','submit','background:#7A353C;height:25px;width:80px');
      footer += form_button('btn_close','Cancel','btn btn-sm mlqu-color','button','background:#7A353C;height:25px;width:80px','data-dismiss="modal"');

      showModal('modal_univ','Decline grade');
      formBuild('form_univ','/UNIV/EDIT',content,footer);
      })
   
   
 
    $('body').on('click', '.toOffer', function () {
      
      $('#offerModal').modal('show');

    });
    
  </script>