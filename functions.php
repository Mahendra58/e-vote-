<?php

// Generic function to read data from JSON file
function readData($filename) {
    if (!file_exists($filename)) return [];
    $json = file_get_contents($filename);
    return json_decode($json, true);
}

// Generic function to write data to JSON file
function writeData($filename, $data) {
    $json = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($filename, $json);
}

// Add a new voter
function addVoter($voter) {
    $voters = readData(__DIR__ . '/../data/voters.json');
    $voter['id'] = count($voters) + 1;
    $voters[] = $voter;
    writeData(__DIR__ . '/../data/voters.json', $voters);
}

// Add a new election
function addElection($election) {
    $elections = readData(__DIR__ . '/../data/elections.json');
    $election['id'] = count($elections) + 1;
    $elections[] = $election;
    writeData(__DIR__ . '/../data/elections.json', $elections);
}

// Add a vote
function addVote($vote) {
    $votes = readData(__DIR__ . '/../data/votes.json');
    $vote['id'] = count($votes) + 1;
    $votes[] = $vote;
    writeData(__DIR__ . '/../data/votes.json', $votes);
}

// Register a new user with email, hashed password, and SSN (last 4 digits)
function registerUser($userData) {
    $file = __DIR__ . '/../data/user.json';
    $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    // Check if SSN already used
    foreach ($users as $user) {
        if ($user['ssn_last4'] === $userData['ssn_last4']) {
            return "SSN already used. You cannot register again.";
        }
    }

    $users[] = $userData;
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
    return true;
}

// Helper function for login (optional use)
function authenticateUser($email, $password) {
    $file = __DIR__ . '/../data/user.json';
    $users = readData($file);

    foreach ($users as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            return $user;
        }
    }

    return false;
}
