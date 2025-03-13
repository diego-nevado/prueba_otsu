-- SQL structure for the 'usuarios' table
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

-- SQL structure for the 'contactos' table
CREATE TABLE contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(100),
    FOREIGN KEY (user_id) REFERENCES usuarios(id)
);

-- Sample data for 'usuarios'
INSERT INTO usuarios (username, password, email) VALUES
('admin', '$2y$10$examplehashedpassword', 'admin@example.com');

-- Sample data for 'contactos'
INSERT INTO contactos (user_id, nombre, telefono, email) VALUES
(1, 'John Doe', '123456789', 'johndoe@example.com'),
(1, 'Jane Smith', '987654321', 'janesmith@example.com');

