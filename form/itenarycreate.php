<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Information Form</title>
  <link rel="stylesheet" href="../form/itenarycreate.css">
</head>
<body>
  <form action="submit_form.php" method="post">
    <label for="startDate">Start Date:</label>
    <input type="date" id="startDate" name="startDate" required><br>

    <label for="endDate">End Date:</label>
    <input type="date" id="endDate" name="endDate" required><br>

    <label for="source">Source:</label>
    <input type="text" id="source" name="source" required><br>

    <label for="destination">Destination:</label>
    <input type="text" id="destination" name="destination" required><br>

    <label for="travelers">No. of Travelers:</label>
    <input type="number" id="travelers" name="travelers" min="1" required><br>

    <label for="budget">Budget:</label>
    <input type="range" id="budget" name="budget" min="0" max="10000" step="100" value="5000">
    <output for="budget" id="budgetValue">5000</output>

    <input type="submit" value="Submit">
  </form>
  <script>
    // Display the current value of the budget slider
    document.getElementById('budget').addEventListener('input', function () {
      document.getElementById('budgetValue').textContent = this.value;
    });
  </script>

</body>
</html>
