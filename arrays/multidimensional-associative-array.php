<?php
// Initializing a multidimensional array for employees' weekly schedules
$schedule = [
    [
        'name' => 'John Doe',
        'shifts' => [
            'Monday' => ['shift' => 'Morning', 'hours' => 8],
            'Tuesday' => ['shift' => 'Evening', 'hours' => 7],
            'Wednesday' => ['shift' => 'Night', 'hours' => 9],
            'Thursday' => ['shift' => 'Morning', 'hours' => 8],
            'Friday' => ['shift' => 'Evening', 'hours' => 7],
            'Saturday' => ['shift' => 'Night', 'hours' => 6],
            'Sunday' => ['shift' => 'Morning', 'hours' => 8]
        ]
    ],
    [
        'name' => 'Jane Smith',
        'shifts' => [
            'Monday' => ['shift' => 'Evening', 'hours' => 7],
            'Tuesday' => ['shift' => 'Night', 'hours' => 6],
            'Wednesday' => ['shift' => 'Morning', 'hours' => 8],
            'Thursday' => ['shift' => 'Evening', 'hours' => 7],
            'Friday' => ['shift' => 'Night', 'hours' => 9],
            'Saturday' => ['shift' => 'Morning', 'hours' => 8],
            'Sunday' => ['shift' => 'Evening', 'hours' => 7]
        ]
    ],
    [
        'name' => 'Alice Brown',
        'shifts' => [
            'Monday' => ['shift' => 'Night', 'hours' => 8],
            'Tuesday' => ['shift' => 'Morning', 'hours' => 7],
            'Wednesday' => ['shift' => 'Evening', 'hours' => 8],
            'Thursday' => ['shift' => 'Night', 'hours' => 9],
            'Friday' => ['shift' => 'Morning', 'hours' => 7],
            'Saturday' => ['shift' => 'Evening', 'hours' => 6],
            'Sunday' => ['shift' => 'Night', 'hours' => 9]
        ]
    ]
];

// Loop through each employee in the schedule
foreach ($schedule as $employee) {
    echo "Employee: " . $employee['name'] . "<br>";
    $totalHours = 0;

    // Loop through each day's schedule for the employee
    foreach ($employee['shifts'] as $day => $shiftDetails) {
        echo $day . " - Shift: " . $shiftDetails['shift'] . " - Hours Worked: " . $shiftDetails['hours'] . " hours<br>";
        // Accumulate the total hours worked for the week
        $totalHours += $shiftDetails['hours'];
    }

    // Display the total hours worked for the employee
    echo "<strong>Total Hours Worked by " . $employee['name'] . " for the week: " . $totalHours . " hours</strong><br><br>";
}
