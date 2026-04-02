CREATE TABLE users(
    id int AUTO_INCREMENT PRIMARY KEY,
    email varchar(100) UNIQUE,
    password varchar(100) NOT NULL,
    role ENUM (admin , étudiant) DEFAULT étudiant,
    created_at TIMESTAMP
)


CREATE TABLE students( 
    id int AUTO_INCREMENT PRIMARY KEY, 
    name varchar(100), 
    country varchar(100), 
    level ENUM('Débutant', 'Intermédiaire', 'Avancé') DEFAULT 'Débutant', 
    user_id int, 
    FOREIGN KEY (user_id) REFERENCES users(id)
 );




CREATE TABLE lessons(
    id int AUTO_INCREMENT PRIMARY KEY,
    title varchar(200),
    coach_name varchar(100),
    date DATETIME,
    price DECIMAL(10,2)
    level ENUM ('Débutant', 'Intermédiaire', 'Avancé')
)



CREATE TABLE enrollments(
    id int AUTO_INCREMENT PRIMARY KEY,
    student_id int,
    lesson_id int,
    payment ENUM('Payé','En attente') DEFAULT 'En attente'
)