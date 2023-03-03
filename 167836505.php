<?php 
<?php

class Student {
  public $name;
  public $age;
  public $grade;

  public function __construct($name, $age, $grade) {
    $this->name = $name;
    $this->age = $age;
    $this->grade = $grade;
  }
}

$student1 = new Student("John", 16, "A");
$student2 = new Student("Jane", 17, "B");

echo "Name: " . $student1->name . ", Age: " . $student1->age . ", Grade: " . $student1->grade . "\n";
echo "Name: " . $student2->name . ", Age: " . $student2->age . ", Grade: " . $student2->grade; 
?>