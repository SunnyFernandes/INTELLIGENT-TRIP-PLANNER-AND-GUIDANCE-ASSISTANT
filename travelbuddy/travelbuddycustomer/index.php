<?php
session_start();

// Check if user is logged in
if(isset($_SESSION['user_email'])) {
    $userEmail = $_SESSION['user_email'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/styles.css" />
<script src="assets/js/script.js"></script>
<title>Travel Buddy</title>
<style>
        /* Style for the profile picture */
        .profile-info {
            position: relative;
            display: none; /* Initially hide */
            cursor: pointer;
        }
        
        .profile-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        
        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        
        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        
        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        
        /* Show the profile info and dropdown menu when logged in */
        <?php if(isset($userEmail)): ?>
            .profile-info {
                display: inline-block;
            }
        <?php endif; ?>
        
        /* Show the dropdown menu on hover */
        .profile-info:hover .dropdown-content {
            display: block;
        }
        
        /* Hide the sign-in link when logged in */
        .sign-in-link {
            <?php if(isset($userEmail)): ?> display: none; <?php endif; ?>
        }
    </style>

  </head>
  <body>
  <header>
      <nav class="navbar">
        <div class="logo">Travel Buddy</div>
        <div class="menu">
          <a href="#hero">Home</a>
          <!-- <a href="#destinations">Destinations</a> -->
          <a href="#recommendations">Recommendations</a>
          <a href="#itineraries">Create Itinerary</a>
          <a href="#contact">Contact</a>
          <a href="signup.php" class="sign-in-link">Sign Up</a> <!-- Hide this link when logged in -->
          <?php if(isset($userEmail)): ?>
                    <div class="profile-info">
                        <img src="./assets/images/g1new.jpg" alt="Profile Picture">
                        <div class="dropdown-content">
                            <a href="profile_edit.php">Profile</a>
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>
                <?php endif; ?>
        </div>
      </nav>
    </header>
  <main>
    <section id="hero">
        <h1>Your Explore the World with Your Ultimate Travel Buddy - Your Passport to Adventure!</h1>
        <p>Discover the world with itineraries crafted just for you.</p>
        <a href="#itineraries" class="btn-primary">Get Started</a>
      </section>
      <!-- <section id="destinations" class="container">
        <h2>Popular Destinations</h2>
        <div class="destination-cards">
         
          <div class="destination-card">
            <img src="./assets/images/destination.jpg" alt="Destination 1">
            <h3>Destination 1</h3>
            <p>Description of destination 1.</p>
          </div>
          <div class="destination-card">
            <img src="./assets/images/destination.jpg" alt="Destination 2">
            <h3>Destination 2</h3>
            <p>Description of destination 2.</p>
          </div>
          <div class="destination-card">
            <img src="./assets/images/destination.jpg" alt="Destination 3">
            <h3>Destination 3</h3>
            <p>Description of destination 3.</p>
          </div>
        </div>
      </section> -->
      <section id="recommendations" class="container">
        <h2>Recommendations</h2>
        <div class="recommendation-cards">
        
          <div class="recommendation-card">
            <img src="./assets/images/g1new.jpg" alt="Recommendation 1">
            <h3>Recommendation 1</h3>
            <p class="description">Description of recommendation 1.</p> 
            <a href="#" class="btn-book">Book Now</a>
          </div>
          <div class="recommendation-card">
            <img src="./assets/images/g1new.jpg" alt="Recommendation 2">
            <h3>Recommendation 2</h3>
            <p class="description">Description of recommendation 1.</p> 
            <a href="#" class="btn-book">Book Now</a>
          </div>
          <div class="recommendation-card">
            <img src="./assets/images/g1new.jpg" alt="Recommendation 3">
            <h3>Recommendation 3</h3>
            <p class="description">Description of recommendation 1.</p> 
            <a href="#" class="btn-book">Book Now</a>
          </div>
        
        </div>
      </section>
    <section id="itineraries" class="container">
      <h2>Create Your Itinerary</h2>
     <form action="created.php" id="itenerary-form" method="POST">
       
        <label for="travel-type">Travel Type:</label>
        <select id="travel-type" name="travel-type" required>
            <option value="" disabled selected>Select</option>a
            <option value="solo">Solo</option>
            <option value="couple">Couple</option>
            <option value="family">Family</option>
            <option value="group">Group</option>
        </select>

        <label for="travel-type">Trip Type:</label>
        <select id="travel-type" name="travel-type" required>
            <option value="" disabled selected>Select</option>a
            <option value="solo">Chill</option>
            <option value="couple">Touristy</option>
            <option value="family">Packed</option>
        </select>
        

    
        <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 20px;">
            <div>
                <label for="arrival-date">Start Date:</label>
                <input type="date" id="arrival-date" name="arrival-date" required>
                <div id="arrival-date-error" class="error-message"></div>
            </div>
            <div>
                <label for="departure-date">End Date:</label>
                <input type="date" id="departure-date" name="departure-date" required>
                <div id="departure-date-error" class="error-message"></div>
            </div>
        </div>

        
        <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 20px;">
            <div>
                <label for="source">Source:</label>
                <input type="text" id="source" name="source" required>
                <div id="source-error" class="error-message"></div>
            </div>
            <div>
                <label for="destination">Destination:</label>
                <input type="text" id="destination" name="destination" required>
                <div id="destination-error" class="error-message"></div>
            </div>
        </div>

        
        <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 20px;">
            <div>
                <label for="ageGroup">Age Group:</label>
                <select id="ageGroup" name="ageGroup" required>
                    <option value="" disabled selected>Select</option>
                    <option value="under18">0 - 17</option>
                    <option value="18to30">18 to 24</option>
                    <option value="31to50">25 to 34</option>
                    <option value="over50">35 to 44</option>
                    <option value="over50">45 to 54</option>
                    <option value="over50">55 to 64</option>
                    <option value="over50">65 and older</option>
                </select>
            </div>
            <div>
                <label for="budget">Budget (in Rs):</label>
                <select id="budget" name="budget" required>
                    <option value="" disabled selected>Select</option>
                    <option value="500-2000">Less than 10000</option>
                    <option value="2001-5000">10000 - 20000</option>
                    <option value="5001-10000">20000 - 4000</option>
                    <option value="10001-20000">40000 - 60000</option>
                    <option value="20001-50000">60000 - 80000</option>
                    <option value="50001+">80000 - 100000</option>
                    <option value="50001+">More than 100000</option>
                </select>
            </div>
        </div>

        <label for="numTravelers">Number of Travelers:</label>
        <input type="number" id="numTravelers" name="numTravelers" min="1" required>
        <div id="numTravelers-error" class="error-message"></div>
        
    
    <button type="submit">Submit</button>

      </form>
    </section>
    <section id="contact" class="container">
      <h2>Contact Us</h2>
    
      <p>If you have any questions or inquiries, please fill out the form below:</p>
      <form id="contact-form">
        <label for="contact-name">Name:</label>
        <input type="text" id="contact-name" name="contact-name" required>
        <label for="contact-email">Email:</label>
        <input type="email" id="contact-email" name="contact-email" required>
        <label for="contact-message">Message:</label>
        <textarea id="contact-message" name="contact-message" rows="4" required></textarea>
        <button type="submit">Send Message</button>
      </form>
    </section>
</main>
<footer>
  <p>© 2024 Travel Buddy. All rights reserved.</p>
</footer>
</body>
</html>
