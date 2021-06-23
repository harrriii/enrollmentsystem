<script type="text/javascript">

    $('#btn_add').click('',function ()  {

        let zmodal = new LazyModal();

        zmodal.InitInsertModal('Personal Record','40');

        zmodal.addLabelR('Name');

        zmodal.addTextBox('1','txtName');

        zmodal.addLabelR('Work Out');

        zmodal.addSelect('2','selWorkOut');

        zmodal.addLabelR('Weight');

        zmodal.addTextBox('3','txtWeight');

        zmodal.addLabelR('Date');

        zmodal.addDateBox('4','txtDate');
 
        zmodal.AlertOutput('Column added successfully.');

        zmodal.Show();

        zmodal.addSource('','value',[{appendId:'selWorkOut',value:'Shoulder Press'}]);

        zmodal.addSource('','value',[{appendId:'selWorkOut',value:'Bench Press'}]);

        zmodal.addSource('','value',[{appendId:'selWorkOut',value:'Bicep Curls'}]);

        zmodal.addSource('','value',[{appendId:'selWorkOut',value:'Hammer Curls'}]);

        zmodal.addSource('','value',[{appendId:'selWorkOut',value:'Concentration Curls'}]);



        })


        $('body').on('click', '.delete', function () {

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('itemId')];


        zmodal.InitDeleteModal('Personal Record', '40', v3);

        zmodal.addLabel('Do you want to delete this Column?')

        zmodal.AlertOutput('Record deleted successfully.')

        zmodal.addTextBox('deleteType','txtLabel','column','','','hidden')

        zmodal.Show();
    })



    
</script>