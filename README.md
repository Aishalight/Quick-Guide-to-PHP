🐘 PHP Quick Revision Guide

A concise PHP revision guide covering the fundamentals you need for a quick review: variables, data types, control flow, functions, forms, and MySQL CRUD operations.

«🎯 Goal: Review the core PHP concepts and syntax you need to start building dynamic web applications.»

---

📚 Table of Contents

- "1. Variables & Data Types" (#1-variables--data-types)
  - "Variable Scope" (#variable-scope)
- "2. Logic & Control Flow" (#2-logic--control-flow)
  - "If / Else / Elseif" (#if--else--elseif)
  - "Switch" (#switch)
  - "Loops" (#loops)
  - "Foreach" (#foreach)
- "3. Functions & Code Modularity" (#3-functions--code-modularity)
  - "User-Defined Functions" (#user-defined-functions)
  - "Built-in Functions" (#built-in-functions)
  - "Include & Require" (#include--require)
- "4. Forms & Database Integration" (#4-forms--database-integration)
  - "GET vs POST" (#get-vs-post)
  - "MySQL Connection" (#mysql-connection)
  - "CRUD Operations" (#crud-operations)
- "⚠️ Important Security Notes" (#️-important-security-notes)

---

1. Variables & Data Types

Variables are containers used to store data.

In PHP, variables:

- Start with a "$" sign
- Are dynamically typed
- Do not need an explicit type declaration

Core Data Types

Data Type| Example
String| ""Hello""
Integer| "10"
Float| "10.5"
Boolean| "true" / "false"
Array| "["Red", "Green"]"
Object| "new ClassName()"
NULL| "null"

Example

<?php

$txt = "Hello world!";       // String
$x = 5;                      // Integer
$y = 10.5;                   // Float
$isStudent = true;           // Boolean
$colors = ["Red", "Green", "Blue"]; // Array

?>

---

Variable Scope

PHP has three important variable scopes:

Local

A variable declared inside a function is local and can only be accessed within that function.

function test() {
    $message = "Hello";
    echo $message;
}

test();

Global

A variable declared outside a function has global scope.

$name = "John";

function greet() {
    global $name;
    echo $name;
}

greet();

«💡 You can also access global variables inside functions using "$GLOBALS".»

Static

A "static" variable keeps its value between function calls.

function counter() {
    static $count = 0;
    $count++;

    echo $count;
}

counter(); // 1
counter(); // 2
counter(); // 3

---

2. Logic & Control Flow

Control statements allow your program to make decisions and repeat operations.

---

If / Else / Elseif

Use conditional statements when your program needs to make decisions.

<?php

$grade = 85;

if ($grade >= 90) {
    echo "Excellent!";
} elseif ($grade >= 75) {
    echo "Good job!";
} else {
    echo "Keep practicing.";
}

?>

Structure

if condition
    ↓
    true → execute code

    false
      ↓
elseif condition
    ↓
    true → execute code

    false
      ↓
else → execute code

---

Switch

A "switch" statement is useful when checking one variable against multiple possible values.

<?php

$day = "Tuesday";

switch ($day) {

    case "Monday":
        echo "Start of the week!";
        break;

    case "Tuesday":
        echo "It's Tuesday!";
        break;

    default:
        echo "Just another day.";
}

?>

«⚠️ Don't forget "break", otherwise PHP may continue executing the following cases.»

---

Loops

Loops allow you to execute the same block of code multiple times.

For Loop

Use a "for" loop when you generally know how many times you want to iterate.

<?php

for ($i = 1; $i <= 5; $i++) {
    echo "Number: $i <br>";
}

?>

Output:

Number: 1
Number: 2
Number: 3
Number: 4
Number: 5

While Loop

Use a "while" loop when you want to continue running code while a condition is true.

<?php

$x = 1;

while ($x <= 5) {
    echo "Count: $x <br>";
    $x++;
}

?>

«⚠️ Make sure the condition eventually becomes false, otherwise you can create an infinite loop.»

---

Foreach

"foreach" is commonly used to iterate through arrays.

<?php

$seasons = ["Summer", "Winter", "Spring", "Autumn"];

foreach ($seasons as $season) {
    echo "Season is: $season <br>";
}

?>

Associative Arrays

<?php

$student = [
    "name" => "Aisha",
    "age" => 20,
    "grade" => "A"
];

foreach ($student as $key => $value) {
    echo "$key: $value <br>";
}

?>

---

3. Functions & Code Modularity

Functions allow you to create reusable blocks of code.

A function can:

1. Receive data through parameters
2. Process the data
3. Return a result

---

User-Defined Functions

<?php

function calculateTotal($price, $tax) {
    $total = $price + $tax;

    return $total;
}

echo "Your total is: $" . calculateTotal(100, 15);

?>

Output:

Your total is: $115

Parameters

function greet($name) {
    echo "Hello, $name!";
}

greet("Aisha");

Return Values

function add($a, $b) {
    return $a + $b;
}

$result = add(10, 5);

echo $result; // 15

Call by Reference

PHP passes arguments by value by default.

You can pass a variable by reference using "&".

function addFive(&$number) {
    $number += 5;
}

$x = 10;

addFive($x);

echo $x; // 15

---

Built-in Functions

PHP provides thousands of built-in functions.

String Functions

echo strlen("Hello!"); 
// 6

echo str_replace("World", "PHP", "Hello World");
// Hello PHP

Math Functions

echo abs(-15);
// 15

echo rand(1, 100);
// Random number between 1 and 100

Some useful functions to remember:

strlen()
str_replace()
strtolower()
strtoupper()
trim()
abs()
round()
ceil()
floor()
rand()

---

Include & Require

"include" and "require" allow you to reuse PHP files across multiple pages.

This is especially useful for:

- Headers
- Footers
- Navigation bars
- Database connections
- Configuration files
- Reusable functions

Include

include 'header.php';

If the file is missing, PHP produces a warning and attempts to continue.

Require

require 'database_config.php';

If the file is missing, PHP produces a fatal error and stops execution.

Common Structure

project/
│
├── index.php
├── login.php
├── register.php
│
├── config/
│   └── database.php
│
└── includes/
    ├── header.php
    └── footer.php

---

4. Forms & Database Integration

PHP becomes especially powerful when it is combined with HTML forms and databases.

---

GET vs POST

PHP provides superglobals for receiving form data.

GET

Data is sent through the URL.

<form method="GET" action="search.php">

    <input type="text" name="query">

    <button type="submit">Search</button>

</form>

Example URL:

search.php?query=php

Use GET for things such as:

- Search
- Filters
- Pagination
- Non-sensitive parameters

---

POST

POST sends the data in the HTTP request body.

<form method="POST" action="process.php">

    <input type="text" name="username">

    <input type="password" name="password">

    <button type="submit">Login</button>

</form>

Receive the data:

<?php

$name = $_POST["username"];
$password = $_POST["password"];

echo "Welcome $name!";

?>

Important

«⚠️ POST is not automatically secure or encrypted. Use HTTPS for encryption and validate/sanitize input on the server.»

Never store or display passwords like this in a real application.

---

🗄️ MySQL Database Integration

PHP can connect to a MySQL database to permanently store and manage application data.

The four basic database operations are known as CRUD:

Operation| Meaning| SQL
Create| Add data| "INSERT"
Read| Retrieve data| "SELECT"
Update| Modify data| "UPDATE"
Delete| Remove data| "DELETE"

---

1. Connecting to MySQL

Using MySQLi:

<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "school_db";

$conn = mysqli_connect(
    $host,
    $user,
    $pass,
    $dbname
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully!";

?>

---

CRUD Operations

2. Create — INSERT

Adds a new record to the database.

<?php

$sql = "INSERT INTO students (name, grade)
        VALUES ('John Doe', 'A')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
}

?>

---

3. Read — SELECT

Retrieves data from the database.

<?php

$sql = "SELECT * FROM students";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row["name"] . " - " . $row["grade"] . "<br>";
}

?>

---

4. Update — UPDATE

Modifies an existing record.

<?php

$sql = "UPDATE students
        SET grade = 'A+'
        WHERE name = 'John Doe'";

mysqli_query($conn, $sql);

?>

---

5. Delete — DELETE

Removes a record.

<?php

$sql = "DELETE FROM students
        WHERE name = 'John Doe'";

mysqli_query($conn, $sql);

?>

---

Close the Connection

When finished:

mysqli_close($conn);

---

⚠️ Important Security Notes

The examples above are intentionally simple for learning. Do not copy them directly into a production application.

1. Use Prepared Statements

❌ Avoid:

$sql = "SELECT * FROM users WHERE email = '$email'";

✅ Prefer prepared statements:

$stmt = mysqli_prepare(
    $conn,
    "SELECT * FROM users WHERE email = ?"
);

mysqli_stmt_bind_param($stmt, "s", $email);

mysqli_stmt_execute($stmt);

Prepared statements help protect against SQL injection.

---

2. Validate User Input

Never blindly trust:

$_GET
$_POST
$_COOKIE
$_FILES

Validate and process user input on the server.

---

3. Never Store Plain-Text Passwords

Use:

$passwordHash = password_hash(
    $password,
    PASSWORD_DEFAULT
);

To verify:

if (password_verify($password, $passwordHash)) {
    echo "Login successful!";
}

---

🧠 Quick Exam Cheat Sheet

VARIABLE
$variable = value;

CONDITION
if (...) { }

LOOP
for (...) { }
while (...) { }
foreach (...) { }

FUNCTION
function name($parameter) {
    return value;
}

FORM
$_GET["name"]
$_POST["name"]

DATABASE
mysqli_connect()
mysqli_query()
mysqli_fetch_assoc()
mysqli_close()

CRUD
CREATE → INSERT
READ   → SELECT
UPDATE → UPDATE
DELETE → DELETE

FILES
include
require

SECURITY
Prepared Statements
password_hash()
password_verify()
HTTPS
Input Validation

---

🚀 Final Reminder

If you're comfortable with these concepts, you have the foundation needed to start building PHP applications with MySQL.

Practice > Memorization.

Try building a small project that includes:

- ✅ HTML form
- ✅ PHP processing
- ✅ MySQL database
- ✅ Create records
- ✅ Display records
- ✅ Update records
- ✅ Delete records

«Happy Coding & Good Luck on Your Exams! 🐘🚀»