<script type="text/javascript">

    $('#btn_add').click('',function ()  {

        let zmodal = new LazyModal();

            zmodal.InitInsertModal('Visitor logs','35');

            zmodal.addLabelR('Name');

            zmodal.addTextBox('1','txtName');

            zmodal.addLabelR('Purpose');

            zmodal.addTextBox('2','txtPurpose');

            zmodal.addLabelR('Time In');

            zmodal.addTextBox('3','txtTimeIn');

            zmodal.addLabelR('Time Out');

            zmodal.addTextBox('4','txtTimeOut');

            zmodal.AlertOutput('Column added successfully.');

            zmodal.Show();


        })


        $('body').on('click', '.delete', function () {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('itemId')];


        zmodal.InitDeleteModal('Delete Visitor', '35', v3);

        zmodal.addLabel('Do you want to delete this Column?')

        zmodal.AlertOutput('Visitor deleted successfully.')

        zmodal.addTextBox('deleteType','txtLabel','column','','','hidden')

        zmodal.Show();
    })



    
</script>