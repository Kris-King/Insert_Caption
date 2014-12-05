<br/><br/>


<form id="signIn_Form" method="post" onsubmit="submitForm(this);" action="http://localhost/InsertCaption/web/index.php">

<fieldset>
    
    <legend>Sign In</legend>
    
        <br/>

    <!--        ///////////////////////////       -->
    <!--             Submit User Name             -->
    <!--       ///////////////////////////        -->




    <label for="u_name">User Name</label><sup>*</sup>

    <br />

    <input id="u_name" type="text" name="username"/>



    <span id="un_error"></span><br/><br/>





    <!--        ///////////////////////////       -->
    <!--          Submit User Password            -->
    <!--       ///////////////////////////        -->



    <label for="password">Password</label><sup>*</sup>

    <br />

    <input id="password" type="password" name="password"/>

    <span id="password_error"></span><br/><br/>





    <!--        ////////////////////////////////       -->
    <!--                  Submit form                  -->
    <!--       ////////////////////////////////        -->

    <br/><br/>

    <input type="submit" value="Submit" />
    
    <br/><br/>
    
    
</fieldset>
    
</form>    
