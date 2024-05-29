<?php
/*
Template Name: Alumni Register
*/
get_header();
?>

<div class="main-content">
    <?php the_content(); ?>
    <form method="post" class="alumni-register-form">
    <?php wp_nonce_field('alumni_register_action', 'alumni_register_nonce'); ?>
        <h2>Alumni Register</h2>
        <label> First Name
            <input type="text" name="first-name" autocomplete="first-name" required>
        </label>
        <label> Middle Name
            <input type="text" name="middle-name" autocomplete="first-name" required>
        </label>
        <label> Last Name
            <input type="text" name="last-name" required>
        </label>
        <label> Date of Birth
            <input type="date" name="date-of-birth" required>
        </label>
        <label> Marital status
            <select name="marital-status" required>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
            </select>
        </label>
        <div class="period-at-smack">
            <label for="start-date">Period at SMACK. From:</label>
            <input type="date" name="start-date" id="start-date" required>
            <label for="end-date">to:</label>
            <input type="date" name="end-date" id="end-date" required>
        </div>
        <label> House of Residence
            <select name="house-of-residence" required>
                <option value="">Select house</option>
                <option value="Lourdel">Lourdel</option>
                <option value="Mugwanya">Mugwanya</option>
                <option value="Kiwanuka">Kiwanuka</option>
                <option value="Kakooza">Kakooza</option>
            </select>
        </label>
        <label> Profession
            <select name="profession" required>
                <option value="">Select profession</option>
                <option value="Business & Finance">Business & Finance</option>
                <option value="Computers & Technology">Computers & Technology</option>
                <option value="Construction Trades">Construction Trades</option>
                <option value="Education">Education</option>
                <option value="Teaching & Training">Teaching & Training</option>
                <option value="Engineering & Engineering Technicians">Engineering & Engineering Technicians</option>
                <option value="Fishing">Fishing</option>
                <option value="Farming & Forestry">Farming & Forestry</option>
                <option value="Health & Medical">Health & Medical</option>
                <option value="Hospitality">Hospitality</option>
                <option value="Travel & Tourism">Travel & Tourism</option>
                <option value="Legal Criminal Justice & Law Enforcement">Legal Criminal Justice & Law Enforcement</option>
                <option value="Management">Management</option>
                <option value="Media Communications & Broadcasting">Media Communications & Broadcasting</option>
                <option value="Military & Armed Forces">Military & Armed Forces</option>
                <option value="Office Administration & Management">Office Administration & Management</option>
                <option value="Production & Manufacturing">Production & Manufacturing</option>
                <option value="Professional & Service">Professional & Service</option>
                <option value="Psychology & Counselling">Psychology & Counselling</option>
                <option value="Installation">Installation</option>
                <option value="Repair & Maintenance">Repair & Maintenance</option>
                <option value="Sales & Marketing">Sales & Marketing</option>
                <option value="Transportation & Moving">Transportation & Moving</option>
            </select>
        </label>
        <label> Telephone Number
            <input type="tel" name="telephone-number" required>
        </label>
        <label> Your email
            <input type="email" name="your-email" autocomplete="email" required>
        </label>
        <label> Expectations of SMACKOBA
            <textarea name="expectations" required></textarea>
        </label>
        <label> Subject
            <input type="text" name="your-subject" required>
        </label>
        <label> Your message (optional)
            <textarea name="your-message"></textarea>
        </label>
        <label>
            <input type="checkbox" name="is-parent"> Parent at SMACK?
        </label>
        <label>
            <input type="checkbox" name="receive-communication"> Receive communication from SMACKOBA?
        </label>
        <button type="submit">Register</button>
    </form>

    <!-- <div id="right-container">
        <div class="ad-space">
            <h3>Ad Space</h3>
            <img src="path-to-your-ad-image.jpg" alt="Ad Image">
        </div>
        <div class="ad-space">
            <h3>SMACKOBA registration</h3>
            <p>Are you a registered old boy? Register Today</p>
            <img src="path-to-your-ad-image.jpg" alt="Ad Image">
            <input type="submit" value="Register">
        </div>
        <div class="subscribe-container">
            <h3>Subscribe to the Newsletter</h3>
            <p>Get notified about news,events,deals and all things</p>
            <input type="email" placeholder="Enter your email">
            <input type="submit" value="Subscribe">
        </div>
    </div> -->
</div>

<?php get_footer(); ?>