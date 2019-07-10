<h2><?= $heading ?></h2>
<form action="/flowers/public/user/save" method="post">
    <div class="input">
        <input type="hidden" 
                name="user[id]"
                value="<?= $user['id'] ?? '' ?>" >
        <label for="name">Name</label>
        <input  type="text" 
                name="user[name]"
                id="name"
                maxlength="100"
                value="<?= $user['name'] ?? '' ?> ">
        <label for="email">Email</label>
        <input type="text" 
                name="user[email]" 
                maxlength="100"
                id="email"
                value="<?= $user['email'] ?? '' ?>"
                required>
        <label for="password">Password</label>
        <input type="password" 
                name="user[password]" 
                id="password"
                value="<?= $user['password'] ?? '' ?>">
         <a href="/flowers/public/user/list" class="btn cancel">Cancel</a>
         <button type="submit" class="btn">Submit</button>
    </div>
</form>