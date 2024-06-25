<?php
session_start();

if (!isset($_SESSION['currentQuestion']) || !isset($_SESSION['correctAnswers'])) {
    echo "Session data not found. Please start the quiz again.";
    exit;
}

$totalQuestions = $_SESSION['currentQuestion'];
$correctAnswers = $_SESSION['correctAnswers'];

// Clear the session data
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .results-container {
            background-color: white;
            padding: 60px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 800px;
            text-align: center;
        }
        .results-container h1 {
            margin-bottom: 30px;
            font-size: 28px;
        }
        .results-container p {
            font-size: 20px;
            margin-bottom: 20px;
        }
        .results-container .start-over {
            padding: 15px;
            margin-top: 20px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="results-container">
        <h1>Quiz Results</h1>
        <p>You answered <?php echo $correctAnswers; ?> out of <?php echo $totalQuestions; ?> questions correctly.</p>
        <form action="index.php" method="get">
            <input type="submit" value="Start Over" class="start-over">
        </form>
    </div>
</body>
</html>
