<?php
class Contact {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function saveContact($name, $email, $subject, $message) {
        $stmt = $this->db->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);
        return $stmt->execute();
    }
}
?>
