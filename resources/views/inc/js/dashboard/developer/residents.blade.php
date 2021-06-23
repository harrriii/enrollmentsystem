<script type="text/javascript">

    $('#btn_add').click('',function ()  {

        let zmodal = new LazyModal();


        zmodal.InitInsertModal('Residents','36');

        zmodal.addLabelR('Name');

        zmodal.addTextBox('1','txtName');

        zmodal.addLabelR('Unit No.');

        zmodal.addTextBox('2','txtUnitNo');

        zmodal.addLabelR('Mobile No.');

        zmodal.addTextBox('3','txtMobileNo');

        zmodal.addLabelR('Tel No.');

        zmodal.addTextBox('4','txtTelNo');

        zmodal.AlertOutput('Column added successfully.');

        zmodal.Show();


        })


        $('body').on('click', '.delete', function () {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('itemId')];


        zmodal.InitDeleteModal('Delete Resident', '36', v3);

        zmodal.addLabel('Do you want to delete this Column?')

        zmodal.AlertOutput('Resident deleted successfully.')

        zmodal.addTextBox('deleteType','txtLabel','column','','','hidden')

        zmodal.Show();
    })



    
</script>