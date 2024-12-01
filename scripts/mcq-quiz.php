<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Quiz</title>

    <!-- 
Create an online quiz system where users can answer 5 multiple-choice questions.
a) Use a PHP form to handle submission and validate the input. 
b) Store the answers in an array, compare them with the correct answers, and display the score at the end.
    -->
</head>

<body>

    <h2>Online Quiz</h2>

    <!-- Quiz form -->
    <form action="" method="POST">

        <h3>Question 1: What is the capital of France?</h3>
        <input type="radio" name="q1" value="a"> Paris<br>
        <input type="radio" name="q1" value="b"> London<br>
        <input type="radio" name="q1" value="c"> Madrid<br>
        <input type="radio" name="q1" value="d"> Berlin<br>

        <h3>Question 2: Which is the largest ocean?</h3>
        <input type="radio" name="q2" value="a"> Atlantic Ocean<br>
        <input type="radio" name="q2" value="b"> Pacific Ocean<br>
        <input type="radio" name="q2" value="c"> Indian Ocean<br>
        <input type="radio" name="q2" value="d"> Arctic Ocean<br>

        <h3>Question 3: Which planet is known as the Red Planet?</h3>
        <input type="radio" name="q3" value="a"> Venus<br>
        <input type="radio" name="q3" value="b"> Earth<br>
        <input type="radio" name="q3" value="c"> Mars<br>
        <input type="radio" name="q3" value="d"> Jupiter<br>

        <h3>Question 4: Who wrote the play "Romeo and Juliet"?</h3>
        <input type="radio" name="q4" value="a"> Charles Dickens<br>
        <input type="radio" name="q4" value="b"> Jane Austen<br>
        <input type="radio" name="q4" value="c"> Mark Twain<br>
        <input type="radio" name="q4" value="d"> William Shakespeare<br>

        <h3>Question 5: Which animal is known as the "King of the Jungle"?</h3>
        <input type="radio" name="q5" value="a"> Lion<br>
        <input type="radio" name="q5" value="b"> Tiger<br>
        <input type="radio" name="q5" value="c"> Elephant<br>
        <input type="radio" name="q5" value="d"> Bear<br>

        <br>
        <input type="submit" value="Submit">
    </form>
    <?php

    // Define the correct answers for the quiz
    $correct_answers = [
        'q1' => 'a', // Question 1
        'q2' => 'b', // Question 2
        'q3' => 'c', // Question 3
        'q4' => 'd', // Question 4
        'q5' => 'a'  // Question 5
    ];

    // Initialize variables to store user input and error messages
    $user_answers = [];
    $score = 0;
    $error_message = "";

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Loop through the questions and validate the answers
        foreach ($correct_answers as $key => $value) {
            if (isset($_POST[$key])) {
                $user_answers[$key] = $_POST[$key];

                // Check if the answer is correct and increment the score
                if ($user_answers[$key] == $correct_answers[$key]) {
                    $score++;
                }
            }
        }

        echo "<h3>Your Score: $score out of 5</h3>";
    }
    ?>

</body>

</html>