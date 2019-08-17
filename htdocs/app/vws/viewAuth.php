<div>
    Добрый вечер, <?php echo $this->label; /*echo " "; echo $this->secondName;*/ ?>!


    <form action="\idx\authenticate" method="POST">
        <div class="containerAuth">
            <label for="login">Логин: </label><input id="login" name="login" type="text"><br>
            <label for="passw">Пароль: </label><input id="passw" name="passw" type="password"><br>
            <input type="submit" value="Войти">
        </div>
    </form>
</div>