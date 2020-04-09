<form action='kleinerQ35.php' method='post'>


    Account: <input type="text" name="account"/><br>
    Password: <input type="password" name="password"/><br>
    Gender: <input type="radio" name="gender" value="male"/>Male
            <input type="radio" name="gender" value="female"/>Female <br>
    興趣:
    <input type="checkbox" name="interest[]" value="1">Play Game
    <input type="checkbox" name="interest[]" value="2">Play Mobile
    <input type="checkbox" name="interest[]" value="3">Play TV<br>
    <input type="checkbox" name="interest[]" value="4">Play Ball
    <input type="checkbox" name="interest[]" value="5">Play Kid<br>
    Region:
    <select name="zipcode">
        <option value="401">North</option>
        <option value="402">East</option>
        <option value="403">West</option>
        <option value="404">South</option>

    </select><br>
    <textarea name="memo" rows="10" cols="30">iii</textarea>
    <input type="file" name="upload"/>
            <br><input type="submit" value ="OK"/>

</form>