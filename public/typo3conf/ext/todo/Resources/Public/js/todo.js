$(document).ready(function (e) {
    $('.todo-add').submit(function (e) {

        e.preventDefault();

        $.post($(this).attr('action'), $(this).serialize()).done(function (data) {
            console.log(data);
        });

    });
});


$.fn.todo = function () {

    $(this).each(function (l, list) {

        var $listWrapper = jQuery(list);

        var $listEntries = $listWrapper.find('.todo-entries');
        var $todoInput = $listWrapper.find('input.todo-title');
        var $todoAdd = $listWrapper.find('.todo-add');
        var $todoCheckboxes = $listWrapper.find('.todo-entries input[type=checkbox]');

        var uri = $listWrapper.attr('data-ajax-uri');

        function updateListener() {
            $todoAdd = $listWrapper.find('.todo-add');
            $todoAdd.off().on('click', function (e) {
                update({title: $todoInput.val()});
            });

            $todoCheckboxes = $listWrapper.find('.todo-entries input[type=checkbox]');
            $todoCheckboxes.off().on('change', $listWrapper.find('.todo-entries input[type=checkbox]'), function (e) {
                var $checkbox = $(e.target);
                var uid = $checkbox.val();
                var checked = $checkbox.is(':checked') | 0;

                update({uid: uid, solved: parseInt(checked)});

            });
        }

        function addToList(entry) {

            var $item = $('<li class="list-group-item"/>');
            var $input = $('<input type="checkbox" class="todo-check" value="' + entry.uid + '"/>');
            var $span = $('<span/>');

            $item.append($input, $span);
            $span.text(entry.title);
            $listEntries.append($item);

        }

        function update(entry) {
            $.post(uri, {
                tx_todo_list: {
                    action: 'add',
                    controller: 'Entry',
                    entry: entry
                }
            }).done(function (data) {
                if (!entry.uid) {
                    addToList(data);
                }

                updateListener();
            });
        }

        updateListener();

    });

    return this;
};

