<script type="text/javascript">

$('#btn_add').click('',function ()  {

    let zmodal = new LazyModal();

        zmodal.InitInsertModal('System Log','38');

        zmodal.addLabelR('Name');

        zmodal.addTextBox('1','txtName');

        zmodal.addLabelR('Activity');

        zmodal.addTextBox('2','txtActivity');

        zmodal.addLabelR('Date');

        zmodal.addDateBox('3','txtDate');

        zmodal.addLabelR('Time');

        zmodal.addTextBox('4','txtTime');

        zmodal.AlertOutput('Column added successfully.');

        zmodal.Show();


    })


    $('body').on('click', '.delete', function () {

    let zmodal = new LazyModal();

    let v3 = [$(this).attr('itemId')];


    zmodal.InitDeleteModal('Delete System', '38', v3);

    zmodal.addLabel('Do you want to delete this Column?')

    zmodal.AlertOutput('System deleted successfully.')

    zmodal.addTextBox('deleteType','txtLabel','column','','','hidden')

    zmodal.Show();
})



    
</script>