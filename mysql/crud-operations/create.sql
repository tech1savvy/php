-- Create the database
CREATE DATABASE IF NOT EXISTS users;

-- 2. Use the created database
USE users;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- Unique ID for each user
    username VARCHAR(50) NOT NULL UNIQUE, -- Username column, must be unique
    password VARCHAR(255) NOT NULL,       -- Password column (hashed passwords)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Timestamp of when the user was created
);

-- Insert sample data into users table
INSERT INTO users (username, password) VALUES 
('john_doe', 'hashed_password1'),
('jane_doe', 'hashed_password2');
