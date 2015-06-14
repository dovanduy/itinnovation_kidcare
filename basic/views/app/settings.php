<h1>Settings</h1>
<div class="row">
    <div class="col-md-8">
    <form>
        <fieldset>
            <legend>Device</legend>
            <label>Device-id</label>
            <input name="deviceid" type="text" class="form-control" />
        </fieldset>
        <fieldset>
            <legend>User settings</legend>
            <label>First name</label>
            <input name="firstname" type="text" class="form-control" />

            <label>Last name</label>
            <input name="lastname" type="text" class="form-control" />

            <label>Email address <small>(used for sending notifications)</small></label>
            <input name="emailaddress" type="text" class="form-control" />

            <label>Phone number (incl. country code) <small>(used for sending notifications)</small></label>
            <input name="phonenumber" type="text" class="form-control" />
        </fieldset>
        <fieldset>
            <legend>Notifications</legend>
            <input type="checkbox" name="email_notifications" checked /> Receive email notifications<br/>
            <input type="checkbox" name="phone_notifications" checked /> Receive notifications on my phone
        </fieldset>

        <hr/>
        <input type="submit" value="Save my preferences" class="btn btn-primary" />
    </form>
    </div>
    <div class="col-md-4">
        <div class="well">
            On this page you can set your preferences.
        </div>
    </div>
</div>