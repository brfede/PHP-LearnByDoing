<?php

/**
 * A) Loops
 *
 * You took a freelance job to create a clock in PHP
 * The clock should count from 1 to 10 seconds.
 *
 * Create at least 3 solutions for this problem using loops.
 *
 * Hint : Use the php function sleep(1) so the count is accurate.
 *
 */
// Solución 1
for($i = 1; $i <= 10; $i++) {
    echo $i."\n";
    sleep(1);
}
// Solución 2
$i = 1;
while($i<=10) {
    echo $i."\n";
    sleep(1);
    $i++;
}
// Solución 3
$i=1;
do {
    echo $i."\n";
    sleep(1);
    $i++;
} while($i<=10);
/**
 *  Multidimensional arrays.
 *  A flight agency is tracking how many seats are available in the plains.
 *  they've got the information, but want you to show it in a more human friendly way.
 *
 *  Below you'll find an array containing the data.
 *
 * Your output should be :
 *  Flight number: , origin: , destination: , available seats:
 *
 * Amount of flights with no seats available.
 *
 * Amount of national flights.
 *
 * Amount of international flights.
 *
 * The flight number with more seats available.
 */

$flights = [
    "National" => [
        [1958, "BUE", "MZA", 1],
        [2233, "BUE", "CBA", 3],
        [2343, "BUE", "MDP", 0],
        [2257, "BUE", "CBA", 3],
        [2237, "CBA", "MZA", 5],
        [2518, "CBA", "MDP", 24]
    ],
    "International" =>
    [
        [1958, "EZE", "GRU", 33],
        [2233, "EZE", "CDG", 12],
        [2343, "GRU", "MAD", 0],
        [2257, "GRU", "EZE", 5],
        [2237, "CDG", "MAD", 3],
        [2518, "CDG", "GRU", 2]
    ]
];

$flightsWithNoSeats = 0;
$nationalFlights = 0;
$internationalFlights = 0;
$maxAmountOfSeats = 0;
$flightNumberWithMaxSeats = 0;

foreach($flights as $typeOfFlights => $flightsOfType) {
    foreach($flightsOfType as $flight) {
        if($typeOfFlights == "National") {
            $nationalFlights++;
        } else if($typeOfFlights == "International") {
            $internationalFlights++;
        }
        echo "Flight number: $flight[0], origin: $flight[1], destination: $flight[2], available seats: $flight[3]\n\n";
        if($flight[3] == 0) {
            $flightsWithNoSeats++;
        }
        if($flight[3] > $maxAmountOfSeats) {
            $maxAmountOfSeats = $flight[3];
            $flightNumberWithMaxSeats = $flight[0];
        }
    }
}

echo "$flightsWithNoSeats flights with no seats available\n";
echo "$nationalFlights national flights\n";
echo "$internationalFlights international flights\n";
echo "The flight number with more seats available is $flightNumberWithMaxSeats\n";
