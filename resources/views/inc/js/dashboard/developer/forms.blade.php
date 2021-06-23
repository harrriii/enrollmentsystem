<script type="text/javascript">

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');

        flipChevy('btn1', 'cl1')

        flipChevy('btn2', 'cl2')

        flipChevy('btn3', 'cl3')

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
        zmodal.AlertOutput('Subject added successfully.');
        zmodal.Show();

    })


    

    $('.show').click('',function ()  {


        location.href = '/FORM/PANELS/'+$(this).attr('fmi');

    })

    $('#btn_add').click('',function ()  {

        let zmodal = new LazyModal();

        zmodal.InitInsertModal('Add Form','');

        zmodal.addLabelR('Form Name');
        
        zmodal.addTextBox('formName','txtFormName','');

        zmodal.AlertOutput('Form added successfully.');

        zmodal.addTextBox('insertType','txtLabel','form','','','hidden')

        zmodal.Url( '/LazyInsert' )
        
        zmodal.Show();

    })
   
    $('body').on('click', '.edit', function () {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi')];

        zmodal.InitUpdateModalSingle("Edit PanFormel", '', v3);

        zmodal.addLabelR('Form Name');

        zmodal.addTextBox('formName','txtPanelName', $(this).attr('formName'));

        zmodal.AlertOutput('Form updated successfully.')

        zmodal.addTextBox('updateType','txtLabel','form','','','hidden')

        zmodal.Url( '/LazyUpdate' )

        zmodal.Show();

    })

    $('body').on('click', '.delete', function () {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi')];

        zmodal.InitDeleteModal('Delete Form', '', v3);

        zmodal.addLabel('Do you want to delete this form?');

        zmodal.AlertOutput('Form deleted successfully.');

        zmodal.addTextBox('deleteType','txtLabel','form','','','hidden')

        zmodal.Url( '/LazyDelete' )

        zmodal.Show();

    })

    var i = 0 ;

   

     function flipChevy (btnId, iconId)
     {
        $('body').on('click', '#'+btnId, function () {


            if( i == 0)
            {
            
            $('#'+iconId).addClass('flipUp');
                i =1;
            }
            else
            {
            $('#'+iconId).removeClass('flipUp');
                            
                i =0;

            }

        })
     }


  

  </script>