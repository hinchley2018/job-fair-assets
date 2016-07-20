CREATE DATABASE wordpress;
CREATE USER 'wp_secure'@'localhost' IDENTIFIED BY 'qTkhwRQwGFupsV5FRC'
GRANT ALL PRIVILEGES ON wordpress.* TO 'wp_secure'@'localhost';
