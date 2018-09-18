<!-- Include Header -->
<?php include "partials/header.php"; ?>
<?php $homepage = str_replace('.php', '', basename($_SERVER['PHP_SELF'])); ?>
    <!-- Begin page content -->
    <main role="main" class="container">
        <div class="row">
            <div class="col-sm-12">
                <div><h3 class="welcome"><?= $msg; ?></h3><h2 class="largeHeadline">Stay Connected</h2><p class="smallHeadline">number of people in our map: <?= $qty; ?></p></div>

                <!-- Add User Form -->
                <form id="usrForm" action="index.php?page=home&action=submit" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="fname">First Name</label>
                    <input id="fname" class="form-control" type="text" name="fname" placeholder="First Name" required />
                    </div>
                    <div class="form-group col-md-6">
                    <label for="lname">Last Name</label>
                    <input id="lname" class="form-control" type="text" name="lname" placeholder="Last Name" required />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <input id="address" class="form-control" type="text" name="address" placeholder="Address" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input id="phone" class="form-control" name="phone" placeholder="Phone: xxx-xxx-xxxx" type="tel" required />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="city">City</label>
                        <input id="city" class="form-control" type="text" name="city" placeholder="City" required />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="state">State</label>
                        <select id="state" name="state" class="form-control" searchable="state" required>
                        <option value="" class="rounded-circle-select" disabled selected>Choose State</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="zip">Zip</label>
                        <input id="zip" class="form-control" type="text" name="zip" placeholder="Zip" pattern="^(?!0{3})[0-9]{3,5}$" required />
                    </div>
                </div>
                
               
                <div class="col"><input class="btn btn-secondary" type="submit" value="Map People"/></div>
                
                </form>
            </div>
        </div>
</main>

<!-- Include Footer -->
<?php include "partials/footer.php"; ?>