$(function () {

    // Initial data load.
    getTaskJson('mind');
    getTaskJson('body');
    getTaskJson('medical');

    // Gets the JSON objects and populates the HTML.
    function getTaskJson(category) {
        $.ajax({
            url: "/return_tasks",
            type: "POST",
            dataType: "json",
            data: {
                category: category,
            },
            context: this,
            complete: function (data) {
                let text = '';
                let json_data = JSON.parse(data.responseText);
                for (let i = 0; i < json_data.length; i++) {
                    let obj = json_data[i];
                    text += '<div class="task-item">';
                    if (obj.user_id === obj.current_user_id) {
                        text += '<button class="delete delete-task" data-taskid="' + obj.task_id + '" data-category="' + category + '"></button>';
                    }
                    if (obj.user_id === obj.current_user_id) {
                        if (obj.status === 'pending') {
                            text += '<span data-taskid="' + obj.task_id + '" id="done" data-category="' + category + '">🔲</span> ';
                        } else {
                            text += '<span data-taskid="' + obj.task_id + '" id="pending" data-category="' + category + '">✅</span> ';
                        }
                    } else {
                        if (obj.status === 'pending') {
                            text += '🔲 ';
                        } else {
                            text += '✅ ';
                        }
                    }
                    text += obj.task_title;
                    text += '<div class="username">' + obj.user_username + '</div>';
                    text += '<div class="due-date">' + obj.task_date + '</div>';
                    if (obj.user_id === obj.current_user_id) {
                        text += '<div class="edit-task" data-duedate="' + obj.formatted_date + '" data-description="' + obj.task_title + '" data-taskid="' + obj.task_id + '" data-category="' + category + '">✏️</div>';
                    }
                    text += '</div>'
                }

                $('.' + category + ' .inner').html(text);
            }
        });
    }

    // Adding a new task.
    $('.new-task').on('click', function () {
        $('#due-date').val('');
        $('#task-description').val('');
        $('.modal').addClass('is-active');
        $('#category').val($(this).attr('data-category'));
        $('#submit-task').removeClass('submit-edit').addClass('submit-new');
    });

    // Editing a task.
    $(document).on('click', '.edit-task', function () {
        $('#due-date').val($(this).attr('data-duedate'));
        $('#task-description').val($(this).attr('data-description'));
        $('.modal').addClass('is-active');
        $('#task_id').val($(this).attr('data-taskid'));
        $('#category').val($(this).attr('data-category'));
        $('#submit-task').removeClass('submit-new').addClass('submit-edit');
    });

    // Deleting a task.
    $('.task-form .delete').on('click', function () {
        $('.modal').removeClass('is-active');
    });

    // Change status.
    $(document).on('click', '#pending, #done', function (e) {
        e.preventDefault();
        $.ajax({
            url: "/update_task_status",
            type: "POST",
            dataType: "json",
            data: {
                task_id: $(this).attr('data-taskid'),
                status: $(this).attr('id'),
            },
            context: this,
            complete: function () {
                getTaskJson($(this).attr('data-category'));
            }
        });
    });

    // Submitting a new task.
    $(document).on('submit', '.submit-new', function (e) {
        e.preventDefault();
        $.ajax({
            url: "/store_task",
            type: "POST",
            dataType: "json",
            data: {
                task_description: $('#task-description').val(),
                due_date: $('#due-date').val(),
                category: $('#category').val(),
            },
            context: this,
            complete: function () {
                $('.modal').removeClass('is-active');
                getTaskJson($('#category').val());
            }
        });
    });

    // Updating a task.
    $(document).on('submit', '.submit-edit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "/edit_task",
            type: "POST",
            dataType: "json",
            data: {
                task_description: $('#task-description').val(),
                due_date: $('#due-date').val(),
                task_id: $('#task_id').val(),
            },
            context: this,
            complete: function () {
                $('.modal').removeClass('is-active');
                getTaskJson($('#category').val());
            }
        });
    });

    // Deleting a task.
    $(document).on('click', '.delete-task', function () {
        $.ajax({
            url: "/delete_task",
            type: "POST",
            dataType: "json",
            data: {
                task_id: $(this).attr('data-taskid'),
                category: $(this).attr('data-category'),
            },
            context: this,
            complete: function () {
                getTaskJson($(this).attr('data-category'));
            }
        });
    });

});
