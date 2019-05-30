function getData(){
    var id = $('#id').val();
    var label = $('#label').val();
    var description = $('#description').val();
    if (id){
        return {id,label,description};
    } else {
        return {label,description};
    }
}


$(document).ready(function() {
    showSnackbar('Bienvenue à vous sur la page d\'administrateur','false');
    // showSnackbar('MEssage 2');

    $('#type-formation-modal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget); // Button that triggered the modal
        let title_prefix = button.data('type'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        let modal = $(this);
        modal.find('.modal-title').text(title_prefix+' un type de formations');
        // modal.find('.modal-body input').val(recipient);
        $('#submit-type-formation').text(title_prefix);
        $('#label').val(button.data('label'));
        $('#description').val(button.data('description'));
        $('#id').val(button.data('id'));
        modal.on('submit',function (e) {
            e.preventDefault();
            console.log(getData());
            modal.modal('hide');
        });
    });

    $('#delete-modal').on('show.bs.modal', function (event){
        let button = $(event.relatedTarget);
        let modal = $(this);
        modal.find('.modal-title').text('Supprimer le '+button.data('type')+' '+button.data('label'));
        $('#id-delete').val(button.data('id'));
        modal.on('submit',function (e) {
            e.preventDefault();
            console.log(button.data('label')+' delelted');
            modal.modal('hide');
        });
    });
});
