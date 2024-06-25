<?php
session_start();

// Database connection
$host = 'localhost';
$db = 'xpath_exercise';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// Get the total number of questions
$totalQuestionsQuery = $pdo->query('SELECT COUNT(*) as count FROM questions');
$totalQuestions = $totalQuestionsQuery->fetch()['count'];

// Initialize the session variables
if (!isset($_SESSION['currentQuestion'])) {
    $_SESSION['currentQuestion'] = 0;
    $_SESSION['correctAnswers'] = 0;
}

// Fetch the current question
$currentQuestionIndex = $_SESSION['currentQuestion'];
$query = $pdo->prepare('SELECT * FROM questions LIMIT 1 OFFSET ?');
$query->execute([$currentQuestionIndex]);
$question = $query->fetch();

if (!$question) {
    echo "No questions found or invalid question index.";
    exit;
}

$isSubmitted = false;
$isCorrect = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['answer'])) {
        $userAnswer = $_POST['answer'];
        $isSubmitted = true;
        $isCorrect = ($userAnswer === $question['correct_answer']);
        if ($isCorrect) {
            $_SESSION['correctAnswers']++;
        }
    } else {
        // Move to the next question
        $_SESSION['currentQuestion']++;
        if ($_SESSION['currentQuestion'] >= $totalQuestions) {
            header('Location: results.php');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XPath Quiz</title>
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
        .quiz-container {
            background-color: white;
            padding: 60px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 800px;
        }
        .quiz-container h1 {
            margin-bottom: 30px;
            font-size: 28px;
        }
        .quiz-container p {
            font-size: 20px;
            margin-bottom: 20px;
        }
        .quiz-container form {
            display: flex;
            flex-direction: column;
        }
        .quiz-container input[type="text"] {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 18px;
            width: calc(100% - 32px);
        }
        .quiz-container input[type="submit"], .quiz-container .next-button {
            padding: 15px;
            margin-bottom: 20px;
            border: none;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
        }
        .quiz-container .next-button {
            background-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="quiz-container">
        <h1>Question <?php echo $currentQuestionIndex + 1; ?></h1>
        <?php if ($isSubmitted): ?>
            <p>Your answer: <?php echo htmlspecialchars($_POST['answer']); ?></p>
            <p><?php echo $isCorrect ? 'Correct!' : 'Wrong!'; ?></p>
            <p>The correct answer is: <?php echo htmlspecialchars($question['correct_answer']); ?></p>
            <form method="post">
                <input type="submit" value="Next" class="next-button">
            </form>
        <?php else: ?>
            <p><?php echo htmlspecialchars($question['question_text']); ?></p>
            <form method="post">
                <input type="text" name="answer" required>
                <input type="submit" value="Submit">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
