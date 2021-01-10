<?php

class PublicAttribute {
    public $firstName;
    public $lastName;
}

// When having public attributes anyone can change the values
$mariano = new PublicAttribute();
$mariano->firstName = 'Mariano';
$mariano->lastName = 'Grimaux';

// When having public attributes anyone can access the values

echo $mariano->firstName . "\n \n";
echo $mariano->lastName . "\n \n";

/*
 *  Change the values of the public attributes in the lines below.
 *  Paste here the output of the changes you've made
 */
$mariano->firstName = 'Federico';
$mariano->lastName = 'Bloomer Reeve';

// Add the code so the lines have a different output in the console.

echo $mariano->firstName . "\n \n";
echo $mariano->lastName . "\n \n";


/*
 * Do you think there's any way to prevent the fact that anyone can change the values of these attributes?
 * How?
 *
 * Your answer: The access modifier should be private so it can only be accessed or changed within the class
 *
 */