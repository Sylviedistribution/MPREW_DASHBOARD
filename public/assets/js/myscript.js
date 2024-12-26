function previewImage(event) {
    var input = event.target;
    var preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '#';
        preview.style.display = 'none';
    }
}

$(document).ready(function() {
    // Appliquer Select2 pour améliorer le style du dropdown
    $('#coupe_id, #col_id, #manche_id, #jupe_id, #tissu_id, #email_client').select2({
        templateResult: formatState,
        templateSelection: formatState
    });

    function formatState(state) {
        // Si l'option n'a pas d'image, retourner le texte simple
        if (!$(state.element).data('image')) {
            return state.text;
        }

        // Ajouter l'image uniquement pour les options ayant l'attribut `data-image`
        var $state = $(
            '<span><img src="' + $(state.element).data('image') + '" style="width: 30px; height: 30px; vertical-align: middle; margin-right: 8px;" />' + state.text + '</span>'
        );
        return $state;
    }
});

// Sélectionner le bouton hamburger et le sidebar
const hamburger = document.getElementById('hamburger-menu');
const sidenav = document.getElementById('sidenav-main');

// Ajouter un événement de clic pour ouvrir/fermer le sidebar
hamburger.addEventListener('click', () => {
    sidenav.classList.toggle('closed');
});

