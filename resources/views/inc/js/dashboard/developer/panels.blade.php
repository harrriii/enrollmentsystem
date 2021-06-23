<script type="text/javascript">

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');

        flipChevy('btn1', 'cl1')

        flipChevy('btn2', 'cl2')

        flipChevy('btn3', 'cl3')

    })
    
    $('.show').click('',function ()  {


        location.href = '/FORM/PANELS/ROWS/'+$(this).attr('fi')+'/'+$(this).attr('pi');

    })

    $('.show_f').click('',function ()  {

        location.href = '/dashboard/forms';

    })
    
    $('#btn_add').click('',function ()  {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi')];

        zmodal.InitInsertModal('Add Panel', '', v3);

        zmodal.addLabelR('Panel Name');

        zmodal.addTextBox('title','txtPanelName','');

        zmodal.addLabelR('Order Number');

        zmodal.addTextBox('order','txtPanelName','');

        zmodal.AlertOutput('Panel added successfully.');

        zmodal.addTextBox('insertType','txtLabel','panel','','','hidden')

        zmodal.Url( '/LazyInsert')

        zmodal.Show();


    })

    $('body').on('click', '.delete', function () {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi'),$(this).attr('pni')];

        zmodal.InitDeleteModal('Delete Panel', '', v3);

        zmodal.addLabel('Do you want to delete this Panel?');

        zmodal.AlertOutput('Panel deleted successfully.');

        zmodal.addTextBox('deleteType','txtLabel','panel','','','hidden')

        zmodal.Url('/LazyDelete');

        zmodal.Show();

    })

    $('body').on('click', '.edit', function () {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi'),$(this).attr('pni')];

        zmodal.InitUpdateModalSingle("Edit Panel", '', v3);

        zmodal.addLabelR('Panel Name');
        
        zmodal.addTextBox('title','txtPanelName',$(this).attr('title'));

        zmodal.addLabelR('Order Number');

        zmodal.addTextBox('order','txtOrde',$(this).attr('order'));

        zmodal.AlertOutput('Panel updated successfully.')

        zmodal.addTextBox('updateType','txtLabel','panel','','','hidden')

        zmodal.Url( '/LazyUpdate' )

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