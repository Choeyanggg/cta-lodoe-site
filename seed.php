<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

use Faker\Factory;
use Faker\Provider\Base;

class TibetanNameProvider extends Base {
    protected static $firstNames = [
        'Tenzin', 'Pema', 'Sonam', 'Karma', 'Dolma',
        'Ngawang', 'Jigme', 'Lobsang', 'Dechen',
        'Kunsang', 'Phuntsok', 'Tashi', 'Yeshi',
        'Samten', 'Norbu', 'Wangmo', 'Gyatso', 'Dawa'
    ];

    protected static $lastNames = [
        'Dorjee', 'Lhamo', 'Tsering', 'Yeshi',
        'Choden', 'Phuntsok', 'Norbu', 'Wangmo',
        'Sangmo', 'Gyaltsen', 'Wangchuk'
    ];

    public function tibetanName() {
        $first = static::randomElement(static::$firstNames);
        $last = static::randomElement(static::$lastNames);
        return $first . ' ' . $last;
    }
}

$faker = Factory::create();
$faker->addProvider(new TibetanNameProvider($faker));

$posts = ["Office Assistant", "Office Superintendent", "Accountant", "Clerk", "Manager", "Receptionist","Cashier","Technician"];
$departments = ["Finance", "Religion", "Home", "Education", "Health", "Foreign", "Security"];

for ($i = 0; $i < 50; $i++) {
    $application_no = strtoupper($faker->unique()->numerify('#####')); // 5-digit unique number
    $application_date = $faker->date('Y-m-d', 'now'); 
    $name = $faker->tibetanName();
    $post = $faker->randomElement($posts);
    $department = $faker->randomElement($departments);
    $remarks = $faker->sentence(6); 

    $sql = "INSERT INTO derim2a (Application_No, Application_Date, Username, Post, Department, Remarks)
            VALUES ('$application_no', '$application_date', '$name', '$post', '$department', '$remarks')";
    
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

echo "50 Fake applications inserted!";
$conn->close();
?>
