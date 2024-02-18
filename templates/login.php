<?php include('inc_header.php'); ?>
    <div class="container">
        <h2 class="title">Login</h2>
        <?php if(isset($_GET['error'])): ?>
            <article class="message is-danger">
                <div class="message-header">
                    <p>Error</p>
                </div>
                <div class="message-body">
                    Invalid username or password.
                </div>
            </article>
        <?php endif; ?>
        <?php if(isset($_GET['logout'])): ?>
            <article class="message is-success">
                <div class="message-header">
                    <p>Logout</p>
                </div>
                <div class="message-body">
                    You have successfully logged out.
                </div>
            </article>
        <?php endif; ?>
        <form method="post" action="/authenticate">
            <div class="field">
                <label class="label">Username</label>
                <div class="control">
                    <input class="input" type="text" name="username" placeholder="Username" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" name="password" required>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input type="submit" value="Login" class="button is-link">
                </div>
            </div>
        </form>
    </div>
<?php include('inc_footer.php'); ?>