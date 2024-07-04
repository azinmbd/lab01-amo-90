<?php

$input = "";
$reportString = "";
$finalReportString = "";

$totalPoints = 0;
$totalScore = 0;
$missedPoints= 0;
$weightedTotal = 0;
$weightedAverage = 0;
$missedPercentage = 0;
$outcome = "";

// while ($input != "q") {
while (true) {

    echo "Please enter your command in the form of (a, r, q) ";

    $input = readline();

    switch ($input) {
        case "a":
            echo "Please enter the name of the assessment: ";
            $assessmentName = readline();

            echo "Please enter the number of points for the assessment: ";
            $assessmentPoint = readline();

            echo "Was the student absent? (y/n) ";
            $isAbsent = readline();

            $totalPoints += $assessmentPoint;

            // setting the assesment score based on being absent or present
            if ($isAbsent === "y") {
                echo "The student has been marked absent for this assignment.\n";
                $missedPoints += $assessmentPoint;
                $assessmentScore = 0;
            } elseif ($isAbsent === "n") {
                echo "Please enter the student's score for the assessment: ";
                $assessmentScore = readline();
                
            }
            
            $totalScore += $assessmentScore;
            $missedPercentage = ($missedPoints / $totalPoints) * 100;
            
            // overal report of assesments design
            $reportString .= sprintf("%s","---------------------------------------------------------------------------------\n");
            $reportString .= sprintf("%20s%40s\n", "Assignment:", $assessmentName);
            $reportString .= sprintf("%20s%40s\n", "Total Points:", $assessmentPoint);
            $reportString .= sprintf("%20s%40s\n", "Total Score:", $assessmentScore);
            $reportString .= sprintf("%20s%40s\n", "Missed:", $isAbsent);
            $reportString .= sprintf( "%s","---------------------------------------------------------------------------------\n");

            $weightedAverage = ($totalScore / $totalPoints) * 100;

            // setting the outcome value for the final report
            if ($missedPercentage > 30 ) {
                $outcome = "UN";
            } elseif ($weightedAverage >= 50) {
                $outcome = "Pass";
            } else {
                $outcome = "Fail";
            }

            // final report output design
            $finalReportString = sprintf("%s","---------------------------------------------------------------------------------\n");
            $finalReportString .= sprintf("%40s\n", "FINAL REPORT");
            $finalReportString .= sprintf("%20s%40.0f%s\n", "Weighted Average:", $weightedAverage, "%");
            $finalReportString .= sprintf("%20s%40.0f%s\n", "Missed Percentage:", $missedPercentage, "%");
            $finalReportString .= sprintf("%20s%40s\n", "Outcome:", $outcome);
            $finalReportString .= sprintf("%s","---------------------------------------------------------------------------------\n");

            break;

        case "r":
            if (isset($finalReportString) && $finalReportString !== "")  {
                echo $reportString;
                echo $finalReportString;
            }else{
                echo "Some fiedls are not set. Try again!\n";
            }

            break;   

        case "q":
            echo "You quit the program!";
            exit();
            break;
            
            default:
            echo "Invalid command please try again.";
            break;
        }
}
    

?>
