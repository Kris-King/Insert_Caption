<br/><br/>

<h1>Contact Us</h1>

<p>If you wish to contact the team about anything about the site or wish
to report an image or caption please submit your details below.</p>

<p>Note: When reporting a bug please be as specific as you can. Furthermore, if
you wish to report a user/image or caption please specify: the user in question,
link to the image or caption and outline your reasons for reporting them.</p>

<br/><br/>

<form id="contact_form" onsubmit="submitForm(this);" action="http://localhost/InsertCaption/web/index.php?page=success">






                    <!--        ///////////////////////////       -->
                    <!--           Submit Email Address           -->
                    <!--       ///////////////////////////        -->




                    <label for="e_address">Email Address</label><sup>*</sup>

                    <br />

                    <input id="e_address" onblur="checkEmailAddress(this);" type="text" name="emailaddress"/>



                    <span id="ea_error"></span><br/><br/>





                    <!--        ///////////////////////////       -->
                    <!--              Submit Subject              -->
                    <!--       ///////////////////////////        -->



                    <label for="subject">Subject</label><sup>*</sup>

                    <br />

                    <input id="subject" onblur="checkUserName(this);" type="text" name="subject"/>

                    <span id="subj_error"></span><br/><br/>


                    <!--        ////////////////////////////////       -->
                    <!--          Submit Message ( Feedback )          -->
                    <!--       ////////////////////////////////        -->



                    <label for="message">Message</label><sup>*</sup>

                    <br />

                    <textarea id="message" onblur="checkMessage(this);" rows="5" cols="42" name="message"></textarea>



                    <span id="m_error"></span><br/><br/>




                    <!--        ////////////////////////////////       -->
                    <!--                  Submit form                  -->
                    <!--       ////////////////////////////////        -->



                    <input type="submit" value="Submit" />



                </form>

<br/><br/><br/>