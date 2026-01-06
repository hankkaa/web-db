CREATE DATABASE club_db;
USE club_db;

CREATE TABLE member (
  id INT AUTO_INCREMENT PRIMARY KEY,
  department VARCHAR(50),
  name VARCHAR(30),
  student_id VARCHAR(20)
);

INSERT INTO member (department, name, student_id)
VALUES ('컴퓨터융합학부', '홍길동', '20241234');

SELECT * FROM member;