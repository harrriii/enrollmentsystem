<script type="text/javascript">

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');

        flipChevy('btn1', 'cl1')

        flipChevy('btn2', 'cl2')

        flipChevy('btn3', 'cl3')

    })
    
    $('.show').click('',function ()  {


        location.href = '/FORM/PANELS/ROWS/COLUMNS/'+$(this).attr('fi')+'/'+$(this).attr('pi')+'/'+$(this).attr('ri');

    })

    $('.show_p').click('',function ()  {

        location.href = '/FORM/PANELS/'+$(this).attr('fi');

    })

    $('.show_f').click('',function ()  {

        location.href = '/dashboard/forms';

    })

    $('#btn_add').click('',function ()  {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi'),$(this).attr('pni'),$(this).attr('rwi'),$(this).attr('cli'),$(this).attr('cni')];

        zmodal.InitInsertModal('Add Row', '', v3);

        zmodal.addLabelR('Row Name');

        zmodal.addTextBox('title','txtRowName','');

        zmodal.addLabelR('Order Number');

        zmodal.addTextBox('order','txtRowOrder','');

        zmodal.AlertOutput('Row added successfully.');

        zmodal.addTextBox('insertType','txtLabel','row','','','hidden')

        zmodal.Url( '/LazyInsert')

        zmodal.Show();


    })

    $('body').on('click', '.delete', function () {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi'),$(this).attr('pni'),$(this).attr('rwi')];

        zmodal.InitDeleteModal('Delete Row', '', v3);

        zmodal.addLabel('Do you want to delete this Row?');

        zmodal.AlertOutput('Row deleted successfully.');

        zmodal.addTextBox('deleteType','txtLabel','row','','','hidden')

        zmodal.Url('/LazyDelete');

        zmodal.Show();

    })

    $('body').on('click', '.edit', function () {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi'),$(this).attr('pni'),$(this).attr('rwi')];

        zmodal.InitUpdateModalSingle("Edit Row", '', v3);

        zmodal.addLabelR('Row Name');

        zmodal.addTextBox('title','txtRowName',$(this).attr('title'));

        zmodal.addLabelR('Order Number');

        zmodal.addTextBox('order','txtOrderNum',$(this).attr('order'));

        zmodal.AlertOutput('Row updated successfully.')
        
        zmodal.addTextBox('updateType','txtLabel','row','','','hidden')

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