THIS IS INDEX PAGE
<form action="/user" method="POST">
    @csrf
    <lable>EMAIL:</lable>
    <input type="text" name="email">
    <br>
    <lable>Name:</lable>
    <input type="text" name="name">
    <br>
    <lable>Password:</lable>
    <input type="password" name="password">
    <button type="submit">SUBMIT</button>
</form>