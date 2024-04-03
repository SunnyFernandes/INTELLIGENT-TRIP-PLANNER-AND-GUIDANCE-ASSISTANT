<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Created Itinerary</title>
<link rel="stylesheet" href="assets/css/styles.css" />
<style>
/* Style for itinerary item */
.itinerary-item {
    margin-bottom: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: transform 0.3s ease-in-out;
}
.itinerary-item:hover {
    transform: translateY(-5px);
}

/* Style for edit, delete, and save buttons */
.btn {
    margin-right: 10px;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}
.btn:hover {
    background-color: #555;
}

.btn-edit {
    background-color: #4CAF50;
    color: white;
}
.btn-delete {
    background-color: #f44336;
    color: white;
}
.btn-save {
    background-color: #007bff;
    color: white;
}

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    overflow: auto;
}
.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    max-width: 400px;
    text-align: center;
}
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>
<body>
<header>
    <nav class="navbar">
        <div class="logo">Travel Buddy</div>
        <div class="menu">
            <a href="index.php">Back</a>
        </div>
    </nav>
</header>

<h1 style="text-align: center;">Created Itinerary</h1>

<div id="itinerary-container" style="display: flex; justify-content: center;">
    <!-- Itinerary item will be added here dynamically -->
</div>

<!-- Edit and delete modal -->
<div id="editDeleteModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <!-- Edit and delete form or content will be added here dynamically -->
    </div>
</div>

<script>
// Sample data for itinerary
const itineraryData = {
    id: 1,
    destination: "New York",
    date: "2024-05-01",
    details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit."
};

// Function to render the itinerary item
function renderItinerary() {
    const itineraryContainer = document.getElementById('itinerary-container');
    itineraryContainer.innerHTML = ''; // Clear existing content

    const itineraryItem = document.createElement('div');
    itineraryItem.classList.add('itinerary-item');
    itineraryItem.innerHTML = `
        <h3>${itineraryData.destination}</h3>
        <p>Date: ${itineraryData.date}</p>
        <p>${itineraryData.details}</p>
        <button class="btn btn-edit" onclick="openEditModal(${itineraryData.id})">Edit</button>
        <button class="btn btn-delete" onclick="deleteItem(${itineraryData.id})">Delete</button>
        <button class="btn btn-save" onclick="saveItem(${itineraryData.id})">Save</button>
    `;
    itineraryContainer.appendChild(itineraryItem);
}

// Function to open edit modal
function openEditModal(itemId) {
    const modal = document.getElementById('editDeleteModal');
    // Logic to populate the modal with edit form or content using itemId
    modal.style.display = "block";
}

// Function to delete itinerary item
function deleteItem(itemId) {
    // Logic to delete the item from itineraryData and re-render the itinerary
    renderItinerary();
}

// Function to save itinerary item
function saveItem(itemId) {
    // Logic to save the item, if needed
    alert('Item saved!');
}

// When the page loads, render the itinerary
document.addEventListener('DOMContentLoaded', renderItinerary);

// Close the modal when clicking on close button (×)
const closeBtn = document.getElementsByClassName('close')[0];
closeBtn.onclick = function() {
    const modal = document.getElementById('editDeleteModal');
    modal.style.display = "none";
}

// Close the modal when clicking anywhere outside of it
window.onclick = function(event) {
    const modal = document.getElementById('editDeleteModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
