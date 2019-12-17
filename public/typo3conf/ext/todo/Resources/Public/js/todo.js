$(document).ready(function (e) {

    $('body').on('submit', '.todo-list form', function (e) {

        e.preventDefault();

        var $form = $(this);
        var $todoList = $('.todo-list');

        $.post($form.attr('action'), $form.serialize(), function (data) {
            $todoList.replaceWith(data);
        });

        $form.find('button, input, textarea').prop('disabled', true);
        $form.find('.spinner-border').show();
    });

});

