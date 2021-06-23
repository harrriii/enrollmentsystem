<script type="text/javascript">

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');

        flipChevy('btn1', 'cl1')

        flipChevy('btn2', 'cl2')

        flipChevy('btn3', 'cl3')

    })

    $('.show').click('',function ()  {

        location.href = '/COLUMN/CONTENTS/'+$(this).attr('fi')+'/'+$(this).attr('pi')+'/'+$(this).attr('ri')+'/'+$(this).attr('ci');

    })

    $('.show_r').click('',function ()  {

        location.href = '/FORM/PANELS/ROWS/'+$(this).attr('fi')+'/'+$(this).attr('pi');

    })

    $('.show_p').click('',function ()  {

        location.href = '/FORM/PANELS/'+$(this).attr('fi');

    })

    $('.show_f').click('',function ()  {

        location.href = '/dashboard/forms';

    })

    $('#btn_add').click('',function ()  {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi'),$(this).attr('pni'),$(this).attr('rwi')];

        zmodal.InitInsertModal('Add Column','', v3);

        zmodal.addLabelR('Column Name');

        zmodal.addTextBox('title','txtColumnName','');

        zmodal.addLabelR('Column Type');

        zmodal.addTextBox('type','txtColumnName','');

        zmodal.addLabelR('Order Number');

        zmodal.addTextBox('order','txtColumnOrder','');

        zmodal.AlertOutput('Column added successfully.');

        zmodal.addTextBox('insertType','txtLabel','column','','','hidden')

        zmodal.Url( '/LazyInsert')

        zmodal.Show();


    })

    $('body').on('click', '.delete', function () {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi'),$(this).attr('pni'),$(this).attr('rwi'),$(this).attr('cli')];

        zmodal.InitDeleteModal('Delete Column', '', v3);

        zmodal.addLabel('Do you want to delete this Column?')

        zmodal.AlertOutput('Column deleted successfully.')

        zmodal.addTextBox('deleteType','txtLabel','column','','','hidden')

        zmodal.Url('/LazyDelete');

        zmodal.Show();

    })

    $('body').on('click', '.edit', function () {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi'),$(this).attr('pni'),$(this).attr('rwi'),$(this).attr('cli')];

        zmodal.InitUpdateModalSingle("Edit Column", '', v3);

        zmodal.addLabelR('Column Name');

        zmodal.addTextBox('title','txtColumnName',$(this).attr('title'));

        zmodal.addLabelR('Column Type');

        zmodal.addTextBox('type','txtOrderNum',$(this).attr('type'));

        zmodal.addLabelR('Order Number');

        zmodal.addTextBox('order','txtOrderNum',$(this).attr('order'));

        zmodal.AlertOutput('Column updated successfully.')

        zmodal.addTextBox('updateType','txtLabel','column','','','hidden')

        zmodal.Url( '/LazyUpdate')

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