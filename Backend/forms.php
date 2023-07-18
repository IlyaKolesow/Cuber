    <form action="../Backend/logout.php" id="exit-form" class="exit-form">
        <a href="#" class="close-btn">&times;</a>
        <p class="text-logged">You are logged in as <span><?php echo "$_SESSION[name]"?></span></p>
        <button class="exit-btn">Sign out</button>
    </form>
    <form class="auth-popup" id="auth-popup" action="../Backend/authorization.php" method="post">
        <?php if($_GET['message'] == 'wrong_password'): ?>
            <p class="wrong_password">Wrong login or password!</p>
        <?php endif;?>
        <a href="#" class="close-btn">&times;</a>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" pattern="[A-Za-z0-9]{8,20}" required><br>
        <input type="submit" value="Sign in"><br>
        <a class="prompt" href="#reg-popup">Not registered yet?</a>
    </form>
    <form class="reg-popup" id="reg-popup" action="../Backend/register.php" method="post">
        <a href="#" class="close-btn">&times;</a>
        <?php if($_GET['message'] == 'already_registered'): ?>
            <p class="already_registered">User with this email is already registered!</p>
        <?php endif;?>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="name" placeholder="Name" pattern="[A-Za-zА-Яа-яЁё0-9]{4,15}" required><br>
        <input type="password" name="password" placeholder="Password" pattern="[A-Za-z0-9]{8,20}" required><br>
        <input type="submit" value="Register"><br>
        <a class="prompt" href="#auth-popup">Already registered?</a>
    </form>