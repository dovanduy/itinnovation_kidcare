<h1>Settings</h1>
<div class="row">
    <div class="col-md-8">
    <form>
        <fieldset>
            <legend>Device</legend>
            <label>Device-id</label>
            <input name="deviceid" value="<?=\app\models\User::findIdentity(Yii::$app->user->id)->deviceId?>"
                   disabled="disabled" type="text" class="form-control" />
        </fieldset>
        <fieldset>
            <legend>User settings</legend>
            <label>First name</label>
            <input name="firstname" type="text" class="form-control" />

            <label>Last name</label>
            <input name="lastname" type="text" class="form-control" />

            <label>Child's name</label>
            <input name="kidname" type="text" class="form-control" />

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
        <p>
            <div class="pull-left">
                <input type="submit" value="Save my preferences" class="btn btn-primary" />
            </div>
            <div class="pull-right">
                <input type="submit" value="Delete all data" class="btn btn-warning" />
                <input type="submit" value="Delete my account" class="btn btn-danger" />
            </div>
        </p>
    </form>
    </div>
    <div class="col-md-4">
        <div class="well">
            <h4>Note:</h4>
            On this page you can set your preferences. If you would like to receive notifications on your
            email address and phone based on your child's behaviour, then make sure you provide a correct email
            address and phone number and turn off notifications.
        </div>
    </div>
</div>