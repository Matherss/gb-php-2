<style>
    .error {
        margin:10px 0px;
        color:red;
        display:none;
    }
</style>
<form id="login_form" method="post">
    <div class="error">Имя может содержать только буквы</div>
    <label for="name">Ваше имя</label>
    <input type="text" name="name"></input>
    <label for="login">Ваш логин</label>
    <input type="text" name="login"></input>
    <label for="pass">Ваш пароль</label>
    <input type="text" name="pass"></input>
    <input type="submit" value="Зарегистрироваться"></input>
</form>
<script>
    const nameEl = document.querySelector('input[name="name"]');
    nameEl.addEventListener('change',(e)=>{
        console.log(e.target.value);
        if(!/^[a-zA-Zа-яёА-ЯЁ]+$/gi.test(e.target.value)){
            document.querySelector(".error").style.display = "block";
        }else {
            document.querySelector(".error").style.display = "none";
        };
    })
</script>
