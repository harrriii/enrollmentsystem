<script type="text/javascript">

    $('#btn_add').click('',function ()  {

        let zmodal = new LazyModal();


        zmodal.InitInsertModal('Contacts','37');

        zmodal.addLabelR('Name');

        zmodal.addTextBox('1','txtName');

        zmodal.addLabelR('Mobile No.');

        zmodal.addTextBox('2','txtMobileNo');

        zmodal.addLabelR('Entry Type');

        zmodal.addTextBox('3','txtEntryType');

        zmodal.addLabelR('Date');

        zmodal.addDateBox('4','txtDate');
        
        zmodal.addLabelR('Tiime In');

        zmodal.addTextBox('5','txtTimeIn');
        
        zmodal.addLabelR('Time Out');

        zmodal.addTextBox('6','txtTimeOut');

        zmodal.AlertOutput('Column added successfully.');

        zmodal.Show();


        })


        $('body').on('click', '.delete', function () {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('itemId')];


        zmodal.InitDeleteModal('Delete Contact', '37', v3);

        zmodal.addLabel('Do you want to delete this Column?')

        zmodal.AlertOutput('Contact deleted successfully.')

        zmodal.addTextBox('deleteType','txtLabel','column','','','hidden')

        zmodal.Show();
    })



    
</script>