<script type="text/javascript">

    $('#btn_add').click('',function ()  {

        let zmodal = new LazyModal();

        zmodal.InitInsertModal('Appointments','34');

        zmodal.addLabelR('Name');

        zmodal.addTextBox('6','txtApprovedBy');

        zmodal.addLabelR('Purpose');

        zmodal.addTextBox('1','txtName');

        zmodal.addLabelR('Date');

        zmodal.addDateBox('2','txtDate');

        zmodal.addLabelR('Time');

        zmodal.addTextBox('3','txtTime');

        zmodal.addTextBox('4','txtStatus', 'Pending','', '','hidden');

        zmodal.addLabelR('ApprovedBy');

        zmodal.addTextBox('5','txtApprovedBy');

        zmodal.AlertOutput('Column added successfully.');

        zmodal.Show();


        })

        $('body').on('click', '.delete', function () {

        let zmodal = new LazyModal();

        // let v3 = [$(this).attr('fmi'),$(this).attr('pni'),$(this).attr('rwi'),$(this).attr('cli')];

        let v3 = [$(this).attr('itemId')];

        console.log(v3)

        zmodal.InitDeleteModal('Delete Appointment', '34', v3);

        zmodal.addLabel('Do you want to delete this Column?')

        zmodal.AlertOutput('Appointment deleted successfully.')

        zmodal.addTextBox('deleteType','txtLabel','column','','','hidden')

        // zmodal.Url('/LazyDelete');

        zmodal.Show();  

    })

</script>