CREATE TABLE residents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    zone VARCHAR(100) NOT NULL,
    light_post VARCHAR(50),
    full_name VARCHAR(150) NOT NULL,
    address TEXT,
    phone VARCHAR(30),
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
