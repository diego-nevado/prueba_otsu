$(document).ready(function() {
    // Validación de formulario en tiempo real
    $('#loginForm').on('input', 'input', function() {
        let isValid = true;
        $('#loginForm input').each(function() {
            if ($(this).val().trim() === '') {
                isValid = false;
                return false;
            }
        });
        $('#loginForm button[type="submit"]').prop('disabled', !isValid);
    });

    // Animación suave al cargar la página
    $('.card').hide().fadeIn(1000);

    // Efecto hover en los botones
    $('.btn').hover(
        function() { $(this).addClass('shadow-lg'); },
        function() { $(this).removeClass('shadow-lg'); }
    );

    // Confirmación antes de eliminar un contacto
    $('body').on('click', '.btn-danger', function(e) {
        if (!confirm('¿Estás seguro de que quieres eliminar este contacto?')) {
            e.preventDefault();
        }
    });

    // Mostrar/ocultar contraseña
    $('#togglePassword').click(function() {
        const passwordField = $('#password');
        const passwordFieldType = passwordField.attr('type');
        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $(this).text('Ocultar');
        } else {
            passwordField.attr('type', 'password');
            $(this).text('Mostrar');
        }
    });
});

