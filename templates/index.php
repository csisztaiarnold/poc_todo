<?php include('inc_header.php'); ?>
<div class="container">
    <div class="flex-container">
        <div class="flex-item mind">
            <h2 class="title">Mind</h2>
            <div class="inner"></div>
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']): ?><div class="new-task" data-target="modal" aria-haspopup="true" data-category="mind">➕ New task</div><?php endif; ?>
        </div>
        <div class="flex-item body">
            <h2 class="title">Body</h2>
            <div class="inner"></div>
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']): ?><div class="new-task" data-target="modal" aria-haspopup="true" data-category="body">➕ New task</div><?php endif; ?>
        </div>
        <div class="flex-item medical">
            <h2 class="title">Medical</h2>
            <div class="inner"></div>
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']): ?><div class="new-task" data-target="modal" aria-haspopup="true" data-category="medical">➕ New task</div><?php endif; ?>
        </div>
    </div>
</div>

<div class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="task-form">
            <button class="delete"></button>
            <form id="submit-task">
                <div class="field">
                    <label class="label">Task description</label>
                    <div class="control">
                        <input class="input" type="text" name="task" placeholder="Task description" id="task-description" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Due date</label>
                    <div class="control">
                        <input class="input" type="datetime-local" name="due_date" id="due-date" required>
                    </div>
                </div>
                <input type="hidden" name="category" id="category" />
                <input type="hidden" name="task_id" id="task_id" />
                <div class="field">
                    <div class="control">
                        <input type="submit" value="Submit" class="button is-link submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
</div>

<?php include('inc_footer.php'); ?>